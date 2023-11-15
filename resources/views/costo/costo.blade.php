@extends('layouts.config')

@section('content')
<!-- Page-header start -->
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Editar costo</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->
{{$errors}}
<!-- Page body start -->
<div class="page-body">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                <form method="POST" action="{{ route('editarCosto.update',$costo) }}"  class="bg-white shadow rounded py-3 px-4">
                    @csrf @method('PATCH')
                    <h1 class="display-4">Editar Costo</h1>
                    <hr>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('nombre') is-invalid @else border-0  @enderror"
                        placeholder="Nombre...." required
                        value="{{ old('nombre',$costo->nombre) }}"
                        id="nombre"> 
                        @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('descripcion') is-invalid @else border-0  @enderror"
                        placeholder="descripcion...."  required
                        value="{{old('descripcion',$costo->descripcion)}}" 
                        id="descripcion">
                        @error('descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alto">Alto (cm)</label>
                        <input type="number" name="alto" placeholder="Alto del paquete" value="{{old('alto',$costo->alto)}}" required
                        class="form-control form-txt-primary bg-light shadow-sm @error('alto') is-invalid @else border-0  @enderror">
                        @error('alto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="largo">Largo (cm)</label>
                        <input type="number" name="largo" placeholder="largo del paquete" value="{{old('largo',$costo->largo)}}" required
                        class="form-control form-txt-primary bg-light shadow-sm @error('largo') is-invalid @else border-0  @enderror">
                        @error('largo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ancho">Ancho (cm)</label>
                        <input type="number" name="ancho" placeholder="ancho del paquete" value="{{old('ancho',$costo->ancho)}}" required
                        class="form-control form-txt-primary bg-light shadow-sm @error('ancho') is-invalid @else border-0  @enderror">
                        @error('ancho')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="peso">Peso (kg)</label>
                        <input type="number" name="peso" placeholder="peso del paquete" value="{{old('peso',$costo->peso)}}" required
                        class="form-control form-txt-primary bg-light shadow-sm @error('peso') is-invalid @else border-0  @enderror">
                        @error('peso')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="costo">Costo Pesos</label>
                        <input type="number" name="costo" placeholder="costo del paquete" value="{{old('costo',$costo->costo)}}" required
                        class="form-control form-txt-primary bg-light shadow-sm @error('costo') is-invalid @else border-0  @enderror">
                        @error('costo')
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
                                        Actualizar costo</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="{{ route('costo.destroy' , $costo)}}" method="POST"  class="bg-white shadow rounded py-3 px-4">
                    @csrf @method('DELETE')
                    <div class="col-sm-12 col-xl-12 m-b-30 ">
                        <div class="col-lg-12 col-md-12">
                            <div class="">
                                <div class="d-grid">
                                    <button class="btn btn-danger">
                                        <i class="icofont icofont-check-circled"></i>
                                        Borrar costo</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <hr>
            </div>
            <!-- Select2 end -->
            
        </div>
    </div>
</div>
<!-- Page body end -->
@endsection
