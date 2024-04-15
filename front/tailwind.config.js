/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx,vue}",
  ],
  theme: {
    extend: {
      colors:{
        primary: '#0097FF',
        secondary: '#88FAFF',
      }
    },
  },
  plugins: [],
}

