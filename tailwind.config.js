const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    mode: 'jit',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/lessons/*.blade.php'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "brown": "#795548",
	            "brown-50": "#efebe9",
	            "brown-100": "#d7ccc8",
	            "brown-200": "#bcaaa4",
	            "brown-300": "#a1887f",
                "brown-400": "#8d6e63",
	            "brown-500": "#795548",
	            "brown-600": "#6d4c41",
	            "brown-700": "#5d4037",
	            "brown-800": "#4e342e",
	            "brown-900": "#3e2723",
            }
        },
    },
    variants: {
        visibility: ['responsive', 'hover', 'focus', 'group-hover']
    },
    plugins: [require('@tailwindcss/forms')],
};
