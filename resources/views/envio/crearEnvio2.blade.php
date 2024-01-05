@extends('layouts.config')

@section('title')
    Crear envio
@endsection

@section('content')
<!-- Page-header start -->
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Nuevo envio</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->
<!-- Page body start -->
<div class="page-body">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-12 mx-auto">
                <form action=" {{ route('crearEnvio.store') }}" method="post" class="bg-white shadow rounded py-3 px-4">
                    @csrf
                    <h1 class="display-4">Creacion de envio</h1>
                    <div class="row">
                        <hr>
                        <h3 class="text-center">Remitente</h3>
                        <hr>
                       
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-block">
                                    
                                </div>
                                    <div class="container text-center">
                                        <div>
                                            <canvas id="canvas" class="border"></canvas>
                                        </div>
                                        <div>
                                            <input type="file" name="firma" id="firma" class="d-none">
                                        </div>
                                    </div>
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
                        
                        

                          
                        <div class="col-sm-12 col-xl-12 m-b-30 ">
                            <div class="col-lg-12 col-md-12">
                                <div class="">
                                    <div class="d-grid">
                                        <button class="btn btn-success">
                                            <i class="icofont icofont-check-circled"></i>
                                            Generar Envio</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
            <!-- Select2 end -->
            
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
<!-- Page body end -->
@endsection
