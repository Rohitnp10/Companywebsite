@props(['title', 'department', 'location', 'employment_type', 'description'])

<article {{ $attributes->merge(['class' => 'flex flex-col justify-between gap-5 border-b border-brand-border py-6 sm:flex-row sm:items-center']) }}>
    <div class="min-w-0">
        <h3 class="h-subsection">{{ $title }}</h3>
        <p class="text-small mt-1">{{ $description }}</p>
        <div class="mt-3 flex flex-wrap gap-x-4 gap-y-1 font-mono text-[0.6875rem] uppercase tracking-[0.1em] text-brand-muted">
            <span>{{ $department }}</span>
            <span>{{ $location }}</span>
            <span>{{ $employment_type }}</span>
        </div>
    </div>
    <x-buttons.secondary route="contact" class="shrink-0">Apply Now</x-buttons.secondary>
</article>
