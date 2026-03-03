/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: '#3461DF',    // Deep Blue
          dark: '#274BC8',       // Hover state
          medium: '#79ACFF',     // Secondary
          light: '#B8D9FF',      // Soft Accent
        },
        background: {
          DEFAULT: '#F4F8FF',    // Very Light Blue
          white: '#FFFFFF',
        },
        text: {
          primary: '#0F172A',    // Dark Navy
          secondary: '#64748B',  // Gray
        },
        border: {
          DEFAULT: '#E2E8F0',    // Soft Blue Gray
        },
        footer: {
          DEFAULT: '#0F172A',    // Dark Navy
          text: '#CBD5E1',
        }
      },
      fontFamily: {
        sans: ['Inter Variable', 'ui-sans-serif', 'system-ui', 'sans-serif'],
      }
    },
  },
  plugins: [],
}