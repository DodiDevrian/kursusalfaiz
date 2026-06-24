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

  // Live filter search for tables
  const tableSearchInputs = document.querySelectorAll(".table-search-input");
  tableSearchInputs.forEach(input => {
    input.addEventListener("input", function () {
      const query = this.value.toLowerCase().trim();
      const card = this.closest(".bg-white") || this.closest(".card");
      if (!card) return;
      const table = card.querySelector("table");
      if (!table) return;
      const tbody = table.querySelector("tbody");
      if (!tbody) return;
      
      const rows = tbody.querySelectorAll("tr:not(.no-results-row)");
      let visibleCount = 0;
      
      rows.forEach(row => {
        // Exclude cells that contain buttons or actions from search match to prevent false positives
        const searchableCells = Array.from(row.cells).filter(cell => !cell.classList.contains("text-end") && !cell.querySelector("button"));
        const text = searchableCells.map(cell => cell.textContent).join(" ").toLowerCase();
        
        if (text.includes(query)) {
          row.style.setProperty('display', '', 'important');
          visibleCount++;
        } else {
          row.style.setProperty('display', 'none', 'important');
        }
      });
      
      // Handle "No results found" row
      let noResultsRow = tbody.querySelector(".no-results-row");
      if (visibleCount === 0) {
        if (!noResultsRow) {
          const colSpan = table.querySelectorAll("thead th").length || 5;
          noResultsRow = document.createElement("tr");
          noResultsRow.className = "no-results-row";
          noResultsRow.innerHTML = `
            <td colspan="${colSpan}" class="text-center py-4 text-muted small">
              <i class="fa-solid fa-face-frown me-1 fs-5 d-block mb-2 text-gold"></i>
              Tidak ada data yang cocok dengan pencarian.
            </td>
          `;
          tbody.appendChild(noResultsRow);
        } else {
          noResultsRow.style.setProperty('display', '', 'important');
        }
      } else {
        if (noResultsRow) {
          noResultsRow.style.setProperty('display', 'none', 'important');
        }
      }
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
