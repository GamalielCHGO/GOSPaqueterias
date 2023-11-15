@extends('layouts.config')

@section('title')
    Creacion de sucursales
@endsection

@section('content')
<!-- Page-header start -->
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Nueva Sucursal</h4>
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
                <form action=" {{ route('crearSucursal.store') }}" method="post" class="bg-white shadow rounded py-3 px-4">
                    @csrf
                    <h1 class="display-4">Nueva Sucursal</h1>
                    <hr>
                    <div class="form-group">
                        <label for="name">Nombre</label>
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
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('direccion') is-invalid @else border-0  @enderror"
                        placeholder="Direccion de la sucursal"  required
                        value="{{old('direccion')}}"  
                        id="direccion">
                        @error('direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input type="email" name="correo" placeholder="Correo...@hotmail.com" value="{{old('correo')}}" required
                        class="form-control form-txt-primary bg-light shadow-sm @error('correo') is-invalid @else border-0  @enderror">
                        @error('correo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tipos_envio">Tipos de envio</label>
                        <select name="tipos_envio" value="{{old('tipos_envio')}}" required
                        class="form-control form-txt-primary bg-light shadow-sm @error('tipos_envio') is-invalid @else border-0  @enderror">
                        @error('tipos_envio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                        <option value="">...</option>
                        <option value="local" >Local</option>
                        <option value="ocurre" >Ocurre</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="link">Link maps</label>
                        <input type="text" name="link" placeholder="link a direccion en maps" value="{{old('link')}}" required
                        class="form-control form-txt-primary bg-light shadow-sm @error('link') is-invalid @else border-0  @enderror">
                        @error('link')
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
                                        Generar Sucursal</button>
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
