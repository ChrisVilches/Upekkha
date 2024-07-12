export const themeStore = {
  init() {
    this.isDark = localStorage.getItem("ui-theme") === "dark";

    // Doing this removes the theme color transitions when the overlay is removed.
    // The color transitions do show if the user toggles the theme again though.
    document.querySelector("#main-container").classList.remove("hidden");
  },

  isDark: false,

  get currentTheme() {
    return this.isDark ? "dark" : "light";
  },

  toggle() {
    this.isDark = !this.isDark;
    localStorage.setItem("ui-theme", this.currentTheme);
  },
};
