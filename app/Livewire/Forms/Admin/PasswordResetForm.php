<?php

namespace App\Livewire\Forms\Admin;

use Livewire\Attributes\Rule;
use Livewire\Form;

class PasswordResetForm extends Form
{
    #[Rule('required|email')]
    public string $email;
}
