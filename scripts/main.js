function toggleSidebar() {
    panel = document.getElementById("left-panel");
    
    panel.style.width = panel.style.width == "var(--sidebar-width)" ? "0px" : "var(--sidebar-width)";
}

function clearStyle() {
    e = document.getElementById("left-panel");

    e.removeAttribute("style");
}


let q = window.matchMedia("(max-width: 1100px)");
q.addListener(clearStyle);