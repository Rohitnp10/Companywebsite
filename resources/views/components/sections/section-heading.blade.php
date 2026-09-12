@props(['eyebrow' => null, 'title', 'description' => null, 'align' => 'left'])

<div {{ $attributes->merge(['class' => $align === 'center' ? 'mx-auto max-w-2xl text-center' : 'max-w-2xl']) }}>
    @if($eyebrow)
        <span class="eyebrow">
            <span class="h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
            {{ $eyebrow }}
        </span>
    @endif
    <h2 class="h-section mt-3">{{ $title }}</h2>
    @if($description)
        <p class="text-body mt-4">{{ $description }}</p>
    @endif
</div>
