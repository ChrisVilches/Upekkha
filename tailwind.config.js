/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.{html,php,js}",
    "!./node_modules",
    "./node_modules/flowbite/**/*.js",
    "!./assets"
  ],
  theme: {
    extend: {
      fontFamily: {
        roboto: ['Roboto', 'sans-serif'],
        rajdhani: ['Rajdhani', 'serif']
      },
      colors: {
        yellow: {
          50: "#FAF9EA",
          100: "#F4F2D2",
          200: "#EAE7A9",
          300: "#DFDA7C",
          400: "#D5CF53",
          500: "#C1B92F",
          600: "#9C9626",
          700: "#736E1C",
          800: "#4E4B13",
          900: "#252409",
          950: "#151405"
        },
        slate: {
          50: "#EAECF0",
          100: "#D8DDE4",
          200: "#AEB7C6",
          300: "#8795AB",
          400: "#61718A",
          500: "#455062",
          600: "#37404E",
          700: "#2A313C",
          800: "#1B2027",
          900: "#0F1115",
          950: "#060709"
        }
      }
    },
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
