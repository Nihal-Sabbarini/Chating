/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.css",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        zIndex: {
            '99999' : '99999'
        }
    },
  },
  plugins: [],
    corePlugins: {
        flexDirection: true
    }

}

