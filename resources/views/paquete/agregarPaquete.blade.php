@extends('layouts.config')

@section('title')
    Agregar Paquete
@endsection

@section('content')
<!-- Page-header start -->
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Agregar paquete</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->
{{-- {{$errors}}

{{$paquetes}} --}}
<!-- Page body start -->
<div class="page-body">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-12 mx-auto">
                <form action=" {{ route('agregarPaquete.store') }}" method="post" class="bg-white shadow rounded py-3 px-4" enctype="multipart/form-data">
                    @csrf
                    <h3 class="display-4">Agregue paquetes al envio {{$guia->guia}}</h3>
                    <div class="row">

                        <div class="form-group col-lg-12">
                            <label for="tipo">Tipo de paquete</label>
                            <select name="tipo" id="" required
                            class="form-control form-txt-primary bg-light shadow-sm @error('tipo') is-invalid @else border-0  @enderror" onchange="obtenerDatos(this)">
                            @error('tipo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                                <option value="">Seleccione un tipo de paquete</option>    
                                @forelse ($paquetes as $item)
                                    <option value="{{$item->id}}">{{$item->nombre}}</option>    
                                @empty
                                    <option value="">No existen sucursales</option>    
                                @endforelse
                            </select>
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="alto">Alto</label>
                            <input type="text" name="alto" id="alto" class="form-control form-txt-primary  bg-light shadow-sm @error('alto') is-invalid @else border-0  @enderror"
                            placeholder="Alto paquete...." required
                            value="{{old('alto')}}"  
                            id="alto">
                            @error('alto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="largo">Largo</label>
                            <input type="number" name="largo" class="form-control form-txt-primary  bg-light shadow-sm @error('largo') is-invalid @else border-0  @enderror"
                            placeholder="largo paquete..."  required
                            value="{{old('largo')}}"  
                            id="largo">
                            @error('largo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="ancho">Ancho</label>
                            <input type="number" name="ancho" id="ancho" class="form-control form-txt-primary  bg-light shadow-sm @error('ancho') is-invalid @else border-0  @enderror"
                            placeholder="Ancho paquete...." required
                            value="{{old('ancho')}}"  
                            id="ancho">
                            @error('ancho')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="peso">Peso</label>
                            <input type="number" name="peso" class="form-control form-txt-primary  bg-light shadow-sm @error('peso') is-invalid @else border-0  @enderror"
                            placeholder="Peso..."  required
                            value="{{old('peso')}}"  
                            id="peso">
                            @error('peso')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="costo">Precio (Pesos)</label>
                            <input type="number" name="costo" id="costo" class="form-control form-txt-primary  bg-light shadow-sm @error('costo') is-invalid @else border-0  @enderror"
                            placeholder="costo del paquete...." required
                            value="{{old('costo')}}"  
                            id="costo">
                            @error('costo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="contenido">Contenido</label>
                            <input type="text" name="contenido" id="contenido" class="form-control form-txt-primary  bg-light shadow-sm @error('contenido') is-invalid @else border-0  @enderror"
                            placeholder="contenido del paquete (ropa,metales,bisuteria,etc)" required
                            value="{{old('contenido')}}"  
                            id="contenido">
                            @error('contenido')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group col-lg-6">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" name="cantidad" id="cantidad" class="form-control form-txt-primary  bg-light shadow-sm @error('cantidad') is-invalid @else border-0  @enderror"
                            placeholder="Cantidad de paquetes..." required
                            value="{{old('cantidad')}}"  
                            id="cantidad">
                            @error('cantidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="evidencia">Evidencia</label>
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

                        <div class="form-group col-lg-6 d-none" >
                            <label for="guia">Guia</label>
                            <input type="text" name="guia" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('guia') is-invalid @else border-0  @enderror"
                            placeholder="guia...." readonly
                            value="{{ old('guia',$guia->guia) }}"
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
                                            Guardar paquete</button>
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

<script>
    @forelse ($paquetes as $item)
        value="{{$item->id}}">
    @empty
        value="">No existen sucursales
    @endforelse
</script>

{{-- Code in your template file, e.g., view.blade.php --}}

<script type="text/javascript">
    // Put all locations into array
    var opciones= new Object();
    var cont=0;
    @foreach ($paquetes as $paquete)
        cont++;
        var obj = new Object();
        obj.largo = "{{ $paquete->largo }}";
        obj.ancho = "{{ $paquete->ancho }}";
        obj.alto = "{{ $paquete->alto }}";
        obj.peso = "{{ $paquete->peso }}";
        obj.costo = "{{ $paquete->costo }}";
        opciones[cont]=obj;
    @endforeach
    // var vector= JSON.stringify(opciones);
    

    function obtenerDatos($objeto){
        
        var alto = opciones[$objeto.value]['alto'];
        var largo = opciones[$objeto.value]['largo'];
        var ancho = opciones[$objeto.value]['ancho'];
        var peso = opciones[$objeto.value]['peso'];
        var costo = opciones[$objeto.value]['costo'];
        
        var altoForm = document.getElementById('alto');
        var largoForm = document.getElementById('largo');
        var anchoForm = document.getElementById('ancho');
        var pesoForm = document.getElementById('peso');
        var costoForm = document.getElementById('costo');

        altoForm.value=alto;
        largoForm.value=largo;
        anchoForm.value=ancho;
        pesoForm.value=peso;
        costoForm.value=costo;
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
            img.alt = "Imagen adjunta";
            img.classList.add('img-fluid');
            contenedor.appendChild(img);
        }


        });
    
    
    
    </script>
    
<!-- Page body end -->
@endsection
