// Popup-account

function toggle1() {
    const popup_account = document.querySelector('.popup-account');
    popup_account.classList.toggle('active');

    const popup = document.querySelector('.popup');
    popup.classList.toggle('active');
}

function toggle2() {

    const popup_account = document.querySelector('.popup-account');
    popup_account.classList.toggle('active');

    const update_email = document.querySelector('.update-email');
    update_email.classList.toggle('active');
}

function toggle3() {
    const popup_account = document.querySelector('.popup-account');
    popup_account.classList.toggle('active');

    const change_password = document.querySelector('.change-password');
    change_password.classList.toggle('active');
}

// const $ = document.querySelector.bind(document)
// const $$ = document.querySelectorAll.bind(document)

// const tabs = $$('.tab-item')
// const panes = $$('.tab-pane')

// const tabActive = $('.tab-item.active')
// const line = $('.tabs .line')

// line.style.left = tabActive.offsetLeft + 'px'
// line.style.width = tabActive.offsetWidth + 'px'

// tabs.forEach((tab, index) => {
//     const pane = panes[index]

//     tab.onclick = function() {
//         $('.tab-item.active').classList.remove('active')
//         $('.tab-pane.active').classList.remove('active')

//         line.style.left = this.offsetLeft + 'px'
//         line.style.width = this.offsetWidth + 'px'

//         this.classList.add('active')
//         pane.classList.add('active')
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
        dots[i].className = dots[i].className.replace(" active", "");
        dotts[i].className = dotts[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    dotts[slideIndex - 1].className += " active";
}