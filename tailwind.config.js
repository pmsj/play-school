import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
const colors = require('tailwindcss/colors')
/** @type {import('tailwindcss').Config} */
export default {
    preset: [
        require("./vendor/wireui/wireui/tailwind.config.js")
    ],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',

        "./vendor/wireui/wireui/src/*.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/WireUi/**/*.php",
        "./vendor/wireui/wireui/src/Components/**/*.php",

    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#19A7CE', // Main Theme: Vibrant & playful blue, great for buttons and key UI elements)
                secondary: '#B0DAFF', // (Soft sky blue, good for backgrounds and sections))
                positive: '#FEFF86 ', // Accent 1 | (Bright yellow, great for highlights, call-to-action buttons, and playful elements)
                negative: '#FF6B6B', // Accent 2 | Pink | for background FFE700
                warning: '#FAB12F', 
                info: '#146C94 ', // (Dark blue, good for headings, text, or navbar elements)
            },
        },
    },

    plugins: [forms, typography],
};
