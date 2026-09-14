<x-layouts.app :seo="$seo">

    <x-sections.page-header
        eyebrow="Careers"
        title="Join the Softrix Team"
        description="We're building a team that cares about craftsmanship, honesty, and solving real problems with technology."
    />

    {{-- WHY JOIN US --}}
    <section class="bg-brand-bg">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <x-sections.section-heading eyebrow="Why Softrix" title="Why Work With Us" align="center" />

            <div class="mt-14 grid grid-cols-1 gap-6 sm:grid-cols-3">
                @foreach($whyJoinUs as $item)
                    <x-cards.feature-card :title="$item['title']" :description="$item['description']" :icon="$item['icon']" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- OPEN POSITIONS --}}
    <section class="border-t border-brand-border bg-brand-surface">
        <div class="mx-auto max-w-5xl px-6 py-20 lg:px-8">
            <x-sections.section-heading eyebrow="Open Positions" title="Current Openings" align="center" />

            <div class="mt-12 space-y-4">
                @forelse($jobs as $job)
                    <x-cards.job-card
                        :title="$job['title']"
                        :department="$job['department']"
                        :location="$job['location']"
                        :employment_type="$job['employment_type']"
                        :description="$job['description']"
                    />
                @empty
                    <div class="rounded-2xl border border-dashed border-brand-border bg-brand-card p-10 text-center">
                        <x-icons.icon name="briefcase" class="mx-auto h-8 w-8 text-brand-muted" />
                        <p class="text-body mt-4">{{ $noOpeningsMessage }}</p>
                        <div class="mt-6 flex justify-center">
                            <x-buttons.secondary route="contact">Get In Touch</x-buttons.secondary>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

</x-layouts.app>
