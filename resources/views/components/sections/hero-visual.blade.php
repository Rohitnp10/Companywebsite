@props(['class' => ''])

{{-- Abstract technology-inspired visual built entirely with SVG/CSS — no stock photography. --}}
<div {{ $attributes->merge(['class' => 'relative ' . $class]) }}>
    <svg viewBox="0 0 520 480" class="w-full h-auto" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <defs>
            <linearGradient id="heroGrad1" x1="0" y1="0" x2="1" y2="1">
                <stop offset="0%" stop-color="#2563EB" />
                <stop offset="100%" stop-color="#0B1220" />
            </linearGradient>
            <linearGradient id="heroGrad2" x1="0" y1="0" x2="1" y2="1">
                <stop offset="0%" stop-color="#3B82F6" />
                <stop offset="100%" stop-color="#2563EB" />
            </linearGradient>
        </defs>

        <!-- Backing panel -->
        <rect x="40" y="60" width="400" height="320" rx="24" fill="#F8FAFC" stroke="#E2E8F0" stroke-width="2" />

        <!-- Grid pattern -->
        <g opacity="0.35">
            <path d="M40 140 H440 M40 220 H440 M40 300 H440" stroke="#E2E8F0" stroke-width="1.5" />
            <path d="M140 60 V380 M240 60 V380 M340 60 V380" stroke="#E2E8F0" stroke-width="1.5" />
        </g>

        <!-- Floating nodes/orbits (animated) -->
        <g class="softrix-orbit-slow" style="transform-origin: 260px 220px;">
            <circle cx="260" cy="120" r="6" fill="url(#heroGrad2)" />
            <circle cx="380" cy="220" r="5" fill="#2563EB" opacity="0.7" />
            <circle cx="150" cy="300" r="7" fill="#0B1220" opacity="0.8" />
        </g>

        <!-- Central node cluster -->
        <circle cx="260" cy="220" r="64" fill="url(#heroGrad1)" opacity="0.08" />
        <circle cx="260" cy="220" r="40" fill="url(#heroGrad1)" opacity="0.15" />
        <circle cx="260" cy="220" r="20" fill="url(#heroGrad1)" />

        <!-- Connecting lines -->
        <g stroke="#2563EB" stroke-width="1.5" opacity="0.4">
            <line x1="260" y1="220" x2="150" y2="150" />
            <line x1="260" y1="220" x2="370" y2="160" />
            <line x1="260" y1="220" x2="180" y2="320" />
            <line x1="260" y1="220" x2="360" y2="310" />
        </g>

        <!-- Satellite cards -->
        <g class="softrix-float">
            <rect x="110" y="120" width="80" height="52" rx="10" fill="#0B1220" />
            <rect x="122" y="134" width="40" height="6" rx="3" fill="#3B82F6" />
            <rect x="122" y="148" width="56" height="6" rx="3" fill="#64748B" />
        </g>

        <g class="softrix-float-delayed">
            <rect x="330" y="140" width="90" height="56" rx="10" fill="#2563EB" />
            <rect x="344" y="156" width="44" height="6" rx="3" fill="#FFFFFF" />
            <rect x="344" y="170" width="60" height="6" rx="3" fill="#BFDBFE" />
        </g>

        <g class="softrix-float">
            <rect x="150" y="280" width="88" height="56" rx="10" fill="#FFFFFF" stroke="#E2E8F0" stroke-width="1.5" />
            <rect x="164" y="296" width="40" height="6" rx="3" fill="#2563EB" />
            <rect x="164" y="310" width="56" height="6" rx="3" fill="#94A3B8" />
        </g>

        <g class="softrix-float-delayed">
            <rect x="320" y="270" width="84" height="56" rx="10" fill="#F8FAFC" stroke="#E2E8F0" stroke-width="1.5" />
            <rect x="334" y="286" width="40" height="6" rx="3" fill="#0B1220" />
            <rect x="334" y="300" width="52" height="6" rx="3" fill="#94A3B8" />
        </g>

        <!-- Corner accent shape -->
        <rect x="380" y="40" width="90" height="90" rx="20" fill="url(#heroGrad2)" opacity="0.12" />
    </svg>
</div>

<style>
    @media (prefers-reduced-motion: no-preference) {
        .softrix-float { animation: softrix-float-y 5s ease-in-out infinite; }
        .softrix-float-delayed { animation: softrix-float-y 5s ease-in-out infinite; animation-delay: 1.2s; }
        .softrix-orbit-slow { animation: softrix-spin 24s linear infinite; }
    }
    @keyframes softrix-float-y {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }
    @keyframes softrix-spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
</style>
