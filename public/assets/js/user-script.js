/* =========================
   NAVBAR MENU TOGGLE
========================= */
const menuBtn = document.querySelector(".menu-btn");
const menu = document.querySelector(".menu");

if (menuBtn && menu) {
    menuBtn.addEventListener("click", () => {
        menu.classList.toggle("active");
        menuBtn.classList.toggle("active");
    });
}

/* =========================
   PROFILE DROPDOWN TOGGLE
========================= */
const profileBtn = document.getElementById("profileBtn");
const profileDropdown = document.getElementById("profileDropdown");

if (profileBtn && profileDropdown) {
    profileBtn.addEventListener("click", (e) => {
        e.stopPropagation();
        profileDropdown.classList.toggle("show");
    });

    // Close when clicking outside
    document.addEventListener("click", () => {
        profileDropdown.classList.remove("show");
    });

    profileDropdown.addEventListener("click", (e) => {
        e.stopPropagation();
    });
}

/* =========================
   SETTINGS SIDEBAR ACTIVE
========================= */
const sidebarItems = document.querySelectorAll(".sidebar li");

if (sidebarItems.length > 0) {
    sidebarItems.forEach(item => {
        item.addEventListener("click", () => {
            sidebarItems.forEach(i => i.classList.remove("active"));
            item.classList.add("active");
        });
    });
}

/* =========================
   SORT DROPDOWN (Reviews / Watchlist)
========================= */
const sortDropdown = document.querySelector(".sort-dropdown");

if (sortDropdown) {
    sortDropdown.addEventListener("change", () => {
        console.log("Sorted by:", sortDropdown.value);
        // Backend / dynamic sorting later
    });
}

/* =========================
   DARK MODE TOGGLE (OPTIONAL)
========================= */
const darkModeCheckbox = document.querySelector(
    '.checkbox-group input[type="checkbox"]'
);

if (darkModeCheckbox) {
    darkModeCheckbox.addEventListener("change", () => {
        document.body.classList.toggle("light-mode");

        if (document.body.classList.contains("light-mode")) {
            localStorage.setItem("theme", "light");
        } else {
            localStorage.setItem("theme", "dark");
        }
    });
}

/* =========================
   LOAD THEME FROM STORAGE
========================= */
window.addEventListener("load", () => {
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme === "light") {
        document.body.classList.add("light-mode");
    }
});

/* =========================
   CAROUSEL
========================= */
let currentIdx = 0;
function showSlide(n) {
    const slides = document.querySelectorAll('.carousel-item');
    const dots = document.querySelectorAll('.dot');

    if (!slides.length) return;

    if (n >= slides.length) currentIdx = 0;
    else if (n < 0) currentIdx = slides.length - 1;
    else currentIdx = n;

    slides.forEach(slide => slide.classList.remove('active'));
    dots.forEach(dot => dot.classList.remove('active'));

    slides[currentIdx].classList.add('active');
    if (dots[currentIdx]) dots[currentIdx].classList.add('active');
}

function changeSlide(n) {
    showSlide(currentIdx + n);
}

function currentSlide(n) {
    showSlide(n);
}

setInterval(() => {
    changeSlide(1);
}, 5000);
