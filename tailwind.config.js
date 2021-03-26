module.exports = {
  purge: {
    content: [
      'source/**/*.html',
      'source/**/*.md',
      'source/**/*.js',
      'source/**/*.php',
      'source/**/*.vue',
    ],
    options: {
      whitelist: [
        /language/,
        /hljs/,
        /mce/,
      ],
    },
  },
  darkMode: false,
  theme: {
    extend: {
      fontFamily: {
        sans: [
          'Nunito Sans'
        ],
        mono: [
          'monospace',
        ],
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/typography'),
  ]
}
