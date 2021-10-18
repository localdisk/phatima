<?php

namespace App\Services;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class LaravelAuth implements AuthInterface
{
    const PER_MINUTS = 5;

    public function login(string $email, string $password): bool {
        if (! Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
        ])) {
            $this->addError('login', 'ログインエラー');
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }
        return true;
     }

     private function hitRateLimit(string $email): void
     {
         if (! RateLimiter::tooManyAttempts($this->throttleKey())) {
             RateLimiter::hit($this->throttleKey());

             return;
         }

         event(new Lockout(request()->merge(['email' => $this->email])));
     }

     private function throttleKey()
     {
         return Str::lower($this->email);
     }
}
