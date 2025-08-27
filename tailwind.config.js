/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/Views/**/*.php", // agar Tailwind scan file Blade PHP
    "./public/**/*.html",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
