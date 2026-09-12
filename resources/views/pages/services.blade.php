<x-layouts.app :seo="$seo">

    <x-sections.page-header
        eyebrow="What We Do"
        title="Services Built Around Your Goals"
        description="From first line of code to long-term support, here's how we help businesses build and maintain the software they run on."
    />

    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($services as $service)
                    <x-cards.service-card
                        :title="$service['title']"
                        :description="$service['short_description']"
                        :icon="$service['icon']"
                        :features="$service['features']"
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
