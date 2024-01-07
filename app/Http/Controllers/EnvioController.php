<?php

namespace App\Http\Controllers;

use App\Mail\PaqueteRecibido;
use App\Models\Costo;
use App\Models\Envio;
use App\Models\Etiqueta;
use App\Models\Paquete;
use App\Models\Sucursal;
use Barryvdh\DomPDF\Facade\Pdf;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Twilio\Rest\Client;

class EnvioController extends Controller
{
    public $origen=60;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('envio.listaEnvios',[
            'envios'=> Envio::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sucursal=Auth::user()->sucursal;
        return view('envio.crearEnvio',[
            'envios'=> Envio::get(),
            'sucursales'=> Sucursal::where('nombre','!=',$sucursal)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->ocurre)
        {
            $ocurre="Y";
        }
        else
            $ocurre="N";



        request()->validate([
            'nombre_remitente'=>'required', 
            'direccion_remitente'=>'required',
            'telefono_remitente'=>'required',
            'correo'=>'required',
            'rfc'=>'required',
            'nombre_destino'=>'required',
            'correo_destino'=>'required',
            'telefono_destino'=>'required',
            'direccion_destino'=>'required',
            'sucursal_destino'=>'required',
        ]);
        $nombre_sucursal=Auth::user()->sucursal;
        $id_sucursal=Sucursal::where('nombre',$nombre_sucursal)->first()->id;
        $guia= date('zsih').$id_sucursal;

        $clave= substr(mt_rand(),0,6);

        

        Envio::create([
            'nombre_remitente' => $request['nombre_remitente'],
            'direccion_remitente' => $request['direccion_remitente'],
            'telefono_remitente' => $request['telefono_remitente'],
            'correo' => $request['correo'],
            'rfc' => $request['rfc'],
            'nombre_destino' => $request['nombre_destino'],
            'telefono_destino' => $request['telefono_destino'],
            'correo_destino' => $request['correo_destino'],
            'direccion_destino' => $request['direccion_destino'],
            'guia' => $guia,
            'contrasena_entrega' => $clave,
            'sucursal_destino'=> $request['sucursal_destino'],
            'ocurre'=> $ocurre,
            
        ]);

        return redirect()->route('envio',
        [
        'envio'=> Envio::where('guia',$guia)->first(),
        'paquetes'=>Paquete::where('envioId',$guia)->get(),
        ]
        )->with('status','Envio generado, agregar paquetes al envio');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function show(Envio $envio)
    {
        return view('envio.envio',[
            'envio'=> $envio,
            'paquetes'=>Paquete::where('envioId',$envio->guia)->get(),
            'costos'=>Costo::get(),
            ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Envio $envio)
    {
        $request= request();
        request()->validate([
            'nombre'=>['required','string',Rule::unique('envios')->ignore($envio)],
            'descripcion'=>'required|string',
            'alto'=>'required',
            'largo'=>'required',
            'ancho'=>'required',
            'peso'=>'required',
            'costo'=>'required',
        ]);
        $envio->update([
            'nombre' => $request['nombre'],
            'descripcion' => $request['descripcion'],
            'alto' => $request['alto'],
            'largo' => $request['largo'],
            'ancho' => $request['ancho'],
            'peso' => $request['peso'],
            'costo' => $request['costo'],
        ]);
            return redirect()->route('listaEnvios')->with('status','El envio fue actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Envio $envio)
    {
        $envio->delete(); 
        return redirect()->route('listaEnvios')->with('status','El envio fue eliminado con exito');
    }

    public function procesar(Envio $envio)
    {
        $request=request();
        request()->validate([
            'firma'=>[
                'required',],
            'guia'=>'required',
            'ine'=>[
                'required',],
        ]);


        // guardando INE
        $file = $request->file('ine')[0];
        
        $ext=$file->getClientOriginalExtension();
        $name=$request->guia;
        $newNameIne=$name."_Ine.".$ext;
                
        // guardando archivos y creando la ruta
        $pathOrIne = public_path('img/IneEntrega');
        $pathSaveIne = public_path('img/IneEntrega');
        $pathSaveIne = explode('public_html',$pathSaveIne)[1];
        // $pathSaveIne = explode('www',$pathSaveIne)[1];
                
        if (!file_exists($pathOrIne)) {
            mkdir($pathOrIne, 666, true);
        }
        // resize image to new width
        $pathOrIne.'/'.$newNameIne;
        $img = Image::make($file)->widen(100);
        $img->save($pathOrIne.'/'.$newNameIne,50);

        

        // guardando Firma
        $file = $request->file('firma');
        
        $ext2=$file->getClientOriginalExtension();
        $name=$request->guia;
        $newNameFirma=$name."_Firma.".$ext2;
                
        // guardando archivos y creando la ruta
        $pathOrFirma = public_path('img/FirmaEntrega');
        $pathSaveFirma = public_path('img/FirmaEntrega');
        $pathSaveFirma = explode('public_html',$pathSaveFirma)[1];
        // $pathSaveFirma = explode('www',$pathSaveFirma)[1];
                
        if (!file_exists($pathOrFirma)) {
            mkdir($pathOrFirma, 666, true);
        }
        // resize image to new width
        $path = $file->storeAs('FirmaEntrega',$newNameFirma, 'public2');
        // rutas donde se guardaron los archivos
        $pathSaveFirma=$pathSaveFirma.'/'.$newNameFirma;
        $pathSaveIne=$pathSaveIne.'/'.$newNameIne;

        // obtenemos datos necesarios para la etiqueta
        // direccion de sucursal
        $sucursal=Auth::user()->sucursal;
        $direccion= Sucursal::where('nombre',$sucursal)->first()->direccion;
        //datos de envio
        $envio=Envio::where('guia',$request->guia)->first();
        // direccion envio y recibo
        $direccion_destino=$envio->direccion_destino;
        $direccion_origen=$envio->direccion_remitente;
        // fecha de envio
        $fecha=date('d/m/Y H:i:s');
        // datos del bulto
        $paquetes=Paquete::where('envioId',$request->guia)->get();
        $totalPaquetes=0;
        $contador=0;
        $zplFinal="";
        foreach ($paquetes as $paquete) {
            $totalPaquetes+=$paquete->cantidad;
            for ($i=0; $i <$paquete->cantidad ; $i++) { 
                $this->origen=60;
                // obteniendo imagen de la etiqueta
                // partte 1 etiqueta
                $inicio="^XA
                ^FO20,20^GFA,5810,5810,35,,::::::::::S03E,S0FF8V01FCQ01FCQ03F8,R07FFEU03IFEO03IFEO07IF8,Q01JF8T0KF8N0KF8M01KF,Q07FC1FES03KFEM03KFEM07KFC,P01FF007F8R0MF8L0MF8K01LFE,P07FC001FEQ01MFCK01MFCK03MF8,O01FEJ07F8P03MFEK03NFK07MFC,O07FEJ01FEP07NFK07NFK0NFE,N01IF8J07F8O0OF8J0OF8I01NFE,N07IFEJ01FEN01OFCI01OFCI03OF,M01FF1FF8J07FCM03OFEI03OFEI03OF8,M07F807FEJ01FFM03OFEI03OFEI07OF8,L01FFI0FF8J07FCL07PFI07PFI0PFC,L07FF8003FEJ01FFL07PFI07PFI0PFC,K01IFEI0FF8J07FCK0QF800QF800PFE,K0FF9FF8003FEJ01FFK0QF800QF801PFE,J03FE07FEI0FF8J03FCI01QF800QF801PFE,J0FF801FF8003FEK0FFI01KF9KF801KFDKF801JFE1JFE,I03FEI07FEI0FF8J03FC001JFE07JFC01JFE07JFC01JFC0JFE,I0FFK0FF8003FFK0FF001JFC03JFC01JFC03JFC03JF807IFE,I0FEK03FEI0FFCJ03F801JFC01JFC01JFC01JFC03JF807JF,001FEL0FF8003FFJ07F801JF801JFC01JF801JFC03JF803JF,001FF8K03FEI0FFC001FF801JF801JFC01JF801JFC03JF803IFE,001FFEL0FF8003FF007FF801JF801JFC01JF801JFC03JF803IFE,001IF8K03FFI0FFC1IF801JF801JFC01JF801JFC03JF803IFE,001IFEL0FFC001FF7FE7801JF801JFC01JF801JFC03JF803IFE,001JF8K03FFI07IF87801JF801JFC01JF801JFC03JFC01IFC,001JFEL0FFC001FFE07801JF801JFC01JF801JFC01JFC00IFC,001KF8K03FF001FF807801JF801JFC01JF801JFC01JFE007FF8,001LFL0FFC0FFE007801JF800JFC01JF801JFC01JFE003FE,001LFCK03FF1FFC007801JF800JF801JF801JFC01KF,001MFL0KFC007801JF800JF801JF801JFC00KF8,001MFCK01IF7C007801JF8007IF001JF801JFC00KFC,001NFL0FFC3C007801JF8003IF001JF801JFC00KFE,001NFCJ01FF07C007801JF8001FFC001JF801JFC007KF,001OFJ0FFE07C007801JF8I0FF8001JF801JFC007KF,001OFC003FFE07C007801JF8N01JF801JFC003KF8,001PF00IFE07C007801JF8N01JF801JFC003KFC,001PFC3FF1E07C007801JF8N01JF801JFC001KFE,001SFC1E07C007801JF8N01JF801JFC001LF,001SF01E07C007801JF8N01JF801JFCI0LF8,001RFC01E07C007801JF8N01JF801JFCI07KFC,001RF001E07C007801JF8N01JF801JFCI07KFE,001QFE001E03C007801JF803IF8001JF801JFCI03LF,001QFE001E07C007801JF80JFE001JF801JFCI01LF8,001QFE001E0FC007801JF80KF001JF801JFCJ0LFC,001QFE001E3FC007801JF81KF801JF801JFCJ07KFE,001QFE001IF8007801JF83KF801JF801JFCJ03LF,001QFE001IFI07801JF83KF801JF801JFCJ03LF8,001QFE001FFCI07801JF83KFC01JF801JFCJ01LF8,001QFE001FFJ07801JF83KFC01JF801JFCK0LFC,001QFE001FCJ07801JF83KFC01JF801JFCK07KFE,001QFEI0FK07801JF83KFC01JF801JFCK03KFE,001QFEO07801JF81KFC01JF801JFCK01LF,001QFEO07801JF80KFC01JF801JFCL0LF,001QFEO07801JF807JFC01JF801JFCL07KF8,001QFEO07801JF801JFC01JF801JFCL03KF8,001QFEO07801JF800JFC01JF801JFCL01KFC,001QFEJ018I07801JF800JFC01JF801JFCM0KFC,001QFEJ03CI07801JF800JFC01JF801JFCM07JFE,001QFEJ03CI07801JF800JFC01JF801JFCM03JFE,001QFEJ07CI07801JF800JFC01JF801JFC001FC003JFE,001QFEJ07CI07801JF800JFC01JF801JFC007FF001JFE,001QFEJ07CI07801JF800JFC01JF801JFC00IF800KF,001QFEJ07EI07801JF800JFC01JF801JFC01IFC00KF,001QFEJ07FI07801JF800JFC01JF801JFC03IFE007JF,:001QFEJ07F8007801JF800JFC01JF801JFC03IFE007JF,:001QFEJ07FC007801JF800JFC01JF801JFC03IFE003JF,001QFEJ07FE01F801JF800JFC01JF801JFC03IFE003JF,I0QFEJ07FE07F801JF800JFC01JF801JFC03IFE003JF,I0QFEJ03FF1FF001JF800JFC01JFC01JFC03JF007JF,I03PFEJ03DIFE001JFC01JFC01JFC01JFC03JF007JF,J0PFEL0IFI01JFC01JF801JFE03JFC03JF80KF,J03OFEL0FFCI01JFE07JF801KF8KF803JFC1KF,K0OFEK01FFJ01QF801QF803PFE,K07NFEK07FEK0QF800QF803PFE,K07NFEJ01FFEK0QFI0QF801PFE,K07NFEJ07FFEK0QFI0QF001PFC,K0F1MFEI01FF8FK07PFI07PF001PFC,J01F07LFEI07FE078J07OFEI07OFEI0PF8,J01E01LFE001FF8078J03OFCI03OFEI0PF8,J03C00LFE00IF003CJ03OFCI03OFCI07OF,J03C007KFE03IF001EJ01OF8I01OF8I03NFE,J07800F1JFE0FFCF001EK0OFK0OFJ01NFC,J0FI0F0JFE3FF0FI0FK07MFEK07MFEJ01NF8,J0FI0F07IFEIF0FI0F8J03MFCK03MFCK07MF,I01EI0F07MF0FI078J01MF8K01MF8K03LFE,I03EI0F07MF0FI03CK07KFEM07KFEL01LF8,I03CI0F071JFCF0FI03CK01KF8M01KF8M07KF,I078I0F0707IF0F0FI01EL07IFEO07IFEN01JF8,I078I0F0701FF80F0FJ0FM07FEQ07FEP01FF8,I0FJ0F07007E00F0FJ0F,I0FJ0F07001800F0FJ0F,I0FJ0F078J01F0FJ0F,I0FJ0F07EJ03F0FJ0F,I0FJ0F07FC001FE0FJ0FgS0C,I0FJ0703LFC0FJ0F,I0FJ0700LF00FJ0F,I0FJ0F003JFC00FJ0F,I0FI03FI07FFEI0FCI0FI0FE006003F8030201F80FF03F80FE010018,I0FI0FEP07FI0FI0C300E0060C030301I01803I0C3010038,I0F001FCP01FC00FI0C100B00406030201I01002I08101002C,I0F007FR0FE00FI0C100900C02030201I01002I081010024,I0F01FCR03F80FI0C301100803030201I01003I0C3010044,I0F07FT0FE0FI0C601080803030201F001003F00C6010042,I0F1FCJ0180018J03F8FI0FC03080802030201I01003I0FC0100C2,I0F3F8J03C001CK0FEFI0C003980C06010201I01002I0CC0100E6,I0FFEK03C001CK07FFI0C0034C040E010201I01002I0840100D3,I0FF8K01C1C1CK01FFI0C00604070E018601I01003I0C2010181,I0FEL01C1C1CL07FI0C0040601F200FC01FC01003F80C30101018,I0F8L01C1C1CL01F,I07M01C1C1CM07,Q01C1C1C,:::::::::::::::::::Q01C1C18,Q01C1C,:::::Q03C1C,Q01C1C,Q0181C,S01C,:::T08,,::::^FS
                ";
                $zpl="
                ^FX Top section with logo, name and address.
                ^CF0,40
                ^FO300,50^FDGos paqueterias^FS
                ^CF0,20";
                $vector= $this->contarCaracteres($direccion,30);
                foreach ($vector as $key) {
                    $zpl=$this->agregarLineas($zpl,290,35,$key);
                }
                $zpl= $this->dibujarLinea($zpl,45);
                // parte 2
                $this->origen+=20;
                $zpl.="
                ^FX Second section with recipient address and permit information.
                ^CFB,20
                ^FO50,".$this->origen."^FDDireccion de destino:^FS
                ^CFA,20
                ";
                if (strlen($direccion_destino)<40)
                {
                    $zpl=$this->agregarLineas($zpl,50,40,$direccion_destino);
                }
                else
                {
                    $vector= $this->contarCaracteres($direccion_destino,40);
                    foreach ($vector as $key) {
                        $zpl=$this->agregarLineas($zpl,50,40,$key);
                    }
                }
                
                

                $zpl= $this->dibujarLinea($zpl,45);
                // parte 3
                $this->origen+=20;
                $zpl.="
                ^FX Third section with recipient address and permit information.
                ^CFB,20
                ^FO50,".$this->origen."^FDDireccion de origen:^FS
                ^CFA,20
                ";

                $vector= $this->contarCaracteres($direccion_origen,40);
                foreach ($vector as $key) {
                    $key;
                    $zpl=$this->agregarLineas($zpl,50,40,$key);
                }

                $zpl= $this->dibujarLinea($zpl,40);

                $zpl.="
                ^FX Third section with recipient address and permit information.
                ^CFB,25
                ^FO50,590^FDFecha y hora de embarque: ^FS
                ^CFA,25
                ^FO50,620^FD".$fecha."^FS
                ^FX Fifth section with bar code.
                ^CFA,25
                ^FO50,690^FDPaquete ".($i+1)."/".$totalPaquetes."^FS
                ^FO50,720^FDPeso estimado bulto ".$paquete->peso."Kg^FS
                ^FX Fifth section with bar code.
                ^BY3,2,120
                ^FO90,800^BC^FD".$request->guia."^FS
                ^XZ";

                $zpl=$inicio.$zpl;
                $zplFinal.=$zpl;
                $zpl="";
            }
            $curl = curl_init();
            // curl_setopt($curl, CURLOPT_URL, "http://api.labelary.com/v1/printers/8dpmm/labels/3x5/0/"); //png
            curl_setopt($curl, CURLOPT_URL, "http://api.labelary.com/v1/printers/8dpmm/labels/3x5/"); //pdf
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $zplFinal);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($curl,CURLOPT_HTTPHEADER, array("Accept: application/pdf"));
            $result = curl_exec($curl);
            //si todo OK guardamos PNG
            $pathOriginal = public_path('etiquetas');
            if (!file_exists($pathOriginal)) {
                mkdir($pathOriginal, 666, true);
            }
            $rutaFinal=$pathOriginal."/".$request->guia."_".$i.".pdf";
            $rutaFinal=explode("public_html",$rutaFinal)[1];
            // $rutaFinal=explode("www",$rutaFinal)[1];
            if (curl_getinfo($curl, CURLINFO_HTTP_CODE) == 200) {
                $file = fopen($pathOriginal."/".$request->guia."_".$i.".pdf", "w");
                fwrite($file, $result);
                fclose($file);
            } else {
                print_r("Error: $result");
            }
            
            Paquete::where('id',$paquete->id)->update([
                'etiqueta'=>$rutaFinal,
            ]);
            curl_close($curl);
            $zplFinal="";
        }
            
        // fin de etiquetas
        $total=Paquete::selectRaw('SUM(costo * cantidad) AS Total')->where('envioId',$envio->guia)->value('Total');
        $cantidad=Paquete::selectRaw('SUM(cantidad) AS Total')->where('envioId',$envio->guia)->value('Total');
        // generando PDF

        $data = [
            'titulo' => 'Reporte de envio',
            'guia' => $envio,
            'direccion' => $direccion,
            'sucursal' => $sucursal,
            'fecha'=>$fecha,
            'paquetes'=>$paquetes,
            'total'=>$total,
        ];
    
        $pdf = Pdf::loadView('pdf.envioPDF', $data);
        $rutapdf = public_path('pdf')."/".$envio->guia.'.pdf';
        $pdf->save($rutapdf);
        $rutapdf=explode('public_html',$rutapdf)[1];
        // $rutapdf=explode('www',$rutapdf)[1];
        // terminando PDF
        $mensaje['guia']=$envio->guia;
        $mensaje['clave']=$envio->contrasena_entrega;
        $mensaje['nombre_remitente']=$envio->nombre_remitente;
        $mensaje['direccion']=$envio->direccion;

                // envio de correo
                Mail::to($envio->correo_destino)
                ->cc($envio->correo)
                ->queue(new PaqueteRecibido ($mensaje));

        Envio::where('guia',$envio->guia)->update([
            'estado'=>'P',
            'total'=>$total,
            'cantidad'=>$cantidad,
            'sucursal_origen'=>$sucursal=Auth::user()->sucursal,
            'ine'=>$pathSaveIne,
            'firma'=>$pathSaveFirma,
            'pdf'=>$rutapdf,

        ]);

        // enviando mensaje de whatsapp


        $sid = "1";
        $token  = "1";
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
        ->create("whatsapp:+521".$envio->telefono_destino, // to
            array(
            "from" => "whatsapp:+15414352062",
            "body" => "Hola te informamos que tu paquete ha sido recibido y esta en camino a ser entregado

            Tu numero de guia es el siguiente: ".$envio->guia."
            
            Podras recibirlo con la siguiente contrasena: ".$envio->contrasena_entrega."
            
            Tambien te invitamos a dar seguimiento de tu paquete en la siguiente pagina:
            https://gospaqueterias.com/rastrear
            
            En GOS Paqueterias te deseamos un excelente dia
            
            Saludos!"
            )
        );

        print($message->sid);
        // fin de mensaje de whatsapp
        return redirect()->route('listaEnvios')->with('status','El envio fue terminado con exito');
    }

    public function envioLectura(Envio $envio)
    {
        return view('envio.envioLectura',[
            'envio'=> $envio,
            'paquetes'=>Paquete::where('envioId',$envio->guia)->get(),
            'costos'=>Costo::get(),
            ]);
    }
    // enviar unidades

    public function enviarUnidad()
    {
        return view('envio.procesarEnvio',[
            'envios'=> Envio::where('estado','P')->get(),
            'sucursales'=> Sucursal::get(),
            ]);
    }

    public function procesarUnidad(Request $request){
        
        $idTransporte= date('dmYhis');

        Envio::whereIn('id',$request->envios)->update([
            'estado'=>'C',
            'fecha_envio'=>DB::raw('NOW()'),
            'id_transporte'=>$idTransporte,
        ]);

        return redirect()->route('listaEnvios')->with('status','Los envios fueron procesados con exito');

    }

    // recibir unidades
    public function recibirUnidad()
    {
        return view('envio.recibirUnidad',[
            'envios'=> Envio::where('estado','C')->where('sucursal_destino','=',Auth::user()->sucursal)->get(),
            'sucursales'=> Sucursal::get(),
            ]);
    }

    public function procesarReciboUnidad(Request $request){
        
        request()->validate([
            'observaciones_recibo'=>'required',
            'evidencia'=>'required',
            'envios'=>'required',
        ]);

        $request= request();
        $files = $request->file('evidencia');
        $nombreArchivos="";

        if($request->hasFile('evidencia'))
        {
            $counter=0;
            foreach ($files as $file) {
                $ext=$file->extension();
                $name=date('dmhis');
                $clave= substr(mt_rand(),0,2);
                $newName=$name."_".$counter.$clave.".".$ext;
                
                // guardando archivos y crenado la ruta
                $pathOriginal = public_path('img/evidencia_recibo');
                $pathSave = public_path('img/evidencia_recibo');
                $pathSave = explode('public_html',$pathSave)[1];
                // $pathSave = explode('www',$pathSave)[1];
                $pathOr=$pathOriginal; 
                
                if (!file_exists($pathOr)) {
                    mkdir($pathOr, 666, true);
                }
                // resize image to new width
                $pathOr.'/'.$newName;
                $img = Image::make($file)->widen(100);
                $img->save($pathOr.'/'.$newName,50);
                $nombreArchivos.=$pathSave.'/'.$newName.";";
                $counter++;
            }
            $nombreArchivos=substr($nombreArchivos,0,strlen($nombreArchivos)-1);
        }
        else
        {$nombreArchivos="";}
        
        foreach ($request->envios as $key) {
            $envio=Envio::where('id',$key)->first();
            if($envio->ocurre=="Y")
                $estado = "ER";
            else
                $estado = "EE";
            Envio::where('id',$key)->update([
                'estado'=>$estado,
                'fecha_sucursal'=>DB::raw('NOW()'),
                'evidencia_recibo'=>$nombreArchivos,
                'observaciones_recibo'=>$request->observaciones_recibo,
            ]);    
        }
        

        return redirect()->route('listaEnvios')->with('status','Los envios fueron procesados con exito');

    }

    public function contarCaracteres($cadena,$longitud){
        $partes=ceil(strlen($cadena)/$longitud);
        $vector=[];
        $nueva=[];
        $vector=explode(' ',$cadena);
        sizeof($vector);
        for ($i=0; $i < $partes; $i++) { 
            for ($j=0; $j < sizeof($vector); $j++) { 
                if(strpos($cadena,$vector[$j])>$longitud)
                {
                    $nueva[$i]=substr($cadena,0,strpos($cadena,$vector[$j-1]));
                    $cadena=substr($cadena,strpos($cadena,$vector[$j-1]));
                    $j=0;
                    $i++;
                }
                else if(strpos($cadena,$vector[$j])==strlen($cadena)-strlen($vector[$j]))
                {
                    $nueva[$i]=$cadena;
                    $i++;
                    break;
                }
            }
        }
        return $nueva;
    }

    public function agregarLineas($zpl,$x,$salto,$texto){
        $this->origen+=$salto;
        $zpl.="^FO".$x.",".$this->origen."^FD".$texto."^FS";
        return $zpl;
    }

    public function dibujarLinea($zpl,$position){
        $this->origen+=$position;
        $zpl.="^FO50,".$this->origen."^GB500,3,3^FS";
        return $zpl;
    }

    public function entrega(Envio $envio){
        return view('envio.entrega',[
            'envio'=> $envio,
            'paquetes'=>Paquete::where('envioId',$envio->guia)->get(),
            'costos'=>Costo::get(),
            ]);
    }

    public function listaEntrega(){
        return view('envio.listaEntrega',[
            'envios'=> Envio::where('estado','EE')->where('sucursal_destino',$sucursal=Auth::user()->sucursal)->get(),
            'titulo'=>'Lista entrega sucursal',
        ],);
    }

    public function listaEntregaSucursal(){
        return view('envio.listaEntrega',[
            'envios'=> Envio::where('estado','ER')->where('sucursal_destino',$sucursal=Auth::user()->sucursal)->get(),
            'titulo'=>'Lista entrega Domicilio',
        ]);
    }

    public function procesarEntrega(Envio $envio){
        $request= request();
        request()->validate([
            'firma'=>[
                'required',],
            'guia'=>'required',
            'ine'=>[
                'required',],
            'clave'=>[
                'required',
                'in:'.$envio->contrasena_entrega,
            ],
        ]);

        // guardando INE
        $file = $request->file('ine')[0];
        
        $ext=$file->getClientOriginalExtension();
        $name=$request->guia;
        $newNameIne=$name."_Ine.".$ext;
                
        // guardando archivos y creando la ruta
        $pathOrIne = public_path('img/IneRecibo');
        $pathSaveIne = public_path('img/IneRecibo');
        $pathSaveIne = explode('public_html',$pathSaveIne)[1];
        // $pathSaveIne = explode('www',$pathSaveIne)[1];
        
                
        if (!file_exists($pathOrIne)) {
            mkdir($pathOrIne, 666, true);
        }
        // resize image to new width
        $pathOrIne.'/'.$newNameIne;
        $img = Image::make($file)->widen(100);
        $img->save($pathOrIne.'/'.$newNameIne,50);

        

        // guardando Firma
        $file = $request->file('firma');
        
        $ext2=$file->getClientOriginalExtension();
        $name=$request->guia;
        $newNameFirma=$name."_Firma.".$ext2;
                
        // guardando archivos y creando la ruta
        $pathOrFirma = public_path('img/FirmaRecibo');
        $pathSaveFirma = public_path('img/FirmaRecibo');
        $pathSaveFirma = explode('public_html',$pathSaveFirma)[1];
        // $pathSaveFirma = explode('www',$pathSaveFirma)[1];
                
        if (!file_exists($pathOrFirma)) {
            mkdir($pathOrFirma, 666, true);
        }
        // resize image to new width
        $pathOrFirma.'/'.$newNameFirma;
        $path = $file->storeAs('FirmaRecibo/',$newNameFirma, 'public2');
        // rutas donde se guardaron los archivos
        $pathSaveFirma=$pathSaveFirma.'/'.$newNameFirma;
        $pathSaveIne=$pathSaveIne.'/'.$newNameIne;

        Envio::where('guia',$envio->guia)->update([
            'estado'=>'E',
            'ine_entrega'=>$pathSaveIne,
            'firma_entrega'=>$pathSaveFirma,
            'fecha_entrega'=>DB::raw('NOW()'),
        ]);
        return redirect()->route('listaEnvios')->with('status','El envio fue terminado con exito');
    }
    
    
}




