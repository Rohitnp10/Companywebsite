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

    @php
        $lead = $featured[0] ?? $projects[0] ?? null;
        $rest = collect($projects)->reject(fn ($p) => $lead && ($p['slug'] ?? null) === ($lead['slug'] ?? null))->values();
    @endphp

    @if($lead)
        <section class="bg-brand-bg">
            <div class="site-container section-pad">
                <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-12 lg:gap-16">
                    <div class="lg:col-span-7" data-reveal data-reveal-scale>
                        <div class="media-frame border border-brand-border">
                            <img
                                src="{{ asset($lead['image']) }}"
                                alt="{{ $lead['title'] }}"
                                loading="lazy"
                                class="aspect-[4/3] w-full object-cover"
                            />
                        </div>
                    </div>
                    <div class="lg:col-span-5" data-reveal data-reveal-delay="80">
                        <span class="eyebrow">Featured Concept</span>
                        <p class="mt-4 font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-brand-muted">
                            {{ $lead['category'] }}
                            @if(!empty($lead['subtitle'])) · {{ $lead['subtitle'] }} @endif
                        </p>
                        <h2 class="h-section mt-3">{{ $lead['title'] }}</h2>
                        <p class="text-body mt-4">{{ $lead['description'] }}</p>
                        @if(!empty($lead['features']))
                            <ul class="mt-7 space-y-3">
                                @foreach($lead['features'] as $feature)
                                    <li class="flex items-start gap-3 text-sm text-brand-text">
                                        <x-icons.icon name="check" class="mt-0.5 h-4 w-4 shrink-0 text-brand-accent" />
                                        <span>{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="mt-8">
                            <x-buttons.secondary route="solutions">See Related Products</x-buttons.secondary>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="border-t border-brand-border bg-brand-surface">
        <div class="site-container section-pad">
            <div data-reveal class="max-w-2xl">
                <x-sections.section-heading
                    eyebrow="Concept Builds"
                    title="Internal projects that show how we work"
                    description="Each build explores a real operational problem — restaurant floors, retail counters, or cross-industry workflows."
                />
            </div>

            <div class="mt-14 grid grid-cols-1 gap-10 md:grid-cols-2" data-reveal-stagger="80">
                @foreach(($rest->isNotEmpty() ? $rest : $projects) as $project)
                    <x-cards.project-card
                        :title="$project['title']"
                        :subtitle="$project['subtitle'] ?? null"
                        :category="$project['category']"
                        :description="$project['description']"
                        :features="$project['features'] ?? []"
                        :image="$project['image']"
                        :icon="$project['icon'] ?? 'layout-grid'"
                        :featured="!empty($project['is_featured'])"
                    />
                @endforeach
            </div>
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
                        badge="From concept to product"
                    />
                </div>
            </div>
        </div>
    </section>

    <x-sections.cta-section :title="$cta['title']" :button="$cta['button']" />

</x-layouts.app>
