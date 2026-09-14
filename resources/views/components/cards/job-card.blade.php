@props(['title', 'department', 'location', 'employment_type', 'description'])

<div {{ $attributes->merge(['class' => 'flex flex-col justify-between gap-4 rounded-2xl border border-brand-border bg-brand-card p-6 transition-colors duration-200 hover:bg-brand-card-hover sm:flex-row sm:items-center']) }}>
    <div>
        <h3 class="h-subsection">{{ $title }}</h3>
        <p class="text-small mt-1">{{ $description }}</p>
        <div class="mt-3 flex flex-wrap gap-2 text-xs font-medium text-brand-muted">
            <span class="rounded-full bg-brand-surface px-3 py-1">{{ $department }}</span>
            <span class="rounded-full bg-brand-surface px-3 py-1">{{ $location }}</span>
            <span class="rounded-full bg-brand-surface px-3 py-1">{{ $employment_type }}</span>
        </div>
    </div>
    <x-buttons.secondary route="contact" class="shrink-0">Apply Now</x-buttons.secondary>
</div>
