<x-layouts.app :seo="$seo">

    <x-sections.page-header
        eyebrow="Contact"
        :title="$intro['title']"
        :description="$intro['description']"
    />

    <section class="bg-brand-bg">
        <div class="site-container section-pad">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-16">
                <div class="border border-brand-border bg-brand-surface p-6 sm:p-8 lg:col-span-7" data-reveal>
                    <x-forms.contact-form :subjects="$subjects" />
                </div>

                <aside class="space-y-8 lg:col-span-5" data-reveal data-reveal-delay="80">
                    <div class="border-t border-brand-border pt-6">
                        <h3 class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-brand-muted">Office</h3>
                        <p class="mt-3 text-sm leading-relaxed text-brand-heading">{{ $company['address_line'] }}</p>
                    </div>
                    <div class="border-t border-brand-border pt-6">
                        <h3 class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-brand-muted">Email</h3>
                        <a href="mailto:{{ $company['email'] }}" class="mt-3 block break-all text-sm text-brand-accent hover:underline">
                            {{ $company['email'] }}
                        </a>
                    </div>
                    <div class="border-t border-brand-border pt-6">
                        <h3 class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-brand-muted">Phone</h3>
                        <a href="tel:{{ $company['phone'] }}" class="mt-3 block text-sm text-brand-accent hover:underline">
                            {{ $company['phone_display'] }}
                        </a>
                    </div>
                    <div class="overflow-hidden border border-brand-border">
                        <iframe
                            src="{{ $company['map_embed_url'] }}"
                            class="h-56 w-full"
                            style="border:0;"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Office location map"
                        ></iframe>
                    </div>
                </aside>
            </div>
        </div>
    </section>

</x-layouts.app>
