<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UserList extends Component
{
    public function render()
    {
        return view('livewire.admin.user-list', [
            'users' => User::orderBy('id')->paginate(1),
        ]);
    }
}
