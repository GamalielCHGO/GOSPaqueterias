@extends('layouts.app')

@section('title')
    <title>Terminos y condiciones</title>
@endsection

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
                                    <img class="img-fluid" src="/gospaqueterias/public/assets/images/app_hero_1.png" alt="" />
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
                            <div class="services-content text-start">
                                <h1 class="wow fadeInUp fs-1" data-wow-delay="0s">Terminos y Condiciones</h1>
                                <p class="wow fadeInUp" data-wow-delay="0.2s">
                                    <ol>
                                        <li class="pb-2">
                                            <p class="fs-3 fw-bold">1. Definiciones: </p>
                                            <br>
                                            <p>Empresa: GOS Paqueterias.</p>
                                            <p>Cliente: Persona o entidad que contrata los servicios de paquetería.</p>
                                            <p>Envío: Artículo o paquete que será transportado por la empresa de paquetería.</p>
                                            <p>Destinatario: Persona o entidad designada para recibir el envío.</p>
                                        </li>
                                        <li class="pb-2">
                                            <p class="fs-3 fw-bold">2. Servicios Ofrecidos:</p>
                                            
                                            <br>
                                            <p>
                                                La empresa se compromete a proporcionar servicios de paquetería de acuerdo con las tarifas y condiciones acordadas.
                                            </p>
                                        </li>
                                        <li class="pb-2">
                                            <p class="fs-3 fw-bold">3. Condiciones de Envío:</p>
                                            <br>
                                            <p>El cliente es responsable de proporcionar información precisa y completa sobre el remitente y el destinatario.</p>
                                            <p>La empresa no se hace responsable de los daños causados por embalajes inadecuados proporcionados por el cliente.</p>
                                        </li>
                                        <li class="pb-2">
                                            <p class="fs-3 fw-bold">4. Tarifas y Pagos:</p>
                                            <br>
                                            <p>Las tarifas serán establecidas según los acuerdos previos y se pagarán en el momento de la contratación del servicio.</p>
                                        </li>
                                        <li class="pb-2">
                                            <p class="fs-3 fw-bold">5. Responsabilidad y Seguro:</p>
                                            <br>
                                            <p>La empresa se compromete a tomar las precauciones razonables para asegurar la entrega segura de los envíos, pero no se hace responsable de pérdidas o daños causados por circunstancias fuera de su control.</p>
                                            <p>Se recomienda que el cliente adquiera un seguro adicional para cubrir posibles pérdidas o daños.</p>
                                        </li>


                                        <li class="pb-2">
                                            <p class="fs-3 fw-bold">6. Tiempos de Entrega:</p>
                                            <br>
                                            <p>Los tiempos de entrega son estimados y pueden estar sujetos a variaciones debido a circunstancias inesperadas.</p>
                                        </li>
                                        <li class="pb-2">
                                            <p class="fs-3 fw-bold">7. Cancelaciones y Reembolsos:</p>
                                            <br>
                                            <p>Las cancelaciones están sujetas a las políticas de la empresa y pueden estar sujetas a cargos.</p>
                                            <p>Las solicitudes de reembolso serán evaluadas caso por caso.</p>
                                        </li>
                                        <li class="pb-2">
                                            <p class="fs-3 fw-bold">8. Modificaciones de los Términos y Condiciones:</p>
                                            <br>
                                            <p>La empresa se reserva el derecho de modificar estos términos y condiciones con notificación previa al cliente.</p>
                                        </li>
                                        <li class="pb-2">
                                            <p class="fs-3 fw-bold">9. Ley Aplicable:</p>
                                            <br>
                                            <p>Estos términos y condiciones se regirán por las leyes de la republica Mexicana y cualquier disputa será sometida a la jurisdicción de los tribunales de la ciudad de Mexico.</p>
                                        </li>
                                        <li class="pb-2">
                                            <p class="fs-3 fw-bold">10. Contacto:</p>
                                            <br>
                                            <p>Para cualquier consulta o aclaración, el cliente puede ponerse en contacto con la empresa a través de los canales de comunicación proporcionados.</p>
                                            <p>Recuerda que es importante que un abogado revise estos términos y condiciones para asegurarse de que cumplan con las leyes y regulaciones locales. Además, es recomendable adaptarlos a las necesidades específicas de tu empresa y a las leyes de tu país o región.</p>
                                        </li>
                                    </ol>
                                </p>
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
                        <img src="/gospaqueterias/public/assets/images/GOSresizeBG.png" alt="Adminty Logo" />
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