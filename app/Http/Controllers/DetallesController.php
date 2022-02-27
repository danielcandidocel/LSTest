<?php

namespace App\Http\Controllers;

use App\Models\Detalles;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class DetallesController
{
    /**
     * @param string $articulo
     * @return Builder[]|Collection
     */
    public function search(string $articulo)
    {
        return Detalles::query()->where('articulo', $articulo)->with('matriculas')->get();
    }
}