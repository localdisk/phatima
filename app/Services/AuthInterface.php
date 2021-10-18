<?php

declare(strict_types=1);

namespace App\Services;

interface AuthInterface
{
    public function login(string $email, string $password): bool;
}
