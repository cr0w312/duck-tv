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
        'body'          : '#FCFDFF',
        'brand-orange'  : '#FFB800',
        'brand-orange-hov' : '#FFA800',
        'brand-white'   : '#FBFBFB',
        'brand-black'   : '#1F2937',
        'brand-gray'    : '#6B7280',
        'brand-gray-300': '#DFDFDF',
        'brand-tag-primary' : '#FEF6DB',
        'brand-tag'     : '#AF641E',
        'brand-border'  : '#D1D5DB',
        'brand-link-hover': '#EE9300'
      },
      screens: {
        'sm': '375px',
        'md': '768px',
        '3xl': '1600px',
      },
      height: {
        '22': '5.625rem',
      },
      dropShadow: {
        'footer': [
            // '0 35px 35px rgba(0, 0, 0, 0.25)',
            // '0 45px 65px rgba(0, 0, 0, 0.15)',
        ],
      },
      boxShadow: {
        'footer': [
          '4px 2px 8px #0000000F',
          '0px 4px 8px #00000012',
          '-4px 0px 8px #00000012',
        ],
      },
      fontSize: {
        msm: '0.9375rem'
      }
    },
  },
  plugins: [],
}

