@props(['compact' => false])

{{--
    Self-contained animated product mockup for the Restaurant Management
    System — a browser-chrome frame that auto-cycles through representative
    screens (Dashboard, Orders, Tables, Billing). No external screenshots
    or video yet, so this stands in as the product demo until real capture exists.
--}}
<div
    x-data="{
        screen: 0,
        screens: ['dashboard', 'orders', 'tables', 'billing'],
        playing: true,
        timer: null,
        start() { this.timer = setInterval(() => { if (this.playing) this.screen = (this.screen + 1) % this.screens.length }, 4000) },
    }"
    x-init="start()"
    @mouseenter="playing = false"
    @mouseleave="playing = true"
    {{ $attributes->merge(['class' => 'group relative w-full']) }}
>
    {{-- Browser chrome --}}
    <div class="overflow-hidden rounded-2xl border border-brand-border bg-brand-card shadow-soft-lg">
        <div class="flex items-center gap-3 border-b border-brand-border bg-brand-surface px-4 py-3">
            <div class="flex gap-1.5">
                <span class="h-2.5 w-2.5 rounded-full bg-red-400/70"></span>
                <span class="h-2.5 w-2.5 rounded-full bg-amber-400/70"></span>
                <span class="h-2.5 w-2.5 rounded-full bg-green-400/70"></span>
            </div>
            <div class="flex-1 rounded-md bg-brand-card px-3 py-1 text-center text-[11px] font-medium text-brand-muted sm:text-xs">
                app.softrix.io/restaurant
            </div>
            <span class="hidden items-center gap-1.5 text-[11px] font-medium text-brand-muted sm:flex">
                <span class="demo-live-dot h-1.5 w-1.5 rounded-full bg-brand-success"></span>
                Live
            </span>
        </div>

        {{-- Screen stack --}}
        <div class="relative {{ $compact ? 'h-72 sm:h-80' : 'h-80 sm:h-96 lg:h-[26rem]' }} bg-brand-card">
            <div class="flex h-full">
                {{-- App sidebar (shared across screens) --}}
                <div class="hidden w-14 shrink-0 flex-col items-center gap-4 border-r border-brand-border bg-brand-surface py-4 sm:flex">
                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-brand-primary text-xs font-extrabold text-white">S</span>
                    <button @click="screen = 0" :class="screen === 0 ? 'bg-brand-accent/10 text-brand-accent' : 'text-brand-muted hover:text-brand-heading'" class="flex h-8 w-8 items-center justify-center rounded-lg transition-colors" aria-label="Dashboard">
                        <x-icons.icon name="layout-grid" class="h-4 w-4" />
                    </button>
                    <button @click="screen = 1" :class="screen === 1 ? 'bg-brand-accent/10 text-brand-accent' : 'text-brand-muted hover:text-brand-heading'" class="flex h-8 w-8 items-center justify-center rounded-lg transition-colors" aria-label="Orders">
                        <x-icons.icon name="briefcase" class="h-4 w-4" />
                    </button>
                    <button @click="screen = 2" :class="screen === 2 ? 'bg-brand-accent/10 text-brand-accent' : 'text-brand-muted hover:text-brand-heading'" class="flex h-8 w-8 items-center justify-center rounded-lg transition-colors" aria-label="Tables">
                        <x-icons.icon name="store" class="h-4 w-4" />
                    </button>
                    <button @click="screen = 3" :class="screen === 3 ? 'bg-brand-accent/10 text-brand-accent' : 'text-brand-muted hover:text-brand-heading'" class="flex h-8 w-8 items-center justify-center rounded-lg transition-colors" aria-label="Billing">
                        <x-icons.icon name="check" class="h-4 w-4" />
                    </button>
                </div>

                {{-- Screens (absolute-stacked, cross-fade) --}}
                <div class="relative flex-1 overflow-hidden">

                    {{-- DASHBOARD --}}
                    <div class="demo-screen absolute inset-0 p-4 sm:p-5" x-show="screen === 0" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-x-3" x-transition:enter-end="opacity-100 translate-x-0" x-cloak>
                        <div class="flex items-start justify-between gap-2">
                            <h4 class="text-sm font-semibold leading-snug text-brand-heading">Today's Overview</h4>
                            <span class="mt-0.5 shrink-0 whitespace-nowrap text-[11px] text-brand-muted">Downtown Branch</span>
                        </div>
                        <div class="mt-3 grid grid-cols-3 gap-2">
                            <div class="overflow-hidden rounded-lg border border-brand-border bg-brand-surface p-2 sm:p-2.5">
                                <p class="truncate text-[10px] uppercase tracking-wide text-brand-muted">Orders</p>
                                <p class="mt-1 truncate text-sm font-bold text-brand-heading sm:text-lg">128</p>
                            </div>
                            <div class="overflow-hidden rounded-lg border border-brand-border bg-brand-surface p-2 sm:p-2.5">
                                <p class="truncate text-[10px] uppercase tracking-wide text-brand-muted">Revenue</p>
                                <p class="mt-1 truncate text-sm font-bold text-brand-heading sm:text-lg">Rs 3,240</p>
                            </div>
                            <div class="overflow-hidden rounded-lg border border-brand-border bg-brand-surface p-2 sm:p-2.5">
                                <p class="truncate text-[10px] uppercase tracking-wide text-brand-muted">Tables</p>
                                <p class="mt-1 truncate text-sm font-bold text-brand-heading sm:text-lg">9/14</p>
                            </div>
                        </div>
                        <div class="mt-4 flex h-24 items-end gap-2 rounded-lg border border-brand-border bg-brand-surface p-3">
                            @foreach([40, 65, 50, 80, 60, 95, 70] as $i => $h)
                                <span class="demo-bar w-full rounded-sm bg-brand-accent/70" style="height:{{ $h }}%; animation-delay: {{ $i * 80 }}ms;"></span>
                            @endforeach
                        </div>
                        <div class="mt-3 space-y-1.5">
                            @foreach(['Table 4 — 2x Margherita Pizza', 'Table 9 — Grilled Salmon'] as $line)
                                <div class="flex items-center justify-between rounded-md bg-brand-surface px-2.5 py-1.5 text-[11px] text-brand-text">
                                    <span>{{ $line }}</span>
                                    <span class="rounded-full bg-brand-accent/10 px-2 py-0.5 text-[10px] font-medium text-brand-accent">Preparing</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- ORDERS --}}
                    <div class="demo-screen absolute inset-0 p-4 sm:p-5" x-show="screen === 1" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-x-3" x-transition:enter-end="opacity-100 translate-x-0" x-cloak>
                        <div class="flex items-center justify-between">
                            <h4 class="text-sm font-semibold text-brand-heading">Active Orders</h4>
                            <span class="rounded-full bg-brand-accent px-2.5 py-1 text-[10px] font-semibold text-white">+ New Order</span>
                        </div>
                        <div class="mt-3 space-y-2">
                            @foreach([
                                ['#1042', 'Table 4', '2x Pizza, 1x Cola', 'Preparing', 'amber'],
                                ['#1043', 'Table 9', '1x Salmon, Salad', 'Ready', 'green'],
                                ['#1044', 'Takeaway', '3x Burger Combo', 'Served', 'slate'],
                            ] as $order)
                                <div class="flex items-center justify-between rounded-lg border border-brand-border bg-brand-surface px-3 py-2">
                                    <div>
                                        <p class="text-xs font-semibold text-brand-heading">{{ $order[0] }} · {{ $order[1] }}</p>
                                        <p class="text-[11px] text-brand-muted">{{ $order[2] }}</p>
                                    </div>
                                    <span @class([
                                        'rounded-full px-2 py-0.5 text-[10px] font-semibold',
                                        'bg-brand-warning/10 text-brand-warning' => $order[3] === 'Preparing',
                                        'bg-brand-success/10 text-brand-success' => $order[3] === 'Ready',
                                        'bg-brand-muted/10 text-brand-muted' => $order[3] === 'Served',
                                    ])>{{ $order[3] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- TABLES --}}
                    <div class="demo-screen absolute inset-0 p-4 sm:p-5" x-show="screen === 2" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-x-3" x-transition:enter-end="opacity-100 translate-x-0" x-cloak>
                        <h4 class="text-sm font-semibold text-brand-heading">Floor Plan</h4>
                        <div class="mt-3 grid grid-cols-4 gap-2.5">
                            @foreach(['occupied','available','occupied','reserved','available','occupied','available','reserved'] as $i => $state)
                                <div @class([
                                    'flex aspect-square flex-col items-center justify-center gap-1 rounded-lg border text-[10px] font-semibold',
                                    'border-brand-danger/30 bg-brand-danger/10 text-brand-danger' => $state === 'occupied',
                                    'border-brand-success/30 bg-brand-success/10 text-brand-success' => $state === 'available',
                                    'border-brand-warning/30 bg-brand-warning/10 text-brand-warning' => $state === 'reserved',
                                ])>
                                    <span>T{{ $i + 1 }}</span>
                                    <span class="text-[8px] font-medium capitalize opacity-80">{{ $state }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- BILLING --}}
                    <div class="demo-screen absolute inset-0 p-4 sm:p-5" x-show="screen === 3" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-x-3" x-transition:enter-end="opacity-100 translate-x-0" x-cloak>
                        <h4 class="text-sm font-semibold text-brand-heading">Invoice — Table 4</h4>
                        <div class="mt-3 space-y-1.5 rounded-lg border border-brand-border bg-brand-surface p-3">
                            @foreach([['Margherita Pizza x2', 'Rs 24.00'], ['Grilled Salmon', 'Rs 18.50'], ['Iced Tea x2', 'Rs 6.00']] as $item)
                                <div class="flex items-center justify-between text-[11px] text-brand-text">
                                    <span>{{ $item[0] }}</span>
                                    <span class="font-medium">{{ $item[1] }}</span>
                                </div>
                            @endforeach
                            <div class="mt-1.5 flex items-center justify-between border-t border-brand-border pt-1.5 text-xs font-bold text-brand-heading">
                                <span>Total</span>
                                <span>Rs 48.50</span>
                            </div>
                        </div>
                        <div class="mt-3 flex items-center gap-2 rounded-lg bg-brand-success/10 px-3 py-2 text-xs font-semibold text-brand-success">
                            <x-icons.icon name="check" class="h-4 w-4" />
                            Payment received — Card
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Screen indicator dots --}}
    <div class="mt-4 flex items-center justify-center gap-2">
        @foreach(['Dashboard', 'Orders', 'Tables', 'Billing'] as $i => $label)
            <button
                @click="screen = {{ $i }}"
                :class="screen === {{ $i }} ? 'w-6 bg-brand-accent' : 'w-1.5 bg-brand-border hover:bg-brand-muted'"
                class="h-1.5 rounded-full transition-all duration-300"
                aria-label="Show {{ $label }} screen"
            ></button>
        @endforeach
    </div>
</div>
