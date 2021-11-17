<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PasswordResetForm extends Component
{
    public string $token = '';

    public string $email = '';

    protected $queryString = ['token', 'email'];

    public function render()
    {
        return view('livewire.password-reset-form');
    }
}
