/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: '#3178C4',  
          50: '#E6F0FF',   
          100: '#CCE0FF',
          500: '#3178C4', 
          700: '#1E4ED8',      
          900: '#0F2A6B'     
        }
      }
    },
  },
  plugins: [],
}