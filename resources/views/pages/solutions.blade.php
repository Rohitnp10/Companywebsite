<x-layouts.app :seo="$seo">

    <x-sections.brand-stage
        :eyebrow="$page['eyebrow']"
        :title="$page['title']"
        :description="$page['lede']"
    >
        <x-buttons.primary :route="$page['primary_button']['route']">
            {{ $page['primary_button']['label'] }}
        </x-buttons.primary>
        <a
            href="{{ route($page['secondary_button']['route']) }}"
            class="btn-ghost"
        >
            {{ $page['secondary_button']['label'] }}
        </a>
    </x-sections.brand-stage>

    <section class="bg-brand-bg">
        <div class="site-container section-pad">
            <div class="grid grid-cols-1 items-start gap-12 lg:grid-cols-12 lg:gap-16">
                <div class="lg:col-span-5" data-reveal>
                    <span class="eyebrow">
                        <span class="demo-live-dot h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                        {{ $flagship['eyebrow'] }}
                    </span>
                    <div class="mt-4 flex flex-wrap items-center gap-2">
                        <span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-brand-muted">{{ $flagship['category'] }}</span>
                        <span class="status-pill status-pill-ready">Ready today</span>
                    </div>
                    <h2 class="h-section mt-4">{{ $flagship['title'] }}</h2>
                    <p class="mt-5 text-base leading-relaxed text-brand-text">{{ $flagship['body'] }}</p>
                    <ul class="mt-8 divide-y divide-brand-border border-y border-brand-border">
                        @foreach($flagship['capabilities'] as $capability)
                            <li class="flex items-start gap-3 py-3.5 text-sm text-brand-text">
                                <x-icons.icon name="check" class="mt-0.5 h-4 w-4 shrink-0 text-brand-accent" />
                                <span>{{ $capability }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mt-8">
                        <x-buttons.primary route="contact">Request a Walkthrough</x-buttons.primary>
                    </div>
                </div>

                <div class="space-y-5 lg:col-span-7">
                    <div data-reveal data-reveal-scale data-reveal-delay="80">
                        <div class="media-frame border border-brand-border">
                            <img
                                src="{{ $flagship['image'] }}"
                                alt="{{ $flagship['image_alt'] }}"
                                loading="lazy"
                                class="aspect-[16/10] w-full object-cover"
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

    <section class="border-t border-brand-border bg-brand-surface">
        <div class="site-container section-pad">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-16">
                <div class="lg:col-span-4" data-reveal>
                    <div class="lg:sticky lg:top-28">
                        <span class="eyebrow">Product Lineup</span>
                        <h2 class="h-section mt-4">What we're building and shipping</h2>
                        <p class="text-body mt-4">One live flagship product today, with two industry systems actively in development.</p>
                    </div>
                </div>

                <div class="lg:col-span-8">
                    <ul class="divide-y divide-brand-border border-y border-brand-border" data-reveal-stagger="70">
                        @foreach($solutions as $index => $solution)
                            <li class="grid grid-cols-1 gap-6 py-10 sm:grid-cols-12 sm:gap-8">
                                <div class="sm:col-span-1">
                                    <span class="font-mono text-[0.6875rem] text-brand-accent">
                                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                    </span>
                                </div>
                                <div class="sm:col-span-7">
                                    <div class="flex flex-wrap items-center gap-x-3 gap-y-2">
                                        <span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-brand-muted">{{ $solution['category'] }}</span>
                                        @if($solution['status'] === 'ready')
                                            <span class="status-pill status-pill-ready">Ready</span>
                                        @else
                                            <span class="status-pill status-pill-dev">In Development</span>
                                        @endif
                                    </div>
                                    <h3 class="mt-3 font-display text-xl font-semibold text-brand-heading">{{ $solution['title'] }}</h3>
                                    <p class="mt-3 text-sm leading-relaxed text-brand-muted sm:text-base">{{ $solution['description'] }}</p>
                                    @if(!empty($solution['capabilities']))
                                        <ul class="mt-5 grid grid-cols-1 gap-2 sm:grid-cols-2">
                                            @foreach($solution['capabilities'] as $capability)
                                                <li class="flex items-start gap-2 text-sm text-brand-text">
                                                    <span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-brand-accent"></span>
                                                    <span>{{ $capability }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                                <div class="sm:col-span-4">
                                    @if(!empty($solution['image']))
                                        <div class="media-frame border border-brand-border">
                                            <img
                                                src="{{ $solution['image'] }}"
                                                alt="{{ $solution['image_alt'] ?? $solution['title'] }}"
                                                loading="lazy"
                                                class="aspect-[4/3] w-full object-cover"
                                            />
                                        </div>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-brand-bg">
        <div class="site-container section-pad">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-12 lg:gap-16">
                <div class="lg:col-span-6" data-reveal data-reveal-scale>
                    <x-sections.media-panel
                        :src="$platform['image']"
                        :alt="$platform['image_alt']"
                        badge="Operational systems, every screen"
                    />
                </div>
                <div class="lg:col-span-6" data-reveal data-reveal-delay="80">
                    <span class="eyebrow">{{ $platform['eyebrow'] }}</span>
                    <h2 class="h-section mt-4">{{ $platform['title'] }}</h2>
                    <p class="mt-5 text-base leading-relaxed text-brand-text">{{ $platform['body'] }}</p>
                    <ul class="mt-8 divide-y divide-brand-border border-y border-brand-border">
                        @foreach($platform['points'] as $point)
                            <li class="flex items-start gap-3 py-3.5 text-sm text-brand-text">
                                <x-icons.icon name="check" class="mt-0.5 h-4 w-4 shrink-0 text-brand-accent" />
                                <span>{{ $point }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mt-8">
                        <x-buttons.secondary route="industries">Explore Industries</x-buttons.secondary>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-sections.cta-section :title="$cta['title']" :button="$cta['button']" />

</x-layouts.app>
