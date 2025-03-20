@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-info']) }}>
    {{ $value ?? $slot }}
</label>
