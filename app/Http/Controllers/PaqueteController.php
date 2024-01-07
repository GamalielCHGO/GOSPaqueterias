<?php

namespace App\Http\Controllers;

use App\Models\Costo;
use App\Models\Envio;
use App\Models\Paquete;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guia=request()->guia;
        return view('paquete.agregarPaquete',[
            'paquetes'=> Costo::get(),
            'guia'=> Envio::where('guia',$guia)->first(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        request()->validate([
            'alto'=>['required','integer'],
            'largo'=>'required|integer',
            'ancho'=>'required|integer',
            'peso'=>'required|integer',
            'costo'=>'required|integer|min:1',
            'evidencia'=>'required',
            'contenido'=>'required',
            'cantidad'=>'required|integer|min:1',
        ]);

        $files = $request->file('evidencia');
        $nombreArchivos="";

        if($request->hasFile('evidencia'))
        {
            $counter=0;
            foreach ($files as $file) {
                $ext=$file->extension();
                $name=$request->guia;
                $clave= substr(mt_rand(),0,2);
                $newName=$name."_".$counter.$clave.".".$ext;
                
                // guardando archivos y crenado la ruta
                $pathOriginal = public_path('img\evidencia');
                $pathSave = public_path('img\evidencia');
                $pathSave = explode('public_html',$pathSave)[1];
                // $pathSave = explode('www',$pathSave)[1];

                // $pathOr = explode('gospaqueterias',$pathOriginal,4);
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
        Paquete::create([
            'alto' => $request['alto'],
            'largo' => $request['largo'],
            'ancho' => $request['ancho'],
            'peso' => $request['peso'],
            'costo' => $request['costo'],
            'cantidad' => $request['cantidad'],
            'envioId' => $request['guia'],
            'tipo' => $request['tipo'],
            'contenido' => $request['contenido'],
            'evidencia' => $nombreArchivos,
        ]);
        
        
        return redirect()->route('envio',
        [
        'envio'=> Envio::where('guia',$request->guia)->first(),
        'paquetes'=>Paquete::where('envioId',$request->guia)->get(),
        'costos'=>Costo::get(),
        ]
        )->with('status','Paquetes agregados');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paquete $paquete)
    {
        $guia=$paquete->envioId;
        $paquete->delete(); 
        return redirect()->route('envio',
        [
        'envio'=> Envio::where('guia',$guia)->first(),
        'paquetes'=>Paquete::where('envioId',$guia)->get(),
        'costos'=>Costo::get(),
        ]
        )->with('status','Paquetes agregados');
    }
}

