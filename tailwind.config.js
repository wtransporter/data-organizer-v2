const defaultTheme = require('tailwindcss/defaultTheme');
module.exports = {
    purge: [],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans]
            }
        }
    },
    variants: {
        extend: {
            opacity: ['disabled']
        }
    },
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')]
};
