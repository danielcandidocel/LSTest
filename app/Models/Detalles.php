<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalles extends Model
{
    protected $table = 'detalles';
    protected $fillable = ['plataforma', 'cliente', 'articulo', 'almacen', 'ubicacion', 'id', 'lote', 'unidades'];

    public function matriculas()
    {
        return $this->belongsTo(Matriculas::class, 'id', 'id');
    }
}
