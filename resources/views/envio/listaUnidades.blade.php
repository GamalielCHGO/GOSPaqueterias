@extends('layouts.config')

@section('title')
Lista Envios
@endsection

@section('content')
<div class="inicioMargin hola">
    <div class="row justify-content-center">
        <!-- bug list card start -->
        <div class="card">
            <div class="card-header">
                <h1>Lista de Unidades</h1>
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
                                <th>Fecha </th>
                                <th>Envios</th>
                                <th>Total</th>
                                <th>Paquetes</th>
                                <th>Origen</th>
                                <th>Destino</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-start">
                            @forelse ($unidades as $item)
                                <tr>
                                    <td class="pro-list-img">
                                        {{$item->id_transporte}}
                                    </td>
                                    <td>{{$item->fecha_envio}}</td>
                                    <td class="pro-name">{{$item->envios}}</td>
                                    <td>{{$item->total}}</td>
                                    <td>{{$item->paquetes}}</td>
                                    <td>{{$item->sucursal_origen}}</td>
                                    <td>{{$item->sucursal_destino}}</td>
                                    <td>
                                        <form action="{{ route('listaEnviosUnidad') }}" method="get">
                                            <input type="text" name="id_transporte" id="id_transporte" value="{{$item->id_transporte}}" class="d-none">
                                            <button class="btn text-success" type="submit" >Ver <i class="icofont icofont-pencil-alt-5 fs-5 "></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                No hay costos para mostrar
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

