<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Password;
use Livewire\Component;

class PasswordResetForm extends Component
{
    public string $email = '';

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

        $status = Password::sendResetLink($this->email);

        dd($status);

        return redirect()->back()->with('status', __($status));
    }

    public function render()
    {
        return view('livewire.password-reset-form');
    }
}
