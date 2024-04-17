@props(['active'])

@php
$classes = ($active ?? false)
            ? 'bg-primary-color'
            : '';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>

        {{ $slot }}

</a>
