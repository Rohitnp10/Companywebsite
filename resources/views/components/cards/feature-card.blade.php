@props(['title', 'description', 'icon' => 'target', 'image' => null, 'imageAlt' => null])

<div {{ $attributes->merge(['class' => 'group rounded-2xl border border-brand-border bg-brand-card p-6 transition-all duration-300 hover:-translate-y-1 hover:bg-brand-card-hover hover:shadow-soft']) }}>
    @if($image)
        <div class="h-11 w-11 overflow-hidden rounded-xl transition-transform duration-300 group-hover:-translate-y-0.5">
            <img
                src="{{ $image }}"
                alt="{{ $imageAlt ?? $title }}"
                loading="lazy"
                decoding="async"
                class="h-full w-full object-cover"
            />
        </div>
    @else
        <x-icons.illustration :name="$icon" size="sm" class="group-hover:-translate-y-0.5" />
    @endif
    <h3 class="mt-4 text-base font-semibold text-brand-heading">{{ $title }}</h3>
    <p class="mt-2 text-sm leading-relaxed text-brand-muted">{{ $description }}</p>
</div>
