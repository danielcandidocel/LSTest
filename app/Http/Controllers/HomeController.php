<?php

namespace App\Http\Controllers;

use App\Models\Detalles;
use App\Models\Matriculas;

class HomeController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('views');
        $twig = new \Twig\Environment($loader);
        echo $twig->render('home.html', ['the' => 'variables', 'go' => 'here']);
    }
}