@props(['label', 'icon', 'url', 'variant' => 'default'])

@php
    $classes = $variant === 'on-dark'
        ? 'flex h-9 w-9 items-center justify-center rounded-[var(--radius-md)] border border-white/15 text-white/70 transition-colors duration-200 hover:border-brand-accent hover:text-brand-accent'
        : 'flex h-9 w-9 items-center justify-center rounded-[var(--radius-md)] border border-brand-border text-brand-muted transition-colors duration-200 hover:border-brand-accent hover:text-brand-accent';
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
