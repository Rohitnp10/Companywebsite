@props(['eyebrow' => null, 'title', 'description' => null, 'align' => 'left'])

<div {{ $attributes->merge(['class' => $align === 'center' ? 'mx-auto max-w-2xl text-center' : 'max-w-2xl']) }}>
    @if($eyebrow)
        <span class="eyebrow {{ $align === 'center' ? 'justify-center' : '' }}">
            {{ $eyebrow }}
        </span>
    @endif
    <h2 class="h-section {{ $eyebrow ? 'mt-3' : '' }}">{{ $title }}</h2>
    @if($description)
        <p class="text-body mt-4">{{ $description }}</p>
    @endif
</div>
