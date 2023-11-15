@extends('layouts.config')

@section('title')
Lista Sucursales
@endsection

@section('content')
<div class="inicioMargin hola">
    <div class="row justify-content-center">
        <!-- bug list card start -->
        <div class="card">
            <div class="card-header">
                <h1>Lista de Sucursales</h1>
                @if(session('status'))
                    <div class="alert alert-dismissible alert-success background-success">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Correcto!! </strong> {{ session('status')}}
                    </div>
                @endif
                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>
            </div>
            <div class="card-block">
                <div class="table-responsive">
                    <table id="issue-list-table"
                        class="table dt-responsive width-100" style="width: 100%;">
                        <thead class="text-start">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>Correo</th>
                                <th>Tipos_envio</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody class="text-start">
                            @forelse ($sucursales
                             as $item)
                                <tr>
                                    <td class="pro-list-img">
                                        {{$item->id}}
                                    </td>
                                    <td class="pro-name">{{$item->nombre}}</td>
                                    <td>{{$item->direccion}}</td>
                                    <td>{{$item->correo}}</td>
                                    <td>{{$item->tipos_envio}}</td>
                                    <td><a href="{{ route('sucursal', $item) }}"><i class="icofont icofont-pencil-alt-5 fs-5"></a></td>
                                </tr>
                            @empty
                            <tr>
                                No hay sucursales para mostrar
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- end of table -->
            </div>
        </div>
        <!-- bug list card end -->
        
         
    </div>
</div>
@endsection
