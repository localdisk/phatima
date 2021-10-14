<?php declare(strict_types=1);

namespace App\Http\Livewire;

use Livewire\Component;

class RegisterForm extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    protected $rules = [
        'name' => ['required', 'string'],
        'email' => ['required', 'string', 'email'],
        'password' => ['required', 'string', 'confirmed', 'min:8', 'same:password_confirmation'],
        'password_confirmation' => ['required', 'string']
    ];

    public function register()
    {
        $this->validate();

        $this->reset();
    }
    public function render()
    {
        return view('livewire.register-form');
    }
}
