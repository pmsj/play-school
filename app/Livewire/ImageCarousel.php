<?php

namespace App\Livewire;

use Livewire\Component;

class ImageCarousel extends Component
{
   
    public function render()
    {
        $heroImages = \App\Models\ImageCarousel::all(); // Fetch the latest HeroCard
    
        return view('livewire.image-carousel', [
            'heroImages' => $heroImages
        ]);
    }
}
