<x-layouts.app :seo="$seo">

    <section class="brand-stage relative isolate overflow-hidden">
        <div class="brand-stage-glow" aria-hidden="true"></div>
        <div class="relative site-container grid items-center gap-12 py-16 sm:py-20 lg:grid-cols-12 lg:gap-10 lg:py-24">
            <div class="lg:col-span-6">
                <p class="stage-kicker page-enter">
                    {{ $hero['eyebrow'] }}
                </p>
                <h1 class="page-enter page-enter-delay-1 mt-4 max-w-xl font-display text-[1.75rem] font-semibold leading-[1.2] tracking-[-0.02em] text-brand-heading sm:text-4xl lg:text-[2.75rem]">
                    {{ $hero['title'] }}
                </h1>
                <p class="page-enter page-enter-delay-2 mt-5 max-w-xl text-base leading-relaxed text-brand-muted sm:text-lg">
                    {{ $hero['description'] }}
                </p>
                <div class="page-enter page-enter-delay-3 mt-8 flex flex-col gap-3 sm:flex-row sm:gap-4">
                    <x-buttons.primary :route="$hero['primary_button']['route']">
                        {{ $hero['primary_button']['label'] }}
                    </x-buttons.primary>
                    <a
                        href="{{ route($hero['secondary_button']['route']) }}"
                        class="btn-ghost"
                    >
                        {{ $hero['secondary_button']['label'] }}
                    </a>
                </div>
            </div>

            <div class="min-w-0 lg:col-span-6">
                <x-sections.product-demo />
            </div>
        </div>
    </section>

    {{-- PILLARS — rule strip, not cards --}}
    <section class="border-b border-brand-border bg-brand-surface">
        <div class="site-container">
            <div class="grid grid-cols-1 divide-y divide-brand-border sm:grid-cols-3 sm:divide-x sm:divide-y-0">
                @foreach($pillars as $i => $pillar)
                    <div data-reveal data-reveal-delay="{{ $i * 80 }}" class="flex gap-4 py-8 sm:px-8 sm:first:pl-0 sm:last:pr-0">
                        <span class="font-mono text-[0.6875rem] text-brand-accent">0{{ $i + 1 }}</span>
                        <div>
                            <h2 class="font-display text-base font-semibold text-brand-heading">{{ $pillar['title'] }}</h2>
                            <p class="mt-1.5 text-sm leading-relaxed text-brand-muted">{{ $pillar['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ABOUT PREVIEW --}}
    <section class="bg-brand-bg">
        <div class="site-container section-pad">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-12 lg:gap-16">
                <div class="lg:col-span-5" data-reveal>
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
                <div class="min-w-0 lg:col-span-7" data-reveal data-reveal-delay="80">
                    <x-sections.media-panel
                        :src="$aboutPreview['image']"
                        :alt="$aboutPreview['image_alt']"
                    />
                </div>
            </div>
        </div>
    </section>

    {{-- SERVICES — numbered index --}}
    <section class="border-t border-brand-border bg-brand-surface">
        <div class="site-container section-pad">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-16">
                <div class="lg:col-span-4" data-reveal>
                    <x-sections.section-heading
                    eyebrow="What We Build"
                    title="Software for how businesses operate"
                    description="Business systems, web and mobile applications, and the interfaces teams use every day."
                    />
                    <div class="mt-8">
                        <x-buttons.secondary route="services">View All Services</x-buttons.secondary>
                    </div>
                </div>

                <div class="lg:col-span-8" data-reveal-stagger="60">
                    <ul class="border-t border-brand-border">
                        @foreach($services as $i => $service)
                            <li class="list-row group flex flex-col gap-2 py-5 sm:flex-row sm:items-baseline sm:gap-6">
                                <span class="shrink-0 font-mono text-[0.6875rem] text-brand-accent">
                                    {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                                </span>
                                <div class="min-w-0 flex-1">
                                    <h3 class="font-display text-base font-semibold text-brand-heading sm:text-lg">
                                        {{ $service['title'] }}
                                    </h3>
                                    <p class="mt-1 text-sm leading-relaxed text-brand-muted">
                                        {{ $service['short_description'] }}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- PRODUCTS --}}
    <section class="bg-brand-bg">
        <div class="site-container section-pad">
            <div data-reveal class="max-w-2xl">
                <x-sections.section-heading
                    eyebrow="Our Products"
                    title="Technology designed around real business needs."
                    description="Restaurant Management System is ready. Hotel and Dental systems are in development — status is shown on each product."
                />
            </div>

            <div class="mt-14 grid grid-cols-1 gap-10 md:grid-cols-3" data-reveal-stagger="90">
                @foreach($solutions as $solution)
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
                @endforeach
            </div>

            <div class="mt-12" data-reveal>
                <x-buttons.secondary route="solutions">Explore All Products</x-buttons.secondary>
            </div>
        </div>
    </section>

    {{-- FLAGSHIP SHOWCASE --}}
    <section class="border-t border-brand-border bg-brand-surface">
        <div class="site-container section-pad">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-12 lg:gap-16">
                <div class="order-2 min-w-0 lg:order-1 lg:col-span-7">
                    <div class="overflow-hidden rounded-[var(--radius-lg)] border border-brand-border bg-brand-card">
                        <img
                            src="{{ $productShowcase['image'] }}"
                            alt="{{ $productShowcase['image_alt'] }}"
                            loading="lazy"
                            class="aspect-[4/3] w-full object-cover object-center"
                        />
                    </div>
                </div>
                <div class="order-1 lg:order-2 lg:col-span-5" data-reveal>
                    <span class="eyebrow">
                        <span class="demo-live-dot h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                        {{ $productShowcase['eyebrow'] }}
                    </span>
                    <h2 class="h-section mt-4">{{ $productShowcase['title'] }}</h2>
                    <p class="text-body mt-4">{{ $productShowcase['body'] }}</p>

                    <ul class="mt-7 space-y-0 divide-y divide-brand-border border-y border-brand-border">
                        @foreach($productShowcase['capabilities'] as $capability)
                            <li class="flex items-start gap-3 py-3.5 text-sm text-brand-text">
                                <x-icons.icon name="check" class="mt-0.5 h-4 w-4 shrink-0 text-brand-accent" />
                                <span>{{ $capability }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-8">
                        <x-buttons.primary route="solutions">See Full Product Details</x-buttons.primary>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- DEVICES --}}
    <section class="bg-brand-bg">
        <div class="site-container section-pad">
            <div data-reveal class="max-w-2xl">
                <x-sections.section-heading
                    :eyebrow="$devices['eyebrow']"
                    :title="$devices['title']"
                    :description="$devices['description']"
                />
            </div>

            <div class="mx-auto mt-12 min-w-0 max-w-4xl" data-reveal>
                <x-sections.device-mockups />
            </div>
        </div>
    </section>

    {{-- INDUSTRIES — compact index --}}
    <section class="border-t border-brand-border bg-brand-surface">
        <div class="site-container section-pad">
            <div class="flex flex-col gap-8 sm:flex-row sm:items-end sm:justify-between" data-reveal>
                <x-sections.section-heading
                    eyebrow="Industries"
                    title="Built for businesses across industries"
                    description="Software shaped to how operations actually run."
                />
                <x-buttons.secondary route="industries" class="shrink-0">All Industries</x-buttons.secondary>
            </div>

            <ul class="mt-12 grid grid-cols-1 gap-x-10 border-t border-brand-border sm:grid-cols-2 lg:grid-cols-3" data-reveal-stagger="40">
                @foreach($industries as $industry)
                    <li class="list-row flex items-baseline justify-between gap-4 py-4">
                        <span class="font-display text-sm font-semibold text-brand-heading">{{ $industry['title'] }}</span>
                        <span class="hidden text-xs text-brand-muted sm:inline line-clamp-1">{{ $industry['description'] }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- WHY SOFTRIX --}}
    <section class="bg-brand-bg">
        <div class="site-container section-pad">
            <div data-reveal>
                <x-sections.section-heading
                    :eyebrow="$whySoftrix['eyebrow']"
                    :title="$whySoftrix['title']"
                />
            </div>

            <div class="mt-14 grid grid-cols-1 gap-x-10 gap-y-2 sm:grid-cols-2 lg:grid-cols-4" data-reveal-stagger="70">
                @foreach($whySoftrix['items'] as $item)
                    <x-cards.feature-card
                        :title="$item['title']"
                        :description="$item['description']"
                        :icon="$item['icon']"
                    />
                @endforeach
            </div>
        </div>
    </section>

    <section class="border-t border-brand-border bg-brand-surface">
        <div class="site-container section-pad">
            <div data-reveal class="max-w-2xl">
                <x-sections.section-heading
                    :eyebrow="$process['eyebrow']"
                    :title="$process['title']"
                />
            </div>
            <ol class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-7" data-reveal-stagger="50">
                @foreach($process['steps'] as $i => $step)
                    <li class="border-t border-brand-border pt-4">
                        <span class="text-[0.6875rem] font-semibold tracking-[0.14em] text-brand-accent">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3 class="mt-2 font-display text-sm font-semibold text-brand-heading">{{ $step['title'] }}</h3>
                        <p class="mt-1.5 text-xs leading-relaxed text-brand-muted">{{ $step['description'] }}</p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    <x-sections.cta-section
        :title="$cta['title']"
        :description="$cta['description']"
        :button="$cta['button']"
        :secondary="$cta['secondary']"
    />

</x-layouts.app>
