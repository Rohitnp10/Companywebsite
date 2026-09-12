@php
    $navItems = config('navigation.primary');
    $cta = config('navigation.cta');
    $companyShortName = config('company.short_name');
@endphp

<header
    x-data="{ open: false, scrolled: false }"
    x-init="scrolled = window.scrollY > 8; window.addEventListener('scroll', () => scrolled = window.scrollY > 8)"
    :class="scrolled ? 'bg-white/90 shadow-soft backdrop-blur-md' : 'bg-white/0'"
    class="sticky top-0 z-50 w-full transition-all duration-300"
>
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 lg:px-8" aria-label="Main navigation">
        <a href="{{ route('home') }}" class="flex items-center gap-2 shrink-0">
            <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-brand-primary text-sm font-extrabold text-white">
                {{ substr($companyShortName, 0, 1) }}
            </span>
            <span class="text-lg font-extrabold tracking-tight text-brand-primary">
                {{ $companyShortName }}<span class="text-brand-accent">.</span>
            </span>
        </a>

        <div class="hidden items-center gap-8 lg:flex">
            @foreach($navItems as $item)
                <a
                    href="{{ route($item['route']) }}"
                    class="text-sm font-medium transition-colors duration-150 {{ request()->routeIs($item['route']) ? 'text-brand-accent' : 'text-brand-text/80 hover:text-brand-accent' }}"
                >
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>

        <div class="hidden lg:block">
            <x-buttons.primary :route="$cta['route']" class="!px-5 !py-2.5">
                {{ $cta['label'] }}
            </x-buttons.primary>
        </div>

        <button
            @click="open = !open"
            type="button"
            class="inline-flex items-center justify-center rounded-lg p-2 text-brand-primary lg:hidden"
            aria-label="Toggle navigation menu"
            :aria-expanded="open"
        >
            <svg x-show="!open" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-show="open" x-cloak class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
    </nav>

    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        class="border-t border-brand-border bg-white lg:hidden"
    >
        <div class="space-y-1 px-6 py-4">
            @foreach($navItems as $item)
                <a
                    href="{{ route($item['route']) }}"
                    @click="open = false"
                    class="block rounded-lg px-3 py-2.5 text-base font-medium {{ request()->routeIs($item['route']) ? 'bg-brand-surface text-brand-accent' : 'text-brand-text hover:bg-brand-surface' }}"
                >
                    {{ $item['label'] }}
                </a>
            @endforeach
            <div class="pt-3">
                <x-buttons.primary :route="$cta['route']" class="w-full">
                    {{ $cta['label'] }}
                </x-buttons.primary>
            </div>
        </div>
    </div>
</header>
