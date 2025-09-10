<?php

namespace App\Controllers;

use Twig\Environment;
use App\Services\AuthService;

class HomeController extends BaseController
{
    protected $twig;
    protected $auth;

    public function __construct(Environment $twig, AuthService $auth)
    {
        $this->twig = $twig;
        $this->auth = $auth;
    }

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
        echo $this->twig->render('about.twig');
    }

    public function greet($name)
    {
        echo $this->twig->render('greet.twig', ['name' => ucfirst($name)]);
    }
}