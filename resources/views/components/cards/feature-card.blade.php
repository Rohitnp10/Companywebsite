@props(['title', 'description', 'icon' => 'target', 'image' => null, 'imageAlt' => null])

<article {{ $attributes->merge(['class' => 'border-t border-brand-border pt-6']) }}>
    @if($image)
        <div class="mb-4 h-10 w-10 overflow-hidden rounded-[var(--radius-md)]">
            <img
                src="{{ $image }}"
                alt="{{ $imageAlt ?? $title }}"
                loading="lazy"
                decoding="async"
                class="h-full w-full object-cover"
            />
        </div>
    @else
        <div class="mb-4 text-brand-accent">
            <x-icons.illustration :name="$icon" size="sm" />
        </div>
    @endif
    <h3 class="font-display text-base font-semibold text-brand-heading">{{ $title }}</h3>
    <p class="mt-2 text-sm leading-relaxed text-brand-muted">{{ $description }}</p>
</article>
