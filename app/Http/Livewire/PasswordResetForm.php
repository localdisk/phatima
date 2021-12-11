<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Component;

class PasswordResetForm extends Component
{
    public string $token = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    protected $rules = [
        'password' => ['required', 'string', 'confirmed', 'min:8'],
        'password_confirmation' => ['required', 'string', 'same:password'],
    ];

    protected $queryString = ['token', 'email'];

    public function resetPassword()
    {
        $this->validate();

        $status = Password::reset(
            [$this->email, $this->password, $this->password_confirmation, $this->token],
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withInput([$this->email])
                            ->withErrors(['email' => __($status)]);
    }

    public function render()
    {
        return view('livewire.password-reset-form');
    }
}
