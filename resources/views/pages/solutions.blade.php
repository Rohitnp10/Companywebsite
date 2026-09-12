<x-layouts.app :seo="$seo">

    <x-sections.page-header
        eyebrow="Solutions"
        title="Software Products & Business Solutions"
        description="Configurable product concepts designed to solve real operational problems — ready to be tailored to your business."
    />

    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div class="mb-10 rounded-2xl border border-brand-border bg-brand-surface p-6 text-sm text-brand-muted">
                <strong class="text-brand-primary">Note:</strong> the solutions below are product concepts we design and customize for clients, not off-the-shelf commercial products with existing customers. Get in touch to discuss building one of these — or something entirely custom — for your business.
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                @foreach($solutions as $solution)
                    <x-cards.product-card
                        :title="$solution['title']"
                        :category="$solution['category']"
                        :description="$solution['description']"
                        :icon="$solution['icon']"
                        :capabilities="$solution['capabilities']"
                    />
                @endforeach
            </div>
        </div>
    </section>

    <x-sections.cta-section
        title="Have an idea or business challenge? Let's build something valuable."
        :button="['label' => \"Let's Talk\", 'route' => 'contact']"
    />

</x-layouts.app>
