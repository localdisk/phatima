<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;

class NewPassword extends Component
{
    #[Rule('required')]
    public ?string $token = '';

    #[Rule('required|email')]
    #[Url]
    public string $email = '';

    #[Rule('required|min:8|confirmed')]
    public string $password = '';

    public string $password_confirmation = '';

    public function newPassword()
    {
        $this->validate();

        $password = $this->password;

        $status = Password::reset([
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
            'token' => $this->token,
        ],
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => $password,
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            },
        );

        session()->flash('status', __($status));
        if ($status === Password::PASSWORD_RESET) {
            session()->flash('type', 'info');

            return $this->redirect(Login::class);
        }

        session()->flash('type', 'error');

        return $this->redirect(Login::class);

    }

    #[Layout('layouts.guest')]
    public function render()
    {
        $this->token = Route::current()->parameter('token');

        return view('livewire.admin.new-password');
    }
}
