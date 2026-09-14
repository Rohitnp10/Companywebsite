<x-layouts.app :seo="$seo">

    <x-sections.page-header
        eyebrow="Products"
        title="Software Products Built by Softrix"
        description="Restaurant Management System is live and in use today. Hotel and Dental Management Systems are in active development."
    />

    <section class="bg-brand-bg">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                @foreach($solutions as $solution)
                    <x-cards.product-card
                        :title="$solution['title']"
                        :category="$solution['category']"
                        :status="$solution['status']"
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
