@props(['title', 'category' => null, 'description', 'technologies' => [], 'image' => null])

<div {{ $attributes->merge(['class' => 'overflow-hidden rounded-2xl border border-brand-border bg-white transition-all duration-300 hover:-translate-y-1 hover:shadow-soft-lg']) }}>
    <div class="flex h-44 items-center justify-center bg-gradient-to-br from-brand-primary to-brand-accent/80">
        @if($image)
            <img src="{{ asset($image) }}" alt="{{ $title }}" class="h-full w-full object-cover">
        @else
            <x-icons.icon name="layout-grid" class="h-10 w-10 text-white/70" />
        @endif
    </div>

    <div class="p-6">
        @if($category)
            <span class="text-xs font-semibold uppercase tracking-wide text-brand-accent">{{ $category }}</span>
        @endif
        <h3 class="h-subsection mt-2">{{ $title }}</h3>
        <p class="text-small mt-2">{{ $description }}</p>

        @if(count($technologies))
            <div class="mt-4 flex flex-wrap gap-2">
                @foreach($technologies as $tech)
                    <span class="rounded-full bg-brand-surface px-3 py-1 text-xs font-medium text-brand-muted">{{ $tech }}</span>
                @endforeach
            </div>
        @endif
    </div>
</div>
