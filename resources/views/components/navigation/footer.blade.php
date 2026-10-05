@php
    $company = \App\Content\CompanyContent::profile();
    $columns = config('navigation.footer_columns');
    $cta = config('navigation.cta');
@endphp

<footer class="border-t border-brand-border bg-brand-surface text-brand-text">
    <div class="site-container pt-14 lg:pt-16">
        <div class="flex flex-col gap-8 border-b border-brand-border pb-10 lg:flex-row lg:items-end lg:justify-between">
            <div class="max-w-lg">
                <a href="{{ route('home') }}" class="inline-flex items-center" aria-label="{{ $company['short_name'] }}">
                    <img
                        src="{{ asset(config('company.logo')) }}"
                        alt="{{ $company['short_name'] }}"
                        class="h-9 w-auto dark:hidden"
                    >
                    <img
                        src="{{ asset(config('company.logo_on_dark')) }}"
                        alt=""
                        class="hidden h-9 w-auto dark:block"
                    >
                </a>
                <p class="mt-4 text-sm font-medium text-brand-accent">
                    {{ $company['tagline'] }}
                </p>
                <p class="mt-3 max-w-md text-sm leading-relaxed text-brand-muted">
                    {{ $company['description'] }}
                </p>
            </div>

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                <div class="flex items-center gap-2">
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
                    class="inline-flex items-center justify-center gap-2 rounded-[var(--radius-md)] bg-brand-accent px-5 py-2.5 text-sm font-semibold text-white transition-colors duration-200 hover:bg-brand-accent-hover"
                >
                    {{ $cta['label'] }}
                    <x-icons.icon name="arrow-right" class="h-4 w-4" />
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-x-8 gap-y-10 py-12 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($columns as $column)
                <div>
                    <h3 class="text-sm font-semibold text-brand-heading">
                        {{ $column['heading'] }}
                    </h3>
                    <ul class="mt-5 space-y-3">
                        @foreach($column['links'] as $link)
                            <li>
                                <a
                                    href="{{ route($link['route']) }}"
                                    class="text-sm text-brand-muted transition-colors duration-200 hover:text-brand-accent"
                                >
                                    {{ $link['label'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach

            <div>
                <h3 class="text-sm font-semibold text-brand-heading">
                    Contact
                </h3>
                <ul class="mt-5 space-y-4 text-sm text-brand-muted">
                    <li class="leading-relaxed">{{ $company['address_line'] }}</li>
                    <li>
                        <a href="mailto:{{ $company['email'] }}" class="break-all transition-colors hover:text-brand-accent">
                            {{ $company['email'] }}
                        </a>
                    </li>
                    <li>
                        <a href="tel:{{ $company['phone'] }}" class="transition-colors hover:text-brand-accent">
                            {{ $company['phone_display'] }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="flex flex-col items-start justify-between gap-3 border-t border-brand-border py-6 text-sm text-brand-muted sm:flex-row sm:items-center">
            <p>&copy; {{ date('Y') }} {{ rtrim($company['name'], '.') }}. All rights reserved.</p>
            <p class="text-sm text-brand-muted">{{ $company['city'] }}, {{ $company['country'] }}</p>
        </div>
    </div>
</footer>
