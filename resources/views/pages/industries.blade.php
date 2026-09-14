<x-layouts.app :seo="$seo">

    <x-sections.page-header
        eyebrow="Industries"
        title="Industries We Build For"
        description="We design software that adapts to the operational realities of different industries — here's where our approach fits well."
    />

    <section class="bg-brand-bg">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div class="grid grid-cols-2 gap-5 sm:grid-cols-3 lg:grid-cols-4">
                @foreach($industries as $industry)
                    <x-cards.industry-card
                        :title="$industry['title']"
                        :description="$industry['description']"
                        :icon="$industry['icon']"
                    />
                @endforeach
            </div>
        </div>
    </section>

    <x-sections.cta-section
        title="Don't see your industry listed? Let's talk about what you need."
        :button="['label' => \"Let's Talk\", 'route' => 'contact']"
    />

</x-layouts.app>
