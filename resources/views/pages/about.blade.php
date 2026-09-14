<x-layouts.app :seo="$seo">

    <x-sections.page-header
        eyebrow="About Softrix"
        :title="$whoWeAre['title']"
        :description="$whoWeAre['body']"
    />

    {{-- MISSION & VISION --}}
    <section class="bg-brand-bg">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                <div class="rounded-2xl border border-brand-border bg-brand-surface p-8">
                    <span class="eyebrow">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                        {{ $mission['title'] }}
                    </span>
                    <p class="h-subsection mt-4 !text-xl">{{ $mission['body'] }}</p>
                </div>
                <div class="rounded-2xl border border-brand-border bg-brand-primary p-8 text-white">
                    <span class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-brand-accent">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                        {{ $vision['title'] }}
                    </span>
                    <p class="mt-4 text-xl font-semibold leading-snug">{{ $vision['body'] }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- VALUES --}}
    <section class="border-t border-brand-border bg-brand-surface">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <x-sections.section-heading eyebrow="What Guides Us" title="Our Values" align="center" />

            <div class="mt-14 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($values as $value)
                    <x-cards.feature-card :title="$value['title']" :description="$value['description']" :icon="$value['icon']" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- APPROACH --}}
    <section class="bg-brand-bg">
        <div class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <x-sections.section-heading eyebrow="How We Work" :title="$approach['title']" align="center" />

            <div class="mt-14 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($approach['steps'] as $index => $step)
                    <div class="relative">
                        <span class="text-5xl font-extrabold text-brand-border">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3 class="h-subsection mt-3">{{ $step['title'] }}</h3>
                        <p class="text-small mt-2">{{ $step['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- TECH PHILOSOPHY --}}
    <section class="border-t border-brand-border bg-brand-surface">
        <div class="mx-auto max-w-4xl px-6 py-20 text-center lg:px-8">
            <x-sections.section-heading
                eyebrow="Our Thinking"
                :title="$techPhilosophy['title']"
                :description="$techPhilosophy['body']"
                align="center"
            />
        </div>
    </section>

    <x-sections.cta-section
        title="Have an idea or business challenge? Let's build something valuable."
        :button="['label' => \"Let's Talk\", 'route' => 'contact']"
    />

</x-layouts.app>
