<x-layouts.app :seo="$seo">

    {{-- HERO: brand-first, full-bleed --}}
    <section class="relative isolate -mt-[4.75rem] min-h-[88svh] overflow-hidden pt-[4.75rem]">
        <img
            src="{{ $flagship['image'] }}"
            alt="{{ $flagship['image_alt'] }}"
            class="absolute inset-0 h-full w-full object-cover"
            fetchpriority="high"
        />
        <div class="absolute inset-0 bg-gradient-to-r from-brand-primary via-brand-primary/90 to-brand-primary/55"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-brand-primary/75 via-transparent to-brand-primary/35"></div>
        <div class="atmosphere-glow pointer-events-none absolute inset-0" aria-hidden="true"></div>

        <div class="relative mx-auto flex min-h-[calc(88svh-4.75rem)] max-w-7xl items-end px-6 pb-20 pt-24 lg:items-center lg:px-8 lg:pb-28 lg:pt-20">
            <div class="max-w-3xl">
                <p class="page-enter text-5xl font-extrabold tracking-tight text-white sm:text-6xl lg:text-7xl">
                    Softrix<span class="text-brand-accent">.</span>
                </p>
                <span class="eyebrow page-enter page-enter-delay-1 mt-6 text-brand-accent">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                    {{ $page['eyebrow'] }}
                </span>
                <h1 class="page-enter page-enter-delay-1 mt-4 text-3xl font-bold leading-[1.15] tracking-tight text-white sm:text-4xl lg:text-[2.75rem]">
                    {{ $page['title'] }}
                </h1>
                <p class="page-enter page-enter-delay-2 mt-6 max-w-xl text-base leading-[1.7] text-white/70 sm:text-lg">
                    {{ $page['lede'] }}
                </p>
                <div class="page-enter page-enter-delay-3 mt-10 flex flex-col gap-4 sm:flex-row">
                    <x-buttons.primary :route="$page['primary_button']['route']">
                        {{ $page['primary_button']['label'] }}
                    </x-buttons.primary>
                    <a
                        href="{{ route($page['secondary_button']['route']) }}"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-white/25 bg-white/5 px-6 py-3.5 text-sm font-semibold text-white backdrop-blur-sm transition-all duration-200 hover:border-brand-accent hover:bg-brand-accent/10 hover:text-brand-accent"
                    >
                        {{ $page['secondary_button']['label'] }}
                    </a>
                </div>
            </div>
        </div>

        <div class="pointer-events-none absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-brand-bg to-transparent"></div>
    </section>

    {{-- FLAGSHIP --}}
    <section class="bg-brand-bg">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8 lg:py-28">
            <div class="grid grid-cols-1 items-start gap-14 lg:grid-cols-12 lg:gap-16">
                <div class="lg:col-span-5" data-reveal>
                    <span class="eyebrow">
                        <span class="demo-live-dot h-1.5 w-1.5 rounded-full bg-brand-success"></span>
                        {{ $flagship['eyebrow'] }}
                    </span>

                    <div class="mt-5 flex flex-wrap items-center gap-2">
                        <span class="text-xs font-semibold uppercase tracking-[0.18em] text-brand-muted">
                            {{ $flagship['category'] }}
                        </span>
                        <span class="text-brand-border" aria-hidden="true">·</span>
                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-brand-success">
                            <span class="demo-live-dot h-1.5 w-1.5 rounded-full bg-brand-success"></span>
                            Ready today
                        </span>
                    </div>

                    <h2 class="mt-4 text-3xl font-bold tracking-tight text-brand-heading sm:text-4xl lg:leading-[1.15]">
                        {{ $flagship['title'] }}
                    </h2>
                    <p class="mt-5 text-base leading-[1.75] text-brand-text sm:text-[17px]">
                        {{ $flagship['body'] }}
                    </p>

                    <ul class="mt-10 space-y-0 divide-y divide-brand-border border-y border-brand-border">
                        @foreach($flagship['capabilities'] as $capability)
                            <li class="flex items-start gap-3 py-4 text-[15px] leading-relaxed text-brand-text">
                                <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-accent" aria-hidden="true"></span>
                                <span>{{ $capability }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-9">
                        <x-buttons.primary route="contact">Request a Walkthrough</x-buttons.primary>
                    </div>
                </div>

                <div class="space-y-6 lg:col-span-7">
                    <div data-reveal data-reveal-scale data-reveal-delay="80">
                        <div class="overflow-hidden rounded-2xl border border-brand-border">
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

    {{-- LINEUP — editorial rows, no duplicate upcoming cards --}}
    <section class="border-t border-brand-border bg-brand-surface">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8 lg:py-28">
            <div class="grid grid-cols-1 gap-14 lg:grid-cols-12 lg:gap-16">
                <div class="lg:col-span-4" data-reveal>
                    <div class="lg:sticky lg:top-28">
                        <span class="eyebrow">
                            <span class="h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                            Product Lineup
                        </span>
                        <h2 class="mt-4 text-3xl font-bold tracking-tight text-brand-heading sm:text-4xl lg:leading-[1.15]">
                            What we're building and shipping
                        </h2>
                        <p class="mt-4 text-base leading-[1.7] text-brand-muted sm:text-[17px]">
                            One live flagship product today, with two industry systems actively in development.
                        </p>
                    </div>
                </div>

                <div class="lg:col-span-8">
                    <ul class="divide-y divide-brand-border border-y border-brand-border" data-reveal-stagger="80">
                        @foreach($solutions as $index => $solution)
                            <li class="grid grid-cols-1 gap-6 py-10 sm:grid-cols-12 sm:gap-8 sm:py-12">
                                <div class="sm:col-span-1">
                                    <span class="text-sm font-bold tabular-nums text-brand-accent">
                                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                    </span>
                                </div>

                                <div class="sm:col-span-7">
                                    <div class="flex flex-wrap items-center gap-x-3 gap-y-2">
                                        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-brand-muted">
                                            {{ $solution['category'] }}
                                        </p>
                                        @if($solution['status'] === 'ready')
                                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-brand-success">
                                                <span class="demo-live-dot h-1.5 w-1.5 rounded-full bg-brand-success"></span>
                                                Ready
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-brand-warning">
                                                <span class="h-1.5 w-1.5 rounded-full bg-brand-warning"></span>
                                                In Development
                                            </span>
                                        @endif
                                    </div>

                                    <h3 class="mt-3 text-xl font-semibold tracking-tight text-brand-heading sm:text-[1.375rem]">
                                        {{ $solution['title'] }}
                                    </h3>
                                    <p class="mt-3 text-[15px] leading-[1.7] text-brand-muted sm:text-base">
                                        {{ $solution['description'] }}
                                    </p>

                                    @if(!empty($solution['capabilities']))
                                        <ul class="mt-5 grid grid-cols-1 gap-2.5 sm:grid-cols-2">
                                            @foreach($solution['capabilities'] as $capability)
                                                <li class="flex items-start gap-2.5 text-sm leading-relaxed text-brand-text">
                                                    <span class="mt-1.5 h-1 w-1 shrink-0 rounded-full bg-brand-accent" aria-hidden="true"></span>
                                                    <span>{{ $capability }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>

                                <div class="sm:col-span-4">
                                    @if(!empty($solution['image']))
                                        <div class="overflow-hidden rounded-xl">
                                            <img
                                                src="{{ $solution['image'] }}"
                                                alt="{{ $solution['image_alt'] ?? $solution['title'] }}"
                                                loading="lazy"
                                                decoding="async"
                                                class="aspect-[4/3] w-full object-cover"
                                            />
                                        </div>
                                    @else
                                        <div class="flex aspect-[4/3] items-center justify-center rounded-xl border border-brand-border bg-brand-card">
                                            <x-icons.illustration :name="$solution['icon']" size="lg" />
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

    {{-- PLATFORM APPROACH --}}
    <section class="bg-brand-bg">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8 lg:py-28">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-12 lg:gap-16">
                <div class="lg:col-span-6" data-reveal data-reveal-scale>
                    <x-sections.media-panel
                        :src="$platform['image']"
                        :alt="$platform['image_alt']"
                        badge="Operational systems, every screen"
                        :float-icons="['utensils', 'building-2', 'heart-pulse']"
                    />
                </div>

                <div class="lg:col-span-6" data-reveal data-reveal-delay="100">
                    <span class="eyebrow">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                        {{ $platform['eyebrow'] }}
                    </span>
                    <h2 class="mt-4 text-3xl font-bold tracking-tight text-brand-heading sm:text-4xl lg:leading-[1.15]">
                        {{ $platform['title'] }}
                    </h2>
                    <p class="mt-5 text-base leading-[1.75] text-brand-text sm:text-[17px]">
                        {{ $platform['body'] }}
                    </p>

                    <ul class="mt-10 space-y-0 divide-y divide-brand-border border-y border-brand-border" data-reveal-stagger="60">
                        @foreach($platform['points'] as $point)
                            <li class="flex items-start gap-3 py-4 text-[15px] leading-relaxed text-brand-text">
                                <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-accent" aria-hidden="true"></span>
                                <span>{{ $point }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-9">
                        <x-buttons.secondary route="industries">Explore Industries</x-buttons.secondary>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-sections.cta-section :title="$cta['title']" :button="$cta['button']" />

</x-layouts.app>
