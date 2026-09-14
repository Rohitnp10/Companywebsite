@props(['title', 'description', 'icon' => 'briefcase', 'image' => null, 'imageAlt' => null])

<div {{ $attributes->merge(['class' => 'group flex h-full flex-col overflow-hidden rounded-2xl border border-brand-border bg-brand-card transition-all duration-300 hover:-translate-y-1 hover:border-brand-accent/40 hover:shadow-soft-lg']) }}>
    @if($image)
        <div class="aspect-[4/3] w-full overflow-hidden">
            <img
                src="{{ $image }}"
                alt="{{ $imageAlt ?? $title }}"
                loading="lazy"
                decoding="async"
                class="h-full w-full object-cover transition-transform duration-500 ease-out group-hover:scale-105"
            />
        </div>
    @else
        <div class="pt-5">
            <x-icons.illustration :name="$icon" size="sm" class="ml-5 group-hover:-translate-y-0.5" />
        </div>
    @endif

    <div class="flex flex-1 flex-col p-5 pt-4">
        <h3 class="text-sm font-semibold text-brand-heading">{{ $title }}</h3>
        <p class="mt-1.5 line-clamp-2 text-xs leading-relaxed text-brand-muted">{{ $description }}</p>
    </div>
</div>
