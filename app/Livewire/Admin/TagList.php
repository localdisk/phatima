<?php

namespace App\Livewire\Admin;

use App\Models\Tag;
use Livewire\Component;

class TagList extends Component
{
    public bool $myModal = false;

    public function confirm(int $id)
    {

    }

    public function delete($id)
    {
        Tag::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin.tag-list', [
            'tags' => Tag::orderBy('id')->paginate(10),
        ]);
    }
}
