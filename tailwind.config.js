module.exports = {
  darkMode: 'class',
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './storage/framework/views/*.php',
  ],
  theme: {
    extend: {
      colors: {
        light: {
          background: '#F7F8FA',
          card: '#FFFFFF',
          text: '#2D3748',
          textSecondary: '#718096',
          border: '#E2E8F0',
          primary: '#4A5568',
          secondary: '#CBD5E0',
          hover: '#2C5282',
          success: '#38A169',
          warning: '#DD6B20',
          error: '#E53E3E',
        },
        dark: {
          background: '#1A202C',
          card: '#2D3748',
          text: '#E2E8F0',
          textSecondary: '#A0AEC0',
          border: '#4A5568',
          primary: '#CBD5E0',
          secondary: '#4A5568',
          hover: '#90CDF4',
        }
      }
    }
  },
  plugins: [],
}