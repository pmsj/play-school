@props([
    'submit',
    'title' => null, // Default to null if not provided
    'description' => null // Default to null if not provided
    ])

<div {{ $attributes->merge(['class' => 'md:grid md:gap-6']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit="{{ $submit }}">
            <div class="px-4 py-5  sm:p-6  {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-start px-4 py-3 text-end sm:px-6  sm:rounded-bl-md sm:rounded-br-md">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
