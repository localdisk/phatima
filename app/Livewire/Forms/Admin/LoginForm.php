<?php

declare(strict_types=1);

namespace App\Livewire\Forms\Admin;

use Livewire\Attributes\Rule;
use Livewire\Form;

class LoginForm extends Form
{
    #[Rule('required|email')]
    public string $email = '';

    #[Rule('required')]
    public string $password = '';
}
