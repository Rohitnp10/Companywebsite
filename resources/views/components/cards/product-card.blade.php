@props(['title', 'category' => null, 'status' => null, 'description', 'icon' => 'layout-grid', 'capabilities' => [], 'featured' => false])

<div {{ $attributes->merge(['class' => 'flex flex-col rounded-2xl border p-7 transition-all duration-300 hover:-translate-y-1 hover:bg-brand-card-hover ' . ($featured ? 'border-brand-accent/40 bg-brand-card shadow-soft-lg ring-1 ring-brand-accent/10' : 'border-brand-border bg-brand-card hover:shadow-soft-lg')]) }}>
    <div class="flex items-start justify-between gap-3">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-heading/5 text-brand-heading">
            <x-icons.icon :name="$icon" class="w-6 h-6" />
        </div>
        <div class="flex flex-col items-end gap-1.5">
            @if($status === 'ready')
                <span class="inline-flex items-center gap-1.5 rounded-full bg-brand-success/10 px-2.5 py-1 text-[11px] font-semibold text-brand-success">
                    <span class="demo-live-dot h-1.5 w-1.5 rounded-full bg-brand-success"></span>
                    Ready
                </span>
            @elseif($status === 'in_development')
                <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-500/10 px-2.5 py-1 text-[11px] font-semibold text-amber-600 dark:text-amber-400">
                    <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                    In Development
                </span>
            @endif
            @if($category)
                <span class="rounded-full bg-brand-surface px-2.5 py-1 text-[11px] font-semibold text-brand-muted">{{ $category }}</span>
            @endif
        </div>
    </div>

    <h3 class="h-subsection mt-5">{{ $title }}</h3>
    <p class="text-small mt-2 flex-1">{{ $description }}</p>

    @if(count($capabilities))
        <ul class="mt-5 space-y-2 border-t border-brand-border pt-5">
            @foreach($capabilities as $capability)
                <li class="flex items-start gap-2 text-sm text-brand-muted">
                    <x-icons.icon name="check" class="mt-0.5 h-4 w-4 shrink-0 text-brand-accent" />
                    <span>{{ $capability }}</span>
                </li>
            @endforeach
        </ul>
    @endif
</div>
