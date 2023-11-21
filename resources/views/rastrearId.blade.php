@extends('layouts.rastreo')

@section('content')

        <div class="main" id="main">
            <!-- Main Section-->
            <div class="hero-section app-hero imgFondo">
            
                <div class="container ">
                    <div class="hero-content app-hero-content text-center">
                        <div class="row justify-content-md-center ">
                            <div class="col-md-10">
                                <h1 class="wow fadeInUp" data-wow-delay="0s">Paqueterias GOS </h1>
                                <p class="wow fadeInUp" data-wow-delay="0.2s">
                                    Tu paquete en nuestras manos seguras
                                </p>
                                <a class="btn btn-primary btn-action" data-wow-delay="0.2s" href="home/#contactanos">Cotiza tu envio</a>
                                <a class="btn btn-primary btn-action" data-wow-delay="0.2s" href="home/#contactanos">Contactanos</a>
                            </div>
                            <div class="col-md-12">
                                <div class="hero-image">
                                    <img class="img-fluid" src="/gospaqueterias/public/assets/images/app_hero_1.png" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- formulario para rastrear --}}
            <div class="services-section text-center" id="services">
                <!-- Services section (small) with icons -->
                <div class="container">
                    <div class="row  justify-content-md-center">
                        <div class="col-md-8">
                            <div class="services-content">
                                <h1 class="wow fadeInUp azulGOS" data-wow-delay="0.8s">Informacion de guia: {{$guia->guia}}</h1>
                                <br>
                                <!-- ticket and update start -->
                                <div class="col-xl-12 col-md-12">
                                    <div class="card latest-update-card">
                                        <div class="card-header">
                                            <h5>Actualizaciones de tu paquete</h5>
                                            
                                        </div>
                                        <div class="card-block">
                                            <div class="latest-update-box">
                                                @if ($guia->estado=="P"||$guia->estado=="C"||$guia->estado=="ER"||$guia->estado=="EE"||$guia->estado=="E")
                                                    <div class="row p-t-20 p-b-30">
                                                        <div class="col-auto text-end update-meta">
                                                            <i class="feather icon-play bg-info update-icon"></i>
                                                        </div>
                                                        <div class="col">
                                                            <h4>Paquete recibido en la paqueteria</h4>
                                                            <p class="text-muted m-b-0">{{$guia->fecha_recibo}}</p>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($guia->estado=="C"||$guia->estado=="ER"||$guia->estado=="EE"||$guia->estado=="E")
                                                    <div class="row p-b-30">
                                                        <div class="col-auto text-end update-meta">
                                                            <i class="feather icon-shopping-cart bg-simple-c-pink update-icon"></i>
                                                        </div>
                                                        <div class="col">
                                                            <h4>Paquete camino a sucursal</h4>
                                                            <p class="text-muted m-b-0">{{$guia->fecha_envio}}</p>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($guia->estado=="ER"||$guia->estado=="EE"||$guia->estado=="E")
                                                    <div class="row p-b-30">
                                                        <div class="col-auto text-end update-meta">
                                                            <i class="feather icon-briefcase bg-simple-c-yellow  update-icon"></i>
                                                        </div>
                                                        <div class="col">
                                                            <h4>Paquete recibido en sucursal</h4>
                                                            <p class="text-muted m-b-0">{{$guia->fecha_sucursal}}</p>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($guia->estado=="EE"||$guia->estado=="E")
                                                    <div class="row p-b-30">
                                                        <div class="col-auto text-end update-meta">
                                                            <i class="feather icon-eye bg-primary update-icon"></i>
                                                        </div>
                                                        <div class="col">
                                                            <h4>Paquete en proceso de Entrega</h4>
                                                            <p class="text-muted m-b-0">{{$guia->fecha_sucursal}}</p>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($guia->estado=="ER"||$guia->estado=="E")
                                                    <div class="row p-b-30">
                                                        <div class="col-auto text-end update-meta">
                                                            <i class="feather icon-eye bg-primary update-icon"></i>
                                                        </div>
                                                        <div class="col">
                                                            <h4>Paquete esperando recoleccion</h4>
                                                            <p class="text-muted m-b-0">{{$guia->fecha_sucursal}}</p>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($guia->estado=="E")
                                                    <div class="row p-b-30">
                                                        <div class="col-auto text-end update-meta">
                                                            <i class="feather icon-check bg-simple-c-green update-icon"></i>
                                                        </div>
                                                        <div class="col">
                                                            <h4>Paquete entregado</h4>
                                                            <p class="text-muted m-b-0">{{$guia->fecha_entrega}}</p>
                                                            <p>Firma de recibido</p>
                                                            <img src="{{$guia->firma_entrega}}" alt="img-Firma" srcset="" class="img-fluid">
                                                        </div>
                                                    </div>
                                                @endif
                                                
                                                
                                                
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ticket and update end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <!-- Scroll To Top -->
            <a id="back-top" class="back-to-top page-scroll" href="#main">
                <i class="ion-ios-arrow-thin-up"></i>
            </a>
            <!-- Scroll To Top Ends-->
        </div>
        
        @endsection