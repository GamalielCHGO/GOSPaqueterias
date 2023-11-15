<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'envios';

    protected $fillable = [
        'guia',
        'nombre_remitente',
        'direccion_remitente',
        'telefono_remitente',
        'correo',
        'nombre_destino',
        'direccion_destino',
        'telefono_destino',
        'estado',
        'fecha_recibo',
        'fecha_envio',
        'fecha_sucursal',
        'fecha_entrega',
        'sucursal_origen',
        'contrasena_entrega',
        'total',
        'rfc',
        'transporte',
        'sucursal_destino',
        'pdf',
        'ine',
        'firma',
        'id_transporte',
        'evidencia_recibo',
        'observaciones_recibo',
        'ocurre',
        'firma_entrega',
        'ine_entrega',
    ];
}
