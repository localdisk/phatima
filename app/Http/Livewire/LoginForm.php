<?php declare(strict_types=1);

namespace App\Http\Livewire;

use Livewire\Component;

class LoginForm extends Component
{
    public string $user = '';

    public string $password = '';

    public function login(): void
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
