@php
    $company = \App\Content\CompanyContent::profile();
    $columns = config('navigation.footer_columns');
    $cta = config('navigation.cta');
@endphp

<footer class="relative overflow-hidden border-t border-brand-border bg-brand-surface text-brand-text" data-reveal data-reveal-fade>
    {{-- subtle grid texture --}}
    <div class="pointer-events-none absolute inset-0 text-brand-heading opacity-[0.05]" aria-hidden="true">
        <svg class="h-full w-full" preserveAspectRatio="none">
            <defs>
                <pattern id="footer-grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M40 0H0V40" fill="none" stroke="currentColor" stroke-width="0.5" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#footer-grid)" />
        </svg>
    </div>

    {{-- soft Royal Blue glow --}}
    <div class="pointer-events-none absolute -left-24 top-0 h-64 w-64 rounded-full bg-brand-accent/15 blur-3xl" aria-hidden="true"></div>
    <div class="pointer-events-none absolute -right-16 bottom-0 h-48 w-48 rounded-full bg-brand-accent/10 blur-3xl" aria-hidden="true"></div>

    <div class="relative mx-auto max-w-7xl px-6 pt-16 lg:px-8 lg:pt-20">
        {{-- Brand + CTA strip --}}
        <div class="flex flex-col gap-8 border-b border-brand-border pb-12 lg:flex-row lg:items-end lg:justify-between">
            <div class="max-w-xl">
                <a href="{{ route('home') }}" class="group inline-flex items-center gap-2.5">
                    <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-brand-accent text-sm font-extrabold text-white transition-transform duration-300 group-hover:-rotate-6 group-hover:scale-105">
                        {{ substr($company['short_name'], 0, 1) }}
                    </span>
                    <span class="text-xl font-extrabold tracking-tight text-brand-heading">
                        {{ $company['short_name'] }}<span class="text-brand-accent">.</span>
                    </span>
                </a>
                <p class="mt-4 text-sm font-medium text-brand-accent">{{ $company['tagline'] }}</p>
                <p class="mt-3 max-w-md text-sm leading-relaxed text-brand-muted">
                    {{ $company['description'] }}
                </p>
            </div>

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                <div class="flex items-center gap-2.5">
                    @foreach($company['social'] as $link)
                        <x-navigation.social-link
                            :label="$link['label']"
                            :icon="$link['icon']"
                            :url="$link['url']"
                        />
                    @endforeach
                </div>
                <a
                    href="{{ route($cta['route']) }}"
                    class="inline-flex items-center justify-center gap-2 rounded-lg bg-brand-accent px-5 py-3 text-sm font-semibold text-white transition-all duration-200 hover:-translate-y-0.5 hover:bg-brand-accent-hover hover:shadow-glow"
                >
                    {{ $cta['label'] }}
                    <x-icons.icon name="arrow-right" class="h-4 w-4" />
                </a>
            </div>
        </div>

        {{-- Link columns --}}
        <div class="grid grid-cols-1 gap-x-8 gap-y-10 py-14 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($columns as $column)
                <div>
                    <h3 class="text-xs font-semibold uppercase tracking-[0.18em] text-brand-heading">{{ $column['heading'] }}</h3>
                    <ul class="mt-5 space-y-3">
                        @foreach($column['links'] as $link)
                            <li>
                                <a
                                    href="{{ route($link['route']) }}"
                                    class="group inline-flex items-center gap-1.5 text-sm text-brand-muted transition-colors duration-200 hover:text-brand-accent"
                                >
                                    <span class="transition-transform duration-200 group-hover:translate-x-0.5">{{ $link['label'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach

            <div>
                <h3 class="text-xs font-semibold uppercase tracking-[0.18em] text-brand-heading">Contact</h3>
                <ul class="mt-5 space-y-4 text-sm text-brand-muted">
                    <li class="flex items-start gap-3">
                        <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-border bg-brand-card text-brand-accent">
                            <x-icons.icon name="map-pin" class="h-3.5 w-3.5" />
                        </span>
                        <span class="leading-relaxed pt-1.5">{{ $company['address_line'] }}</span>
                    </li>
                    <li>
                        <a href="mailto:{{ $company['email'] }}" class="group flex items-start gap-3 transition-colors duration-200 hover:text-brand-accent">
                            <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-border bg-brand-card text-brand-accent transition-colors group-hover:border-brand-accent/40 group-hover:bg-brand-accent/10">
                                <x-icons.icon name="mail" class="h-3.5 w-3.5" />
                            </span>
                            <span class="break-all leading-relaxed pt-1.5">{{ $company['email'] }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="tel:{{ $company['phone'] }}" class="group flex items-start gap-3 transition-colors duration-200 hover:text-brand-accent">
                            <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg border border-brand-border bg-brand-card text-brand-accent transition-colors group-hover:border-brand-accent/40 group-hover:bg-brand-accent/10">
                                <x-icons.icon name="phone" class="h-3.5 w-3.5" />
                            </span>
                            <span class="leading-relaxed pt-1.5">{{ $company['phone_display'] }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Bottom bar --}}
        <div class="flex flex-col items-start justify-between gap-4 border-t border-brand-border py-7 text-sm text-brand-muted sm:flex-row sm:items-center">
            <p>&copy; {{ date('Y') }} {{ rtrim($company['name'], '.') }}. All rights reserved.</p>
            <p class="text-brand-muted">{{ $company['tagline'] }}</p>
        </div>
    </div>
</footer>
