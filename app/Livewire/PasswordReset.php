<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Livewire\Forms\Admin\PasswordResetForm;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Component;

class PasswordReset extends Component
{
    public PasswordResetForm $form;

    public function resetPassword()
    {
        $this->validate();

        $status = Password::sendResetLink(['email' => $this->form->email]);

        session()->flash('message', __($status));

        return $this->redirect(PasswordReset::class);
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.password-reset');
    }
}
