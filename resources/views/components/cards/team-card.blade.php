@props([
    'name',
    'role' => null,
    'bio' => null,
    'image' => null,
    'imageAlt' => null,
])

<article {{ $attributes->merge(['class' => 'border-t border-brand-border pt-6']) }}>
    @if($image)
        <div class="media-frame mb-5 aspect-[4/5] border border-brand-border">
            <img
                src="{{ $image }}"
                alt="{{ $imageAlt ?? $name }}"
                loading="lazy"
                decoding="async"
                class="h-full w-full object-cover"
            />
        </div>
    @else
        <div class="mb-5 flex aspect-[4/5] items-end border border-brand-border bg-brand-card p-5">
            <span class="font-display text-4xl font-semibold text-brand-accent/40">
                {{ strtoupper(substr($name, 0, 1)) }}
            </span>
        </div>
    @endif

    <h3 class="font-display text-lg font-semibold text-brand-heading">{{ $name }}</h3>
    @if($role)
        <p class="mt-1 font-mono text-[0.6875rem] uppercase tracking-[0.12em] text-brand-accent">{{ $role }}</p>
    @endif
    @if($bio)
        <p class="mt-3 text-sm leading-relaxed text-brand-muted">{{ $bio }}</p>
    @endif
</article>
