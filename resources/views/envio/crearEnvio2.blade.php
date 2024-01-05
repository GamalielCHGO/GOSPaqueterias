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
                                        <div class="row">
                                            <div class="col-md-12">
                                                 <canvas id="sig-canvas" class="border">
                                                     Get a better browser, bro.
                                                 </canvas>
                                             </div>
                                        </div>
                                        <div>
                                            <input type="file" name="firma" id="firma" class="d-non">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <textarea id="sig-dataUrl" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
                                            </div>
                                        </div>
                                    </div>
                                <div class="container text-center">
                                    <div class="row">
                                        <div class="col">
                                            <button id="sig-clearBtn" class="btn btn-warning">Limpiar</button>
                                        </div>
                                        <div class="col">
                                            <button class="btn btn-success" id="sig-submitBtn">Aceptar</button>
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
            </div>
            <!-- Select2 end -->
            
        </div>
    </div>
</div>

<script type="text/javascript">

(function() {
  window.requestAnimFrame = (function(callback) {
    return window.requestAnimationFrame ||
      window.webkitRequestAnimationFrame ||
      window.mozRequestAnimationFrame ||
      window.oRequestAnimationFrame ||
      window.msRequestAnimaitonFrame ||
      function(callback) {
        window.setTimeout(callback, 1000 / 60);
      };
  })();

  var canvas = document.getElementById("sig-canvas");
  var ctx = canvas.getContext("2d");
  ctx.strokeStyle = "#222222";
  ctx.lineWidth = 4;

  var drawing = false;
  var mousePos = {
    x: 0,
    y: 0
  };
  var lastPos = mousePos;

  canvas.addEventListener("mousedown", function(e) {
    drawing = true;
    lastPos = getMousePos(canvas, e);
  }, false);

  canvas.addEventListener("mouseup", function(e) {
    drawing = false;
  }, false);

  canvas.addEventListener("mousemove", function(e) {
    mousePos = getMousePos(canvas, e);
  }, false);

  // Add touch event support for mobile
  canvas.addEventListener("touchstart", function(e) {

  }, false);

  canvas.addEventListener("touchmove", function(e) {
    var touch = e.touches[0];
    var me = new MouseEvent("mousemove", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas.dispatchEvent(me);
  }, false);

  canvas.addEventListener("touchstart", function(e) {
    mousePos = getTouchPos(canvas, e);
    var touch = e.touches[0];
    var me = new MouseEvent("mousedown", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas.dispatchEvent(me);
  }, false);

  canvas.addEventListener("touchend", function(e) {
    var me = new MouseEvent("mouseup", {});
    canvas.dispatchEvent(me);
  }, false);

  function getMousePos(canvasDom, mouseEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: mouseEvent.clientX - rect.left,
      y: mouseEvent.clientY - rect.top
    }
  }

  function getTouchPos(canvasDom, touchEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: touchEvent.touches[0].clientX - rect.left,
      y: touchEvent.touches[0].clientY - rect.top
    }
  }

  function renderCanvas() {
    if (drawing) {
      ctx.moveTo(lastPos.x, lastPos.y);
      ctx.lineTo(mousePos.x, mousePos.y);
      ctx.stroke();
      lastPos = mousePos;
    }
  }

  // Prevent scrolling when touching the canvas
  document.body.addEventListener("touchstart", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchend", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchmove", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);

  (function drawLoop() {
    requestAnimFrame(drawLoop);
    renderCanvas();
  })();

  function clearCanvas() {
    canvas.width = canvas.width;
  }

  // Set up the UI
  var clearBtn = document.getElementById("sig-clearBtn");
  var submitBtn = document.getElementById("sig-submitBtn");
  clearBtn.addEventListener("click", function(e) {
    clearCanvas();
    sigText.innerHTML = "Data URL for your signature will go here!";
    sigImage.setAttribute("src", "");
  }, false);
  submitBtn.addEventListener("click", function(e) {

    var image = canvas.toDataURL();  // here is the most important part because if you dont replace you will get a DOM 18 exception.

    blob=(dataURItoBlob(image));
    //Use the Blob to create a File Object
    file=new File([blob],"img.png",{type:"image/png",lastModified:new Date().getTime()});
    //Putting the File object inside an array because my input is multiple
    array_images=[file]; //You can add more File objects if your input is multiple too
    //Modify the input content to be submited
    input_images=document.querySelector("input#firma")
    input_images.files=new FileListItems(array_images);

    document.getElementById("procesarEnvio").submit();

  }, false);

})();
    
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
