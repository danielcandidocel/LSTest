<?php

namespace App\Http\Controllers;

use App\Models\Totales;

class TotalesController
{
    public function index()
    {
        return Totales::all();
    }
}