function toggleSidebar() {
    panel = document.getElementById("left-panel");
    
    panel.style.width = panel.style.width == "var(--sidebar-width)" ? "0px" : "var(--sidebar-width)";
}

function clearStyle(id) {
    e = document.getElementById(id);

    e.removeAttribute("style");
}