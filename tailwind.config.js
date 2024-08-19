import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    darkMode: 'class', // ou 'selector'

    theme: {
        extend: {
            fontFamily: {
                sans: ['Space Grotesk', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'title': 'var(--text-title)',
                'body': 'var(--text-body)',
                'background': 'var(--background)',
                'primary': {
                    '50': '#fdf2f8',
                    '100': '#fce7f3',
                    '200': '#fbcfe8',
                    '300': '#f9a8d4',
                    '400': '#f472b6',
                    '500': '#ec4899',
                    '600': '#db2777',
                    '700': '#be185d',
                    '800': '#9d174d',
                    '900': '#831843',
                    '950': '#500724',
                },
            },
        },
    },

    plugins: [
        require('autoprefixer'),
        require('postcss-custom-properties'),
        require('@tailwindcss/forms'),
    ],
};
