<?php declare(strict_types=1);

namespace App\Services;

use App\Models\User;

class AuthService
{
    public function currentUser(): User 
    { 
        return new User(1, 'John Doe', ['admin', 'editor']);
    }

    public function userHasRole(string $role): bool 
    { 
        return in_array($role, $this->currentUser()->roles ?? []); 
    }
}