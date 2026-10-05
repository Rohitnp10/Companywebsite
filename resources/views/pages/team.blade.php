<x-layouts.app :seo="$seo">

    <x-sections.page-header
        :eyebrow="$page['eyebrow']"
        :title="$page['title']"
        :description="$page['description']"
    />

    <section class="bg-brand-bg">
        <div class="site-container section-pad">
            @if(count($members))
                <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3" data-reveal-stagger="80">
                    @foreach($members as $member)
                        <x-cards.team-card
                            :name="$member['name']"
                            :role="$member['role'] ?? null"
                            :bio="$member['bio'] ?? null"
                            :image="$member['image'] ?? null"
                            :image-alt="$member['image_alt'] ?? null"
                        />
                    @endforeach
                </div>
            @else
                <div class="border border-dashed border-brand-border bg-brand-surface px-6 py-14 text-center sm:px-10" data-reveal>
                    <p class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-brand-accent">Profiles coming soon</p>
                    <p class="text-body mx-auto mt-4 max-w-xl">{{ $emptyMessage }}</p>
                    <div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">
                        <x-buttons.primary route="careers">View Careers</x-buttons.primary>
                        <x-buttons.secondary route="contact">Get In Touch</x-buttons.secondary>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <section class="border-t border-brand-border bg-brand-surface">
        <div class="site-container section-pad">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-16">
                <div class="lg:col-span-5" data-reveal>
                    <span class="eyebrow">{{ $culture['eyebrow'] }}</span>
                    <h2 class="h-section mt-4">{{ $culture['title'] }}</h2>
                    <p class="text-body mt-4">{{ $culture['body'] }}</p>
                </div>
                <div class="lg:col-span-7" data-reveal-stagger="70">
                    <ul class="divide-y divide-brand-border border-y border-brand-border">
                        @foreach($culture['points'] as $point)
                            <li class="py-6">
                                <h3 class="font-display text-base font-semibold text-brand-heading">{{ $point['title'] }}</h3>
                                <p class="mt-2 text-sm leading-relaxed text-brand-muted">{{ $point['description'] }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <x-sections.cta-section :title="$cta['title']" :button="$cta['button']" />

</x-layouts.app>
