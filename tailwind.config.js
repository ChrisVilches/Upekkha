/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.{html,php,js}",
    "!./node_modules",
    "./node_modules/flowbite/**/*.js",
    "!./assets"
  ],
  theme: {
    container: {
      center: true
    },
    screens: {
      // TODO: Should this be with "padding" instead??
      'sm': '640px',
      'md': '850px',
      'lg': '1000px',
      'xl': '1200px'
      // 'sm': '640px',
      // 'md': '768px',
      // 'lg': '1024px',
      // 'xl': '1280px',
      // '2xl': '1536px'
    }
  },
  plugins: [require('flowbite/plugin'), require('tailwind-scrollbar')({ nocompatible: true, preferredStrategy: 'pseudoelements' })],
}
