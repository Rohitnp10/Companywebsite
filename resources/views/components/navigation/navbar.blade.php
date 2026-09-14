@php
    $navItems = config('navigation.primary');
    $cta = config('navigation.cta');
    $companyShortName = config('company.short_name');
@endphp

<header
    x-data="{ open: false, scrolled: false }"
    x-init="scrolled = window.scrollY > 8; window.addEventListener('scroll', () => scrolled = window.scrollY > 8)"
    :class="scrolled ? 'bg-brand-card/80 shadow-soft backdrop-blur-md border-b border-brand-border' : 'bg-brand-card/0 border-b border-transparent'"
    class="sticky top-0 z-50 w-full transition-[background-color,box-shadow,border-color] duration-300"
>
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 lg:px-8" aria-label="Main navigation">
        <a href="{{ route('home') }}" class="group flex shrink-0 items-center gap-2.5">
            <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-brand-primary text-sm font-extrabold text-white transition-transform duration-300 ease-out group-hover:-rotate-6 group-hover:scale-105">
                {{ substr($companyShortName, 0, 1) }}
            </span>
            <span class="text-lg font-extrabold tracking-tight text-brand-heading">
                {{ $companyShortName }}<span class="text-brand-accent">.</span>
            </span>
        </a>

        <div class="hidden items-center gap-1 lg:flex">
            @foreach($navItems as $item)
                <a
                    href="{{ route($item['route']) }}"
                    class="nav-link px-3 {{ request()->routeIs($item['route']) ? 'nav-link-active' : '' }}"
                >
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>

        <div class="flex items-center gap-2">
            <button
                @click="$store.theme.toggle()"
                type="button"
                class="group relative inline-flex h-9 w-9 items-center justify-center overflow-hidden rounded-lg text-brand-muted transition-colors duration-200 hover:bg-brand-surface hover:text-brand-accent"
                aria-label="Toggle dark mode"
            >
                <span class="relative h-5 w-5">
                    <x-icons.icon
                        name="sun"
                        class="absolute inset-0 h-5 w-5 transition-all duration-300 ease-out"
                        x-cloak
                        x-show="!$store.theme.dark"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 -rotate-90 scale-50"
                        x-transition:enter-end="opacity-100 rotate-0 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 rotate-0 scale-100"
                        x-transition:leave-end="opacity-0 rotate-90 scale-50"
                    />
                    <x-icons.icon
                        name="moon"
                        class="absolute inset-0 h-5 w-5 transition-all duration-300 ease-out"
                        x-cloak
                        x-show="$store.theme.dark"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 rotate-90 scale-50"
                        x-transition:enter-end="opacity-100 rotate-0 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 rotate-0 scale-100"
                        x-transition:leave-end="opacity-0 -rotate-90 scale-50"
                    />
                </span>
            </button>

            <div class="hidden lg:block">
                <x-buttons.primary :route="$cta['route']" class="!px-5 !py-2.5">
                    {{ $cta['label'] }}
                </x-buttons.primary>
            </div>

            <button
                @click="open = !open"
                type="button"
                class="relative inline-flex h-9 w-9 items-center justify-center rounded-lg text-brand-heading transition-colors duration-200 hover:bg-brand-surface lg:hidden"
                aria-label="Toggle navigation menu"
                :aria-expanded="open"
            >
                <span class="relative h-6 w-6">
                    <svg
                        x-show="!open"
                        class="absolute inset-0 h-6 w-6"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 rotate-45"
                        x-transition:enter-end="opacity-100 rotate-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 rotate-0"
                        x-transition:leave-end="opacity-0 -rotate-45"
                        fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg
                        x-show="open"
                        x-cloak
                        class="absolute inset-0 h-6 w-6"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -rotate-45"
                        x-transition:enter-end="opacity-100 rotate-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 rotate-0"
                        x-transition:leave-end="opacity-0 rotate-45"
                        fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </span>
            </button>
        </div>
    </nav>

    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="border-t border-brand-border bg-brand-card lg:hidden"
    >
        <div class="space-y-1 px-6 py-4">
            @foreach($navItems as $item)
                <a
                    href="{{ route($item['route']) }}"
                    @click="open = false"
                    class="group flex items-center justify-between rounded-lg px-3 py-2.5 text-base font-medium transition-all duration-200 {{ request()->routeIs($item['route']) ? 'bg-brand-surface text-brand-accent' : 'text-brand-text hover:translate-x-1 hover:bg-brand-surface hover:text-brand-accent' }}"
                >
                    {{ $item['label'] }}
                    <x-icons.icon name="arrow-right" class="h-4 w-4 opacity-0 transition-opacity duration-200 group-hover:opacity-100" />
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
