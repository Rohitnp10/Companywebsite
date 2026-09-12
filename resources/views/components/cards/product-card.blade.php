@props(['title', 'category' => null, 'description', 'icon' => 'layout-grid', 'capabilities' => []])

<div {{ $attributes->merge(['class' => 'flex flex-col rounded-2xl border border-brand-border bg-white p-7 transition-all duration-300 hover:-translate-y-1 hover:shadow-soft-lg']) }}>
    <div class="flex items-center justify-between">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-primary/5 text-brand-primary">
            <x-icons.icon :name="$icon" class="w-6 h-6" />
        </div>
        @if($category)
            <span class="rounded-full bg-brand-surface px-3 py-1 text-xs font-semibold text-brand-muted">{{ $category }}</span>
        @endif
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
