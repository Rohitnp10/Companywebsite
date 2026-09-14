@props([
    'src',
    'alt' => '',
    'badge' => null,
    'floatIcons' => [],
])

<div {{ $attributes->merge(['class' => 'group/media relative']) }}>
    <div class="relative overflow-hidden rounded-2xl border border-brand-border bg-brand-card shadow-soft-lg">
        <img
            src="{{ $src }}"
            alt="{{ $alt }}"
            loading="lazy"
            decoding="async"
            class="aspect-[4/3] w-full object-cover transition-transform duration-700 ease-out group-hover/media:scale-[1.03]"
        />
        <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-brand-primary/35 via-transparent to-transparent"></div>

        @if($badge)
            <span class="absolute bottom-4 left-4 inline-flex items-center gap-2 rounded-lg border border-white/15 bg-brand-primary/75 px-3 py-1.5 text-xs font-semibold text-white backdrop-blur-md backdrop-saturate-150">
                <span class="demo-live-dot h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                {{ $badge }}
            </span>
        @endif
    </div>

    @foreach($floatIcons as $i => $icon)
        <div
            class="absolute z-10 hidden sm:block {{ $i === 0 ? '-left-4 top-8' : ($i === 1 ? '-right-3 top-1/3' : 'bottom-10 -left-2') }}"
            data-reveal
            data-reveal-delay="{{ 120 + ($i * 90) }}"
        >
            <div class="icon-float glass rounded-xl p-2.5" style="animation-delay: {{ $i * 0.4 }}s;">
                <x-icons.illustration :name="$icon" size="sm" animated />
            </div>
        </div>
    @endforeach
</div>
