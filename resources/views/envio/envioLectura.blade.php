@extends('layouts.config')

@section('content')
<!-- Page body start -->
<div class="page-body">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-12 mx-auto">
                    <h1 class="display-4">Visualiza Guia: {{$envio->guia}} <a class="btn btn-success" href="{{$envio->pdf}}" target="blank">
                        <i class="icofont icofont-file-pdf fs-5"></i>
                    </a></h1>
                    <div class="container text-center col-auto">
                        <table class="table table-responsive fs-4">
                            <thead class="bg-primary">
                                <th>Fecha recibo</th>
                                <th>Fecha envio</th>
                                <th>Fecha sucursal</th>
                                <th>Fecha entrega</th>
                                <th>Id transporte</th>
                            </thead>
                            <tbody >
                                <td class="border">{{$envio->fecha_recibo}}</td>
                                <td class="border">{{$envio->fecha_envio}}</td>
                                <td class="border">{{$envio->fecha_sucursal}}</td>
                                <td class="border">{{$envio->fecha_entrega}}</td>
                                <td class="border">{{$envio->id_transporte}}</td>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    @if ($envio->estado=="E")
                        <div class="container row justify-content-center">
                            <div class="container col-auto">
                                <table class="table table-responsive fs-4 text-center">
                                    <thead class="bg-primary">
                                        <th>INE Origen</th>
                                        <th>Firma Origen</th>
                                        <th>INE Destino</th>
                                        <th>Firma Destino</th>
                                    </thead>
                                    <tbody >
                                        <td class="border"><img src="{{$envio->ine}}" alt="" srcset="" class="img-fluid"></td>
                                        <td class="border"><img src="{{$envio->firma}}" alt="" srcset="" class="img-fluid"></td>
                                        <td class="border"><img src="{{$envio->ine_entrega}}" alt="" srcset="" class="img-fluid"></td>
                                        <td class="border"><img src="{{$envio->firma_entrega}}" alt="" srcset="" class="img-fluid"></td>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="container-fluid text-center">
                                <div class="container bg-primary">
                                    <h2>Evidencia de recibo en sucursal</h2>
                                </div>
                                @foreach (explode(";",$envio->evidencia_recibo) as $item)
                                    <img src="{{$item}}" alt="" srcset="" class="img-fluid">
                                @endforeach
                                <h3>{{$envio->observaciones_recibo}}</h3>
                            </div>
                        </div>
                    <br>
                    @endif
                    
                    
                    <div class="row bg-white shadow rounded py-3 px-4
                    bg-white shadow rounded py-3 px-4">
                        <div class="form-group col-lg-6">
                            <label for="remitente">Remitente</label>
                            <input type="text" name="remitente" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('remitente') is-invalid @else border-0  @enderror"
                            placeholder="remitente...." readonly
                            value="{{ old('remitente',$envio->nombre_remitente) }}"
                            id="remitente"> 
                            @error('remitente')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group col-lg-6">
                            <label for="destinatario">Destinatario</label>
                            <input type="text" name="destinatario" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('destinatario') is-invalid @else border-0  @enderror"
                            placeholder="destinatario...." readonly
                            value="{{ old('destinatario',$envio->nombre_destino) }}"
                            id="destinatario"> 
                            @error('destinatario')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-9">
                            <label for="direccion_destino">Direccion destino</label>
                            <input type="text" name="direccion_destino" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('direccion_destino') is-invalid @else border-0  @enderror"
                            placeholder="direccion_destino...." readonly
                            value="{{ old('direccion_destino',$envio->direccion_destino) }}"
                            id="direccion_destino"> 
                            @error('direccion_destino')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="estado">Estado</label>
                            <input type="text" name="estado" id="" class="form-control form-txt-primary  bg-light shadow-sm @error('estado') is-invalid @else border-0  @enderror"
                            placeholder="estado...." readonly
                            @switch($envio->estado)
                                @case('R')
                                    value="En proceso"
                                    @break
                                @case('P')
                                value="En espera de envio"
                                    @break
                                @case('C')
                                    value="Paquete en camino a sucursal"
                                    @break
                                @case('E')
                                    value="Entregado"
                                    @break
                                @case('ER')
                                    value="Espera Recoleccion"
                                    @break
                                @default
                                    value="Enviado"
                            @endswitch


                            

                            id="estado"> 
                            @error('estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="card-block">
                            <div class="table-responsive">
                                <table id="issue-list-table"
                                    class="table dt-responsive width-100" style="width: 100%;">
                                    <thead class="text-start">
                                        <tr>
                                            <th>Paquete</th>
                                            <th>Tipo</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Evidencia</th>
                                            <th>Etiquetas</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-start">
                                        @forelse ($paquetes as $paquete)
                                            <tr>
                                                <td class="pro-list-img">{{$paquete->id}}</td>
                                                <td class="pro-list-img">{{$costos[($paquete->tipo)-1]->nombre}}</td>
                                                <td class="pro-list-img">{{$paquete->cantidad}}</td>
                                                <td class="pro-list-img">{{$paquete->costo}}</td>
                                                <td>
                                                    @forelse (explode(';',$paquete->evidencia) as $imagen)
                                                        <img src="{{$imagen}}" alt="imagen">
                                                    @empty
                                                        No hay evidencias
                                                    @endforelse
                                                </td>
                                                <td>
                                                    <a class="btn btn-success" href="{{$paquete->etiqueta}}" target="blank">
                                                        <i class="icofont icofont-printer fs-5"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Por favor Agregue paquetes</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- end of table -->
                        </div>
                        
                        

                        

                    </div>

                <hr>
            </div>
            <!-- Select2 end -->
            
        </div>
    </div>
</div>
<!-- Page body end -->
@endsection
