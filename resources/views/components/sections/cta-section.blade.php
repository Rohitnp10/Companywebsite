@props(['title', 'button'])

<section class="relative overflow-hidden border-t border-brand-border bg-brand-surface">
    {{-- subtle grid texture --}}
    <div class="absolute inset-0 text-brand-heading opacity-[0.06]" aria-hidden="true">
        <svg class="h-full w-full" preserveAspectRatio="none" viewBox="0 0 800 400" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="cta-grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M40 0H0V40" fill="none" stroke="currentColor" stroke-width="0.5" />
                </pattern>
            </defs>
            <rect width="800" height="400" fill="url(#cta-grid)" />
        </svg>
    </div>

    {{-- soft Royal Blue glow behind the heading --}}
    <div class="pointer-events-none absolute left-1/2 top-0 h-64 w-[36rem] -translate-x-1/2 -translate-y-1/3 rounded-full bg-brand-accent/20 blur-3xl" aria-hidden="true"></div>

    <div class="relative mx-auto max-w-4xl px-6 py-20 text-center lg:px-8" data-reveal data-reveal-fade>
        <h2 class="text-3xl font-extrabold text-brand-heading sm:text-4xl">{{ $title }}</h2>
        <div class="mt-8 flex justify-center">
            <x-buttons.primary :route="$button['route']">
                {{ $button['label'] }}
            </x-buttons.primary>
        </div>
    </div>
</section>
