<?php
$path = $_SERVER['DOCUMENT_ROOT'].'/public/assets/images/logo GOS.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de envio</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            border: 0;
        }
        .contenedor{
            width: 100%;
            margin-left: 10px;
            margin-top: 10px;
            display: inline-block;
            /* float: left; add this line */
        }
        body{
            font-family:'Segoe UI', sans-serif;
        }
        table {
        }
        .titulo{
            font-size: 20px;
            margin-bottom: 3%;

        }
        .imagen{
            width: 20%;
            height: auto;
            margin-left: 20px;
            margin-top: 10px;
        }
        .tabla{
            font-size: 15px;
            padding: 10px;
            margin: 0 5px;
            width: 95%

        }
        .tabla>tbody>tr>td{
            font-size: 10px;
            border-bottom: solid 2px;
            margin: 0 5px;
            padding: 10px;
        }
        .encabezadoTabla{
            font-size: 10px;
            margin: 0 5px;
            background: gainsboro;
        }
        .encabezadoTabla>th{
            font-size: 15px;
            padding: 10px
        }
        .centrar{
            text-align: center;
        }
        .fondo{
            background: gainsboro;
        }
        .negrita{
            font-weight: bolder;
            font-size: 20px !important;
        }
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 50px;
        }
    </style>
</head>

<body>
    <div class="contenedor">
        <img src="<?php echo $base64?>" class="imagen"/>
    </div>
    <div class="contenedor titulo">
        <span style="float: right; margin-top: -100px; margin-right: 50px"><h1>Carta porte: {{$guia->guia}}</h1></span>
        <span style="float: right; margin-top: -30px; margin-right: 50px"><h3>Fecha de envio {{$fecha}}</h3></span>
    </div>
    <div class="contenedor">
        <h3 class="">Datos de envio:</h3>
        <div class="centrar">
            <table class="tabla centrar">
                <thead class="encabezadoTabla">
                    <th>Datos:</th>
                    <th>De:</th>
                    <th>Para:</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="fondo">Nombre</td>
                        <td>{{$guia->nombre_remitente}}</td>
                        <td>{{$guia->nombre_destino}}</td>
                    </tr>
                    <tr>
                        <td class="fondo">Direccion</td>
                        <td>{{$guia->direccion_remitente}}</td>
                        <td>{{$guia->direccion_destino}}</td>
                    </tr>
                    <tr>
                        <td class="fondo">Telefono</td>
                        <td>{{$guia->telefono_remitente}}</td>
                        <td>{{$guia->telefono_destino}}</td>
                    </tr>
                    <tr>
                        <td class="fondo">RFC</td>
                        <td>{{$guia->rfc}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <h3 class="">Datos de paquetes:</h3>
        <div class="centrar">
            <table class="tabla centrar">
                <thead class="encabezadoTabla">
                    <th>Tipo</th>
                    <th>Contenido</th>
                    <th>Peso U.</th>
                    <th>Precio U.</th>
                    <th>Cantidad</th>
                    <th>Precio T</th>
                </thead>
                <tbody>
                    @foreach ($paquetes as $paquete)
                        <tr>
                            <td>{{$paquete->tipo}}</td>
                            <td>{{$paquete->contenido}}</td>
                            <td>{{$paquete->peso}}</td>
                            <td>{{$paquete->costo}}</td>
                            <td>{{$paquete->cantidad}}</td>
                            <td>{{$paquete->cantidad*$paquete->costo}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="negrita">Total:</td>
                        <td class="negrita">{{$total}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <footer class="centrar">GOS Paqueterias https://gospaqueterias.com/</footer>
    
</body>


</html>