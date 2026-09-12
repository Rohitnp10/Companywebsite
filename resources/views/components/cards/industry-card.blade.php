@props(['title', 'description', 'icon' => 'briefcase'])

<div {{ $attributes->merge(['class' => 'group rounded-2xl border border-brand-border bg-white p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:border-brand-accent/40 hover:shadow-soft']) }}>
    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-brand-surface text-brand-accent transition-colors duration-300 group-hover:bg-brand-accent group-hover:text-white">
        <x-icons.icon :name="$icon" class="w-6 h-6" />
    </div>
    <h3 class="mt-4 text-base font-semibold text-brand-primary">{{ $title }}</h3>
    <p class="mt-2 text-sm leading-relaxed text-brand-muted">{{ $description }}</p>
</div>
