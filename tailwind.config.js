/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            sans: ["Poppins", "sans-serif"],
            serif: ["Poppins", "serif"],
        },
        extend: {
            colors: {
                primary: {
                    light: "#FFD811",
                    DEFAULT: "#FC9A17",
                },
                link: "#007185",
            },
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
