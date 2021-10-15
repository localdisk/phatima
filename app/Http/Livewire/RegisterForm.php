<?php declare(strict_types=1);

namespace App\Http\Livewire;

use App\Models\User;
use Auth;
use Hash;
use Livewire\Component;

class RegisterForm extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    protected $rules = [
        'name' => ['required', 'string'],
        'email' => ['required', 'string', 'email'],
        'password' => ['required', 'string', 'confirmed', 'min:8'],
        'password_confirmation' => ['required', 'string', 'same:password']
    ];

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }
    public function render()
    {
        return view('livewire.register-form');
    }
}
