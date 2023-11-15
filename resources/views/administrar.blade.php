@extends('layouts.config')

@section('title')
    GOS paqueterias
@endsection

@section('content')

<div class="pcoded-conten">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="containe">
                            <h1 class="fs-1 ">Bienvenidos a la administracion de GOS Paqueterias</h1>
                        </div>
                        <!-- statustic-card start -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-yellow text-white">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <p class="m-b-5">Total de Usuarios</p>
                                            <h4 class="m-b-0">852</h4>
                                        </div>
                                        <div class="col col-auto text-end">
                                            <i class="feather icon-user f-50 text-c-yellow"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-green text-white">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <p class="m-b-5">Costo Total de envios</p>
                                            <h4 class="m-b-0">$5,852</h4>
                                        </div>
                                        <div class="col col-auto text-end">
                                            <i
                                                class="feather icon-credit-card f-50 text-c-green"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-pink text-white">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <p class="m-b-5">Envios en proceso</p>
                                            <h4 class="m-b-0">42</h4>
                                        </div>
                                        <div class="col col-auto text-end">
                                            <i class="feather icon-book f-50 text-c-pink"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-c-blue text-white">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <p class="m-b-5">Total de ordenes</p>
                                            <h4 class="m-b-0">5,242</h4>
                                        </div>
                                        <div class="col col-auto text-end">
                                            <i
                                                class="feather icon-shopping-cart f-50 text-c-blue"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- statustic-card start -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection