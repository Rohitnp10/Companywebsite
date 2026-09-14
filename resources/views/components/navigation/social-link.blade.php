@props(['label', 'icon', 'url'])

<a
    href="{{ $url }}"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="{{ $label }}"
    class="flex h-9 w-9 items-center justify-center rounded-full border border-brand-border text-brand-muted transition-colors hover:border-brand-accent hover:text-brand-accent"
>
    <x-icons.icon :name="$icon" class="w-4 h-4" />
</a>
