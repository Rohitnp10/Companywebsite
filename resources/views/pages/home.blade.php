<x-layouts.app :seo="$seo">

    {{-- HERO --}}
    <section class="relative overflow-hidden bg-brand-bg">
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
                <x-sections.product-demo />
            </div>
        </div>
    </section>

    {{-- ABOUT PREVIEW --}}
    <section class="border-t border-brand-border bg-brand-surface">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2 lg:gap-16">
                <div data-reveal>
                    <x-sections.section-heading
                        :eyebrow="$aboutPreview['eyebrow']"
                        :title="$aboutPreview['title']"
                        :description="$aboutPreview['body']"
                    />
                </div>
                <div data-reveal data-reveal-delay="100" class="flex lg:justify-end">
                    <x-buttons.secondary :route="$aboutPreview['button']['route']">
                        {{ $aboutPreview['button']['label'] }}
                    </x-buttons.secondary>
                </div>
            </div>
        </div>
    </section>

    {{-- SERVICES --}}
    <section class="bg-brand-bg">
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
                        />
                    </div>
                @endforeach
            </div>

            <div class="mt-12 flex justify-center">
                <x-buttons.secondary route="services">View All Services</x-buttons.secondary>
            </div>
        </div>
    </section>

    {{-- OUR PRODUCTS --}}
    <section class="border-t border-brand-border bg-brand-surface">
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
                            :featured="$solution['status'] === 'ready'"
                        />
                    </div>
                @endforeach
            </div>

            <div class="mt-12 flex justify-center">
                <x-buttons.secondary route="solutions">Explore All Products</x-buttons.secondary>
            </div>
        </div>
    </section>

    {{-- RESTAURANT MANAGEMENT SYSTEM SHOWCASE --}}
    <section class="bg-brand-bg">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2 lg:gap-16">
                <div data-reveal class="lg:order-2">
                    <span class="eyebrow">
                        <span class="demo-live-dot h-1.5 w-1.5 rounded-full bg-brand-success"></span>
                        Flagship Product — Ready Today
                    </span>
                    <h2 class="h-section mt-4">See the Restaurant Management System in Action</h2>
                    <p class="text-body mt-4">
                        One system for the whole floor: orders move from table to kitchen to bill without
                        re-entry, and every sale rolls up into a live dashboard. Click through the panel to
                        see Dashboard, Orders, Tables, and Billing.
                    </p>

                    <ul class="mt-6 space-y-3">
                        @foreach(['Order & table management', 'Kitchen ticket flow', 'Inventory & stock tracking', 'Billing, payments & reporting'] as $capability)
                            <li class="flex items-start gap-2.5 text-sm text-brand-text">
                                <x-icons.icon name="check" class="mt-0.5 h-4 w-4 shrink-0 text-brand-accent" />
                                <span>{{ $capability }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-8">
                        <x-buttons.primary route="solutions">See Full Product Details</x-buttons.primary>
                    </div>
                </div>

                <div data-reveal data-reveal-scale data-reveal-delay="100" class="lg:order-1">
                    <x-sections.product-demo />
                </div>
            </div>
        </div>
    </section>

    {{-- WEB + MOBILE --}}
    <section class="border-t border-brand-border bg-brand-surface">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div data-reveal>
                <x-sections.section-heading
                    eyebrow="Web & Mobile"
                    title="Built for Web. Designed for Mobile."
                    description="The same product, sized for every screen your team actually works on — front desk, kitchen, or on the floor."
                    align="center"
                />
            </div>

            <div class="mt-14">
                <x-sections.device-mockups />
            </div>
        </div>
    </section>

    {{-- INDUSTRIES --}}
    <section class="bg-brand-bg">
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
                        />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- WHY SOFTRIX --}}
    <section class="border-t border-brand-border bg-brand-surface">
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
                        />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <div data-reveal>
        <x-sections.cta-section :title="$cta['title']" :button="$cta['button']" />
    </div>

</x-layouts.app>
