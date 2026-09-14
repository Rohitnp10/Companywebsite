<x-layouts.app :seo="$seo">

    <x-sections.page-header
        eyebrow="Projects"
        title="What We've Been Building"
        description="A look at the concept builds we use to demonstrate our engineering and design approach."
    />

    <section class="bg-brand-bg">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($projects as $project)
                    <x-cards.project-card
                        :title="$project['title']"
                        :category="$project['category']"
                        :description="$project['description']"
                        :technologies="$project['technologies']"
                        :image="$project['image']"
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
