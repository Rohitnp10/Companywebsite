@props(['eyebrow' => null, 'title', 'description' => null])

<section class="brand-stage relative isolate overflow-hidden">
    <div class="brand-stage-glow" aria-hidden="true"></div>
    <div class="relative site-container py-16 sm:py-20 lg:py-24">
        <div class="max-w-3xl">
            @if($eyebrow)
                <p class="stage-kicker page-enter">
                    {{ $eyebrow }}
                </p>
            @endif
            <h1 class="page-enter page-enter-delay-1 font-display text-[1.75rem] font-semibold leading-[1.2] tracking-[-0.02em] text-brand-heading sm:text-4xl lg:text-[2.75rem] {{ $eyebrow ? 'mt-4' : '' }}">
                {{ $title }}
            </h1>
            @if($description)
                <p class="page-enter page-enter-delay-2 mt-5 max-w-2xl text-base leading-relaxed text-brand-muted sm:text-lg">
                    {{ $description }}
                </p>
            @endif
            @if (! $slot->isEmpty())
                <div class="page-enter page-enter-delay-3 mt-8 flex flex-col gap-3 sm:flex-row sm:gap-4">
                    {{ $slot }}
                </div>
            @endif
        </div>
    </div>
</section>
