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
    {{ $attributes->merge(['class' => "group/illustration relative inline-flex shrink-0 items-center justify-center overflow-hidden rounded-2xl border border-brand-accent/15 bg-gradient-to-br from-brand-accent/15 via-brand-accent/5 to-transparent transition-transform duration-300 {$s['box']}"]) }}
>
    {{-- soft glow, drifts slightly on hover for a touch of depth --}}
    <span class="{{ $s['glow'] }} absolute -right-2 -top-2 rounded-full bg-brand-accent/25 blur-md transition-transform duration-500 group-hover/illustration:translate-x-0.5 group-hover/illustration:translate-y-0.5 icon-glow-pulse"></span>

    {{-- orbiting accent ring --}}
    <span class="pointer-events-none absolute inset-1 rounded-xl border border-brand-accent/0 transition-colors duration-300 group-hover/illustration:border-brand-accent/25" aria-hidden="true"></span>

    {{-- glyph --}}
    <x-icons.icon
        :name="$name"
        class="{{ $s['glyph'] }} relative text-brand-accent transition-transform duration-300 group-hover/illustration:scale-110 {{ $animated ? 'icon-draw' : '' }}"
    />

    {{-- accent flourish --}}
    <span class="{{ $s['dot'] }} absolute bottom-1.5 right-1.5 rounded-full bg-brand-accent/70 transition-transform duration-300 group-hover/illustration:scale-125"></span>
</div>
