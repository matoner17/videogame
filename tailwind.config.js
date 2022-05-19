module.exports = {
  purge: [
    './app/**/*.php',
    './resources/**/*.php',
  ],
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      spacing: {
        '44': '11rem',
        '88': '22rem',
      }
    },
    spinner: (theme) => ({
      default: {
        color: '#dae1e7',
        size: '2em',
        border: '2px',
        speed: '500ms',
      }
    }),
  },
  variants: {
    spinner: ['responsive']
  },
  plugins: [
    require('tailwindcss-spinner')(),
  ],
}
