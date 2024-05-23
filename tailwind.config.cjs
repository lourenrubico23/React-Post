/** @type {import('tailwindcss').Config} */
export default {
  content: ["./src/**/*.{js,jsx}"],
  theme: {
    extend: {
      colors: {
        primary: "#f9f9ff",
        accent: "#e22c2f",
        lightcolor: "#ffffff",
        darkcolor: "#23272b",
        lightgray: "#506172",
        facebook: "#3b5998",
        instagram: "#c32aa3",
        twitter: "#1dcaff",
        youtube: "#bd081c",
        pinterest: "#bd081c",
        footerblue: "#152035",
      },
      fontFamily: {
        regular: "Roboto-regular",
        thick: "Roboto-medium",
        thicker: "Roboto-bold",
      },
      keyframes: {
        rotate: {
          "100%": {transform: "rotate(360deg)"}
        },
        loading: {
          "0%": { transform: "translateX(-100%)" },
          "100%": { transform: "translateX(100%)" },
        },
      },

      animation: {
        rotate: "rotate 2s linear infinite",
        loading: "loading 1.5s ease-in infinite"
      },
    },
  },
  plugins: [],
}

