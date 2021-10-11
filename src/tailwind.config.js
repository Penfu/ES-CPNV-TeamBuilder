module.exports = {
  purge: [],
  darkMode: 'class', // or 'media' or 'class'
  theme: {
    fontFamily: {
      sans: ['Roboto', 'sans-serif']
    },
    extend: {
      colors: {
        dark: {
          100: '#cdd9e5',
          400: '#2c333b',
          600: '#373e48',
          700: '#343b42',
          800: '#22272d',
          900: '#1c2127'
        }
      },
      keyframes: {
        'fade': {
          '0%': {
            opacity: '0'
          },
          '100%': {
            opacity: '1'
          }
        },
        'fade-in-down': {
          '0%': {
            opacity: '0',
            transform: 'translateY(-10px)'
          },
          '100%': {
            opacity: '1',
            transform: 'translateY(0)'
          },
        }
      },
      animation: {
        'fade': 'fade 0.5s ease-out',
        'fade-in-down': 'fade-in-down 0.5s ease-out'
      }
    }
  },
  variants: {
    extend: {}
  },
  plugins: []
}
