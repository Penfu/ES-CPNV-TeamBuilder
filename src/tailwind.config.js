module.exports = {
  purge: [],
  darkMode: 'class', // or 'media' or 'class'
  theme: {
    fontFamily: {
      sans: ['Roboto', 'sans-serif']
    },
    extend: {
      colors: {
        light: {
          1: '#fbfbfd',
          2: '#f7f8fa',
          3: '#ebebf0',
          4: '#cdd9e5'
        },
        dark: {
          1: '#2c333b',
          2: '#373e48',
          3: '#343b42',
          4: '#22272d',
          5: '#1c2127'
        }
      },
      keyframes: {
        'show': {
          from: {
            opacity: 0,
            scale: 0.95
          },
          to: {
            opacity: 1,
            scale: 1
          }
        },        
        'hide': {
          from: {
            opacity: 1,
            scale: 1
          },
          to: {
            opacity: 0,
            scale: 0.95
          }
        },
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
        'show': 'show 0.35s ease-out',
        'hide': 'hide 0.35s ease-in',
        'fade': 'fade 0.5s ease-out',
        'fade-in-down': 'fade-in-down 0.5s ease-out'
      }
    }
  },
  variants: {
    extend: {
      cursor: ['disabled'],
      pointerEvents: ['disabled'],
      backgroundColor: ['disabled'],
      opacity: ['disabled'],
    }
  },
  plugins: []
}
