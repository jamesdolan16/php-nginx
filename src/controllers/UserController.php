<?php

namespace App\Controllers;

use Twig\Environment;
use App\Services\AuthService;
use App\Services\UserService;

final class UserController extends BaseController
{
    public function __construct(
        public Environment $twig, 
        public AuthService $auth, 
        public UserService $users,
    ){}

    public function index(int $id): void
    {
        $user = $this->users->find($id);
        echo $this->twig->render('user.html.twig', [
            'user' => $user
        ]);
    }
}