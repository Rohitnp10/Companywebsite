@props(['name' => 'circle', 'size' => 'md', 'animated' => true])

@php
    // Richer "illustration badge" treatment around the same per-item icon
    // glyph already used across the site (services/products/industries/
    // features) — a layered, duotone graphic instead of a flat icon-in-a-box.
    // Driven entirely by the same `icon` key each Content class already
    // provides, so every item keeps its own distinct image automatically.
    $sizes = [
        'sm' => ['box' => 'h-11 w-11', 'glyph' => 'h-5 w-5', 'glow' => 'h-6 w-6', 'dot' => 'h-1.5 w-1.5'],
        'md' => ['box' => 'h-14 w-14', 'glyph' => 'h-6 w-6', 'glow' => 'h-8 w-8', 'dot' => 'h-2 w-2'],
        'lg' => ['box' => 'h-16 w-16', 'glyph' => 'h-7 w-7', 'glow' => 'h-10 w-10', 'dot' => 'h-2.5 w-2.5'],
    ];
    $s = $sizes[$size] ?? $sizes['md'];
@endphp

<div
    @if($animated) data-icon-live @endif
    {{ $attributes->merge(['class' => "group/illustration relative inline-flex shrink-0 items-center justify-center overflow-hidden rounded-[var(--radius-md)] border border-brand-border bg-brand-card transition-colors duration-300 {$s['box']}"]) }}
>
    <x-icons.icon
        :name="$name"
        class="{{ $s['glyph'] }} relative text-brand-accent {{ $animated ? 'icon-draw' : '' }}"
    />
</div>
