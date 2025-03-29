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
            backgroundImage: {
                'background-image': 'linear-gradient(to right top, #f59e0b, #9abe32, #04ca8a, #00c9d6, #38bdf8)'
              },
            colors: {
                primary: '#F59E0B', // 30  
                secondary: '#38BDF8', // 60
                secondaryAccent: '#84CC16',
                base1: '#FFFFFF', // white
                base2: '#F9FAFB', //  gray-50
                base3: '#F0F9FF', //  gray-50
                textColor: '#374151', // gray-700
                borderColor : '#D1D5DB', // gray-300
                cardBackground1: '#F3F4F6', // gray-100
                cardBackground2: '#E5E7EB', // gray-200
                cardBackground3: '#FFFBEB', // amber-50
                darkModeBackground: '#111827', // gray-900

                rose: '#FB7185',
                purple: '#A855F7',
                
                // info:  '#F59E0B', // 
                positive: '#FFE4A7 ',
        
                negative: '#F43F5E', 
                warning: '#FAB12F',
             
            },
        },
    },

    plugins: [forms, typography],
};
