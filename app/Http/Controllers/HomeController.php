<?php

namespace App\Http\Controllers;

use App\Models\Totales;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Phpfastcache\Helper\Psr16Adapter;

class HomeController
{
    private \Twig\Environment $twig;
    private Psr16Adapter $cache;

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('views');
        $this->twig = new \Twig\Environment($loader);
    }

    /**
     * @return void
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function index()
    {
        echo $this->twig->render('index.html');
    }

    /**
     * @return bool
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function home()
    {
        $user = new UserController();
        if ($token = $user->verifyToken()) {
            $check = $user->checkJWT($token);
            if ($check) {
                $totales = Totales::all();
                echo $this->twig->render('home.html', ['totales' => $totales]);
                return true;
            }
        }
        echo $this->twig->render('index.html');
    }
}
