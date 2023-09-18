<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use App\Livewire\Forms\Admin\LoginForm;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $form;

    public function login(): Redirector|RedirectResponse
    {
        $this->validate();

        Auth::attempt([
            'email' => $this->form->email,
            'password' => $this->form->password,
        ], $this->form->remember);

        return redirect(route('dashboard'));
    }

    #[Layout('layouts.guest')]
    public function render(): View|Factory
    {
        return view('livewire.admin.login');
    }
}
