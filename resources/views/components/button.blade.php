@props([
    'bgColor' => 'bg-primary-color',
    'type' => 'submit',
    'textColor' => 'text-white',
    'icon' => '',
    'title' => '',
    'size' => 'text-xs',
    'href' => null,
    'dataToggle' => null
])

@php
    $attributes = $attributes->merge([
        'type' => $type,
        'class' => 'inline-flex items-center px-4 py-2 mx-1 ' .
            $bgColor .
            ' ' .
            $size .
            ' ' .
            $textColor .
            ' border border-transparent rounded-md font-semibold'
    ]);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes }}>
@else
    <button data-toggle="{{ $dataToggle }}" {{ $attributes }}>
@endif
    @if ($icon)
        <i class="{{ $icon }} mx-1"></i>
    @endif
    {{ $title ?? $slot }}
@if ($href)
    </a>
@else
    </button>
@endif
