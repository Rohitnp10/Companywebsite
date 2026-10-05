@props(['route' => null, 'href' => null, 'type' => 'link'])

@php
    $url = $route ? route($route) : ($href ?? '#');
    $classes = 'btn-brand group inline-flex items-center justify-center gap-2 rounded-[var(--radius-md)] px-5 py-3 text-sm font-semibold text-white transition duration-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-accent';
@endphp

@if($type === 'button')
    <button type="submit" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
        <x-icons.icon name="arrow-right" class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-0.5" />
    </button>
@else
    <a href="{{ $url }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
        <x-icons.icon name="arrow-right" class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-0.5" />
    </a>
@endif
