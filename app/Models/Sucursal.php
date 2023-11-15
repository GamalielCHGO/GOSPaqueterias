<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'sucursal';

    protected $fillable = [
        'nombre',
        'direccion',
        'correo',
        'tipos_envio',
        'impresora',
        'link',
    ];
}
