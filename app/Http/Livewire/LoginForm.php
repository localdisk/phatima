<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class LoginForm extends Component
{
    public string $email = '';

    public string $password = '';

    protected $rules = [
        'email' => ['required', 'string', 'email'],
        'password' => ['required', 'string', 'min:8'],
    ];

    public function updated(string $property): void
    {
        $this->validateOnly($property);
    }

    public function login()
    {
        $this->validate();

        session()->regenerate();

        return redirect('dashboard');
    }

    public function render()
    {
        return view('livewire.login-form');
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    private function throttleKey()
    {
        return Str::lower($this->email).'|'.$this->ip();
    }

    public function ensureIsNotRateLimited()
    {
        // rate limit を超えてないか
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        // 超えてたらロックアウト
        event(new Lockout(request()->merge(['email' => $this->email])));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }
}
