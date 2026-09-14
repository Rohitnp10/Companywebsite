import defaultTheme from 'tailwindcss/defaultTheme';

/**
 * Centralized design tokens.
 *
 * Colors and typography live here so the brand can be restyled from a
 * single location. If these values are ever driven by a database "theme"
 * setting, this file becomes the compile-time fallback while runtime
 * values can be layered on via CSS custom properties.
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
            },
            colors: {
                brand: {
                    // Static brand ink — always near-black, regardless of theme.
                    // Used for backgrounds/text meant to stay fixed (footer, CTA
                    // band, logo mark, and as the dark text sitting on accent-
                    // colored buttons) — never for regular body text.
                    primary: '#121212',
                    DEFAULT: 'rgb(var(--color-accent) / <alpha-value>)',

                    // Theme-aware tokens — these read CSS custom properties that flip
                    // when the `dark` class is present on <html>. See resources/css/app.css.
                    bg: 'rgb(var(--color-bg) / <alpha-value>)',
                    surface: 'rgb(var(--color-surface) / <alpha-value>)',
                    card: 'rgb(var(--color-card) / <alpha-value>)',
                    'card-hover': 'rgb(var(--color-card-hover) / <alpha-value>)',
                    heading: 'rgb(var(--color-heading) / <alpha-value>)',
                    text: 'rgb(var(--color-text) / <alpha-value>)',
                    muted: 'rgb(var(--color-muted) / <alpha-value>)',
                    border: 'rgb(var(--color-border) / <alpha-value>)',

                    // Royal Blue brand accent (#305CDE) — same hex in both
                    // themes; still a CSS var (not a fixed hex like `primary`
                    // above) because hover/active shades flip direction
                    // between light and dark surfaces.
                    accent: 'rgb(var(--color-accent) / <alpha-value>)',
                    'accent-hover': 'rgb(var(--color-accent-hover) / <alpha-value>)',
                    'accent-dark': 'rgb(var(--color-accent-dark) / <alpha-value>)',

                    success: 'rgb(var(--color-success) / <alpha-value>)',
                    danger: 'rgb(var(--color-danger) / <alpha-value>)',
                    warning: 'rgb(var(--color-warning) / <alpha-value>)',
                },
            },
            boxShadow: {
                soft: '0 1px 2px 0 rgb(15 23 42 / 0.04), 0 4px 12px -2px rgb(15 23 42 / 0.06)',
                'soft-lg': '0 8px 24px -4px rgb(15 23 42 / 0.10), 0 2px 8px -2px rgb(15 23 42 / 0.06)',
                // Subtle Royal Blue glow for primary-button hover / selected states —
                // deliberately soft, never a neon/gaming-style glow.
                glow: '0 8px 20px -6px rgb(var(--color-accent) / 0.35), 0 0 0 1px rgb(var(--color-accent) / 0.18)',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                slideUp: {
                    '0%': { opacity: '0', transform: 'translateY(16px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
            },
            animation: {
                fadeIn: 'fadeIn 0.6s ease-out both',
                slideUp: 'slideUp 0.6s ease-out both',
            },
        },
    },
    plugins: [],
};
