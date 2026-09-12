<x-layouts.app :seo="$seo">

    {{-- HERO --}}
    <section class="relative overflow-hidden bg-white">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-12 px-6 py-20 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-28">
            <div class="animate-slideUp">
                <span class="eyebrow">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                    {{ $hero['eyebrow'] }}
                </span>
                <h1 class="h-hero mt-5">{{ $hero['title'] }}</h1>
                <p class="text-body mt-6 max-w-xl text-base sm:text-lg">{{ $hero['description'] }}</p>

                <div class="mt-9 flex flex-col gap-4 sm:flex-row">
                    <x-buttons.primary :route="$hero['primary_button']['route']">
                        {{ $hero['primary_button']['label'] }}
                    </x-buttons.primary>
                    <x-buttons.secondary :route="$hero['secondary_button']['route']">
                        {{ $hero['secondary_button']['label'] }}
                    </x-buttons.secondary>
                </div>
            </div>

            <div class="animate-fadeIn" style="animation-delay: 0.15s;">
                <x-sections.hero-visual />
            </div>
        </div>
    </section>

    {{-- ABOUT PREVIEW --}}
    <section class="border-t border-brand-border bg-brand-surface">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2 lg:gap-16">
                <x-sections.section-heading
                    :eyebrow="$aboutPreview['eyebrow']"
                    :title="$aboutPreview['title']"
                    :description="$aboutPreview['body']"
                />
                <div class="flex lg:justify-end">
                    <x-buttons.secondary :route="$aboutPreview['button']['route']">
                        {{ $aboutPreview['button']['label'] }}
                    </x-buttons.secondary>
                </div>
            </div>
        </div>
    </section>

    {{-- SERVICES --}}
    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <x-sections.section-heading
                eyebrow="What We Do"
                title="Services Built Around Your Goals"
                description="From custom software to ongoing support, we cover the full lifecycle of building and maintaining business technology."
                align="center"
            />

            <div class="mt-14 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($services as $service)
                    <x-cards.service-card
                        :title="$service['title']"
                        :description="$service['short_description']"
                        :icon="$service['icon']"
                    />
                @endforeach
            </div>

            <div class="mt-12 flex justify-center">
                <x-buttons.secondary route="services">View All Services</x-buttons.secondary>
            </div>
        </div>
    </section>

    {{-- SOLUTIONS / PRODUCTS --}}
    <section class="border-t border-brand-border bg-brand-surface">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <x-sections.section-heading
                eyebrow="Solutions"
                title="Software Products & Business Solutions"
                description="Configurable product concepts we design and customize for real operational needs."
                align="center"
            />

            <div class="mt-14 grid grid-cols-1 gap-6 md:grid-cols-3">
                @foreach($solutions as $solution)
                    <x-cards.product-card
                        :title="$solution['title']"
                        :category="$solution['category']"
                        :description="$solution['short_description']"
                        :icon="$solution['icon']"
                    />
                @endforeach
            </div>

            <div class="mt-12 flex justify-center">
                <x-buttons.secondary route="solutions">Explore All Solutions</x-buttons.secondary>
            </div>
        </div>
    </section>

    {{-- INDUSTRIES --}}
    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <x-sections.section-heading
                eyebrow="Industries"
                title="Built for Businesses Across Industries"
                description="We design solutions adaptable to a range of operational environments."
                align="center"
            />

            <div class="mt-14 grid grid-cols-2 gap-5 sm:grid-cols-3 lg:grid-cols-5">
                @foreach($industries as $industry)
                    <x-cards.industry-card
                        :title="$industry['title']"
                        :description="$industry['description']"
                        :icon="$industry['icon']"
                    />
                @endforeach
            </div>
        </div>
    </section>

    {{-- WHY SOFTRIX --}}
    <section class="border-t border-brand-border bg-brand-surface">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <x-sections.section-heading
                :eyebrow="$whySoftrix['eyebrow']"
                :title="$whySoftrix['title']"
                align="center"
            />

            <div class="mt-14 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
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

    {{-- CTA --}}
    <x-sections.cta-section :title="$cta['title']" :button="$cta['button']" />

</x-layouts.app>
