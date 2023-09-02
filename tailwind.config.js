/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'primary-green': {
                    400: '#42b883',
                    500: '#39a978',
                    600: '#3ba476'
                },
                'primary-dark': {
                    400: '#35495e'
                },
                'vue-light': '#f9fafb',
                'primary-red': {
                    400 : '#c94848',
                    600 : '#af4040'
                },
            }
        }
    },
}

