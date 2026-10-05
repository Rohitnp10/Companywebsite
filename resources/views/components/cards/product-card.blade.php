@props(['title', 'category' => null, 'status' => null, 'description', 'icon' => 'layout-grid', 'capabilities' => [], 'featured' => false, 'image' => null, 'imageAlt' => null])

<article {{ $attributes->merge(['class' => 'flex h-full flex-col overflow-hidden rounded-[var(--radius-lg)] border bg-brand-card ' . ($featured ? 'border-brand-accent/40' : 'border-brand-border')]) }}>
    @if($image)
        <img
            src="{{ $image }}"
            alt="{{ $imageAlt ?? $title }}"
            loading="lazy"
            decoding="async"
            class="aspect-[16/10] w-full object-cover object-center"
        />
    @endif
    <div class="flex flex-1 flex-col p-6">
    <div class="flex items-start justify-between gap-3">
        @unless($image)
            <x-icons.illustration :name="$icon" size="sm" />
        @endunless

        <div class="ml-auto flex flex-col items-end gap-1.5">
            @if($status === 'ready')
                <span class="status-pill status-pill-ready">
                    <span class="demo-live-dot h-1 w-1 rounded-full bg-brand-accent"></span>
                    Ready
                </span>
            @elseif($status === 'in_development')
                <span class="status-pill status-pill-dev">In Development</span>
            @endif
            @if($category)
                <span class="text-xs text-brand-muted">{{ $category }}</span>
            @endif
        </div>
    </div>

    <h3 class="mt-5 font-display text-lg font-semibold tracking-[-0.015em] text-brand-heading sm:text-xl">{{ $title }}</h3>
    <p class="mt-2.5 flex-1 text-sm leading-relaxed text-brand-muted">{{ $description }}</p>

    @if(count($capabilities))
        <ul class="mt-5 space-y-2.5 border-t border-brand-border pt-5">
            @foreach($capabilities as $capability)
                <li class="flex items-start gap-2.5 text-sm leading-relaxed text-brand-text">
                    <x-icons.icon name="check" class="mt-0.5 h-4 w-4 shrink-0 text-brand-accent" />
                    <span>{{ $capability }}</span>
                </li>
            @endforeach
        </ul>
    @endif

    @if($status === 'ready')
        <a href="{{ route('solutions') }}" class="mt-6 inline-flex items-center gap-1.5 text-sm font-semibold text-brand-accent">
            Explore Product
            <x-icons.icon name="arrow-right" class="h-4 w-4" />
        </a>
    @elseif($status === 'in_development')
        <p class="mt-6 text-sm font-medium text-brand-muted">In development</p>
    @endif
    </div>
</article>
