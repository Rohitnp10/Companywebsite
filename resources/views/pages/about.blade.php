<x-layouts.app :seo="$seo">

    <x-sections.brand-stage
        :eyebrow="$whoWeAre['eyebrow']"
        :title="$whoWeAre['title']"
        :description="$whoWeAre['lede']"
    >
        <x-buttons.primary route="contact">Let's Talk</x-buttons.primary>
        <a
            href="{{ route('services') }}"
            class="btn-ghost"
        >
            Explore Services
        </a>
    </x-sections.brand-stage>

    {{-- STORY --}}
    <section class="bg-brand-bg">
        <div class="site-container section-pad">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-16">
                <div class="lg:col-span-5" data-reveal>
                    <span class="eyebrow">What Defines Us</span>
                    <h2 class="h-section mt-4">
                        A partner for software that has to work in the real world
                    </h2>
                </div>
                <div class="lg:col-span-7" data-reveal data-reveal-delay="80">
                    <p class="text-lg leading-[1.75] text-brand-text">
                        {{ $whoWeAre['body'] }}
                    </p>
                    <ul class="mt-12 divide-y divide-brand-border border-y border-brand-border" data-reveal-stagger="70">
                        @foreach($whoWeAre['highlights'] as $highlight)
                            <li class="flex gap-5 py-6">
                                <x-icons.illustration :name="$highlight['icon']" size="sm" class="shrink-0" />
                                <div class="min-w-0">
                                    <h3 class="font-display text-[15px] font-semibold text-brand-heading">
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

    {{-- MISSION & VISION --}}
    <section class="border-y border-brand-border bg-brand-surface">
        <div class="site-container section-pad">
            <div data-reveal class="max-w-2xl">
                <span class="eyebrow">Direction</span>
                <h2 class="h-section mt-4">Mission &amp; Vision</h2>
                <p class="text-body mt-4">What we work toward every day, and where we intend to take Softrix.</p>
            </div>

            <div class="mt-16 grid grid-cols-1 gap-12 lg:grid-cols-2 lg:gap-20" data-reveal-stagger="100">
                @foreach([$mission, $vision] as $statement)
                    <article class="relative pl-6 sm:pl-8">
                        <div class="absolute bottom-0 left-0 top-0 w-px bg-brand-border" aria-hidden="true"></div>
                        <div class="absolute left-0 top-0 h-12 w-px bg-brand-accent" aria-hidden="true"></div>
                        <span class="font-mono text-[0.6875rem] uppercase tracking-[0.16em] text-brand-accent">
                            {{ $statement['title'] }}
                        </span>
                        <p class="mt-5 max-w-md text-lg leading-[1.7] text-brand-text sm:text-[1.125rem]">
                            {{ $statement['body'] }}
                        </p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- APPROACH --}}
    <section class="bg-brand-bg">
        <div class="site-container section-pad">
            <div data-reveal class="max-w-2xl">
                <x-sections.section-heading
                    :eyebrow="$approach['eyebrow']"
                    :title="$approach['title']"
                    :description="$approach['description']"
                />
            </div>

            <ol class="mt-16 grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-4 lg:gap-8" data-reveal-stagger="80">
                @foreach($approach['steps'] as $index => $step)
                    <li>
                        <span class="font-mono text-[0.6875rem] text-brand-accent">
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </span>
                        <h3 class="mt-3 font-display text-lg font-semibold text-brand-heading">
                            {{ $step['title'] }}
                        </h3>
                        <p class="mt-2 text-sm leading-relaxed text-brand-muted">
                            {{ $step['description'] }}
                        </p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- VALUES — editorial rows --}}
    <section class="border-t border-brand-border bg-brand-surface">
        <div class="site-container section-pad">
            <div data-reveal class="max-w-2xl">
                <span class="eyebrow">What Guides Us</span>
                <h2 class="h-section mt-4">Our Values</h2>
                <p class="text-body mt-4">The principles that shape how we design, build, and communicate.</p>
            </div>

            <div class="mt-14 divide-y divide-brand-border border-y border-brand-border" data-reveal-stagger="70">
                @foreach($values as $value)
                    <article class="grid grid-cols-1 gap-3 py-8 sm:grid-cols-12 sm:items-start sm:gap-10">
                        <div class="sm:col-span-4">
                            <h3 class="font-display text-lg font-semibold text-brand-heading">{{ $value['title'] }}</h3>
                        </div>
                        <div class="sm:col-span-8">
                            <p class="text-sm leading-relaxed text-brand-muted sm:text-base">{{ $value['description'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- PHILOSOPHY --}}
    <section class="bg-brand-bg">
        <div class="site-container section-pad">
            <div class="mx-auto max-w-3xl" data-reveal data-reveal-fade>
                <span class="eyebrow">{{ $techPhilosophy['eyebrow'] }}</span>
                <h2 class="h-section mt-4">{{ $techPhilosophy['title'] }}</h2>
                <blockquote class="mt-8 border-l-2 border-brand-accent pl-6">
                    <p class="text-lg font-medium leading-[1.65] text-brand-heading sm:text-xl">
                        {{ $techPhilosophy['body'] }}
                    </p>
                </blockquote>
            </div>
        </div>
    </section>

    <x-sections.cta-section :title="$cta['title']" :button="$cta['button']" />

</x-layouts.app>
