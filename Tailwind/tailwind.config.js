module.exports = {
  content: ["./public/**/*.{html,js}"],
  theme: {
    container: {
      center: true,
      padding: '16px',
    },
    extend: {
      fontFamily: {
        inter: "'Inter', sans-serif;",
        popins: "'Poppins', sans-serif;"
      },
      screens: {
        '2xl': '1320px',
      },
    },
  },
  plugins: [],
}
