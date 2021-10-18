<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
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

        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
        ])) {
            return redirect('dashboard');
        }

        $this->addError('login', 'ログインエラー');
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
