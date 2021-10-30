<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;

interface AuthInterface
{
    public function register(string $name, string $email, string $password): User;

    public function login(User $user): void;

    public function attempt(string $email, string $password): bool;

    public function logout(): void;
}
