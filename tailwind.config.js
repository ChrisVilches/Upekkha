/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.{html,php,js}",
    "!./**/*.{png,jpg}",
    "!./node_modules",
    "./node_modules/flowbite/**/*.js",
    "!./assets"
  ],
  theme: {
    screens: {
      'sm': '640px', // => @media (min-width: 640px) { ... }
      'md': '748px', // => @media (min-width: 768px) { ... }
      'lg': '784px', // => @media (min-width: 1024px) { ... }
      'xl': '1000px', // => @media (min-width: 1280px) { ... }
    }
  },
  plugins: [require('flowbite/plugin')],
}
