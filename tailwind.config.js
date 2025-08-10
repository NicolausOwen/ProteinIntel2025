import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                lava: {
                '0%, 100%': { transform: 'translate(0, 0) scale(1)' },
                '50%': { transform: 'translate(50px, -30px) scale(1.2)' },
                },
            },
            animation: {
                lava: 'lava 12s ease-in-out infinite',
                'lava-slow': 'lava 20s ease-in-out infinite',
                'lava-fast': 'lava 8s ease-in-out infinite',
            },
        },
    },

    plugins: [forms],
};
