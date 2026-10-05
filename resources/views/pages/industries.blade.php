<x-layouts.app :seo="$seo">

    <x-sections.page-header
        :eyebrow="$page['eyebrow']"
        :title="$page['title']"
        :description="$page['description']"
    />

    <section class="border-b border-brand-border bg-brand-bg">
        <div class="site-container flex flex-col gap-3 py-6 sm:flex-row sm:items-center sm:gap-4">
            <x-buttons.primary :route="$page['primary_button']['route']">
                {{ $page['primary_button']['label'] }}
            </x-buttons.primary>
            <x-buttons.secondary :route="$page['secondary_button']['route']">
                {{ $page['secondary_button']['label'] }}
            </x-buttons.secondary>
        </div>
    </section>

    <section class="bg-brand-bg">
        <div class="site-container section-pad">
            <div data-reveal class="max-w-2xl">
                <x-sections.section-heading
                    :eyebrow="$focus['eyebrow']"
                    :title="$focus['title']"
                    :description="$focus['description']"
                />
            </div>

            <div class="mt-14 grid grid-cols-1 gap-10 lg:grid-cols-2" data-reveal-stagger="90">
                @foreach($focus['items'] as $item)
                    <article class="border-t-2 border-brand-accent pt-8">
                        @if($item['image'] ?? null)
                            <div class="media-frame mb-6 aspect-[16/9] border border-brand-border">
                                <img
                                    src="{{ $item['image'] }}"
                                    alt="{{ $item['image_alt'] ?? $item['title'] }}"
                                    loading="lazy"
                                    class="h-full w-full object-cover"
                                />
                            </div>
                        @endif
                        <h3 class="font-display text-2xl font-semibold text-brand-heading">{{ $item['title'] }}</h3>
                        <p class="mt-3 text-sm leading-relaxed text-brand-muted sm:text-base">{{ $item['description'] }}</p>
                        <a
                            href="{{ route($item['product_route']) }}"
                            class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-brand-accent transition-colors hover:text-brand-accent-hover"
                        >
                            {{ $item['product'] }}
                            <x-icons.icon name="arrow-right" class="h-4 w-4" />
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="border-t border-brand-border bg-brand-surface">
        <div class="site-container section-pad">
            <div data-reveal class="max-w-2xl">
                <x-sections.section-heading
                    eyebrow="Where We Work"
                    title="Industries and business types we support"
                    description="From hospitality floors to enterprise operations — adaptable software shaped around how each environment actually runs."
                />
            </div>

            <ul class="mt-12 divide-y divide-brand-border border-y border-brand-border" data-reveal-stagger="40">
                @foreach($industries as $industry)
                    <li class="grid grid-cols-1 gap-4 py-6 sm:grid-cols-12 sm:items-center sm:gap-8">
                        <div class="sm:col-span-3">
                            @if($industry['image'] ?? null)
                                <div class="aspect-[16/10] max-w-[12rem] overflow-hidden rounded-[var(--radius-md)] border border-brand-border">
                                    <img
                                        src="{{ $industry['image'] }}"
                                        alt="{{ $industry['image_alt'] ?? $industry['title'] }}"
                                        loading="lazy"
                                        class="h-full w-full object-cover"
                                    />
                                </div>
                            @endif
                        </div>
                        <div class="sm:col-span-3">
                            <h3 class="font-display text-lg font-semibold text-brand-heading">{{ $industry['title'] }}</h3>
                        </div>
                        <div class="sm:col-span-6">
                            <p class="text-sm leading-relaxed text-brand-muted">{{ $industry['description'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <section class="bg-brand-bg">
        <div class="site-container section-pad">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2 lg:gap-16">
                <div data-reveal>
                    <x-sections.section-heading
                        :eyebrow="$approach['eyebrow']"
                        :title="$approach['title']"
                        :description="$approach['body']"
                    />
                    <ul class="mt-8 space-y-3">
                        @foreach($approach['points'] as $point)
                            <li class="flex items-start gap-3 text-sm text-brand-text">
                                <x-icons.icon name="check" class="mt-0.5 h-4 w-4 shrink-0 text-brand-accent" />
                                <span>{{ $point }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mt-8">
                        <x-buttons.secondary route="services">Explore Services</x-buttons.secondary>
                    </div>
                </div>
                <div data-reveal data-reveal-scale data-reveal-delay="80">
                    <x-sections.media-panel
                        :src="$approach['image']"
                        :alt="$approach['image_alt']"
                        badge="Industry-aware by design"
                    />
                </div>
            </div>
        </div>
    </section>

    <x-sections.cta-section :title="$cta['title']" :button="$cta['button']" />

</x-layouts.app>
