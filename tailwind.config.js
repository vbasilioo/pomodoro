import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primaryBlue: '#29BBFF',
                borderMouth: '#63CDFF',
                focus: '#53C7FD',
                sideBar: '#FBF6E3',
                primaryPurple: '#B68CD8',
                primaryOrange: '#F69A66',
                primaryYellow: '#FFB950',
                primaryGreen: '#59BCA8',
                primaryPink: '#FFAECE',
                primaryDefault: '#ECE5CB'
            },
            keyframes: {
                shake: {
                    '0%, 100%': { transform: 'translateX(0)' },
                    '25%, 75%': { transform: 'translateX(-5px)' },
                    '50%': { transform: 'translateX(5px)' },
                },
            },
            animation: {
                shake: 'shake 0.5s',
            },
        },
    },
    plugins: [],
};
