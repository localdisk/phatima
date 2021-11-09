<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Password;
use Livewire\Component;

class PasswordResetForm extends Component
{
    public string $email = '';

    public string $status = '';

    protected $rules = [
        'email' => ['required', 'string', 'email'],
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function sendResetLink()
    {
        $this->validate();

        $this->status = __(Password::sendResetLink(['email' => $this->email]));

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.password-reset-form');
    }
}
