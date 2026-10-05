@props([
    'src',
    'alt' => '',
    'badge' => null,
    'floatIcons' => [],
])

<figure {{ $attributes->merge(['class' => 'group/media']) }}>
    <div class="media-frame border border-brand-border">
        <img
            src="{{ $src }}"
            alt="{{ $alt }}"
            loading="lazy"
            decoding="async"
            class="aspect-[4/3] w-full object-cover object-center"
        />
    </div>
    @if($badge)
        <figcaption class="mt-3 font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-brand-muted">
            {{ $badge }}
        </figcaption>
    @endif
</figure>
