<x-layouts.app :seo="$seo">

    {{-- HERO: brand-first, full-bleed --}}
    <section class="relative isolate -mt-[4.75rem] min-h-[88svh] overflow-hidden pt-[4.75rem]">
        <img
            src="{{ $whoWeAre['image'] }}"
            alt="{{ $whoWeAre['image_alt'] }}"
            class="absolute inset-0 h-full w-full object-cover"
            fetchpriority="high"
        />
        <div class="absolute inset-0 bg-gradient-to-r from-brand-primary via-brand-primary/90 to-brand-primary/60"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-brand-primary/75 via-transparent to-brand-primary/35"></div>
        <div class="atmosphere-glow pointer-events-none absolute inset-0" aria-hidden="true"></div>

        <div class="relative mx-auto flex min-h-[calc(88svh-4.75rem)] max-w-7xl items-end px-6 pb-20 pt-24 lg:items-center lg:px-8 lg:pb-28 lg:pt-20">
            <div class="max-w-3xl">
                <p class="page-enter text-5xl font-extrabold tracking-tight text-white sm:text-6xl lg:text-7xl">
                    Softrix<span class="text-brand-accent">.</span>
                </p>
                <span class="eyebrow page-enter page-enter-delay-1 mt-6 text-brand-accent">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                    {{ $whoWeAre['eyebrow'] }}
                </span>
                <h1 class="page-enter page-enter-delay-1 mt-4 text-3xl font-bold leading-[1.15] tracking-tight text-white sm:text-4xl lg:text-[2.75rem]">
                    {{ $whoWeAre['title'] }}
                </h1>
                <p class="page-enter page-enter-delay-2 mt-6 max-w-xl text-base leading-[1.7] text-white/70 sm:text-lg">
                    {{ $whoWeAre['lede'] }}
                </p>
                <div class="page-enter page-enter-delay-3 mt-10 flex flex-col gap-4 sm:flex-row">
                    <x-buttons.primary route="contact">Let's Talk</x-buttons.primary>
                    <a
                        href="{{ route('services') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-white/25 bg-white/5 px-6 py-3.5 text-sm font-semibold text-white backdrop-blur-sm transition-all duration-200 hover:border-brand-accent hover:bg-brand-accent/10 hover:text-brand-accent"
                    >
                        Explore Services
                    </a>
                </div>
            </div>
        </div>

        <div class="pointer-events-none absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-brand-bg to-transparent"></div>
    </section>

    {{-- STORY --}}
    <section class="bg-brand-bg">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8 lg:py-28">
            <div class="grid grid-cols-1 gap-14 lg:grid-cols-12 lg:gap-16">
                <div class="lg:col-span-5" data-reveal>
                    <span class="eyebrow">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                        What Defines Us
                    </span>
                    <h2 class="mt-4 text-3xl font-bold tracking-tight text-brand-heading sm:text-4xl lg:leading-[1.15]">
                        A partner for software that has to work in the real world
                    </h2>
                </div>

                <div class="lg:col-span-7" data-reveal data-reveal-delay="80">
                    <p class="text-lg leading-[1.75] text-brand-text">
                        {{ $whoWeAre['body'] }}
                    </p>

                    <ul class="mt-12 space-y-0 divide-y divide-brand-border border-y border-brand-border" data-reveal-stagger="70">
                        @foreach($whoWeAre['highlights'] as $highlight)
                            <li class="flex gap-5 py-6">
                                <x-icons.illustration :name="$highlight['icon']" size="sm" class="shrink-0" />
                                <div class="min-w-0">
                                    <h3 class="text-[15px] font-semibold tracking-tight text-brand-heading">
                                        {{ $highlight['title'] }}
                                    </h3>
                                    <p class="mt-1.5 text-sm leading-relaxed text-brand-muted">
                                        {{ $highlight['description'] }}
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- MISSION & VISION — statement typography, not headline walls --}}
    <section class="border-y border-brand-border bg-brand-surface">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8 lg:py-28">
            <div data-reveal class="max-w-2xl">
                <span class="eyebrow">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                    Direction
                </span>
                <h2 class="mt-4 text-3xl font-bold tracking-tight text-brand-heading sm:text-4xl">
                    Mission &amp; Vision
                </h2>
                <p class="mt-4 text-base leading-relaxed text-brand-muted sm:text-[17px]">
                    What we work toward every day, and where we intend to take Softrix.
                </p>
            </div>

            <div class="mt-16 grid grid-cols-1 gap-12 lg:mt-20 lg:grid-cols-2 lg:gap-20" data-reveal-stagger="120">
                <article class="relative pl-6 sm:pl-8">
                    <div class="absolute bottom-0 left-0 top-0 w-px bg-brand-border" aria-hidden="true"></div>
                    <div class="absolute left-0 top-0 h-12 w-px bg-brand-accent" aria-hidden="true"></div>

                    <div class="flex items-center gap-3">
                        <x-icons.illustration :name="$mission['icon']" size="sm" />
                        <span class="text-xs font-semibold uppercase tracking-[0.2em] text-brand-accent">
                            {{ $mission['title'] }}
                        </span>
                    </div>
                    <p class="mt-6 max-w-md text-lg font-normal leading-[1.7] text-brand-text sm:text-[1.1875rem] sm:leading-[1.65]">
                        {{ $mission['body'] }}
                    </p>
                </article>

                <article class="relative pl-6 sm:pl-8">
                    <div class="absolute bottom-0 left-0 top-0 w-px bg-brand-border" aria-hidden="true"></div>
                    <div class="absolute left-0 top-0 h-12 w-px bg-brand-accent" aria-hidden="true"></div>

                    <div class="flex items-center gap-3">
                        <x-icons.illustration :name="$vision['icon']" size="sm" />
                        <span class="text-xs font-semibold uppercase tracking-[0.2em] text-brand-accent">
                            {{ $vision['title'] }}
                        </span>
                    </div>
                    <p class="mt-6 max-w-md text-lg font-normal leading-[1.7] text-brand-text sm:text-[1.1875rem] sm:leading-[1.65]">
                        {{ $vision['body'] }}
                    </p>
                </article>
            </div>
        </div>
    </section>

    {{-- APPROACH — numbered process, light chrome --}}
    <section class="bg-brand-bg">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8 lg:py-28">
            <div data-reveal class="mx-auto max-w-2xl text-center">
                <span class="eyebrow justify-center">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                    {{ $approach['eyebrow'] }}
                </span>
                <h2 class="mt-4 text-3xl font-bold tracking-tight text-brand-heading sm:text-4xl">
                    {{ $approach['title'] }}
                </h2>
                <p class="mt-4 text-base leading-relaxed text-brand-muted sm:text-[17px]">
                    {{ $approach['description'] }}
                </p>
            </div>

            <ol class="relative mt-16 grid grid-cols-1 gap-10 sm:grid-cols-2 lg:mt-20 lg:grid-cols-4 lg:gap-8" data-reveal-stagger="90">
                <div class="absolute left-[12.5%] right-[12.5%] top-5 hidden h-px bg-brand-border lg:block" aria-hidden="true"></div>

                @foreach($approach['steps'] as $index => $step)
                    <li class="relative">
                        <div class="flex items-center gap-3 lg:flex-col lg:items-start lg:gap-5">
                            <span class="relative z-10 flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-brand-border bg-brand-bg text-sm font-bold tabular-nums text-brand-accent">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>
                            <h3 class="text-lg font-semibold tracking-tight text-brand-heading lg:mt-0">
                                {{ $step['title'] }}
                            </h3>
                        </div>
                        <p class="mt-3 text-sm leading-[1.7] text-brand-muted lg:mt-4 lg:pl-0">
                            {{ $step['description'] }}
                        </p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- VALUES --}}
    <section class="border-t border-brand-border bg-brand-surface">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8 lg:py-28">
            <div data-reveal class="max-w-2xl">
                <span class="eyebrow">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                    What Guides Us
                </span>
                <h2 class="mt-4 text-3xl font-bold tracking-tight text-brand-heading sm:text-4xl">
                    Our Values
                </h2>
                <p class="mt-4 text-base leading-relaxed text-brand-muted sm:text-[17px]">
                    The principles that shape how we design, build, and communicate.
                </p>
            </div>

            <div class="mt-14 grid grid-cols-1 gap-x-12 gap-y-12 sm:grid-cols-2 lg:mt-16 lg:grid-cols-4" data-reveal-stagger="80">
                @foreach($values as $value)
                    <div>
                        @if($value['image'] ?? null)
                            <div class="h-11 w-11 overflow-hidden rounded-xl">
                                <img
                                    src="{{ $value['image'] }}"
                                    alt="{{ $value['image_alt'] ?? $value['title'] }}"
                                    loading="lazy"
                                    decoding="async"
                                    class="h-full w-full object-cover"
                                />
                            </div>
                        @else
                            <x-icons.illustration :name="$value['icon']" size="sm" />
                        @endif
                        <h3 class="mt-5 text-base font-semibold tracking-tight text-brand-heading">
                            {{ $value['title'] }}
                        </h3>
                        <p class="mt-2.5 text-sm leading-[1.7] text-brand-muted">
                            {{ $value['description'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- PHILOSOPHY — pull-quote treatment --}}
    <section class="relative overflow-hidden border-t border-brand-border bg-brand-bg">
        <div class="pointer-events-none absolute left-1/2 top-1/2 h-64 w-64 -translate-x-1/2 -translate-y-1/2 rounded-full bg-brand-accent/10 blur-3xl" aria-hidden="true"></div>

        <div class="relative mx-auto max-w-3xl px-6 py-20 text-center lg:px-8 lg:py-28" data-reveal data-reveal-fade>
            <span class="eyebrow justify-center">
                <span class="h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                {{ $techPhilosophy['eyebrow'] }}
            </span>
            <h2 class="mt-4 text-2xl font-bold tracking-tight text-brand-heading sm:text-3xl">
                {{ $techPhilosophy['title'] }}
            </h2>
            <blockquote class="mt-8 border-t border-brand-border pt-8">
                <p class="text-lg font-medium leading-[1.65] tracking-[-0.01em] text-brand-heading sm:text-xl sm:leading-[1.6]">
                    {{ $techPhilosophy['body'] }}
                </p>
            </blockquote>
        </div>
    </section>

    <x-sections.cta-section :title="$cta['title']" :button="$cta['button']" />

</x-layouts.app>
