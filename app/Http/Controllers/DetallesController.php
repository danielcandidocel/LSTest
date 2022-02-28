<?php

namespace App\Http\Controllers;

use App\Models\Detalles;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DetallesController
{
    /**
     * @param Request $request
     * @param string $articulo
     * @return Builder[]|Collection
     */
    public function search(Request $request, string $articulo)
    {
        $data = explode(' ', $request->header('Authorization'));
        $user = new UserController();
        $check = $user->checkJWT($data[1]);
        if ($check) {
            return Detalles::query()->where('articulo', $articulo)->with('matriculas')->get();
        }
    }
}
