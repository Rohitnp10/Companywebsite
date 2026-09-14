@props(['title', 'category' => null, 'status' => null, 'description', 'icon' => 'layout-grid', 'capabilities' => [], 'featured' => false, 'image' => null, 'imageAlt' => null])

<div {{ $attributes->merge(['class' => 'flex flex-col rounded-2xl p-7 transition-all duration-300 hover:-translate-y-1 ' . ($featured ? 'glass-accent' : 'border border-brand-border bg-brand-card hover:bg-brand-card-hover hover:shadow-soft-lg')]) }}>
    <div class="flex items-start justify-between gap-3">
        @if($image)
            <div class="h-14 w-14 shrink-0 overflow-hidden rounded-2xl">
                <img
                    src="{{ $image }}"
                    alt="{{ $imageAlt ?? $title }}"
                    loading="lazy"
                    decoding="async"
                    class="h-full w-full object-cover"
                />
            </div>
        @else
            <x-icons.illustration :name="$icon" />
        @endif
        <div class="flex flex-col items-end gap-1.5">
            @if($status === 'ready')
                <span class="inline-flex items-center gap-1.5 rounded-full bg-brand-success/10 px-2.5 py-1 text-[11px] font-semibold text-brand-success">
                    <span class="demo-live-dot h-1.5 w-1.5 rounded-full bg-brand-success"></span>
                    Ready
                </span>
            @elseif($status === 'in_development')
                <span class="inline-flex items-center gap-1.5 rounded-full bg-brand-warning/10 px-2.5 py-1 text-[11px] font-semibold text-brand-warning">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-warning"></span>
                    In Development
                </span>
            @endif
            @if($category)
                <span class="rounded-full bg-brand-surface px-2.5 py-1 text-[11px] font-semibold text-brand-muted">{{ $category }}</span>
            @endif
        </div>
    </div>

    <h3 class="mt-5 text-lg font-semibold tracking-tight text-brand-heading sm:text-xl">{{ $title }}</h3>
    <p class="mt-2.5 flex-1 text-sm leading-[1.65] text-brand-muted">{{ $description }}</p>

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
</div>
