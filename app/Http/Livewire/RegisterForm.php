<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Services\AuthInterface;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;

class RegisterForm extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    private AuthInterface $auth;

    protected $rules = [
        'name' => ['required', 'string'],
        'email' => ['required', 'string', 'email'],
        'password' => ['required', 'string', 'confirmed', 'min:8'],
        'password_confirmation' => ['required', 'string', 'same:password'],
    ];

    public function mount(AuthInterface $auth): void
    {
        $this->auth = $auth;
    }

    public function register()
    {
        $this->validate();

        $user = $this->auth->register($this->name, $this->email, $this->password);

        event(new Registered($user));

        $this->auth->login($user);

        return redirect()->route('verification.notice');
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
