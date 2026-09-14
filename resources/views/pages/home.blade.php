<x-layouts.app :seo="$seo">

    {{-- HERO: full-bleed visual plane, brand-first --}}
    <section class="relative isolate -mt-[4.75rem] min-h-[100svh] overflow-hidden pt-[4.75rem]">
        <img
            src="{{ $hero['image'] }}"
            alt="{{ $hero['image_alt'] }}"
            class="absolute inset-0 h-full w-full object-cover"
            fetchpriority="high"
        />
        <div class="absolute inset-0 bg-gradient-to-r from-brand-primary via-brand-primary/88 to-brand-primary/55"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-brand-primary/70 via-transparent to-brand-primary/30"></div>

        {{-- very subtle atmospheric Royal Blue glow — barely visible, purely decorative depth --}}
        <div class="atmosphere-glow pointer-events-none absolute inset-0" aria-hidden="true"></div>

        {{-- subtle atmospheric grid --}}
        <div class="pointer-events-none absolute inset-0 opacity-[0.07]" aria-hidden="true">
            <svg class="h-full w-full" preserveAspectRatio="none">
                <defs>
                    <pattern id="hero-grid" width="48" height="48" patternUnits="userSpaceOnUse">
                        <path d="M48 0H0V48" fill="none" stroke="white" stroke-width="0.6" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#hero-grid)" />
            </svg>
        </div>

        <div class="relative mx-auto flex min-h-[calc(100svh-4.75rem)] max-w-7xl items-center px-6 py-20 lg:px-8 lg:py-24">
            <div class="max-w-3xl">
                <p class="page-enter text-5xl font-extrabold tracking-tight text-white sm:text-6xl lg:text-7xl">
                    {{ $hero['brand'] }}<span class="text-brand-accent">.</span>
                </p>
                <span class="eyebrow page-enter page-enter-delay-1 mt-6 text-brand-accent">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                    {{ $hero['eyebrow'] }}
                </span>
                <h1 class="page-enter page-enter-delay-1 mt-4 text-3xl font-bold leading-tight tracking-tight text-white sm:text-4xl lg:text-5xl">
                    {!! str_replace('Digital Solutions', '<span class="text-brand-accent">Digital Solutions</span>', e($hero['title'])) !!}
                </h1>
                <p class="page-enter page-enter-delay-2 mt-6 max-w-xl text-base leading-relaxed text-white/75 sm:text-lg">
                    {{ $hero['description'] }}
                </p>

                <div class="page-enter page-enter-delay-3 mt-10 flex flex-col gap-4 sm:flex-row">
                    <x-buttons.primary :route="$hero['primary_button']['route']">
                        {{ $hero['primary_button']['label'] }}
                    </x-buttons.primary>
                    <a
                        href="{{ route($hero['secondary_button']['route']) }}"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-white/25 bg-white/5 px-6 py-3.5 text-sm font-semibold text-white backdrop-blur-sm transition-all duration-200 hover:border-brand-accent hover:bg-brand-accent/10 hover:text-brand-accent"
                    >
                        {{ $hero['secondary_button']['label'] }}
                    </a>
                </div>
            </div>
        </div>

        {{-- soft bottom fade into next section --}}
        <div class="pointer-events-none absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-brand-bg to-transparent"></div>
    </section>

    {{-- PILLARS --}}
    <section class="relative z-10 -mt-10 bg-transparent">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 overflow-hidden rounded-2xl border border-brand-border bg-brand-card shadow-soft-lg sm:grid-cols-3">
                @foreach($pillars as $i => $pillar)
                    <div
                        data-reveal
                        data-reveal-delay="{{ $i * 90 }}"
                        class="group flex items-start gap-4 border-brand-border p-6 sm:border-r sm:last:border-r-0"
                    >
                        <div class="h-11 w-11 shrink-0 overflow-hidden rounded-xl">
                            <img
                                src="{{ $pillar['image'] }}"
                                alt="{{ $pillar['image_alt'] }}"
                                loading="lazy"
                                decoding="async"
                                class="h-full w-full object-cover"
                            />
                        </div>
                        <div>
                            <h2 class="text-base font-semibold text-brand-heading">{{ $pillar['title'] }}</h2>
                            <p class="mt-1 text-sm leading-relaxed text-brand-muted">{{ $pillar['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ABOUT PREVIEW --}}
    <section class="bg-brand-bg">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8 lg:py-28">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2 lg:gap-16">
                <div data-reveal data-reveal-scale>
                    <x-sections.media-panel
                        :src="$aboutPreview['image']"
                        :alt="$aboutPreview['image_alt']"
                        badge="Long-term technology partner"
                        :float-icons="$aboutPreview['float_icons']"
                    />
                </div>

                <div data-reveal data-reveal-delay="100">
                    <x-sections.section-heading
                        :eyebrow="$aboutPreview['eyebrow']"
                        :title="$aboutPreview['title']"
                        :description="$aboutPreview['body']"
                    />
                    <div class="mt-8">
                        <x-buttons.secondary :route="$aboutPreview['button']['route']">
                            {{ $aboutPreview['button']['label'] }}
                        </x-buttons.secondary>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SERVICES --}}
    <section class="border-t border-brand-border bg-brand-surface">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div data-reveal>
                <x-sections.section-heading
                    eyebrow="What We Do"
                    title="Services Built Around Your Goals"
                    description="From custom software to ongoing support, we cover the full lifecycle of building and maintaining business technology."
                    align="center"
                />
            </div>

            <div class="mt-14 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($services as $i => $service)
                    <div data-reveal data-reveal-delay="{{ min($i, 5) * 80 }}">
                        <x-cards.service-card
                            :title="$service['title']"
                            :description="$service['short_description']"
                            :icon="$service['icon']"
                            :image="$service['image'] ?? null"
                            :image-alt="$service['image_alt'] ?? null"
                        />
                    </div>
                @endforeach
            </div>

            <div class="mt-12 flex justify-center" data-reveal>
                <x-buttons.secondary route="services">View All Services</x-buttons.secondary>
            </div>
        </div>
    </section>

    {{-- OUR PRODUCTS --}}
    <section class="bg-brand-bg">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div data-reveal>
                <x-sections.section-heading
                    eyebrow="Our Products"
                    title="Software We Build & Ship"
                    description="Restaurant Management System is live and running today. Hotel and Dental Management Systems are next."
                    align="center"
                />
            </div>

            <div class="mt-14 grid grid-cols-1 gap-6 md:grid-cols-3">
                @foreach($solutions as $i => $solution)
                    <div data-reveal data-reveal-delay="{{ $i * 100 }}" class="{{ $solution['status'] === 'ready' ? 'md:-mt-4' : '' }}">
                        <x-cards.product-card
                            :title="$solution['title']"
                            :category="$solution['category']"
                            :status="$solution['status']"
                            :description="$solution['short_description']"
                            :icon="$solution['icon']"
                            :image="$solution['image']"
                            :image-alt="$solution['image_alt']"
                            :featured="$solution['status'] === 'ready'"
                        />
                    </div>
                @endforeach
            </div>

            <div class="mt-12 flex justify-center" data-reveal>
                <x-buttons.secondary route="solutions">Explore All Products</x-buttons.secondary>
            </div>
        </div>
    </section>

    {{-- RESTAURANT MANAGEMENT SYSTEM SHOWCASE --}}
    <section class="border-t border-brand-border bg-brand-surface">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2 lg:gap-16">
                <div data-reveal>
                    <span class="eyebrow">
                        <span class="demo-live-dot h-1.5 w-1.5 rounded-full bg-brand-success"></span>
                        {{ $productShowcase['eyebrow'] }}
                    </span>
                    <h2 class="h-section mt-4">{{ $productShowcase['title'] }}</h2>
                    <p class="text-body mt-4">{{ $productShowcase['body'] }}</p>

                    <ul class="mt-6 space-y-3">
                        @foreach($productShowcase['capabilities'] as $capability)
                            <li class="flex items-start gap-2.5 text-sm text-brand-text" data-reveal data-reveal-delay="{{ $loop->index * 60 }}">
                                <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-brand-accent/15">
                                    <x-icons.icon name="check" class="h-3 w-3 text-brand-accent" />
                                </span>
                                <span>{{ $capability }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-8">
                        <x-buttons.primary route="solutions">See Full Product Details</x-buttons.primary>
                    </div>
                </div>

                <div class="space-y-5">
                    <div data-reveal data-reveal-scale data-reveal-delay="80" class="relative">
                        <div class="overflow-hidden rounded-2xl border border-brand-border shadow-soft-lg">
                            <img
                                src="{{ $productShowcase['image'] }}"
                                alt="{{ $productShowcase['image_alt'] }}"
                                loading="lazy"
                                class="aspect-[21/9] w-full object-cover"
                            />
                        </div>
                    </div>
                    <div data-reveal data-reveal-scale data-reveal-delay="140">
                        <x-sections.product-demo />
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- WEB + MOBILE --}}
    <section class="bg-brand-bg">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div data-reveal>
                <x-sections.section-heading
                    :eyebrow="$devices['eyebrow']"
                    :title="$devices['title']"
                    :description="$devices['description']"
                    align="center"
                />
            </div>

            <div class="mt-14 grid grid-cols-1 items-center gap-10 lg:grid-cols-2 lg:gap-14">
                <div data-reveal data-reveal-scale>
                    <x-sections.media-panel
                        :src="$devices['image']"
                        :alt="$devices['image_alt']"
                        badge="One product, every screen"
                    />
                </div>
                <div data-reveal data-reveal-delay="100">
                    <x-sections.device-mockups />
                </div>
            </div>
        </div>
    </section>

    {{-- INDUSTRIES --}}
    <section class="border-t border-brand-border bg-brand-surface">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div data-reveal>
                <x-sections.section-heading
                    eyebrow="Industries"
                    title="Built for Businesses Across Industries"
                    description="We design solutions adaptable to a range of operational environments."
                    align="center"
                />
            </div>

            <div class="mt-14 grid grid-cols-2 gap-5 sm:grid-cols-3 lg:grid-cols-5">
                @foreach($industries as $i => $industry)
                    <div data-reveal data-reveal-delay="{{ min($i, 6) * 60 }}">
                        <x-cards.industry-card
                            :title="$industry['title']"
                            :description="$industry['description']"
                            :icon="$industry['icon']"
                            :image="$industry['image'] ?? null"
                            :image-alt="$industry['image_alt'] ?? null"
                        />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- WHY SOFTRIX --}}
    <section class="bg-brand-bg">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div data-reveal>
                <x-sections.section-heading
                    :eyebrow="$whySoftrix['eyebrow']"
                    :title="$whySoftrix['title']"
                    align="center"
                />
            </div>

            <div class="mt-14 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($whySoftrix['items'] as $i => $item)
                    <div data-reveal data-reveal-delay="{{ $i * 80 }}">
                        <x-cards.feature-card
                            :title="$item['title']"
                            :description="$item['description']"
                            :icon="$item['icon']"
                            :image="$item['image']"
                            :image-alt="$item['image_alt']"
                        />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <x-sections.cta-section :title="$cta['title']" :button="$cta['button']" />

</x-layouts.app>
