// assets/js/app.js - Global UI & Theme Toggle Handler

document.addEventListener("DOMContentLoaded", function () {
  // Initialize light/dark theme preference
  initTheme();

  // Bind Theme Toggles
  const themeToggles = document.querySelectorAll(".theme-toggle-btn");
  themeToggles.forEach(btn => {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      toggleTheme();
    });
  });

  // Mock Logout buttons
  const logoutBtns = document.querySelectorAll(".logout-btn");
  logoutBtns.forEach(btn => {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      window.location.href = "index.html";
    });
  });
});

function initTheme() {
  const theme = localStorage.getItem("theme") || "light";
  if (theme === "dark") {
    document.body.classList.add("dark-theme");
  } else {
    document.body.classList.remove("dark-theme");
  }
  updateThemeIcon(theme);
}

function toggleTheme() {
  const isDark = document.body.classList.toggle("dark-theme");
  const newTheme = isDark ? "dark" : "light";
  localStorage.setItem("theme", newTheme);
  updateThemeIcon(newTheme);
}

function updateThemeIcon(theme) {
  const icons = document.querySelectorAll(".theme-toggle-icon");
  icons.forEach(icon => {
    if (theme === "dark") {
      icon.className = "theme-toggle-icon fa-solid fa-sun";
    } else {
      icon.className = "theme-toggle-icon fa-solid fa-moon";
    }
  });
}
