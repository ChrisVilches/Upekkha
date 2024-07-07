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
    container: {
      center: true
    },
    screens: {
      'sm': '640px',
      'md': '748px',
      'lg': '784px',
      'xl': '1000px'
    }
  },
  plugins: [require('flowbite/plugin')],
}
