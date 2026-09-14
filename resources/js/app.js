import Alpine from 'alpinejs';

window.Alpine = Alpine;

document.addEventListener('alpine:init', () => {
    Alpine.store('theme', {
        dark: document.documentElement.classList.contains('dark'),

        toggle() {
            this.dark = !this.dark;
            document.documentElement.classList.toggle('dark', this.dark);
            localStorage.setItem('theme', this.dark ? 'dark' : 'light');
        },
    });
});

Alpine.start();

// Scroll-reveal: plain IntersectionObserver over `[data-reveal]` elements —
// deliberately not an Alpine directive. There's no reactive state here, and
// directive-only elements with no `x-data` ancestor aren't guaranteed to be
// visited by Alpine's initial walk, so vanilla JS is both simpler and more
// reliable. Adds `.reveal-in` the first time an element crosses into view,
// then stops observing it. Respects prefers-reduced-motion via CSS (app.css).
function initScrollReveal() {
    const els = document.querySelectorAll('[data-reveal]');
    if (!els.length) return;

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;

                const el = entry.target;
                requestAnimationFrame(() => el.classList.add('reveal-in'));
                el.addEventListener('transitionend', () => { el.style.willChange = 'auto'; }, { once: true });
                observer.unobserve(el);
            });
        },
        { threshold: 0.12, rootMargin: '0px 0px -8% 0px' }
    );

    els.forEach((el) => {
        el.classList.add('reveal-init');
        if (el.hasAttribute('data-reveal-scale')) el.classList.add('reveal-scale');

        const delay = Number(el.getAttribute('data-reveal-delay')) || 0;
        if (delay) el.style.transitionDelay = `${delay}ms`;

        observer.observe(el);
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initScrollReveal);
} else {
    initScrollReveal();
}
