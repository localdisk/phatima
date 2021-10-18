<?php

namespace App\Services;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class LaravelAuth implements AuthInterface
{
    const MAX_ATTEMPTS = 5;

    public function login(string $email, string $password): bool
    {
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->clearRateLimit();

            return true;
        }

        // ログイン失敗
        $this->hitRateLimit($email);

        return false;
    }

    private function hitRateLimit(string $email): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), self::MAX_ATTEMPTS)) {
            RateLimiter::hit($this->throttleKey());

            return;
        }

        event(new Lockout(request()->merge(['email' => $this->email])));
    }

    private function clearRateLimit(): void
    {
        RateLimiter::clear($this->throttleKey());

    }

    private function throttleKey()
    {
        return Str::lower($this->email);
    }
}
