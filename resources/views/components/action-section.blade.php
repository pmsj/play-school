<div {{ $attributes->merge(['class' => 'md:grid  md:gap-6 bg-cardBackground3 p-5 rounded-lg m-5 shadow-md']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="px-4 py-5 sm:p-6  sm:rounded-lg">
            {{ $content }}
        </div>
    </div>
</div>
