
let selectAllToggle = document.querySelector("input[type=checkbox][data-select-all-toggle]");
let selectAllTargets = document.querySelectorAll("[data-select-all-target] input[type=checkbox]");
let selectedCountTarget = document.querySelectorAll("[data-select-count-target]");
let selectStateTarget = document.querySelectorAll("[data-select-state-target]");
let selectedCount = 0;

let timer;

function updateSelectedCount() {
    clearTimeout(timer);
    timer = setTimeout(() => {
        selectedCount = Array.from(selectAllTargets).reduce((p, e) => p + (e.checked ? 1 : 0), 0)
        selectedCountTarget.forEach((target) => {
            target.innerHTML = selectedCount === 0 ? '' : `${selectedCount} selected`
        });

        selectStateTarget.forEach((target) => {
            if (selectedCount > 0) {
                target.setAttribute('selected', `${selectedCount > 1 ? "multiple" : "single"}`)
            } else {
                target.removeAttribute('selected');
                target.removeAttribute('selected-single');
                target.removeAttribute('selected-multiple');
            }
        });

        clearTimeout(timer);
    }, 100);
}

selectAllTargets.forEach((target) => {
    target.addEventListener("change", updateSelectedCount);
})

selectAllToggle.addEventListener("change", () => {
    let isChecked = selectAllToggle.checked;
    selectAllTargets.forEach((checkbox) => {
        checkbox.checked = isChecked;
    });

    updateSelectedCount();
});