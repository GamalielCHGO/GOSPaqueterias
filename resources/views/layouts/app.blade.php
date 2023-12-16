<!DOCTYPE html>
<html lang="en"> 

<head>
    @yield('title')
    <meta charset="utf-8">
    <!-- Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Paqueterias GOS, llevamos tus paquetes a todas partes">
    <meta name="keywords" content="Paqueterias GOS, llevamos tus paquetes a todas partes">
    <!-- Favicon icon -->
    <link rel="icon" href="/public/assets/images/logo GOS sin fondo.png" type="image/png" sizes="16x16">
    <!-- Bootstrap -->
    <link href="/public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="/public/files/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- radial chart.css -->
    <link rel="stylesheet" href="/public/files/assets/pages/chart/radial/css/radial.css" type="text/css" media="all">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,700,600" rel="stylesheet" type="text/css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="/public/assets/css/animate.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="/public/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="/public/assets/css/owl.theme.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="/public/assets/css/magnific-popup.css">
    <!-- Full Page Animation -->
    <link rel="stylesheet" href="/public/assets/css/animsition.min.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="/public/files/assets/icon/feather/css/feather.css">
    <!-- Ionic Icons -->
    <link rel="stylesheet" href="/public/assets/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Main Style css -->
    {{-- <link rel="stylesheet" type="text/css" href="/public/files/assets/css/style.css"> --}}
    <link rel="stylesheet" type="text/css" href="/public/files/assets/css/jquery.mCustomScrollbar.css">
    <link href="/public/assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Style.css -->
    
    


        
        



    <style>
        .imgFondo{
            background-image: url('/public/assets/images/wave.svg' );
            background-repeat: no-repeat;
            background-size: cover;
        }
        .mapa{
            width: 100%;
            height: 300px;
        }
    </style>
</head>

<body>

    <div class="wrapper animsition" data-animsition-in-class="fade-in" data-animsition-in-duration="1000" data-animsition-out-class="fade-out" data-animsition-out-duration="1000">
        <div class="container">
             <nav class="navbar navbar-expand-lg navbar-light navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <a class="navbar-brand page-scroll" href="#main"><img src="/public/assets/images/GOSresizeBG.png" alt="adminity Logo"/></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto">
                        </ul>
                        <ul class="navbar-nav my-2 my-lg-0">
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="{{route('home')}}">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="{{route("rastrear")}}">Rastrear</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="#precios">Precios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="#ubicaciones">Ubicaciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="#contactanos">Contactanos</a>
                            </li>
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('login')}}">Iniciar sesion</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('administrar')}}">Administrar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="login">{{ Auth::user()->name }}</a>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        
        @yield('content')


    </div>
    <!-- Wrapper-->

    <!-- Jquery and Js Plugins -->
    <script type="text/javascript" src="/public/assets/js/jquery-2.1.1.js"></script>
    <script type="text/javascript" src="/public/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/public/assets/js/plugins.js"></script>
    <script type="text/javascript" src="/public/assets/js/menu.js"></script>
    <script type="text/javascript" src="/public/assets/js/custom.js"></script>
</body>

</html>
