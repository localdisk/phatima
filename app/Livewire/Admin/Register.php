<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\Admin\RegisterForm;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Register extends Component
{
    public RegisterForm $form;

    public function register(): Redirector|RedirectResponse
    {
        $this->validate();

        $user = User::create([
            'name' => $this->form->name,
            'email' => $this->form->email,
            'password' => $this->form->password,
        ]);

        event(new Registered($user));

        return redirect(route('register'));
    }

    #[Layout('layouts.guest')]
    public function render(): View|Factory
    {
        return view('livewire.admin.register');
    }
}
