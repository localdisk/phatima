<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class EmailVerify extends Component
{
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.admin.email-verify');
    }
}
