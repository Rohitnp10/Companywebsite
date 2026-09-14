<x-layouts.app :seo="$seo">

    <x-sections.page-header
        eyebrow="Contact"
        :title="$intro['title']"
        :description="$intro['description']"
    />

    <section class="bg-brand-bg">
        <div class="mx-auto grid max-w-7xl grid-cols-1 gap-12 px-6 py-20 lg:grid-cols-5 lg:gap-16 lg:px-8">

            <div class="lg:col-span-3 rounded-2xl border border-brand-border bg-brand-surface p-8" data-reveal data-reveal-left>
                <x-forms.contact-form :subjects="$subjects" />
            </div>

            <div class="lg:col-span-2 space-y-6" data-reveal-stagger="80" data-reveal-right>
                <div class="rounded-2xl border border-brand-border bg-brand-card p-6">
                    <div class="flex items-center gap-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-brand-surface text-brand-accent">
                            <x-icons.icon name="landmark" class="h-5 w-5" />
                        </span>
                        <h3 class="text-base font-semibold text-brand-heading">Office</h3>
                    </div>
                    <p class="text-small mt-3">{{ $company['address_line'] }}</p>
                </div>

                <div class="rounded-2xl border border-brand-border bg-brand-card p-6">
                    <div class="flex items-center gap-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-brand-surface text-brand-accent">
                            <x-icons.icon name="message-circle" class="h-5 w-5" />
                        </span>
                        <h3 class="text-base font-semibold text-brand-heading">Email</h3>
                    </div>
                    <a href="mailto:{{ $company['email'] }}" class="text-small mt-3 block text-brand-accent hover:underline">{{ $company['email'] }}</a>
                </div>

                <div class="rounded-2xl border border-brand-border bg-brand-card p-6">
                    <div class="flex items-center gap-3">
                        <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-brand-surface text-brand-accent">
                            <x-icons.icon name="device-mobile" class="h-5 w-5" />
                        </span>
                        <h3 class="text-base font-semibold text-brand-heading">Phone</h3>
                    </div>
                    <a href="tel:{{ $company['phone'] }}" class="text-small mt-3 block text-brand-accent hover:underline">{{ $company['phone_display'] }}</a>
                </div>

                <div class="overflow-hidden rounded-2xl border border-brand-border">
                    <iframe
                        src="{{ $company['map_embed_url'] }}"
                        class="h-56 w-full"
                        style="border:0;"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Office location map"
                    ></iframe>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>
