<?php declare(strict_types=1);

namespace App\Services;

class AuthService
{
    public function currentUser(): object { 
        return (object)[
            'id' => 1,
            'username' => 'johndoe',
            'roles' => ['admin', 'editor']
        ];
    }

    public function userHasRole(string $role): bool { 
        return in_array($role, $this->currentUser()->roles ?? []); 
    }
}