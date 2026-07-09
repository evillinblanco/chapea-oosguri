module.exports = {
  content: [
    './index.html',
    './src/**/*.{js,ts,jsx,tsx}',
  ],
  theme: {
    extend: {
      colors: {
        primary: '#00B7D8',
        'primary-light': '#1FC9E0',
        'primary-dark': '#0098B8',
        'primary-50': '#E0F7FB',
        dark: '#121212',
        'dark-light': '#1E1E1E',
        'dark-medium': '#424242',
        'dark-text': '#E8E8E8',
        accent: '#D4AF37',
        'accent-light': '#E8C547',
        'accent-dark': '#B8922A',
        'accent-50': '#F5F0E8',
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
