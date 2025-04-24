@props([
    'options' => [],
    'wireModel' => null,
    'label' => null,
    'placeholder' => 'Select option(s)',
])

<div class="w-full">
    @if ($label)
        <label class="block mb-1 text-sm font-medium text-gray-700">{{ $label }}</label>
    @endif

    <select
        multiple
        {{ $wireModel ? "wire:model=$wireModel" : '' }}
        {{ $attributes->merge([
            'class' => 'block w-full rounded-md shadow-sm border-gray-300 focus:border-primary focus:ring focus:ring-primary/30',
        ]) }}
    >
        @foreach($options as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
</div>
