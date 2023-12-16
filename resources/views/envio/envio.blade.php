@extends('layouts.config')

@section('content')
<!-- Page-header start -->
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Generar envio</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page body start -->
<div class="page-body">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-12 mx-auto">
                    <h1 class="display-4">Preparando envio Guia:{{$envio->guia}}</h1>
                    <hr> 
                    @if ($errors->any())
                        <div class="alert alert-dismissible alert-danger background-danger">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>{{$errors->first()}}</strong>
                        </div>
                    @endif
                    <div class="row bg-white shadow rounded py-3 px-4
                    bg-white shadow rounded py-3 px-4">
                        <div class="form-group col-lg-6">
                            <label for="remitente">Remitente</label>
                            <input type="text" name="remitente" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('remitente') is-invalid @else border-0  @enderror"
                            placeholder="remitente...." readonly
                            value="{{ old('remitente',$envio->nombre_remitente) }}"
                            id="remitente"> 
                            @error('remitente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group col-lg-6">
                            <label for="destinatario">Destinatario</label>
                            <input type="text" name="destinatario" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('destinatario') is-invalid @else border-0  @enderror"
                            placeholder="destinatario...." readonly
                            value="{{ old('destinatario',$envio->nombre_destino) }}"
                            id="destinatario"> 
                            @error('destinatario')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-9">
                            <label for="direccion_destino">Direccion destino</label>
                            <input type="text" name="direccion_destino" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('direccion_destino') is-invalid @else border-0  @enderror"
                            placeholder="direccion_destino...." readonly
                            value="{{ old('direccion_destino',$envio->direccion_destino) }}"
                            id="direccion_destino"> 
                            @error('direccion_destino')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="estado">Estado</label>
                            <input type="text" name="estado" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('estado') is-invalid @else border-0  @enderror"
                            placeholder="estado...." readonly
                            @switch($envio->estado)
                                        @case('R')
                                            value="En proceso"
                                            @break
                                        @case('P')
                                        value="En espera de envio"
                                            @break
                                        @case('C')
                                            value="Paquete en camino a sucursal"
                                            @break
                                        @case('E')
                                            value="Entregado"
                                            @break
                                        @case('ER')
                                            value="Espera Recoleccion"
                                            @break
                                        @case('EE')
                                            value="Proceso Entrega"
                                            @break
                                        @default
                                            value="Enviado"
                                    @endswitch
                            id="estado"> 
                            @error('estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="card-block">
                            <div class="table-responsive">
                                <table id="issue-list-table"
                                    class="table dt-responsive width-100" style="width: 100%;">
                                    <thead class="text-start">
                                        <tr>
                                            <th>Paquete</th>
                                            <th>Tipo</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Contenido</th>
                                            <th>Evidencia</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-start">
                                        @forelse ($paquetes as $paquete)
                                            <tr>
                                                <td class="pro-list-img">{{$paquete->id}}</td>
                                                <td class="pro-list-img">{{$costos[($paquete->tipo)-1]->nombre}}</td>
                                                <td class="pro-list-img">{{$paquete->cantidad}}</td>
                                                <td class="pro-list-img">{{$paquete->costo}}</td>
                                                <td class="pro-list-img">{{$paquete->contenido}}</td>
                                                <td>
                                                    @forelse (explode(';',$paquete->evidencia) as $imagen)
                                                        <img src="{{$imagen}}" alt="imagen">
                                                    @empty
                                                        No hay evidencias
                                                    @endforelse
                                                </td>
                                                <td>
                                                    <form action="{{ route('eliminarPaquete' , $paquete)}}" method="POST"  >
                                                        @csrf @method('DELETE')
                                                        <div class="col-sm-12 col-xl-12 m-b-30 ">
                                                            <div class="col-lg-3 col-md-3">
                                                                <div class="">
                                                                    <div class="d-grid">
                                                                        <button class="btn btn-danger">
                                                                            <i class="icofont icofont-trash fs-5"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Por favor Agregue paquetes</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- end of table -->
                        </div>
                        
                        <form action="{{route('agregarPaquetes',$envio)}}" method="GET"  class="">
                            @csrf
                            <div class="form-group col-lg-6 d-none" >
                                <label for="guia">Guia</label>
                                <input type="text" name="guia" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('guia') is-invalid @else border-0  @enderror"
                                placeholder="guia...." readonly
                                value="{{ old('guia',$envio->guia) }}"
                                id="guia"> 
                                @error('guia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-12 col-xl-12 m-b-30 ">
                                <div class="col-lg-12 col-md-12">
                                    <div class="">
                                        <div class="d-grid">
                                            <button class="btn btn-success">
                                                <i class="icofont icofont-check-circled"></i>
                                                Agregar paquete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="col-sm-12 col-xl-12 m-b-30 ">
                            <div class="col-lg-12 col-md-12">
                                <div class="">
                                    <div class="d-grid">
                                        <button type="button" class="btn btn-warning btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="icofont icofont-check-circled"></i> Finalizar envio</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form action="{{route('envio.destroy',$envio)}}" method="POST"  class="">
                            @csrf  @method('DELETE')
                            <div class="col-sm-12 col-xl-12 m-b-30 ">
                                <div class="col-lg-12 col-md-12">
                                    <div class="">
                                        <div class="d-grid">
                                            <button class="btn btn-danger">
                                                <i class="icofont icofont-trash"></i>
                                                Cancelar envio</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                <hr>
            </div>
            <!-- Select2 end -->
            
        </div>
    </div>
</div>
<!-- Page body end -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Datos del cliente</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card">
                {{-- <div class="card-block">
                    <div class="services-content text-start">
                        <h4 class="wow fadeInUp fs-1" data-wow-delay="0s">Terminos y Condiciones</h4>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">
                            <ol class="list-group">
                                <li class="pb-2 list-group-item" >
                                    <p class="fs-3 fw-bold">1. Definiciones: </p>
                                    <br>
                                    <p>Empresa: GOS Paqueterias.</p>
                                    <p>Cliente: Persona o entidad que contrata los servicios de paquetería.</p>
                                    <p>Envío: Artículo o paquete que será transportado por la empresa de paquetería.</p>
                                    <p>Destinatario: Persona o entidad designada para recibir el envío.</p>
                                </li>
                                <li class="pb-2 list-group-item" >
                                    <p class="fs-3 fw-bold">2. Servicios Ofrecidos:</p>
                                    
                                    <br>
                                    <p>
                                        La empresa se compromete a proporcionar servicios de paquetería de acuerdo con las tarifas y condiciones acordadas.
                                    </p>
                                </li>
                                <li class="pb-2 list-group-item" >
                                    <p class="fs-3 fw-bold">3. Condiciones de Envío:</p>
                                    <br>
                                    <p>El cliente es responsable de proporcionar información precisa y completa sobre el remitente y el destinatario.</p>
                                    <p>La empresa no se hace responsable de los daños causados por embalajes inadecuados proporcionados por el cliente.</p>
                                </li>
                                <li class="pb-2 list-group-item" >
                                    <p class="fs-3 fw-bold">4. Tarifas y Pagos:</p>
                                    <br>
                                    <p>Las tarifas serán establecidas según los acuerdos previos y se pagarán en el momento de la contratación del servicio.</p>
                                </li>
                                <li class="pb-2 list-group-item" >
                                    <p class="fs-3 fw-bold">5. Responsabilidad y Seguro:</p>
                                    <br>
                                    <p>La empresa se compromete a tomar las precauciones razonables para asegurar la entrega segura de los envíos, pero no se hace responsable de pérdidas o daños causados por circunstancias fuera de su control.</p>
                                    <p>Se recomienda que el cliente adquiera un seguro adicional para cubrir posibles pérdidas o daños.</p>
                                </li>


                                <li class="pb-2 list-group-item" >
                                    <p class="fs-3 fw-bold">6. Tiempos de Entrega:</p>
                                    <br>
                                    <p>Los tiempos de entrega son estimados y pueden estar sujetos a variaciones debido a circunstancias inesperadas.</p>
                                </li>
                                <li class="pb-2 list-group-item" >
                                    <p class="fs-3 fw-bold">7. Cancelaciones y Reembolsos:</p>
                                    <br>
                                    <p>Las cancelaciones están sujetas a las políticas de la empresa y pueden estar sujetas a cargos.</p>
                                    <p>Las solicitudes de reembolso serán evaluadas caso por caso.</p>
                                </li>
                                <li class="pb-2 list-group-item" >
                                    <p class="fs-3 fw-bold">8. Modificaciones de los Términos y Condiciones:</p>
                                    <br>
                                    <p>La empresa se reserva el derecho de modificar estos términos y condiciones con notificación previa al cliente.</p>
                                </li>
                                <li class="pb-2 list-group-item" >
                                    <p class="fs-3 fw-bold">9. Ley Aplicable:</p>
                                    <br>
                                    <p>Estos términos y condiciones se regirán por las leyes de la republica Mexicana y cualquier disputa será sometida a la jurisdicción de los tribunales de la ciudad de Mexico.</p>
                                </li>
                                <li class="pb-2 list-group-item" >
                                    <p class="fs-3 fw-bold">10. Contacto:</p>
                                    <br>
                                    <p>Para cualquier consulta o aclaración, el cliente puede ponerse en contacto con la empresa a través de los canales de comunicación proporcionados.</p>
                                    <p>Recuerda que es importante que un abogado revise estos términos y condiciones para asegurarse de que cumplan con las leyes y regulaciones locales. Además, es recomendable adaptarlos a las necesidades específicas de tu empresa y a las leyes de tu país o región.</p>
                                </li>
                            </ol>
                        </p>
                    </div>
                </div> --}}
                <form action="{{route('procesarEnvio',$envio)}}" method="post" enctype="multipart/form-data" id="procesarEnvio" name="procesarEnvio">
                    @csrf
                     <!-- Image upload card start -->
                     {{-- <div class="card">
                        <div class="card-block">
                            <div class="sub-title">INE</div>
                            <input type="file" name="ine" id="filer_input" placeholder="imagen de INE" required>
                        </div>
                    </div> --}}
                    <!-- Image upload card end -->
                    {{-- <p>Si esta de acuerdo con el envio de su paquete y con los terminos y condiciones por favor firme en el siguiente recuadro</p> --}}
                    <div class="container text-center">
                        <div>
                            <canvas id="canvas" class="border"></canvas>
                        </div>
                        <div>
                            <input type="file" name="firma" id="firma" class="d-none">
                        </div>
                        <div>
                            <input type="text" name="guia" id="guia" value="{{$envio->guia}}" class="d-none">
                        </div>
                    </div>
                </form>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <button id="btnLimpiar" onclick="limpiarCanvas()" class="btn btn-warning">Limpiar</button>
                        </div>
                        <div class="col">
                            <button id="btnDescargar" class="btn btn-success" onclick="guardarFirma()">Aceptar</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">

const $canvas = document.querySelector("#canvas");
const $btnGenerarDocumento = document.querySelector("#btnGenerarDocumento");

const contexto = $canvas.getContext("2d");
const COLOR = "black";
const GROSOR = 2;
let xAnterior = 0, yAnterior = 0, xActual = 0, yActual = 0;
const obtenerXReal = (clientX) => clientX - $canvas.getBoundingClientRect().left;
const obtenerYReal = (clientY) => clientY - $canvas.getBoundingClientRect().top;

let haComenzadoDibujo = false; // Bandera que indica si el usuario está presionando el botón del mouse sin soltarlo
    // Lo demás tiene que ver con pintar sobre el canvas en los eventos del mouse
    $canvas.addEventListener("mousedown", evento => {
    // En este evento solo se ha iniciado el clic, así que dibujamos un punto
    xAnterior = xActual;
    yAnterior = yActual;
    xActual = obtenerXReal(evento.clientX);
    yActual = obtenerYReal(evento.clientY);
    contexto.beginPath();
    contexto.fillStyle = COLOR;
    contexto.fillRect(xActual, yActual, GROSOR, GROSOR);
    contexto.closePath();
    // Y establecemos la bandera
    haComenzadoDibujo = true;
});

$canvas.addEventListener("mousemove", (evento) => {
    if (!haComenzadoDibujo) {
        return;
    }
    // El mouse se está moviendo y el usuario está presionando el botón, así que dibujamos todo

    xAnterior = xActual;
    yAnterior = yActual;
    xActual = obtenerXReal(evento.clientX);
    yActual = obtenerYReal(evento.clientY);
    contexto.beginPath();
    contexto.moveTo(xAnterior, yAnterior);
    contexto.lineTo(xActual, yActual);
    contexto.strokeStyle = COLOR;
    contexto.lineWidth = GROSOR;
    contexto.stroke();
    contexto.closePath();
});

["mouseup", "mouseout"].forEach(nombreDeEvento => {
    $canvas.addEventListener(nombreDeEvento, () => {
        haComenzadoDibujo = false;
    });
});



function limpiarCanvas() {
    // Colocar color blanco en fondo de canvas
    contexto.fillStyle = "white";
    contexto.fillRect(0, 0, $canvas.width, $canvas.height);
};

function guardarFirma(){
    var descargar = document.getElementById('btnDescargar');
    var limpiar = document.getElementById('btnLimpiar');

    console.log($canvas.toDataURL());

    var image = $canvas.toDataURL();  // here is the most important part because if you dont replace you will get a DOM 18 exception.

    blob=(dataURItoBlob(image));
    //Use the Blob to create a File Object
    file=new File([blob],"img.png",{type:"image/png",lastModified:new Date().getTime()});
    //Putting the File object inside an array because my input is multiple
    array_images=[file]; //You can add more File objects if your input is multiple too
    //Modify the input content to be submited
    input_images=document.querySelector("input#firma")
    input_images.files=new FileListItems(array_images);

    document.getElementById("procesarEnvio").submit();

    // descargar.remove();
    // limpiar.remove();

}

 //Function that converts a data64 png image to a Blob object
 function dataURItoBlob(dataURI){
        var binary=atob(dataURI.split(',')[1]);
        var array=[];
        for(i=0;i<binary.length;i++){
            array.push(binary.charCodeAt(i));
        }
        return new Blob([new Uint8Array(array)],{type:'image/png'});
    }

    //Function that inserts an array of File objects inside a input type file, because HTMLInputElement.files cannot be setted directly
    function FileListItems(file_objects){
        new_input=new ClipboardEvent("").clipboardData||new DataTransfer()
        for(i=0,size=file_objects.length;i<size;++i){
            new_input.items.add(file_objects[i]);
        }
        return new_input.files;
    }             


</script>
@endsection
