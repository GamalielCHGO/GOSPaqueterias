@extends('layouts.config')

@section('title')
{{$titulo}}
@endsection

@section('content')
<div class="inicioMargin hola">
    <div class="row justify-content-center">
        <!-- bug list card start -->
        <div class="card">
            <div class="card-header">
                <h1>{{$titulo}}</h1>
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
                                <th>Guia</th>
                                <th>Remitente</th>
                                <th>Destinatario</th>
                                <th>Fecha </th>
                                <th>Destino</th>
                                <th>Total</th>
                                <th>Cantidad</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-start">
                            @forelse ($envios as $item)
                                <tr>
                                    <td class="pro-list-img">
                                        {{$item->id}}
                                    </td>
                                    <td>{{$item->guia}}</td>
                                    <td class="pro-name">{{$item->nombre_remitente}}</td>
                                    <td>{{$item->nombre_destino}}</td>
                                    <td>{{$item->fecha_recibo}}</td>
                                    <td>{{$item->direccion_destino}}</td>
                                    <td>{{$item->total}}</td>
                                    <td>{{$item->cantidad}}</td>
                                    @switch($item->estado)
                                        @case('R')
                                            <td>En proceso</td>
                                            <td>Procesar<a href="{{ route('envio', $item) }}"><i class="icofont icofont-pencil-alt-5 fs-5"></a></td>
                                            @break
                                        @case('P')
                                            <td>En espera de envio</td>
                                            <td>Ver <a href="{{ route('envioLectura', $item) }}"><i class="icofont icofont-eye fs-5 text-success"></a></td>
                                            @break
                                        @case('C')
                                            <td>Paquete en camino a sucursal</td>
                                            <td>Ver <a href="{{ route('envioLectura', $item) }}"><i class="icofont icofont-eye fs-5 text-success"></a></td>
                                            @break
                                        @case('E')
                                            <td>Entregado</td>
                                            <td>Ver <a href="{{ route('envioLectura', $item) }}"><i class="icofont icofont-eye fs-5 text-success"></a></td>
                                            @break
                                        @case('ER')
                                            <td>Espera Recoleccion</td>
                                            <td>Ver <a href="{{ route('entrega', $item) }}"><i class="icofont icofont-eye fs-5 text-success"></a></td>
                                            @break
                                        @case('EE')
                                            <td>Espera Entrega</td>
                                            <td>Entregar <a href="{{ route('entrega', $item) }}"><i class="icofont icofont-eye fs-5 text-success"></a></td>
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

