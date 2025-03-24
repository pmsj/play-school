<?php

namespace App\Livewire\Carousel;

use Livewire\Attributes\Layout;
use Livewire\Component;

class ImageCarousel extends Component
{
    

    public function render()
    {
        $heroImages = \App\Models\ImageCarousel::all(); // Fetch the latest HeroCard
    
        return view('livewire.carousel.image-carousel', [
            'heroImages' => $heroImages
        ]);
    }
}
