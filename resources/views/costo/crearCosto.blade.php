@extends('layouts.config')

@section('title')
    Creacion de costos
@endsection

@section('content')
<!-- Page-header start -->
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Nuevo costo</h4>
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
                <form action=" {{ route('crearCosto.store') }}" method="post" class="bg-white shadow rounded py-3 px-4">
                    @csrf
                    <h1 class="display-4">Nuevo costo de paquete</h1>
                    <hr>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control form-txt-primary  bg-light shadow-sm @error('nombre') is-invalid @else border-0  @enderror"
                        placeholder="Nombre...." required
                        value="{{old('nombre')}}"  
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
                        placeholder="Descripcion de el producto"  required
                        value="{{old('descripcion')}}"  
                        id="descripcion">
                        @error('descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="peso">Peso</label>
                        <input type="number" name="peso" placeholder="Peso del producto en Kg" value="{{old('peso')}}" required
                        class="form-control form-txt-primary bg-light shadow-sm @error('peso') is-invalid @else border-0  @enderror">
                        @error('peso')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="largo">Largo</label>
                        <input type="number" name="largo" placeholder="Largo del producto en cm" value="{{old('largo')}}" required
                        class="form-control form-txt-primary bg-light shadow-sm @error('largo') is-invalid @else border-0  @enderror">
                        @error('largo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ancho">Ancho</label>
                        <input type="number" name="ancho" placeholder="Ancho del producto en cm" value="{{old('ancho')}}" required
                        class="form-control form-txt-primary bg-light shadow-sm @error('ancho') is-invalid @else border-0  @enderror">
                        @error('ancho')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alto">Alto</label>
                        <input type="number" name="alto" placeholder="Alto del producto en cm" value="{{old('alto')}}" required
                        class="form-control form-txt-primary bg-light shadow-sm @error('alto') is-invalid @else border-0  @enderror">
                        @error('alto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="costo">Costo</label>
                        <input type="number" name="costo" placeholder="Costo del producto en pesos" value="{{old('costo')}}" required
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
                                        Generar Costo</button>
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
<!-- Page body end -->
@endsection
