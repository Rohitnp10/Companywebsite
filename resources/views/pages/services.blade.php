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
            <div data-reveal class="max-w-2xl">
                <x-sections.section-heading
                    :eyebrow="$engagement['eyebrow']"
                    :title="$engagement['title']"
                    :description="$engagement['description']"
                />
            </div>

            <ol class="mt-16 grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-4" data-reveal-stagger="80">
                @foreach($engagement['steps'] as $index => $step)
                    <li>
                        <span class="font-mono text-[0.6875rem] text-brand-accent">
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </span>
                        <h3 class="mt-3 font-display text-lg font-semibold text-brand-heading">{{ $step['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-brand-muted">{{ $step['description'] }}</p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    <section class="border-t border-brand-border bg-brand-surface">
        <div class="site-container section-pad">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-16">
                <div class="lg:col-span-4" data-reveal>
                    <div class="lg:sticky lg:top-28">
                        <span class="eyebrow">Capabilities</span>
                        <h2 class="h-section mt-4">Everything we build with you</h2>
                        <p class="text-body mt-4">
                            Eight focused service areas covering the full lifecycle of business software — from concept and design through cloud, integrations, and support.
                        </p>
                    </div>
                </div>

                <div class="lg:col-span-8">
                    <ul class="divide-y divide-brand-border border-y border-brand-border" data-reveal-stagger="60">
                        @foreach($services as $index => $service)
                            <li class="group grid grid-cols-1 gap-6 py-10 sm:grid-cols-12 sm:gap-8">
                                <div class="sm:col-span-1">
                                    <span class="font-mono text-[0.6875rem] text-brand-accent">
                                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                    </span>
                                </div>
                                <div class="sm:col-span-7">
                                    <h3 class="font-display text-xl font-semibold text-brand-heading">{{ $service['title'] }}</h3>
                                    <p class="mt-3 text-sm leading-relaxed text-brand-muted sm:text-base">{{ $service['short_description'] }}</p>
                                    @if(!empty($service['features']))
                                        <ul class="mt-5 space-y-2">
                                            @foreach($service['features'] as $feature)
                                                <li class="flex items-start gap-2.5 text-sm text-brand-text">
                                                    <span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-brand-accent"></span>
                                                    <span>{{ $feature }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                                @if(!empty($service['image']))
                                    <div class="media-frame border border-brand-border sm:col-span-4">
                                        <img
                                            src="{{ $service['image'] }}"
                                            alt="{{ $service['image_alt'] ?? $service['title'] }}"
                                            loading="lazy"
                                            class="aspect-[4/3] h-full w-full object-cover transition-transform duration-700 group-hover:scale-[1.02]"
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

    <section class="bg-brand-bg">
        <div class="site-container section-pad">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-12 lg:gap-16">
                <div class="lg:col-span-6" data-reveal>
                    <span class="eyebrow">{{ $partnership['eyebrow'] }}</span>
                    <h2 class="h-section mt-4">{{ $partnership['title'] }}</h2>
                    <p class="mt-5 text-base leading-relaxed text-brand-text">{{ $partnership['body'] }}</p>
                    <ul class="mt-8 divide-y divide-brand-border border-y border-brand-border">
                        @foreach($partnership['points'] as $point)
                            <li class="flex items-start gap-3 py-3.5 text-sm text-brand-text">
                                <x-icons.icon name="check" class="mt-0.5 h-4 w-4 shrink-0 text-brand-accent" />
                                <span>{{ $point }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mt-8">
                        <x-buttons.secondary route="about">Learn About Softrix</x-buttons.secondary>
                    </div>
                </div>
                <div class="lg:col-span-6" data-reveal data-reveal-scale data-reveal-delay="80">
                    <x-sections.media-panel
                        :src="$partnership['image']"
                        :alt="$partnership['image_alt']"
                        badge="Built to last beyond launch"
                    />
                </div>
            </div>
        </div>
    </section>

    <section class="border-t border-brand-border bg-brand-surface">
        <div class="site-container section-pad">
            <div class="mx-auto max-w-2xl text-center" data-reveal>
                <span class="eyebrow justify-center">Web &amp; Mobile Ready</span>
                <h2 class="h-section mt-4">Designed for every screen your team uses</h2>
                <p class="text-body mt-4">
                    Whether it's a desk, a counter, or the floor — we build experiences that stay clear and usable across devices.
                </p>
            </div>
            <div class="mx-auto mt-12 max-w-4xl" data-reveal data-reveal-scale>
                <div class="media-frame border border-brand-border">
                    <img
                        src="{{ $page['image'] }}"
                        alt="{{ $page['image_alt'] }}"
                        loading="lazy"
                        class="aspect-[16/9] w-full object-cover"
                    />
                </div>
            </div>
        </div>
    </section>

    <x-sections.cta-section :title="$cta['title']" :button="$cta['button']" />

</x-layouts.app>
