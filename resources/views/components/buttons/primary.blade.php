@props(['route' => null, 'href' => null, 'type' => 'link'])

@php
    $url = $route ? route($route) : ($href ?? '#');
    $classes = 'group inline-flex items-center justify-center gap-2 rounded-lg bg-brand-primary px-6 py-3.5 text-sm font-semibold text-white shadow-soft transition-all duration-200 hover:bg-brand-accent hover:shadow-soft-lg focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-accent';
@endphp

@if($type === 'button')
    <button type="submit" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
        <x-icons.icon name="arrow-right" class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-0.5" />
    </button>
@else
    <a href="{{ $url }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
        <x-icons.icon name="arrow-right" class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-0.5" />
    </a>
@endif
