<?php

namespace App\Livewire\Admin;

use App\Models\Tag;
use Livewire\Component;

class EditTag extends Component
{
    public Tag $tag;

    public string $name = '';

    public function mount($id)
    {
        $this->tag = Tag::findOrFail($id);
        $this->name = $this->tag->name;
    }

    public function update()
    {
        $this->tag->name = $this->name;
        $this->tag->save();

        session()->flash('type', 'success');
        session()->flash('status', 'タグを更新しました');

        return $this->redirect(TagList::class);
    }

    public function render()
    {
        return view('livewire.admin.edit-tag');
    }
}
