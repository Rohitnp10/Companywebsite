@props(['eyebrow' => null, 'title', 'description' => null])

<section class="border-b border-brand-border bg-brand-surface">
    <div class="mx-auto max-w-4xl px-6 py-16 text-center lg:px-8 lg:py-20">
        @if($eyebrow)
            <span class="eyebrow page-enter justify-center">
                <span class="h-1.5 w-1.5 rounded-full bg-brand-accent"></span>
                {{ $eyebrow }}
            </span>
        @endif
        <h1 class="h-page page-enter page-enter-delay-1 mt-4">{{ $title }}</h1>
        @if($description)
            <p class="text-body page-enter page-enter-delay-2 mx-auto mt-5 max-w-2xl text-base sm:text-lg">{{ $description }}</p>
        @endif
    </div>
</section>
