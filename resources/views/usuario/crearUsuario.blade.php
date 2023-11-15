@extends('layouts.config')

@section('title')
    Creacion de usuario
@endsection

@section('content')
<!-- Page-header start -->
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Nuevo usuario</h4>
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
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                <form action=" {{ route('crearUsuario.store') }}" method="post" class="bg-white shadow rounded py-3 px-4">
                    @csrf
                    <h1 class="display-4">Nuevo Usuario</h1>
                    <hr>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('name') is-invalid @else border-0  @enderror"
                        placeholder="Nombre...." required
                        value="{{old('name')}}"  
                        id="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lastname">Apellido</label>
                        <input type="text" name="lastname" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('lastname') is-invalid @else border-0  @enderror"
                        placeholder="Apellido...."  required
                        value="{{old('lastname')}}"  
                        id="lastname">
                        @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="email" name="email" placeholder="Correo...@hotmail.com" value="{{old('email')}}" required
                        class="form-control form-txt-primary bg-light shadow-sm @error('email') is-invalid @else border-0  @enderror">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="role">Rol</label>
                        <select name="role" value="{{old('role')}}" required
                        class="form-control form-txt-primary bg-light shadow-sm @error('role') is-invalid @else border-0  @enderror">
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                        <option value="">...</option>
                        <option value="ADMIN" >Admin</option>
                        <option value="USER" >Usuario</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sucursal">Sucursal</label>
                        <select name="sucursal" class="js-example-basic-single col-sm-12">
                            <option value="NA">NA</option>
                            @forelse ($sucursales as $item)
                                <option value="{{$item->nombre}}">{{$item->nombre }}</option>
                            @empty
                                <option value="">No hay sucursales para agregar</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-sm-12 col-xl-12 m-b-30 ">
                        <div class="col-lg-12 col-md-12">
                            <div class="">
                                <div class="d-grid">
                                    <button class="btn btn-success">
                                        <i class="icofont icofont-check-circled"></i>
                                        Generar usuario</button>
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
