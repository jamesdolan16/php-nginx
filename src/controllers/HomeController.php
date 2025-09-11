<?php

namespace App\Controllers;

use Twig\Environment;
use App\Services\AuthService;

final class HomeController extends BaseController
{
    public function __construct(
        public Environment $twig, 
        public AuthService $auth
    ){}

    public function index()
    {
        echo $this->twig->render('home.twig', [
            'date' => date('d/m/Y'),
            'time' => date('H:i'),
        ]);
    }

    public function about()
    {
        if (!$this->auth->userHasRole('admin')) {
            header('HTTP/1.1 403 Forbidden');
            echo '403 - Access denied';
            return;
        }
        echo $this->twig->render('about.html.twig');
    }

    public function greet($name)
    {
        echo $this->twig->render('greet.html.twig', ['name' => ucfirst($name)]);
    }
}