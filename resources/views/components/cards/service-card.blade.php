@props(['title', 'description', 'icon' => 'code', 'features' => [], 'image' => null, 'imageAlt' => null])

<article {{ $attributes->merge(['class' => 'group flex h-full flex-col border-b border-brand-border pb-8 sm:border-b-0 sm:pb-0']) }}>
    @if($image)
        <div class="media-frame mb-5 aspect-[16/10] border border-brand-border">
            <img
                src="{{ $image }}"
                alt="{{ $imageAlt ?? $title }}"
                loading="lazy"
                decoding="async"
                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-[1.02]"
            />
        </div>
    @else
        <div class="mb-4 text-brand-accent">
            <x-icons.illustration :name="$icon" size="sm" />
        </div>
    @endif

    <h3 class="font-display text-lg font-semibold tracking-[-0.015em] text-brand-heading">{{ $title }}</h3>
    <p class="mt-2 text-sm leading-relaxed text-brand-muted">{{ $description }}</p>

    @if(count($features))
        <ul class="mt-5 space-y-2 border-t border-brand-border pt-5">
            @foreach($features as $feature)
                <li class="flex items-start gap-2.5 text-sm leading-relaxed text-brand-text">
                    <x-icons.icon name="check" class="mt-0.5 h-4 w-4 shrink-0 text-brand-accent" />
                    <span>{{ $feature }}</span>
                </li>
            @endforeach
        </ul>
    @endif
</article>
