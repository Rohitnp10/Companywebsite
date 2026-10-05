@props(['title', 'button', 'secondary' => null, 'description' => null])

<section class="brand-stage relative isolate overflow-hidden border-t border-brand-border">
    <div class="brand-stage-glow" aria-hidden="true"></div>
    <div class="relative site-container section-pad" data-reveal data-reveal-fade>
        <div class="flex flex-col items-start justify-between gap-8 lg:flex-row lg:items-end">
            <div class="max-w-2xl">
                <h2 class="font-display text-2xl font-semibold tracking-[-0.02em] text-brand-heading sm:text-3xl lg:text-4xl">
                    {{ $title }}
                </h2>
                @if($description)
                    <p class="mt-4 max-w-xl text-base leading-relaxed text-brand-muted">{{ $description }}</p>
                @endif
            </div>
            <div class="flex flex-col gap-3 sm:flex-row">
                <a
                    href="{{ route($button['route']) }}"
                    class="btn-brand group inline-flex shrink-0 items-center justify-center gap-2 rounded-[var(--radius-md)] px-5 py-3 text-sm font-semibold text-white transition duration-200"
                >
                    {{ $button['label'] }}
                    <x-icons.icon name="arrow-right" class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-0.5" />
                </a>
                @if($secondary)
                    <a
                        href="{{ route($secondary['route']) }}"
                        class="btn-ghost"
                    >
                        {{ $secondary['label'] }}
                    </a>
                @endif
            </div>
        </div>
    </div>
</section>
