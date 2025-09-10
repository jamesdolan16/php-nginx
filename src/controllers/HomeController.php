<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        echo $this->twig->render('home.twig', [
            'date' => date('d/m/Y'),
            'time' => date('H:i'),
        ]);
    }

    public function about()
    {
        echo $this->twig->render('about.twig');
    }

    public function greet($name)
    {
        echo $this->twig->render('greet.twig', ['name' => ucfirst($name)]);
    }
}