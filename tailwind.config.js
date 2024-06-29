/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      //80 hv
      height: {
        '80s': '80vh',
      },
    },
  },
  plugins: [
      require('flowbite/plugin')
  ],
}

