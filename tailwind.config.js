import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
      ],
    theme: {
      extend: {
        colors: {
          primary: '#1E40AF',
          secondary: '#9333EA',
        },
      },
    },
    plugins: [],
};
