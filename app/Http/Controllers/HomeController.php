<?php

namespace App\Http\Controllers;

use App\Models\Detalles;
use App\Models\Matriculas;
use App\Models\Totales;

class HomeController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('views');
        $twig = new \Twig\Environment($loader);
        $totales = Totales::all();
        echo $twig->render('home.html', ['totales' => $totales]);
    }
}