@props([
    'title',
    'subtitle' => null,
    'category' => null,
    'description',
    'features' => [],
    'image' => null,
    'icon' => 'layout-grid',
    'featured' => false,
])

<article {{ $attributes->merge(['class' => 'group flex h-full flex-col']) }}>
    <div class="relative media-frame aspect-[16/10] border border-brand-border bg-brand-primary">
        @if($image)
            <img
                src="{{ str_starts_with($image, 'http') ? $image : asset($image) }}"
                alt="{{ $title }}"
                loading="lazy"
                class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
            />
        @else
            <div class="flex h-full items-center justify-center">
                <x-icons.icon :name="$icon" class="h-8 w-8 text-brand-accent" />
            </div>
        @endif
    </div>

    <div class="flex flex-1 flex-col pt-5">
        <div class="flex flex-wrap items-center gap-2">
            @if($category)
                <span class="font-mono text-[0.625rem] uppercase tracking-[0.14em] text-brand-accent">{{ $category }}</span>
            @endif
            @if($subtitle)
                <span class="font-mono text-[0.625rem] uppercase tracking-[0.12em] text-brand-muted">{{ $subtitle }}</span>
            @endif
        </div>
        <h3 class="h-subsection mt-2">{{ $title }}</h3>
        <p class="text-small mt-2 flex-1">{{ $description }}</p>

        @if(count($features))
            <ul class="mt-5 space-y-2 border-t border-brand-border pt-5">
                @foreach($features as $feature)
                    <li class="flex items-start gap-2 text-sm text-brand-muted">
                        <x-icons.icon name="check" class="mt-0.5 h-4 w-4 shrink-0 text-brand-accent" />
                        <span>{{ $feature }}</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</article>
