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