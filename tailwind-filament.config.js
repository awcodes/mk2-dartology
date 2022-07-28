const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php", "./vendor/filament/**/*.blade.php"],
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                gray: colors.slate,
                danger: colors.rose,
                primary: {
                    50: "#fafef5",
                    100: "#f6fdeb",
                    200: "#e8f9cd",
                    300: "#daf5ae",
                    400: "#bfee72",
                    500: "#a3e635",
                    600: "#93cf30",
                    700: "#7aad28",
                    800: "#628a20",
                    900: "#50711a",
                },
                success: colors.emerald,
                warning: colors.orange,
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
