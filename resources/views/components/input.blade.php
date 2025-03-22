@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-primary focus:border-info focus:ring-info rounded-md shadow-sm']) !!}>
