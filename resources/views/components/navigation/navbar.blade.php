@php
    $navItems = config('navigation.primary');
    $cta = config('navigation.cta');
    $companyShortName = config('company.short_name');
@endphp

<header
    x-data="{
        open: false,
        scrolled: false,
    }"
    x-init="
        scrolled = window.scrollY > 8;
        window.addEventListener('scroll', () => { scrolled = window.scrollY > 8 }, { passive: true });
        $watch('open', value => { document.body.classList.toggle('overflow-hidden', value) });
    "
    :class="scrolled || open ? 'border-brand-border bg-brand-bg/90 shadow-sm backdrop-blur-md' : 'border-transparent bg-brand-bg'"
    class="sticky top-0 z-50 w-full border-b transition-[background-color,border-color,box-shadow] duration-300"
>
    <nav
        class="site-container flex items-center gap-4 transition-[height] duration-300"
        :class="scrolled ? 'h-14' : 'h-16'"
        aria-label="Main navigation"
    >
        <a href="{{ route('home') }}" class="relative z-10 flex shrink-0 items-center" aria-label="{{ $companyShortName }}">
            <img
                src="{{ asset(config('company.logo')) }}"
                alt="{{ $companyShortName }}"
                class="nav-logo-light h-8 w-auto"
            >
            <img
                src="{{ asset(config('company.logo_on_dark')) }}"
                alt=""
                aria-hidden="true"
                class="nav-logo-dark h-8 w-auto"
            >
        </a>

        <div class="hidden flex-1 items-center justify-center gap-1 lg:flex">
            @foreach($navItems as $item)
                @php $active = request()->routeIs($item['route']); @endphp
                <a
                    href="{{ route($item['route']) }}"
                    class="nav-link {{ $active ? 'nav-link-active' : '' }}"
                    @if($active) aria-current="page" @endif
                >
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>

        <div class="relative z-10 ml-auto flex items-center gap-2">
            <button
                @click="$store.theme.toggle()"
                type="button"
                class="theme-switch"
                role="switch"
                :aria-checked="$store.theme.dark.toString()"
                :aria-label="$store.theme.dark ? 'Switch to light mode' : 'Switch to dark mode'"
            >
                <span class="theme-switch-thumb" :class="$store.theme.dark ? 'translate-x-7' : 'translate-x-0'"></span>
                <span class="relative z-10 grid w-full grid-cols-2">
                    <span class="flex h-7 items-center justify-center" :class="$store.theme.dark ? 'text-brand-muted' : 'text-brand-accent'">
                        <x-icons.icon name="sun" class="h-4 w-4" stroke-width="2" />
                    </span>
                    <span class="flex h-7 items-center justify-center" :class="$store.theme.dark ? 'text-brand-accent' : 'text-brand-muted'">
                        <x-icons.icon name="moon" class="h-4 w-4" stroke-width="2" />
                    </span>
                </span>
            </button>

            <div class="hidden lg:block">
                <x-buttons.primary :route="$cta['route']" class="!px-4 !py-2 !text-sm">
                    {{ $cta['label'] }}
                </x-buttons.primary>
            </div>

            <button
                @click="open = !open"
                type="button"
                class="inline-flex h-9 w-9 items-center justify-center rounded-full text-brand-heading transition-colors duration-200 hover:bg-brand-card lg:hidden"
                aria-label="Toggle navigation menu"
                :aria-expanded="open.toString()"
            >
                <span class="relative flex h-3.5 w-4 flex-col justify-between" aria-hidden="true">
                    <span class="block h-px w-full origin-center bg-current transition-all duration-300" :class="open ? 'translate-y-[7px] rotate-45' : ''"></span>
                    <span class="block h-px w-full bg-current transition-all duration-300" :class="open ? 'opacity-0 scale-x-0' : ''"></span>
                    <span class="block h-px w-full origin-center bg-current transition-all duration-300" :class="open ? '-translate-y-[7px] -rotate-45' : ''"></span>
                </span>
            </button>
        </div>
    </nav>

    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-1"
        class="border-t border-brand-border bg-brand-bg lg:hidden"
    >
        <div class="site-container flex max-h-[calc(100svh-4rem)] flex-col gap-1 overflow-y-auto py-4">
            @foreach($navItems as $item)
                @php $active = request()->routeIs($item['route']); @endphp
                <a
                    href="{{ route($item['route']) }}"
                    @click="open = false"
                    class="rounded-[var(--radius-md)] px-3 py-3 text-sm font-medium {{ $active ? 'bg-brand-card text-brand-heading' : 'text-brand-muted' }}"
                    @if($active) aria-current="page" @endif
                >
                    {{ $item['label'] }}
                </a>
            @endforeach

            <div class="pt-3">
                <x-buttons.primary :route="$cta['route']" class="w-full" x-on:click="open = false">
                    {{ $cta['label'] }}
                </x-buttons.primary>
            </div>
        </div>
    </div>
</header>
