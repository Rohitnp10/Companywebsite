@props(['title', 'button'])

<section class="relative overflow-hidden bg-brand-primary">
    <div class="absolute inset-0 opacity-20" aria-hidden="true">
        <svg class="h-full w-full" preserveAspectRatio="none" viewBox="0 0 800 400" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="cta-grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M40 0H0V40" fill="none" stroke="white" stroke-width="0.5" />
                </pattern>
            </defs>
            <rect width="800" height="400" fill="url(#cta-grid)" />
        </svg>
    </div>

    <div class="relative mx-auto max-w-4xl px-6 py-20 text-center lg:px-8 animate-fadeIn">
        <h2 class="text-3xl font-extrabold text-white sm:text-4xl">{{ $title }}</h2>
        <div class="mt-8 flex justify-center">
            <x-buttons.primary :route="$button['route']" class="!bg-white !text-brand-primary hover:!bg-brand-surface">
                {{ $button['label'] }}
            </x-buttons.primary>
        </div>
    </div>
</section>
