@props(['title', 'description', 'icon' => 'briefcase', 'image' => null, 'imageAlt' => null])

<article {{ $attributes->merge(['class' => 'group']) }}>
    @if($image)
        <div class="media-frame aspect-[4/3] border border-brand-border">
            <img
                src="{{ $image }}"
                alt="{{ $imageAlt ?? $title }}"
                loading="lazy"
                decoding="async"
                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-[1.02]"
            />
        </div>
    @endif
    <h3 class="mt-4 font-display text-sm font-semibold text-brand-heading">{{ $title }}</h3>
    <p class="mt-1.5 line-clamp-2 text-xs leading-relaxed text-brand-muted">{{ $description }}</p>
</article>
