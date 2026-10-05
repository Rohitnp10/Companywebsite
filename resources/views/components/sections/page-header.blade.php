@props(['eyebrow' => null, 'title', 'description' => null])

<section class="border-b border-brand-border bg-brand-surface">
    <div class="site-container py-14 sm:py-16 lg:py-20">
        <div class="max-w-3xl">
            @if($eyebrow)
                <span class="eyebrow page-enter">{{ $eyebrow }}</span>
            @endif
            <h1 class="h-page page-enter page-enter-delay-1 {{ $eyebrow ? 'mt-4' : '' }}">{{ $title }}</h1>
            @if($description)
                <p class="text-body page-enter page-enter-delay-2 mt-5 max-w-2xl text-base sm:text-lg">{{ $description }}</p>
            @endif
        </div>
    </div>
</section>
