document.addEventListener("click", (event) => {
    let dropdown = event.target.closest("[data-dropdown]");
    let button = event.target.closest("[data-dropdown-button]");

    if (button) {
        dropdown.classList.toggle("active");
        return;
    }

    if (!button && dropdown) return;

    document.querySelectorAll("[data-dropdown]").forEach((dropdown) => {
        dropdown.classList.remove("active");
    });
});
