<x-layouts.app :seo="$seo">

    <x-sections.page-header
        eyebrow="Careers"
        title="Join the Softrix Team"
        description="We're building a team that cares about craftsmanship, honesty, and solving real problems with technology."
    />

    <section class="bg-brand-bg">
        <div class="site-container section-pad">
            <div data-reveal class="max-w-2xl">
                <x-sections.section-heading eyebrow="Why Softrix" title="Why work with us" />
            </div>

            <div class="mt-14 grid grid-cols-1 gap-x-10 gap-y-2 sm:grid-cols-3" data-reveal-stagger="70">
                @foreach($whyJoinUs as $item)
                    <x-cards.feature-card
                        :title="$item['title']"
                        :description="$item['description']"
                        :icon="$item['icon']"
                        :image="$item['image']"
                        :image-alt="$item['image_alt']"
                    />
                @endforeach
            </div>
        </div>
    </section>

    <section class="border-t border-brand-border bg-brand-surface">
        <div class="site-container section-pad">
            <div data-reveal class="max-w-2xl">
                <x-sections.section-heading eyebrow="Open Positions" title="Current openings" />
            </div>

            <div class="mt-10" data-reveal>
                @forelse($jobs as $job)
                    <x-cards.job-card
                        :title="$job['title']"
                        :department="$job['department']"
                        :location="$job['location']"
                        :employment_type="$job['employment_type']"
                        :description="$job['description']"
                    />
                @empty
                    <div class="border border-dashed border-brand-border bg-brand-bg px-6 py-12 text-center sm:px-10">
                        <p class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-brand-accent">No openings</p>
                        <p class="text-body mx-auto mt-4 max-w-lg">{{ $noOpeningsMessage }}</p>
                        <div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">
                            <x-buttons.primary route="contact">Get In Touch</x-buttons.primary>
                            <x-buttons.secondary route="team">Meet the Team</x-buttons.secondary>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

</x-layouts.app>
