const popupTriggerButtons = document.querySelectorAll("[data-popup-target]")
const popups = document.querySelectorAll(".popup")
const popupCloseButtons = document.querySelectorAll(".popup-close")

popupTriggerButtons.forEach(elem => {
    elem.addEventListener("click", event => togglePopup(event.currentTarget.getAttribute("data-popup-target")));
});

popupCloseButtons.forEach(elem =>{
    elem.addEventListener("click", event => togglePopup(event.currentTarget.closest(".popup").id));
});

popups.forEach(elem =>{
    elem.addEventListener("click", event => {
        if (event.currentTarget===event.target) togglePopup(event.currentTarget.id);
    });
});



function togglePopup(popupId) {
    const popup = document.getElementById(popupId);


    if(getComputedStyle(popup).display==="flex") {
        popup.style.display = "none";
        document.body.style.overflow = "initial";
    }
    else {
        popup.style.display = "flex";
        document.body.style.overflow = "hidden";
    }
}

// When the user clicks on div, open the popup
function clPopup() {
    const popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}
function clPopup2() {
    const popup = document.getElementById("myPopup2");
    popup.classList.toggle("show");
}
function clPopup3() {
    const popup = document.getElementById("myPopup3");
    popup.classList.toggle("show");
}
function clPopup4() {
    const popup = document.getElementById("myPopup4");
    popup.classList.toggle("show");
}
function clPopup5() {
    const popup = document.getElementById("myPopup5");
    popup.classList.toggle("show");
}
function clPopup6() {
    const popup = document.getElementById("myPopup6");
    popup.classList.toggle("show");
}
function clPopup7() {
    const popup = document.getElementById("myPopup7");
    popup.classList.toggle("show");
}
function clPopup8() {
    const popup = document.getElementById("myPopup8");
    popup.classList.toggle("show");
}
function clPopup9() {
    const popup = document.getElementById("myPopup9");
    popup.classList.toggle("show");
}