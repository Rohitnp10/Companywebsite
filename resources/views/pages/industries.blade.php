<x-layouts.app :seo="$seo">

    {{-- HERO --}}
    <section class="relative overflow-hidden border-b border-brand-border bg-brand-surface">
        <div class="pointer-events-none absolute inset-0 opacity-[0.04]" aria-hidden="true">
            <svg class="h-full w-full" preserveAspectRatio="none">
                <defs>
                    <pattern id="industries-hero-grid" width="48" height="48" patternUnits="userSpaceOnUse">
                        <path d="M48 0H0V48" fill="none" stroke="currentColor" stroke-width="0.6" class="text-brand-heading" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#industries-hero-grid)" />
            </svg>
        </div>
        <div class="pointer-events-none absolute -left-16 top-8 h-64 w-64 rounded-full bg-brand-accent/10 blur-3xl" aria-hidden="true"></div>

        <div class="relative mx-auto max-w-7xl px-6 py-20 lg:px-8 lg:py-28">
            <div class="mx-auto max-w-3xl text-center">
                <span class="eyebrow page-enter justify-center">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                    {{ $page['eyebrow'] }}
                </span>
                <h1 class="h-page page-enter page-enter-delay-1 mt-5">{{ $page['title'] }}</h1>
                <p class="text-body page-enter page-enter-delay-2 mx-auto mt-6 max-w-2xl text-base sm:text-lg">
                    {{ $page['description'] }}
                </p>
                <div class="page-enter page-enter-delay-3 mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
                    <x-buttons.primary :route="$page['primary_button']['route']">
                        {{ $page['primary_button']['label'] }}
                    </x-buttons.primary>
                    <x-buttons.secondary :route="$page['secondary_button']['route']">
                        {{ $page['secondary_button']['label'] }}
                    </x-buttons.secondary>
                </div>
            </div>
        </div>
    </section>

    {{-- FOCUS INDUSTRIES --}}
    <section class="bg-brand-bg">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div data-reveal>
                <x-sections.section-heading
                    :eyebrow="$focus['eyebrow']"
                    :title="$focus['title']"
                    :description="$focus['description']"
                    align="center"
                />
            </div>

            <div class="mt-14 grid grid-cols-1 gap-6 lg:grid-cols-2" data-reveal-stagger="100">
                @foreach($focus['items'] as $item)
                    <article class="relative overflow-hidden rounded-2xl border border-brand-border bg-brand-card p-8 transition-all duration-300 hover:-translate-y-1 hover:border-brand-accent/35 hover:shadow-soft-lg lg:p-10">
                        <div class="absolute -right-10 -top-10 h-36 w-36 rounded-full bg-brand-accent/10 blur-2xl" aria-hidden="true"></div>
                        @if($item['image'] ?? null)
                            <div class="relative h-16 w-16 overflow-hidden rounded-2xl">
                                <img
                                    src="{{ $item['image'] }}"
                                    alt="{{ $item['image_alt'] ?? $item['title'] }}"
                                    loading="lazy"
                                    decoding="async"
                                    class="h-full w-full object-cover"
                                />
                            </div>
                        @else
                            <x-icons.illustration :name="$item['icon']" size="lg" />
                        @endif
                        <h3 class="h-subsection mt-6">{{ $item['title'] }}</h3>
                        <p class="text-small mt-3">{{ $item['description'] }}</p>
                        <a
                            href="{{ route($item['product_route']) }}"
                            class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-brand-accent transition-colors hover:text-brand-accent-hover"
                        >
                            {{ $item['product'] }}
                            <x-icons.icon name="arrow-right" class="h-4 w-4" />
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ALL INDUSTRIES --}}
    <section class="border-t border-brand-border bg-brand-surface">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div data-reveal>
                <x-sections.section-heading
                    eyebrow="Where We Work"
                    title="Industries and business types we support"
                    description="From hospitality floors to enterprise operations — adaptable software shaped around how each environment actually runs."
                    align="center"
                />
            </div>

            <div class="mt-14 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3" data-reveal-stagger="60">
                @foreach($industries as $industry)
                    <x-cards.industry-card
                        :title="$industry['title']"
                        :description="$industry['description']"
                        :icon="$industry['icon']"
                        :image="$industry['image'] ?? null"
                        :image-alt="$industry['image_alt'] ?? null"
                    />
                @endforeach
            </div>
        </div>
    </section>

    {{-- APPROACH --}}
    <section class="bg-brand-bg">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8 lg:py-28">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2 lg:gap-16">
                <div data-reveal data-reveal-left>
                    <x-sections.section-heading
                        :eyebrow="$approach['eyebrow']"
                        :title="$approach['title']"
                        :description="$approach['body']"
                    />

                    <ul class="mt-8 space-y-3" data-reveal-stagger="60">
                        @foreach($approach['points'] as $point)
                            <li class="flex items-start gap-3 text-sm text-brand-text">
                                <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-brand-accent/15">
                                    <x-icons.icon name="check" class="h-3 w-3 text-brand-accent" />
                                </span>
                                <span>{{ $point }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-9">
                        <x-buttons.secondary route="services">Explore Services</x-buttons.secondary>
                    </div>
                </div>

                <div data-reveal data-reveal-scale data-reveal-delay="100">
                    <x-sections.media-panel
                        :src="$approach['image']"
                        :alt="$approach['image_alt']"
                        badge="Industry-aware by design"
                        :float-icons="['utensils', 'heart-pulse', 'briefcase']"
                    />
                </div>
            </div>
        </div>
    </section>

    <x-sections.cta-section :title="$cta['title']" :button="$cta['button']" />

</x-layouts.app>
