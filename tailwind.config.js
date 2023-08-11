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
                'vue-green': '#42b883',
                'vue-dark': '#35495e',
                'vue-light': '#f9fafb',
            }
        }
    },
}

