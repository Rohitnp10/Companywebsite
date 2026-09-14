@php
    $navItems = config('navigation.primary');
    $cta = config('navigation.cta');
    $companyShortName = config('company.short_name');
    $isHome = request()->routeIs('home');
@endphp

<header
    x-data="{
        open: false,
        scrolled: false,
        isHome: {{ $isHome ? 'true' : 'false' }},
        get solid() { return this.scrolled || this.open || !this.isHome }
    }"
    x-init="
        scrolled = window.scrollY > 16;
        window.addEventListener('scroll', () => { scrolled = window.scrollY > 16 }, { passive: true });
        $watch('open', value => { document.body.classList.toggle('overflow-hidden', value) });
    "
    :class="solid ? 'glass-strong' : 'border-b border-transparent bg-transparent'"
    class="sticky top-0 z-50 w-full transition-[background-color,box-shadow,border-color,backdrop-filter] duration-300"
>
    <nav
        class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-6 transition-[padding] duration-300 lg:px-8"
        :class="scrolled ? 'py-3' : 'py-4'"
        aria-label="Main navigation"
    >
        {{-- Brand --}}
        <a href="{{ route('home') }}" class="group relative z-10 flex shrink-0 items-center gap-2.5">
            <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-brand-accent text-sm font-extrabold text-white shadow-soft transition-transform duration-300 ease-out group-hover:-rotate-6 group-hover:scale-105">
                {{ substr($companyShortName, 0, 1) }}
            </span>
            <span
                class="text-lg font-extrabold tracking-tight transition-colors duration-300"
                :class="solid ? 'text-brand-heading' : 'text-white'"
            >
                {{ $companyShortName }}<span class="text-brand-accent">.</span>
            </span>
        </a>

        {{-- Desktop links --}}
        <div
            class="absolute left-1/2 top-1/2 hidden -translate-x-1/2 -translate-y-1/2 items-center gap-0.5 lg:flex"
            :class="solid
                ? 'glass rounded-2xl p-1.5'
                : 'rounded-2xl border border-white/15 bg-black/35 p-1.5 shadow-soft backdrop-blur-md backdrop-saturate-150'"
        >
            @foreach($navItems as $item)
                @php $active = request()->routeIs($item['route']); @endphp
                <a
                    href="{{ route($item['route']) }}"
                    class="nav-link-pill {{ $active ? 'nav-link-pill-active' : '' }}"
                    :class="solid ? 'nav-link-pill-solid' : 'nav-link-pill-dark'"
                    @if($active) aria-current="page" @endif
                >
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>

        {{-- Actions --}}
        <div class="relative z-10 flex items-center gap-2 sm:gap-3">
            <button
                @click="$store.theme.toggle()"
                type="button"
                class="group inline-flex h-10 w-10 items-center justify-center rounded-xl border transition-all duration-200"
                :class="solid
                    ? 'border-brand-border bg-brand-card text-brand-heading shadow-soft hover:border-brand-accent hover:bg-brand-accent hover:text-white'
                    : 'border-white/20 bg-white/10 text-white shadow-soft backdrop-blur-md hover:border-brand-accent hover:bg-brand-accent hover:text-white'"
                :aria-label="$store.theme.dark ? 'Switch to light mode' : 'Switch to dark mode'"
                :title="$store.theme.dark ? 'Light mode' : 'Dark mode'"
            >
                <span class="relative flex h-5 w-5 items-center justify-center">
                    <x-icons.icon
                        name="sun"
                        class="absolute h-5 w-5 transition-all duration-300 ease-out"
                        stroke-width="2.25"
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
                        class="absolute h-5 w-5 transition-all duration-300 ease-out"
                        stroke-width="2.25"
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

            <div
                class="hidden h-5 w-px sm:block"
                :class="solid ? 'bg-brand-border' : 'bg-white/20'"
                aria-hidden="true"
            ></div>

            <div class="hidden lg:block">
                <x-buttons.primary :route="$cta['route']" class="!rounded-xl !px-5 !py-2.5 !text-[13px]">
                    {{ $cta['label'] }}
                </x-buttons.primary>
            </div>

            {{-- Mobile menu toggle --}}
            <button
                @click="open = !open"
                type="button"
                class="relative inline-flex h-10 w-10 items-center justify-center rounded-xl transition-colors duration-200 lg:hidden"
                :class="solid
                    ? 'text-brand-heading hover:bg-brand-surface'
                    : 'text-white hover:bg-white/10'"
                aria-label="Toggle navigation menu"
                :aria-expanded="open.toString()"
            >
                <span class="relative flex h-4 w-5 flex-col justify-between" aria-hidden="true">
                    <span
                        class="block h-0.5 w-full origin-center rounded-full bg-current transition-all duration-300"
                        :class="open ? 'translate-y-[7px] rotate-45' : ''"
                    ></span>
                    <span
                        class="block h-0.5 w-full rounded-full bg-current transition-all duration-300"
                        :class="open ? 'opacity-0 scale-x-0' : ''"
                    ></span>
                    <span
                        class="block h-0.5 w-full origin-center rounded-full bg-current transition-all duration-300"
                        :class="open ? '-translate-y-[7px] -rotate-45' : ''"
                    ></span>
                </span>
            </button>
        </div>
    </nav>

    {{-- Mobile panel --}}
    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="glass-strong border-t-0 lg:hidden"
    >
        <div class="max-h-[calc(100svh-4.5rem)] space-y-1 overflow-y-auto px-4 py-4">
            <a
                href="{{ route('home') }}"
                @click="open = false"
                class="flex items-center justify-between rounded-xl px-4 py-3 text-[15px] font-medium transition-all duration-200 {{ request()->routeIs('home') ? 'bg-brand-accent/10 text-brand-accent' : 'text-brand-heading hover:bg-brand-surface hover:text-brand-accent' }}"
            >
                Home
                <x-icons.icon name="arrow-right" class="h-4 w-4 opacity-40" />
            </a>

            @foreach($navItems as $item)
                <a
                    href="{{ route($item['route']) }}"
                    @click="open = false"
                    class="flex items-center justify-between rounded-xl px-4 py-3 text-[15px] font-medium transition-all duration-200 {{ request()->routeIs($item['route']) ? 'bg-brand-accent/10 text-brand-accent' : 'text-brand-heading hover:bg-brand-surface hover:text-brand-accent' }}"
                >
                    {{ $item['label'] }}
                    <x-icons.icon name="arrow-right" class="h-4 w-4 opacity-40" />
                </a>
            @endforeach

            <div class="px-1 pt-3">
                <x-buttons.primary :route="$cta['route']" class="w-full !rounded-xl" x-on:click="open = false">
                    {{ $cta['label'] }}
                </x-buttons.primary>
            </div>
        </div>
    </div>
</header>
