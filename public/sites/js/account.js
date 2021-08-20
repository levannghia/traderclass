// Popup-account
function toggle1() {
    window.location.href = "Invite friends.html";
}

function toggle2() {
    const popup_account = document.querySelector('.popup-account');
    popup_account.classList.toggle('actives');

    const popup = document.querySelector('.popup');
    popup.classList.toggle('actives');
}

function toggle3() {

    const popup_account = document.querySelector('.popup-account');
    popup_account.classList.toggle('actives');

    const update_email = document.querySelector('.update-email');
    update_email.classList.toggle('actives');
}

function toggle4() {
    const popup_account = document.querySelector('.popup-account');
    popup_account.classList.toggle('actives');

    const change_password = document.querySelector('.change-password');
    change_password.classList.toggle('actives');
}

// const $ = document.querySelector.bind(document)
// const $$ = document.querySelectorAll.bind(document)

// const tabs = $$('.tab-item')
// const panes = $$('.tab-pane')

// const tabactives = $('.tab-item.actives')
// const line = $('.tabs .line')

// line.style.left = tabactives.offsetLeft + 'px'
// line.style.width = tabactives.offsetWidth + 'px'

// tabs.forEach((tab, index) => {
//     const pane = panes[index]

//     tab.onclick = function() {
//         $('.tab-item.actives').classList.remove('actives')
//         $('.tab-pane.actives').classList.remove('actives')

//         line.style.left = this.offsetLeft + 'px'
//         line.style.width = this.offsetWidth + 'px'

//         this.classList.add('actives')
//         pane.classList.add('actives')
//     }
// })

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("tab-pane");
    var dots = document.getElementsByClassName("tab-item");
    var dotts = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" actives", "");
        dotts[i].className = dotts[i].className.replace(" actives", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " actives";
    dotts[slideIndex - 1].className += " actives";
}