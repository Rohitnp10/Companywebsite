{{--
    Decorative desktop/tablet/phone frames showing the same Restaurant
    Management System UI language at different sizes. Static (not animated
    per-screen like the hero demo) — purely to sell "built for web, designed
    for mobile" without inventing a native app that doesn't exist yet.
--}}
<div class="relative flex min-w-0 max-w-full items-end justify-center gap-3 overflow-hidden sm:gap-4">
    {{-- Tablet (left, behind) --}}
    <div data-reveal data-reveal-scale data-reveal-delay="150" class="hidden w-40 shrink-0 sm:block lg:w-48" style="margin-bottom: -1rem;">
        <div class="overflow-hidden rounded-2xl border border-brand-border bg-brand-card p-2.5 shadow-soft-lg">
            <div class="space-y-2 rounded-lg bg-brand-surface p-3">
                <div class="flex items-center justify-between">
                    <span class="h-2 w-10 rounded-full bg-brand-heading/20"></span>
                    <span class="h-4 w-4 rounded-full bg-brand-accent/30"></span>
                </div>
                @foreach(['Table 4', 'Table 7', 'Table 9'] as $i => $row)
                    <div class="flex items-center justify-between rounded-md bg-brand-card px-2 py-1.5">
                        <span class="text-[9px] font-medium text-brand-text">{{ $row }}</span>
                        <span class="h-1.5 w-8 rounded-full {{ $i === 1 ? 'bg-brand-success/60' : 'bg-brand-accent/40' }}"></span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Desktop (center, main) --}}
    <div data-reveal data-reveal-scale class="min-w-0 w-full max-w-md">
        <x-sections.product-demo compact />
    </div>

    {{-- Phone (right, front) --}}
    <div data-reveal data-reveal-scale data-reveal-delay="250" class="hidden w-28 shrink-0 sm:block lg:w-32" style="margin-bottom: -1.5rem;">
        <div class="overflow-hidden rounded-[1.75rem] border-4 border-brand-heading/90 bg-brand-card shadow-soft-lg">
            <div class="space-y-2 bg-brand-surface p-2.5">
                <div class="mx-auto h-1.5 w-8 rounded-full bg-brand-heading/20"></div>
                <div class="rounded-lg bg-brand-card p-2">
                    <p class="text-[8px] font-semibold text-brand-heading">Today</p>
                    <p class="text-xs font-bold text-brand-accent">Rs 3,240</p>
                </div>
                @foreach([1, 2, 3] as $row)
                    <div class="h-6 rounded-md bg-brand-card"></div>
                @endforeach
            </div>
        </div>
    </div>
</div>
