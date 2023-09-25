<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Paqueterias GOS</title>
    <!-- Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Landing page template for creative dashboard">
    <meta name="keywords" content="Landing page template">
    <!-- Favicon icon -->
    <link rel="icon" href="/gospaqueterias/public/assets/images/logo GOS sin fondo.png" type="image/png" sizes="16x16">
    <!-- Bootstrap -->
    <link href="/gospaqueterias/public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,700,600" rel="stylesheet" type="text/css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="/gospaqueterias/public/assets/css/animate.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="/gospaqueterias/public/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="/gospaqueterias/public/assets/css/owl.theme.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="/gospaqueterias/public/assets/css/magnific-popup.css">
    <!-- Full Page Animation -->
    <link rel="stylesheet" href="/gospaqueterias/public/assets/css/animsition.min.css">
    <!-- Ionic Icons -->
    <link rel="stylesheet" href="/gospaqueterias/public/assets/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Main Style css -->
    <link href="/gospaqueterias/public/assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <style>
        .imgFondo{
            background-image: url('/gospaqueterias/public/assets/images/wave.svg' );
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>

    <div class="wrapper animsition" data-animsition-in-class="fade-in" data-animsition-in-duration="1000" data-animsition-out-class="fade-out" data-animsition-out-duration="1000">
        <div class="container">
             <nav class="navbar navbar-expand-lg navbar-light navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <a class="navbar-brand page-scroll" href="#main"><img src="/gospaqueterias/public/assets/images/GOSresizeBG.png" alt="adminity Logo"/></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto">
                        </ul>
                        <ul class="navbar-nav my-2 my-lg-0">
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="home/#main">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="{{route("rastrear")}}">Rastrear</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="home/#precios">Precios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="home/#ubicaciones">Ubicaciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="home/#contactanos">Contactanos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Iniciar sesion</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
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
                                <br>
                                <form action="post" class="wow fadeInUp" data-wow-delay="1s">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="12345678910">
                                        <label for="floatingInput">Numero de guia</label>
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
                        <img src="/gospaqueterias/public/assets/images/GOSresizeBG.png" alt="Adminty Logo" />
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
        <!-- Main Section -->
    </div>
    <!-- Wrapper-->

    <!-- Jquery and Js Plugins -->
    <script type="text/javascript" src="/gospaqueterias/public/assets/js/jquery-2.1.1.js"></script>
    <script type="text/javascript" src="/gospaqueterias/public/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/gospaqueterias/public/assets/js/plugins.js"></script>
    <script type="text/javascript" src="/gospaqueterias/public/assets/js/menu.js"></script>
    <script type="text/javascript" src="/gospaqueterias/public/assets/js/custom.js"></script>
</body>

</html>
