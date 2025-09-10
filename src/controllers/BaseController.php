<?php

namespace App\Controllers;

class BaseController
{
    protected $twig;

    public function __construct($twig = null)
    {
        $this->twig = $twig;
    }
}