//function called on button press
function toggleSidebar() {
    panel = document.getElementById("left-panel");
    
    panel.style.width = panel.style.width == "var(--sidebar-width)" ? "0px" : "var(--sidebar-width)";
    
    //hide text if sidebar is collapsed
    if (panel.style.width == "0px") {
        panel.style.setProperty("--text-display", "none");

    } else {
        panel.style.setProperty("--text-display", "block");



    }
}



//clearing HTML style attributes on sidebar when window is big enough
function clearStyle() {
    e = document.getElementById("left-panel");

    e.removeAttribute("style");
}

let q = window.matchMedia("(max-width: 1100px)");
q.addListener(clearStyle);