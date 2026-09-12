@props(['title', 'description', 'icon' => 'target'])

<div {{ $attributes->merge(['class' => 'rounded-2xl border border-brand-border bg-white p-6 transition-all duration-300 hover:-translate-y-1 hover:shadow-soft']) }}>
    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-brand-surface text-brand-accent">
        <x-icons.icon :name="$icon" class="w-5 h-5" />
    </div>
    <h3 class="mt-4 text-base font-semibold text-brand-primary">{{ $title }}</h3>
    <p class="mt-2 text-sm leading-relaxed text-brand-muted">{{ $description }}</p>
</div>
