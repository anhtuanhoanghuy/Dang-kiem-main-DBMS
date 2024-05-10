//click menu icon to dropdown menu
function dropDownMenu() {
    const listDisplayValue = window.getComputedStyle(document.getElementById("menuList")).getPropertyValue("display");
    if ( listDisplayValue == "none"){
        document.getElementById("menuList").style.display = "block";
    }
    else if ( listDisplayValue == "block") {
        document.getElementById("menuList").style.display = "none";
    }
};

//close menu list if menu icon disappear
window.addEventListener("resize", function() {
    const MenuDisplayValue = window.getComputedStyle(document.getElementById("Menu")).getPropertyValue("display");
    if (MenuDisplayValue == "none") document.getElementById("menuList").style.display = "none";
});

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('#Menu') && !event.target.matches('#Menu_icon') && !event.target.matches('#menuList')) {
        document.getElementById("menuList").style.display = "none";
    }
}
