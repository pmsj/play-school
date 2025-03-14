<?php

namespace App\Livewire;

use App\Models\Tag;
use Livewire\Component;

class Tags extends Component
{
    public Tag $tag;
    
    public function render()
    {
        return view('livewire.tags');
    }
}
