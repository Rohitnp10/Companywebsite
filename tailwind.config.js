import defaultTheme from 'tailwindcss/defaultTheme';

/**
 * Softrix design tokens sampled from the logo:
 * violet symbol, gold accent, near-black field, white wordmark.
 * Type: Manrope.
 */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                display: ['Inter', ...defaultTheme.fontFamily.sans],
                mono: ['Inter', ...defaultTheme.fontFamily.mono],
            },
            colors: {
                brand: {
                    primary: '#0B0F14',
                    gold: 'rgb(var(--color-gold) / <alpha-value>)',
                    violet: 'rgb(var(--color-violet) / <alpha-value>)',
                    DEFAULT: 'rgb(var(--color-accent) / <alpha-value>)',
                    bg: 'rgb(var(--color-bg) / <alpha-value>)',
                    surface: 'rgb(var(--color-surface) / <alpha-value>)',
                    card: 'rgb(var(--color-card) / <alpha-value>)',
                    'card-hover': 'rgb(var(--color-card-hover) / <alpha-value>)',
                    heading: 'rgb(var(--color-heading) / <alpha-value>)',
                    text: 'rgb(var(--color-text) / <alpha-value>)',
                    muted: 'rgb(var(--color-muted) / <alpha-value>)',
                    border: 'rgb(var(--color-border) / <alpha-value>)',
                    accent: 'rgb(var(--color-accent) / <alpha-value>)',
                    'accent-hover': 'rgb(var(--color-accent-hover) / <alpha-value>)',
                    'accent-dark': 'rgb(var(--color-accent-dark) / <alpha-value>)',
                    success: 'rgb(var(--color-success) / <alpha-value>)',
                    danger: 'rgb(var(--color-danger) / <alpha-value>)',
                    warning: 'rgb(var(--color-warning) / <alpha-value>)',
                },
            },
            maxWidth: {
                site: '74rem',
            },
            spacing: {
                section: 'clamp(4.5rem, 8vw, 7.5rem)',
                gutter: 'clamp(1.25rem, 4vw, 2rem)',
            },
            boxShadow: {
                soft: '0 1px 0 rgb(11 18 32 / 0.04)',
                'soft-lg': '0 12px 40px -20px rgb(11 18 32 / 0.18)',
                glow: '0 10px 28px -12px rgb(var(--color-accent) / 0.45)',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                slideUp: {
                    '0%': { opacity: '0', transform: 'translateY(12px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
            },
            animation: {
                fadeIn: 'fadeIn 0.5s ease-out both',
                slideUp: 'slideUp 0.55s ease-out both',
            },
        },
    },
    plugins: [],
};
