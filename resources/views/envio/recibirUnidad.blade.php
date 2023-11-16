@extends('layouts.config')

@section('content')
<!-- Page-header start -->
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    
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
                    <h1 class="display-4">Recibo de paquetes en sucursal {{ Auth::user()->sucursal}}</h1>
                    <hr>
                    @if ($errors->any())
                        <div class="alert alert-dismissible alert-danger background-danger">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>{{$errors->first()}}</strong>
                        </div>
                    @endif
                        <div class="card-block">
                            <div class="table-responsive">
                                <table id="issue-list-table"
                                    class="table dt-responsive width-100" style="width: 100%;">
                                    <thead class="text-start">
                                        <tr>
                                            <th>Envio</th>
                                            <th>Guia</th>
                                            <th>Paquetes</th>
                                            <th>Direccion destino</th>
                                            <th>Total</th>
                                            <th>Recibir</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-start">
                                        @forelse ($envios as $envio)
                                            <tr>
                                                <td class="pro-list-img">{{$envio->id}}</td>
                                                <td class="pro-list-img">{{$envio->guia}}</td>
                                                <td class="pro-list-img">{{$envio->cantidad}}</td>
                                                <td class="pro-list-img">{{$envio->direccion_destino}}</td>
                                                <td class="pro-list-img">{{$envio->total}}</td>
                                                <td><div class="checkbox-fade fade-in-primary">
                                                    <label class="form-label">
                                                        <input type="checkbox" name="check{{$envio->id}}" value="{{$envio->id}}" onclick="actualizarCheckBox(this)">
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span>Recibir</span>
                                                    </label>
                                                </div></td>
                                            </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No hay ningun envio pendiente</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- end of table -->
                        </div>
                        
                        <form action="{{route('recibirUnidad')}}" method="POST"  enctype="multipart/form-data" id="recibirUnidad">
                            @csrf
                            @forelse ($envios as $envio)
                                <div class="checkbox-fade fade-in-primary">
                                    <label class="form-label d-none">
                                        <input type="checkbox" name="envios[]" id="envio{{$envio->id}}" value="{{$envio->id}}">
                                        <span class="cr">
                                            <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                        </span>
                                        <span>{{$envio->id}}</span>
                                    </label>
                                </div>
                            @empty
                            
                            @endforelse
                            <td><div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="observaciones_recibo" form="recibirUnidad"></textarea>
                                <label for="floatingTextarea">Observaciones</label>
                              </div></td>

                            <div class="form-group col-lg-12">
                                <label for="evidencia">Evidencia recibo</label>
                                <input type="file" accept=".jpg,.jpeg,.png" name="evidencia[]" multiple id="evidencia" class="form-control form-txt-primary  bg-light shadow-sm @error('evidencia') is-invalid @else border-0  @enderror"
                                placeholder="Fotografias..."  required multiple
                                value="{{old('evidencia')}}"  
                                id="evidencia">
                                @error('evidencia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-lg-12" id="imagenes">
                            
                            </div>


                            <div class="col-sm-12 col-xl-12 m-b-30 ">
                                <div class="col-lg-12 col-md-12">
                                    <div class="">
                                        <div class="d-grid">
                                            <button class="btn btn-success">
                                                <i class="icofont icofont-check-circled"></i>
                                                Recibir unidad</button>
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
<script>
    function actualizarCheckBox(check){
        var id = check.value;
        var name = 'envio'+id;
        var checkBox= document.getElementById(name);
        if(check.checked == true){
            checkBox.checked = true;
        }
        else{           
            checkBox.checked = false;
        }        
        
    }
    
    document.getElementById('evidencia').addEventListener('change', function() {
        // creando elementos de imagenes


    var reader = new FileReader();

    reader.onload = function(e) {
        
        document.getElementById('imagenPrevia').src = e.target.result;
    }

    for (let index = 0; index < this.files.length; index++) {
            // var url = reader.readAsDataURL(this.files[index]);
            var url =URL.createObjectURL(this.files[index]);

            const element = this.files[index].name;
            console.log(element);
            var contenedor = document.getElementById('imagenes');
            const img = document.createElement("img");
            img.src = url;
            img.width = 200;
            img.alt = "Imagen adjunta";
            img.classList.add('img-fluid');
            contenedor.appendChild(img);
        }


        });
    
    
    
    </script>

@endsection
