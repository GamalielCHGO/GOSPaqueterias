<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'costos';

    protected $fillable = [
        'nombre',
        'peso',
        'ancho',
        'largo',
        'alto',
        'descripcion',
        'costo'
    ];

}
