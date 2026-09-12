@props(['route' => null, 'href' => null])

@php
    $url = $route ? route($route) : ($href ?? '#');
@endphp

<a href="{{ $url }}" {{ $attributes->merge(['class' => 'inline-flex items-center justify-center gap-2 rounded-lg border border-brand-border bg-white px-6 py-3.5 text-sm font-semibold text-brand-primary transition-all duration-200 hover:border-brand-accent hover:text-brand-accent focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-accent']) }}>
    {{ $slot }}
</a>
