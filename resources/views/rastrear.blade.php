@extends('layouts.app')

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
                                <h1 class="wow fadeInUp azulGOS" data-wow-delay="0.8s">Proporcionanos tu numero de guia</h1>
                                @if(session('status'))
                                    <div class="alert alert-dismissible alert-danger background-danger">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <strong>Error!! </strong> {{ session('status')}}
                                    </div>
                                @endif
                                <br>
                                <form action="{{route('rastrear')}}" method="post" class="wow fadeInUp" data-wow-delay="1s">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="guia" name="guia" placeholder="12345678910" autofocus="autofocus" >
                                        <label for="guia">Numero de guia</label>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary btn-action btn-fill">Rastrear</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Section -->
            <div class="footer">
                <div class="container">
                    <div class="col-md-12 text-center">
                        <img src="/public/assets/images/GOSresizeBG.png" alt="Adminty Logo" />
                        <ul class="footer-menu">
                            <li><a href="http://demo.com">Site</a></li>
                            <li><a href="#">Soporte</a></li>
                            <li><a href="#">Terminos</a></li>
                            <li><a href="#">Privacidad</a></li>
                        </ul>
                        <div class="footer-text">
                            <p>
                                Copyright © 2023 GOS paqueteria.
                            </p>
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