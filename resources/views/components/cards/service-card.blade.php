@props(['title', 'description', 'icon' => 'code', 'features' => [], 'image' => null, 'imageAlt' => null])

<div {{ $attributes->merge(['class' => 'group flex h-full flex-col overflow-hidden rounded-2xl border border-brand-border bg-brand-card transition-all duration-300 hover:-translate-y-1 hover:border-brand-accent/40 hover:bg-brand-card-hover hover:shadow-soft-lg']) }}>
    @if($image)
        <div class="aspect-[16/10] w-full overflow-hidden">
            <img
                src="{{ $image }}"
                alt="{{ $imageAlt ?? $title }}"
                loading="lazy"
                decoding="async"
                class="h-full w-full object-cover transition-transform duration-500 ease-out group-hover:scale-105"
            />
        </div>
    @else
        <div class="pt-6">
            <x-icons.illustration :name="$icon" size="sm" class="ml-6 group-hover:-translate-y-0.5" />
        </div>
    @endif

    <div class="flex flex-1 flex-col p-6">
        <h3 class="text-base font-semibold tracking-tight text-brand-heading sm:text-lg">{{ $title }}</h3>
        <p class="mt-2 text-sm leading-[1.65] text-brand-muted">{{ $description }}</p>

        @if(count($features))
            <ul class="mt-5 space-y-2 border-t border-brand-border pt-5">
                @foreach($features as $feature)
                    <li class="flex items-start gap-2.5 text-sm leading-relaxed text-brand-text">
                        <x-icons.icon name="check" class="mt-0.5 h-4 w-4 shrink-0 text-brand-accent" />
                        <span>{{ $feature }}</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
