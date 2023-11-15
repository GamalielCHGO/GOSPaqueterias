<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'paquetes';

    protected $fillable = [
        'envioId',
        'tipo',
        'cantidad',
        'alto',
        'largo',
        'ancho',
        'costo',
        'peso',
        'evidencia',
        'contenido',
        'evidencia_envio',
        'firma',
    ];


}
