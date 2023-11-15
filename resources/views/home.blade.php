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
                                <a class="btn btn-primary btn-action" data-wow-delay="0.2s" href="#contactanos">Cotiza tu envio</a>
                                <a class="btn btn-primary btn-action" data-wow-delay="0.2s" href="#contactanos">Contactanos</a>
                            </div>
                            <div class="col-md-12">
                                <div class="hero-image">
                                    <img class="img-fluid" src="/public/assets/images/app_hero_1.png" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="services-section text-center" id="services">
                <!-- Services section (small) with icons -->
                <div class="container">
                    <div class="row  justify-content-md-center">
                        <div class="col-md-8">
                            <div class="services-content">
                                <h1 class="wow fadeInUp" data-wow-delay="0s">La velocidad es el futuro de los negocios</h1>
                                <p class="wow fadeInUp" data-wow-delay="0.2s">
                                    Rápida, segura, a nivel nacional: ¡GOSpaqueterias ofrece excelencia!
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="services">
                                <div class="row">
                                    <div class="col-sm-4 wow fadeInUp" data-wow-delay="0.2s">
                                        <div class="services-icon">
                                            <img src="/public/assets/logos/icon1.png" height="60" width="60" alt="Service" />
                                        </div>
                                        <div class="services-description">
                                            <h1>Logistica empresarial</h1>
                                            <p>
                                                No te preocupes por nada nosotros enviamos tu paquete a su destino con profesionalismo y seguridad
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 wow fadeInUp" data-wow-delay="0.3s">
                                        <div class="services-icon">
                                            <img class="icon-2" src="/public/assets/logos/icon2.png" height="60" width="60" alt="Service" />
                                        </div>
                                        <div class="services-description">
                                            <h1>Rapida y segura</h1>
                                            <p>
                                                Envios rapidos y seguros, deja tus paquetes en nuestras manos, nosotros nos encargamos, servicio express
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 wow fadeInUp" data-wow-delay="0.4s">
                                        <div class="services-icon">
                                            <img class="icon-3" src="/public/assets/logos/icon4.png" height="60" width="60" alt="Service" />
                                        </div>
                                        <div class="services-description">
                                            <h1>Servicio economico</h1>
                                            <p>
                                                Servicio economico para todo tipo de paquetes*, solicita una cotizacion y valida que somos tu mejor opcion
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-features" id="ubicaciones">
                <div class="container">
                    @forelse ($sucursales as $item)
                        <div class="flex-split">
                            <div class="f-left wow fadeInUp" data-wow-delay="0s">
                                <div class="left-content">
                                    {!!$item->link!!}
                                </div>
                            </div>
                            <div class="f-right wow fadeInUp" data-wow-delay="0.2s">
                                <div class="right-content">
                                    <h2>{{$item->nombre}}</h2>
                                    <p class="fs-2">
                                        {{$item->direccion}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        No hay ninguna sucursal
                    @endforelse

                    
                </div>
            </div>
            <div class="testimonial-section" id="reviews">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="testimonials owl-carousel owl-theme">
                                <div class=""><img class="img-circle" src="/public/assets/images/bulto.png" alt="Client Testimonoal" />
                                    <div class="testimonial-text wow fadeInUp" data-wow-delay="0.2s">
                                        <h3 class="fs-1">Mercancia entregada en tiempo</h3>
                                    </div>
                                </div>
                                <div class=""><img class="img-circle" src="/public/assets/images/bulto2.png" alt="Client Testimonoal" />
                                    <div class="testimonial-text">
                                        <h3 class="fs-1">Confianza y seguridad en cada uno de los envios</h3>
                                    </div>
                                </div>
                                <div class=""><img class="img-circle" src="/public/assets/images/bulto.png" alt="Client Testimonoal" />
                                    <div class="testimonial-text">
                                        <h3 class="fs-1">Recomendada por todos nuestros clientes</h3>
                                    </div>
                                </div>
                                <div class=""><img class="img-circle" src="/public/assets/images/bulto2.png" alt="Client Testimonoal" />
                                    <div class="testimonial-text">
                                        <h3 class="fs-1">Satisfaccion total en el envio y cuidado de sus productos</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Counter Section -->
            <div class="counter-section">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-6 col-md-3">
                            <div class="counter-up">
                                <div class="counter-icon">
                                    <i class="ion-ios-paper"></i>
                                </div>
                                <h3><span class="counter">500</span>+</h3>
                                <div class="counter-text">
                                    <h4>Entregas realizadas</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="counter-up">
                                <div class="counter-icon">
                                    <i class="ion-cube"></i>
                                </div>
                                <h3><span class="counter">10</span>+</h3>
                                <div class="counter-text">
                                    <h4>Empleados</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="counter-up">
                                <div class="counter-icon">
                                    <i class="ion-ios-people"></i>
                                </div>
                                <h3><span class="counter">50</span>+</h3>
                                <div class="counter-text">
                                    <h4>Clientes</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="counter-up">
                                <div class="counter-icon">
                                    <i class="ion-ios-paper"></i>
                                </div>
                                <h3><span class="counter">50</span>+</h3>
                                <div class="counter-text">
                                    <h4>Unidades de transporte</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Counter Section Ends -->
            
            <!-- Seccion de Precios -->
            <div class="pricing-section no-colo text-center" id="precios">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="pricing-intro">
                                <h1 class="wow fadeInUp" data-wow-delay="0s">Precios que van desde $80</h1>
                                <p class="wow fadeInUp" data-wow-delay="0.2s">
                                    Cotiza con nosotros tenemos envios que van desde articulos pequenos hasta bultos sin limite de peso
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="table-left wow fadeInUp" data-wow-delay="0.4s">
                                        <div class="icon">
                                            <img src="/public/assets/logos/cart2.png" alt="Icon" />
                                        </div>
                                        <div class="pricing-details">
                                            <h2>Paquete pequeno</h2>
                                            <span>$80</span>
                                            <p>
                                                paquetes que van desde sobres  <br class="hidden-xs"> totalmente sellados para tu comodidad
                                            </p>
                                            <ul>
                                                <li>Sobres tamano carta </li>
                                                <li>Informacion totalmente confidencial</li>
                                                <li>Sobre sellado</li>
                                            </ul>
                                            <button class="btn btn-primary btn-action btn-fill">Cotizar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="table-right wow fadeInUp" data-wow-delay="0.6s">
                                        <div class="icon">
                                            <img src="/public/assets/logos/cart1.png" alt="Icon" />
                                        </div>
                                        <div class="pricing-details">
                                            <h2>Bultos grandes</h2>
                                            <span>$300</span>
                                            <p>
                                                Bultos totalmente sellados <br class="hidden-xs"> sin limite de peso
                                            </p>
                                            <ul>
                                                <li>Seguridad en todo momento</li>
                                                <li>Manejados por expertos</li>
                                                <li>Sin limite de peso</li>
                                            </ul>
                                            <button class="btn btn-primary btn-action btn-fill">Cotizar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="services-section2 text-center" id="contactanos">
                <!-- Services section (small) with icons -->
                <div class="container">
                    <div class="row  justify-content-md-center">
                        <div class="col-md-8">
                            <div class="services-content">
                                <h1 class="wow fadeInUp fs-1 azulGOS" data-wow-delay="0s">Contactanos</h1>
                                <section id="contact">
                                    <div class="inner">
                                        <section>
                                            <form method="post" action="#">
                                                <div class="fields">
                                                    <div class="field half">
                                                        <label for="name">Nombre</label>
                                                        <input type="text" name="name" id="name" />
                                                    </div>
                                                    <div class="field half">
                                                        <label for="email">Correo</label>
                                                        <input type="text" name="email" id="email" />
                                                    </div>
                                                    <div class="field">
                                                        <label for="message">Mensaje</label>
                                                        <textarea name="message" id="message" rows="6"></textarea>
                                                    </div>
                                                </div>
                                                <ul class="actions">
                                                    <li><input type="submit" value="Enviar Mensaje" class="btn btn-primary btn-action btn-fill" /></li>
                                                    <li><input type="reset" value="Borrar" class="btn btn-action-danger" /></li>
                                                </ul>
                                            </form>
                                        </section>
                                        <section class="split">
                                            <section>
                                                <div class="contact-method">
                                                    <h3><i class="bi bi-envelope"></i> Correo</h3>
                                                    <a href="#">Administrador@paqueteriasGOS.com</a>
                                                </div>
                                            </section>
                                            <section>
                                                <div class="contact-method">
                                                    <h3><i class="bi bi-telephone-forward-fill"></i> Telefono</h3>
                                                    <span>Cel: +52-55-12-34-56-78</span><br>
                                                </div>
                                            </section>
                                            <section>
                                                <div class="contact-method">
                                                    <h3><i class="bi bi-geo-alt"></i> Direccion</h3>
                                                    <span>Av circunvalacion <br/>
                                                        entre calle mixcalco<br/>
                                                        calle san antonio tomatiano</span>
                                                </div>
                                            </section>
                                        </section>
                                    </div>
                                </section>
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
                            <li><a href="{{route('terminos')}}">Terminos</a></li>
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