<?php declare(strict_types=1);

namespace App\Services;

use App\Models\User;

class UserService
{
    public function find(int $id): User|null
    {
        // $stmt = $this->conn->query('SELECT * FROM user');
        // if ($row = $stmt->fetch()) {
        //     $user = new User(...$row);
        // }
        // return $user ?? null;
        return new User($id, 'Lorem Ipsum', ['editor']);
    }
}