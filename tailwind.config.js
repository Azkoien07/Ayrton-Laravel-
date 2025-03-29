/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./app/Livewire/**/*.php",
      "./storage/framework/views/*.php"
    ],
    theme: {
      extend: {
        colors: {
          primary: {
            DEFAULT: '#3B82F6', 
            light: '#93C5FD',
            dark: '#1D4ED8'
          },
          secondary: {
            DEFAULT: '#10B981',
            dark: '#047857'
          }
        },
        fontFamily: {
          sans: ['Inter var', 'sans-serif'],
        },
        spacing: {
          128: '32rem',
        }
      },
    },
  
    plugins: [
      require('@tailwindcss/forms'),
      require('@tailwindcss/typography'),
      require('@tailwindcss/aspect-ratio'),
    ],
  
    // Optimización para producción
    corePlugins: {
      float: false,
    }
  }