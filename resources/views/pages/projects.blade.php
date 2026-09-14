<x-layouts.app :seo="$seo">

    {{-- HERO --}}
    <section class="relative overflow-hidden border-b border-brand-border bg-brand-surface">
        <div class="pointer-events-none absolute inset-0 opacity-[0.04]" aria-hidden="true">
            <svg class="h-full w-full" preserveAspectRatio="none">
                <defs>
                    <pattern id="projects-hero-grid" width="48" height="48" patternUnits="userSpaceOnUse">
                        <path d="M48 0H0V48" fill="none" stroke="currentColor" stroke-width="0.6" class="text-brand-heading" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#projects-hero-grid)" />
            </svg>
        </div>
        <div class="pointer-events-none absolute -right-20 top-0 h-72 w-72 rounded-full bg-brand-accent/10 blur-3xl" aria-hidden="true"></div>

        <div class="relative mx-auto max-w-7xl px-6 py-20 lg:px-8 lg:py-28">
            <div class="mx-auto max-w-3xl text-center">
                <span class="eyebrow page-enter justify-center">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                    {{ $page['eyebrow'] }}
                </span>
                <h1 class="h-page page-enter page-enter-delay-1 mt-5">{{ $page['title'] }}</h1>
                <p class="text-body page-enter page-enter-delay-2 mx-auto mt-6 max-w-2xl text-base sm:text-lg">
                    {{ $page['description'] }}
                </p>
                <div class="page-enter page-enter-delay-3 mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
                    <x-buttons.primary :route="$page['primary_button']['route']">
                        {{ $page['primary_button']['label'] }}
                    </x-buttons.primary>
                    <x-buttons.secondary :route="$page['secondary_button']['route']">
                        {{ $page['secondary_button']['label'] }}
                    </x-buttons.secondary>
                </div>
            </div>
        </div>
    </section>

    {{-- FEATURED PROJECT --}}
    @php
        $lead = $featured[0] ?? $projects[0] ?? null;
    @endphp
    @if($lead)
        <section class="bg-brand-bg">
            <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8 lg:py-28">
                <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2 lg:gap-16">
                    <div data-reveal data-reveal-scale>
                        @if($lead['image'])
                            <div class="overflow-hidden rounded-2xl border border-brand-border shadow-soft-lg">
                                <img
                                    src="{{ asset($lead['image']) }}"
                                    alt="{{ $lead['title'] }}"
                                    loading="lazy"
                                    class="aspect-[4/3] w-full object-cover"
                                />
                            </div>
                        @else
                            <x-sections.media-panel
                                :src="asset('images/home/hero-tech.jpg')"
                                :alt="$lead['title']"
                                badge="Concept build"
                                :float-icons="[$lead['icon'] ?? 'layout-grid', 'code', 'layout-grid']"
                            />
                        @endif
                    </div>

                    <div data-reveal data-reveal-delay="100">
                        <span class="eyebrow">
                            <span class="h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                            Featured Concept
                        </span>
                        <p class="mt-4 text-xs font-semibold uppercase tracking-widest text-brand-muted">
                            {{ $lead['category'] }}
                            @if(!empty($lead['subtitle']))
                                · {{ $lead['subtitle'] }}
                            @endif
                        </p>
                        <h2 class="h-section mt-3">{{ $lead['title'] }}</h2>
                        <p class="text-body mt-4">{{ $lead['description'] }}</p>

                        @if(!empty($lead['features']))
                            <ul class="mt-7 space-y-3">
                                @foreach($lead['features'] as $feature)
                                    <li class="flex items-start gap-3 text-sm text-brand-text">
                                        <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-brand-accent/15">
                                            <x-icons.icon name="check" class="h-3 w-3 text-brand-accent" />
                                        </span>
                                        <span>{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="mt-9">
                            <x-buttons.secondary route="solutions">See Related Products</x-buttons.secondary>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- ALL PROJECTS --}}
    <section class="border-t border-brand-border bg-brand-surface">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div data-reveal>
                <x-sections.section-heading
                    eyebrow="Concept Builds"
                    title="Internal projects that show how we work"
                    description="Each build explores a real operational problem — restaurant floors, retail counters, or cross-industry workflows."
                    align="center"
                />
            </div>

            <div class="mt-14 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3" data-reveal-stagger="90" data-reveal-scale>
                @foreach($projects as $project)
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

    {{-- APPROACH --}}
    <section class="bg-brand-bg">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8 lg:py-28">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2 lg:gap-16">
                <div data-reveal data-reveal-left>
                    <x-sections.section-heading
                        :eyebrow="$approach['eyebrow']"
                        :title="$approach['title']"
                        :description="$approach['body']"
                    />

                    <ul class="mt-8 space-y-3" data-reveal-stagger="60">
                        @foreach($approach['points'] as $point)
                            <li class="flex items-start gap-3 text-sm text-brand-text">
                                <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-brand-accent/15">
                                    <x-icons.icon name="check" class="h-3 w-3 text-brand-accent" />
                                </span>
                                <span>{{ $point }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-9">
                        <x-buttons.secondary route="services">Explore Services</x-buttons.secondary>
                    </div>
                </div>

                <div data-reveal data-reveal-scale data-reveal-delay="100">
                    <x-sections.media-panel
                        :src="$approach['image']"
                        :alt="$approach['image_alt']"
                        badge="From concept to product"
                        :float-icons="['code', 'layout-grid', 'briefcase']"
                    />
                </div>
            </div>
        </div>
    </section>

    <x-sections.cta-section :title="$cta['title']" :button="$cta['button']" />

</x-layouts.app>
