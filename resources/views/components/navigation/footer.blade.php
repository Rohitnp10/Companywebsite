@php
    $company = \App\Content\CompanyContent::profile();
    $columns = config('navigation.footer_columns');
@endphp

<footer class="border-t border-brand-border bg-brand-primary text-white/80">
    <div class="mx-auto max-w-7xl px-6 py-16 lg:px-8">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-5">
            <div class="lg:col-span-2">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-white text-sm font-extrabold text-brand-primary">
                        {{ substr($company['short_name'], 0, 1) }}
                    </span>
                    <span class="text-lg font-extrabold tracking-tight text-white">
                        {{ $company['short_name'] }}<span class="text-brand-accent-light">.</span>
                    </span>
                </a>
                <p class="mt-4 max-w-sm text-sm leading-relaxed text-white/60">
                    {{ $company['description'] }}
                </p>

                <div class="mt-6 flex items-center gap-3">
                    @foreach($company['social'] as $link)
                        <x-navigation.social-link :label="$link['label']" :icon="$link['icon']" :url="$link['url']" />
                    @endforeach
                </div>
            </div>

            @foreach($columns as $column)
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wide text-white">{{ $column['heading'] }}</h3>
                    <ul class="mt-4 space-y-3">
                        @foreach($column['links'] as $link)
                            <li>
                                <a href="{{ route($link['route']) }}" class="text-sm text-white/60 transition-colors hover:text-white">
                                    {{ $link['label'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach

            <div>
                <h3 class="text-sm font-semibold uppercase tracking-wide text-white">Contact</h3>
                <ul class="mt-4 space-y-3 text-sm text-white/60">
                    <li>{{ $company['address_line'] }}</li>
                    <li>
                        <a href="mailto:{{ $company['email'] }}" class="hover:text-white">{{ $company['email'] }}</a>
                    </li>
                    <li>
                        <a href="tel:{{ $company['phone'] }}" class="hover:text-white">{{ $company['phone_display'] }}</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-12 flex flex-col items-center justify-between gap-4 border-t border-white/10 pt-8 text-sm text-white/50 sm:flex-row">
            <p>&copy; {{ date('Y') }} {{ $company['name'] }}. All rights reserved.</p>
            <p>Built with Laravel &amp; Tailwind CSS.</p>
        </div>
    </div>
</footer>
