@props(['disabled' => false])
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 rounded-md shadow-sm w-full focus:outline-none focus:ring-0']) !!}>
