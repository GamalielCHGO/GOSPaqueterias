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
{{$errors}}
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
                        <div class="form-group col-lg-6">
                            <label for="nombre_remitente">Nombre Remitente</label>
                            <input type="text" name="nombre_remitente" id="nombre_remitente" class="form-control form-txt-primary  bg-light shadow-sm @error('nombre_remitente') is-invalid @else border-0  @enderror"
                            placeholder="Nombre remitente...." required
                            value="{{old('Nombre remitente')}}"  
                            id="nombre_remitente">
                            @error('nombre_remitente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="telefono_remitente">Telefono Remitente</label>
                            <input type="text" name="telefono_remitente" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('telefono_remitente') is-invalid @else border-0  @enderror"
                            placeholder="Telefono remitente..."  required
                            value="{{old('telefono_remitente')}}"  
                            id="telefono_remitente">
                            @error('telefono_remitente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="direccion_remitente">Direccion Remitente</label>
                            <input type="text" name="direccion_remitente" id="direccion_remitente" class="form-control form-txt-primary  bg-light shadow-sm @error('direccion_remitente') is-invalid @else border-0  @enderror"
                            placeholder="Direccion remitente...." required
                            value="{{old('direccion_remitente')}}"  
                            id="direccion_remitente">
                            @error('direccion_remitente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="correo">Correo Remitente</label>
                            <input type="email" name="correo" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('correo') is-invalid @else border-0  @enderror"
                            placeholder="Correo..."  required
                            value="{{old('correo')}}"  
                            id="correo">
                            @error('correo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="rfc">RFC</label>
                            <input type="text" name="rfc" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('rfc') is-invalid @else border-0  @enderror"
                            placeholder="XXXXXXXXXX"  required
                            value="{{old('rfc')}}"  
                            id="rfc">
                            @error('rfc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <hr>
                        <h3 class="text-center">Destino</h3>
                        <hr>
                        <div class="form-group col-lg-6">
                            <label for="nombre_destino">Nombre Destino</label>
                            <input type="text" name="nombre_destino" id="nombre_destino" class="form-control form-txt-primary  bg-light shadow-sm @error('nombre_destino') is-invalid @else border-0  @enderror"
                            placeholder="Nombre destino...." required
                            value="{{old('nombre_destino')}}"  
                            id="nombre_destino">
                            @error('nombre_destino')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="telefono_destino">Telefono destino</label>
                            <input type="text" name="telefono_destino" id="telefono_destino" class="form-control form-txt-primary  bg-light shadow-sm @error('telefono_destino') is-invalid @else border-0  @enderror"
                            placeholder="Telefono destino..." required
                            value="{{old('telefono_destino')}}"  
                            id="telefono_destino">
                            @error('telefono_destino')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="direccion_destino">Direccion destino</label>
                            <input type="text" name="direccion_destino" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('direccion_destino') is-invalid @else border-0  @enderror"
                            placeholder="Direccion destino..."  required
                            value="{{old('direccion_destino')}}"  
                            id="direccion_destino">
                            @error('direccion_destino')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="sucursal_destino">Sucursal Destino</label>
                            <select name="sucursal_destino" id="" required
                            class="form-control form-txt-primary bg-light shadow-sm @error('role') is-invalid @else border-0  @enderror">
                            @error('sucursal_destino')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                                <option value="">Seleccione una sucursal</option>    
                                @forelse ($sucursales as $item)
                                    <option value="{{$item->nombre}}">{{$item->nombre}}</option>    
                                @empty
                                    <option value="">No existen sucursales</option>    
                                @endforelse
                            </select>
                        </div>

                        <div class="form-group col-lg-6 pt-4">
                            <div class="checkbox-fade fade-in-primary">
                                <label class="form-label">
                                    <input type="checkbox" name="ocurre" value="1">
                                    <span class="cr">
                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                    </span>
                                    <span class="fs-5">Ocurre?</span>
                                </label>
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
<!-- Page body end -->
@endsection
