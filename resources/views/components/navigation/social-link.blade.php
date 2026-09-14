@props(['label', 'icon', 'url', 'variant' => 'default'])

@php
    $classes = $variant === 'on-dark'
        ? 'flex h-10 w-10 items-center justify-center rounded-lg border border-white/10 bg-white/5 text-white/70 transition-all duration-200 hover:-translate-y-0.5 hover:border-brand-accent/50 hover:bg-brand-accent/15 hover:text-brand-accent'
        : 'flex h-9 w-9 items-center justify-center rounded-lg border border-brand-border text-brand-muted transition-all duration-200 hover:-translate-y-0.5 hover:border-brand-accent hover:text-brand-accent';
@endphp

<a
    href="{{ $url }}"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="{{ $label }}"
    {{ $attributes->merge(['class' => $classes]) }}
>
    <x-icons.icon :name="$icon" class="h-4 w-4" />
</a>
