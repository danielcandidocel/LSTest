<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Totales extends Model
{
    protected $table = 'totales';

    protected $fillable = ['plataforma', 'cliente', 'articulo', 'tot_stock', 'total_lineas'];
}