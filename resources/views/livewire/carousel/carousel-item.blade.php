<x-slot name="header">
    <h2 class="font-semibold text-xl leading-tight">
        Create New Carousel
    </h2>
</x-slot>

<div class="mx-auto max-w-3xl  bg-white rounded-2xl px-10 py-10">
   <div class="mb-5">
        @if (session()->has('message'))
            <x-wui-alert title="{{ session('message') }} " positive squared class="bg-green-200" />
        @endif
   </div>
    <div class="text-lg font-semibold mb-10 space-y-2">
        <h1>Create new carousel</h1>
        <p class="text-sm font-light text-slate-600">You can add new carousel items here!</p>
    </div>
    <div class="p-5 rounded">
        <form wire:submit="createCarousel">
            <div class="space-y-4">
                <div class="space-y-2">
                    <div><label for=""> Title</label></div>
                    <div><x-input wire:model="form.title" type="text" class="w-full" /></div>
                    <x-input-error for="form.title" />
                </div>
                <div class="space-y-2">
                    <div><label for="">Subtitle</label></div>
                    <div><x-input wire:model="form.subtitle" type="text" class="w-full" /></div>
                    <x-input-error for="form.subtitle" />
                </div>
                <div class="space-y-2 text-info">
                    <x-wui-input wire:model="form.photo" label="Upload an image" type="file" class="w-full rounded-full cursor-pointer text-info" />
                    <x-input-error for="form.photo" />
                </div>
                <div class="space-y-2">
                    <x-wui-button type="submit" class="bg-secondary">
                        Create carousel
                    </x-wui-button>
                </div>
            </div>
        </form>
    </div>
</div>