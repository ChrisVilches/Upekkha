/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: "class",
  content: [
    "./**/*.php",
    "!./node_modules",
    "./node_modules/flowbite/**/*.js",
    "!./dist",
  ],
  theme: {
    extend: {
      fontFamily: {
        roboto: ["Roboto", "sans-serif"],
        rajdhani: ["Rajdhani", "serif"],
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
          950: "#151405",
        },
        slate: {
          50: "#FCFCFD",
          100: "#FCFCFD",
          200: "#E4E8ED",
          300: "#B9C4D0",
          400: "#8296AB",
          500: "#35424F",
          600: "#2F3B46",
          700: "#27303A",
          800: "#1F262E",
          900: "#141A1F",
          950: "#10161B",
        },
      },
    },
    container: {
      center: true,
    },
    screens: {
      // TODO: Should this be with "padding" instead??
      sm: "640px",
      md: "850px",
      lg: "1000px",
      xl: "1200px",
      // 'sm': '640px',
      // 'md': '768px',
      // 'lg': '1024px',
      // 'xl': '1280px',
      // '2xl': '1536px'
    },
  },
  plugins: [
    require("flowbite/plugin"),
    require("tailwind-scrollbar")({
      nocompatible: true,
      preferredStrategy: "pseudoelements",
    }),
  ],
};

// TODO: I think the font sizes (text-sm, text-lg, text-xl) can be configured here. Don't try to add hardcoded
//       utility classes in the HTML markup. Just modify it here and see the entire page change.
