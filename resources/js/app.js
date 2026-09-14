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

function prefersReducedMotion() {
    return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
}

function activateIconLive(root) {
    const icons = root.matches?.('[data-icon-live]')
        ? [root]
        : Array.from(root.querySelectorAll?.('[data-icon-live]') ?? []);

    icons.forEach((icon, index) => {
        window.setTimeout(() => icon.classList.add('icon-live'), index * 70);
    });
}

function prepareStaggerGroups() {
    document.querySelectorAll('[data-reveal-stagger]').forEach((group) => {
        const step = Number(group.getAttribute('data-reveal-stagger')) || 70;
        const max = Number(group.getAttribute('data-reveal-stagger-max')) || 8;
        const variants = ['data-reveal-scale', 'data-reveal-left', 'data-reveal-right', 'data-reveal-fade'];

        Array.from(group.children).forEach((child, index) => {
            if (!child.hasAttribute('data-reveal')) {
                child.setAttribute('data-reveal', '');
            }

            if (!child.hasAttribute('data-reveal-delay')) {
                child.setAttribute('data-reveal-delay', String(Math.min(index, max) * step));
            }

            variants.forEach((attr) => {
                if (group.hasAttribute(attr) && !child.hasAttribute(attr)) {
                    child.setAttribute(attr, '');
                }
            });
        });
    });
}

function initScrollReveal() {
    prepareStaggerGroups();

    const els = document.querySelectorAll('[data-reveal]');
    if (!els.length) {
        activateIconLive(document);
        return;
    }

    if (prefersReducedMotion()) {
        els.forEach((el) => {
            el.classList.add('reveal-init', 'reveal-in');
            activateIconLive(el);
        });
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;

                const el = entry.target;
                requestAnimationFrame(() => {
                    el.classList.add('reveal-in');
                    activateIconLive(el);
                });
                el.addEventListener('transitionend', () => {
                    el.style.willChange = 'auto';
                }, { once: true });
                observer.unobserve(el);
            });
        },
        { threshold: 0.08, rootMargin: '0px 0px -6% 0px' }
    );

    els.forEach((el) => {
        el.classList.add('reveal-init');

        if (el.hasAttribute('data-reveal-scale')) el.classList.add('reveal-scale');
        if (el.hasAttribute('data-reveal-left')) el.classList.add('reveal-left');
        if (el.hasAttribute('data-reveal-right')) el.classList.add('reveal-right');
        if (el.hasAttribute('data-reveal-fade')) el.classList.add('reveal-fade');

        const delay = Number(el.getAttribute('data-reveal-delay')) || 0;
        if (delay) el.style.transitionDelay = `${delay}ms`;

        // Already in view on load — animate after a short paint delay
        const rect = el.getBoundingClientRect();
        const inView = rect.top < window.innerHeight * 0.92 && rect.bottom > 0;
        if (inView) {
            requestAnimationFrame(() => {
                requestAnimationFrame(() => {
                    el.classList.add('reveal-in');
                    activateIconLive(el);
                });
            });
            return;
        }

        observer.observe(el);
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initScrollReveal);
} else {
    initScrollReveal();
}
