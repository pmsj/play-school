@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-primary focus:border-primary focus:ring-info rounded-md shadow-sm']) !!}>
</textarea>
