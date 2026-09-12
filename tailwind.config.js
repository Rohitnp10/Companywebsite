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
                    DEFAULT: '#2563EB',
                    primary: '#0B1220',
                    accent: '#2563EB',
                    'accent-light': '#3B82F6',
                    surface: '#F8FAFC',
                    text: '#0F172A',
                    muted: '#64748B',
                    border: '#E2E8F0',
                },
            },
            boxShadow: {
                soft: '0 1px 2px 0 rgb(15 23 42 / 0.04), 0 4px 12px -2px rgb(15 23 42 / 0.06)',
                'soft-lg': '0 8px 24px -4px rgb(15 23 42 / 0.10), 0 2px 8px -2px rgb(15 23 42 / 0.06)',
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
