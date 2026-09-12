@props(['title', 'description', 'icon' => 'code', 'features' => []])

<div {{ $attributes->merge(['class' => 'group rounded-2xl border border-brand-border bg-white p-7 transition-all duration-300 hover:-translate-y-1 hover:border-brand-accent/40 hover:shadow-soft-lg']) }}>
    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-surface text-brand-accent transition-colors duration-300 group-hover:bg-brand-accent group-hover:text-white">
        <x-icons.icon :name="$icon" class="w-6 h-6" />
    </div>
    <h3 class="h-subsection mt-5">{{ $title }}</h3>
    <p class="text-small mt-2">{{ $description }}</p>

    @if(count($features))
        <ul class="mt-4 space-y-2">
            @foreach($features as $feature)
                <li class="flex items-start gap-2 text-sm text-brand-muted">
                    <x-icons.icon name="check" class="mt-0.5 h-4 w-4 shrink-0 text-brand-accent" />
                    <span>{{ $feature }}</span>
                </li>
            @endforeach
        </ul>
    @endif
</div>
