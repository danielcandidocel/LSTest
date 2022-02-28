<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matriculas extends Model
{
    protected $table = 'matriculas';
    protected $fillable = ['plataforma', 'cliente', 'id', 'sscc'];
}
