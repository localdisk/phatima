<?php

namespace App\Livewire\Admin;

use App\Models\Tag;
use Illuminate\Console\View\Components\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;

class RegisterTag extends Component
{
    #[Rule('required|unique:tags,name')]
    public string $name = '';

    public function store()
    {
        $this->validate();

        Tag::create([
            'name' => $this->name,
        ]);

        session()->flash('status', "タグ: {$this->name}  が作成されました");
        session()->flash('type', 'success');

        return redirect(route('admin.register.tag'));
    }

    public function render(): View|Factory
    {
        return view('livewire.admin.register-tag');
    }
}
