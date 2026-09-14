<x-layouts.app :seo="$seo">

    {{-- HERO: brand-first, full-bleed --}}
    <section class="relative isolate -mt-[4.75rem] min-h-[88svh] overflow-hidden pt-[4.75rem]">
        <img
            src="{{ $page['image'] }}"
            alt="{{ $page['image_alt'] }}"
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

    {{-- ENGAGEMENT --}}
    <section class="bg-brand-bg">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8 lg:py-28">
            <div data-reveal class="mx-auto max-w-2xl text-center">
                <span class="eyebrow justify-center">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                    {{ $engagement['eyebrow'] }}
                </span>
                <h2 class="mt-4 text-3xl font-bold tracking-tight text-brand-heading sm:text-4xl">
                    {{ $engagement['title'] }}
                </h2>
                <p class="mt-4 text-base leading-relaxed text-brand-muted sm:text-[17px]">
                    {{ $engagement['description'] }}
                </p>
            </div>

            <ol class="relative mt-16 grid grid-cols-1 gap-10 sm:grid-cols-2 lg:mt-20 lg:grid-cols-4 lg:gap-8" data-reveal-stagger="90">
                <div class="absolute left-[12.5%] right-[12.5%] top-5 hidden h-px bg-brand-border lg:block" aria-hidden="true"></div>

                @foreach($engagement['steps'] as $index => $step)
                    <li class="relative">
                        <div class="flex items-center gap-3 lg:flex-col lg:items-start lg:gap-5">
                            <span class="relative z-10 flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-brand-border bg-brand-bg text-sm font-bold tabular-nums text-brand-accent">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>
                            <h3 class="text-lg font-semibold tracking-tight text-brand-heading">
                                {{ $step['title'] }}
                            </h3>
                        </div>
                        <p class="mt-3 text-sm leading-[1.7] text-brand-muted lg:mt-4">
                            {{ $step['description'] }}
                        </p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- SERVICES LIST — editorial rows, proper type --}}
    <section class="border-t border-brand-border bg-brand-surface">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8 lg:py-28">
            <div class="grid grid-cols-1 gap-14 lg:grid-cols-12 lg:gap-16">
                <div class="lg:col-span-4" data-reveal>
                    <div class="lg:sticky lg:top-28">
                        <span class="eyebrow">
                            <span class="h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                            Capabilities
                        </span>
                        <h2 class="mt-4 text-3xl font-bold tracking-tight text-brand-heading sm:text-4xl lg:leading-[1.15]">
                            Everything we build with you
                        </h2>
                        <p class="mt-4 text-base leading-[1.7] text-brand-muted sm:text-[17px]">
                            Eight focused service areas covering the full lifecycle of business software — from concept and design through cloud, integrations, and support.
                        </p>
                    </div>
                </div>

                <div class="lg:col-span-8">
                    <ul class="divide-y divide-brand-border border-y border-brand-border" data-reveal-stagger="70">
                        @foreach($services as $index => $service)
                            <li class="group grid grid-cols-1 gap-6 py-10 sm:grid-cols-12 sm:gap-8 sm:py-12">
                                <div class="sm:col-span-1">
                                    <span class="text-sm font-bold tabular-nums text-brand-accent">
                                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                    </span>
                                </div>

                                <div class="sm:col-span-7">
                                    <h3 class="text-xl font-semibold tracking-tight text-brand-heading sm:text-[1.375rem]">
                                        {{ $service['title'] }}
                                    </h3>
                                    <p class="mt-3 text-[15px] leading-[1.7] text-brand-muted sm:text-base">
                                        {{ $service['short_description'] }}
                                    </p>

                                    @if(!empty($service['features']))
                                        <ul class="mt-5 space-y-2.5">
                                            @foreach($service['features'] as $feature)
                                                <li class="flex items-start gap-2.5 text-sm leading-relaxed text-brand-text">
                                                    <span class="mt-1.5 h-1 w-1 shrink-0 rounded-full bg-brand-accent" aria-hidden="true"></span>
                                                    <span>{{ $feature }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>

                                @if(!empty($service['image']))
                                    <div class="overflow-hidden rounded-xl sm:col-span-4">
                                        <img
                                            src="{{ $service['image'] }}"
                                            alt="{{ $service['image_alt'] ?? $service['title'] }}"
                                            loading="lazy"
                                            decoding="async"
                                            class="aspect-[4/3] h-full w-full object-cover transition-transform duration-700 group-hover:scale-[1.03]"
                                        />
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- PARTNERSHIP --}}
    <section class="bg-brand-bg">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8 lg:py-28">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-12 lg:gap-16">
                <div class="lg:col-span-6" data-reveal data-reveal-left>
                    <span class="eyebrow">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                        {{ $partnership['eyebrow'] }}
                    </span>
                    <h2 class="mt-4 text-3xl font-bold tracking-tight text-brand-heading sm:text-4xl lg:leading-[1.15]">
                        {{ $partnership['title'] }}
                    </h2>
                    <p class="mt-5 text-base leading-[1.75] text-brand-text sm:text-[17px]">
                        {{ $partnership['body'] }}
                    </p>

                    <ul class="mt-10 space-y-0 divide-y divide-brand-border border-y border-brand-border" data-reveal-stagger="60">
                        @foreach($partnership['points'] as $point)
                            <li class="flex items-start gap-3 py-4 text-[15px] leading-relaxed text-brand-text">
                                <span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-brand-accent" aria-hidden="true"></span>
                                <span>{{ $point }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-9">
                        <x-buttons.secondary route="about">Learn About Softrix</x-buttons.secondary>
                    </div>
                </div>

                <div class="lg:col-span-6" data-reveal data-reveal-scale data-reveal-delay="100">
                    <x-sections.media-panel
                        :src="$partnership['image']"
                        :alt="$partnership['image_alt']"
                        badge="Built to last beyond launch"
                        :float-icons="['code', 'cloud', 'wrench']"
                    />
                </div>
            </div>
        </div>
    </section>

    {{-- DEVICES --}}
    <section class="border-t border-brand-border bg-brand-surface">
        <div class="mx-auto max-w-3xl px-6 py-20 text-center lg:px-8 lg:py-28" data-reveal data-reveal-fade>
            <span class="eyebrow justify-center">
                <span class="h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                Web &amp; Mobile Ready
            </span>
            <h2 class="mt-4 text-3xl font-bold tracking-tight text-brand-heading sm:text-4xl">
                Designed for every screen your team uses
            </h2>
            <p class="mt-4 text-base leading-relaxed text-brand-muted sm:text-[17px]">
                Whether it's a desk, a counter, or the floor — we build experiences that stay clear and usable across devices.
            </p>
        </div>

        <div class="mx-auto max-w-5xl px-6 pb-20 lg:px-8 lg:pb-28" data-reveal data-reveal-scale>
            <div class="overflow-hidden rounded-2xl border border-brand-border">
                <img
                    src="{{ $page['image'] }}"
                    alt="{{ $page['image_alt'] }}"
                    loading="lazy"
                    decoding="async"
                    class="aspect-[16/9] w-full object-cover"
                />
            </div>
        </div>
    </section>

    <x-sections.cta-section :title="$cta['title']" :button="$cta['button']" />

</x-layouts.app>
