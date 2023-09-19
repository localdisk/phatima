<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use App\Livewire\Dashboard;
use App\Livewire\Forms\Admin\RegisterForm;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Register extends Component
{
    public RegisterForm $form;

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->form->name,
            'email' => $this->form->email,
            'password' => $this->form->password,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return $this->redirect(Dashboard::class);
    }

    #[Layout('layouts.guest')]
    public function render(): View|Factory
    {
        return view('livewire.admin.register');
    }
}
