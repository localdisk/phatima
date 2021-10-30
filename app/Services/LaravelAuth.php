<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Hashing\HashManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class LaravelAuth implements AuthInterface
{
    const MAX_ATTEMPTS = 5;

    private HashManager $hash;

    public function register(string $name, string $email, string $password): User
    {
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => $this->hash->make($password)
        ]);
    }

    public function login(User $user): void
    {
        Auth::login($user);
    }

    public function attempt(string $email, string $password): bool
    {
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->clearRateLimit();
            // email 認証
            $user = Auth::user();

            if (Auth::user()->hasVerifiedEmail()) {
                return redirect()->intended(route('dashboard'));
            }

            $user->sendEmailVerificationNotification();

            return true;
        }

        // ログイン失敗
        $this->hitRateLimit($email);

        return false;
    }

    public function logout(): void
    {
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();
    }

    private function hitRateLimit(string $email): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), self::MAX_ATTEMPTS)) {
            RateLimiter::hit($this->throttleKey());

            return;
        }

        event(new Lockout(request()->merge(['email' => $email])));
    }

    private function clearRateLimit(): void
    {
        RateLimiter::clear($this->throttleKey());
    }

    private function throttleKey(): string
    {
        return Str::lower($this->email);
    }
}
