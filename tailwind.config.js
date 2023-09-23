/** @type {import('tailwindcss').Config} */
export default {
    content: [
        // You will probably also need those lines
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./app/View/Components/**/**/*.php",
        "./app/Livewire/**/**/*.php",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',

        // Add mary
        "./vendor/robsontenorio/mary/src/View/Components/**/*.php"
    ],
    theme: {
        extend: {},
    },
    daisyui: {
        themes: ["cmyk", "dracura", "autumn"],
    },
    // Add daisyUI
    plugins: [
        require("daisyui"),
        require('@tailwindcss/typography'),
    ]
}
