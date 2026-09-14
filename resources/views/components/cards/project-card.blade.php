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

<article {{ $attributes->merge(['class' => 'group flex h-full flex-col overflow-hidden rounded-2xl border bg-brand-card transition-all duration-300 hover:-translate-y-1 hover:shadow-soft-lg ' . ($featured ? 'border-brand-accent/35 ring-1 ring-brand-accent/10' : 'border-brand-border hover:border-brand-accent/30')]) }}>
    <div class="relative flex h-48 items-center justify-center overflow-hidden bg-brand-primary">
        @if($image)
            <img
                src="{{ str_starts_with($image, 'http') ? $image : asset($image) }}"
                alt="{{ $title }}"
                loading="lazy"
                class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-[1.03]"
            />
            <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-brand-primary/50 via-transparent to-transparent"></div>
        @else
            <div class="absolute inset-0 bg-gradient-to-br from-brand-accent/20 via-brand-primary to-brand-primary"></div>
            <div class="relative flex h-16 w-16 items-center justify-center rounded-2xl border border-white/10 bg-white/5 backdrop-blur-sm">
                <x-icons.icon :name="$icon" class="h-7 w-7 text-brand-accent" />
            </div>
        @endif

        @if($subtitle)
            <span class="absolute left-4 top-4 rounded-full border border-white/15 bg-brand-primary/70 px-2.5 py-1 text-[11px] font-semibold text-white backdrop-blur-sm">
                {{ $subtitle }}
            </span>
        @endif
    </div>

    <div class="flex flex-1 flex-col p-6">
        @if($category)
            <span class="text-xs font-semibold uppercase tracking-widest text-brand-accent">{{ $category }}</span>
        @endif
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
