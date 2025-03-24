<?php

namespace App\Livewire\Carousel;

use Livewire\Component;
use App\Models\ImageCarousel;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\CreateCarouselItem;

class CarouselItem extends Component
{
    use WithFileUploads;
    
    public $title;
    public $subtitle;
    public $photo;

    public CreateCarouselItem $form;

    public function createCarousel()
    {

        $this->form->validate();

        $carousel = new ImageCarousel([
            'title' => $this->form->title,
            'subtitle' => $this->form->subtitle,
        ]);

        $carousel->save();

        // Handle the uploaded image
        if ($this->form->photo) {
            $carousel->addMedia($this->form->photo->getRealPath())
                    ->toMediaCollection('carousel-image');
        }

        // Reset the form
        $this->reset();

        // Optionally, you can add a session flash message or event
        session()->flash('message', 'Carousel Itmes created successfully.');
    }

    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.carousel.carousel-item');
    }
}
