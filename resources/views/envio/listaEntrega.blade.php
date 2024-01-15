@extends('layouts.config')

@section('title')
{{$titulo}}
@endsection

@section('content')
<?php
$dateI=date('m/d/Y');
$dateF=date('m/d/Y');
?>
<div class="inicioMargin hola">
    <div class="row justify-content-center">
        <!-- bug list card start -->
        <div class="card">
            <div class="card-header">
                <div class="col">
                        <form action="{{route('exportarExcel')}}" method="post" target="_blank">
                            @csrf
                            <h1>{{$titulo}}</h1>
                            <input type="text" value="{{$envios}}" name="envios" id="envios" class="d-none">
                            <button type="submit" class="btn btn-success" data-bs-toggle="tooltip" title="Crear Excel"><i class="fa fa-file" aria-hidden="true"></i> Exportar</button>
                        </form>
                </div>
                <br>
                @if(session('status'))
                    <div class="alert alert-dismissible alert-success background-success">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Correcto!! </strong> {{ session('status')}}
                    </div>
                @endif
                <div class="card-header-right">
                    <i class="icofont icofont-spinner-alt-5"></i>
                </div>
                <div>
                    <form action="{{route('listaEntrega')}}" method="post">
                        @csrf
                        <p>Filtrar envios por fecha</p>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="daterange" class="form-control"
                                    value="{{$dateI}} - {{$dateF}}"/>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-success" data-bs-toggle="tooltip" title="Actualizar cantidad">Buscar <i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-block">
                <div class="table-responsive">
                    <table id="issue-list-tabl"
                        class="table dt-responsive width-100 table-striped" style="width: 100%;">
                        <thead class="text-start">
                            <tr>
                                <th>Guia</th>
                                <th>Destinatario</th>
                                <th>Fecha </th>
                                <th>Destino</th>
                                <th>Total</th>
                                <th>Cantidad</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody class="text-start">
                            @forelse ($envios as $item)
                                <tr>
                                    <td>{{$item->guia}}</td>
                                    <td>{{$item->nombre_destino}}</td>
                                    <td>{{$item->fecha_recibo}}</td>
                                    <td>{{$item->direccion_destino}}</td>
                                    <td>{{$item->total}}</td>
                                    <td>{{$item->cantidad}}</td>
                                    @switch($item->estado)
                                        @case('R')
                                            <td>En proceso</td>
                                            @break
                                        @case('P')
                                            <td>En espera de envio</td>
                                            @break
                                        @case('C')
                                            <td>Paquete en camino a sucursal</td>
                                            @break
                                        @case('E')
                                            <td>Entregado</td>
                                            @break
                                        @case('ER')
                                            <td>Espera Recoleccion</td>
                                            @break
                                        @case('EE')
                                            <td>Espera Entrega</td>
                                            @break
                                        @default
                                            <td>Enviado</td>
                                    @endswitch
                                </tr>
                            @empty
                            <tr>
                                No hay guias para mostrar
                            </tr>
                            @endforelse
                            <tr class="table-secondary">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="fw-bolder">Totales</td>
                                <td class="fw-bolder">{{$sumaPaquetes}}</td>
                                <td class="fw-bolder">{{$totalPaquetes}}</td>
                                <td class="fw-bolder"></td>
                            </tr>
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

