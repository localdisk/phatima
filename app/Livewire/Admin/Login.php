<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use App\Livewire\Dashboard;
use App\Livewire\Forms\Admin\LoginForm;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $form;

    public function login()
    {
        $this->validate();

        if (Auth::attempt([
            'email' => $this->form->email,
            'password' => $this->form->password,
        ], $this->form->remember)) {
            return $this->redirect(Dashboard::class);
        }

        session()->flash('error', 'ユーザー名かパスワードが間違っています');

        return $this->redirect(Login::class);
    }

    #[Layout('layouts.guest')]
    #[Title('Login')]
    public function render(): View|Factory
    {
        return view('livewire.admin.login');
    }
}
