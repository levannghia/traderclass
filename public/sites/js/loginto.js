var slideIndex = 4;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    var dotts = document.getElementsByClassName("dott");
    if (n > slides.length) { slideIndex = 4 }
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

function paymen(int) {
    if (int == 4) {
        window.location.href = "Payment Bank.html";
        return;
    }
    if (int == 3) {
        window.location.href = "Payment Momo.html";
        return;
    }
    if (int == 2) {
        window.location.href = "Payment ATM.html";
        return;
    }
    if (int == 1) {
        return;
    }
}

function choose() {
    document.getElementById("promo").style.display = "block";
    document.getElementById("fade").style.display = "block";
    // scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    // scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
    //     window.onscroll = function() {
    //         window.scrollTo(scrollLeft, scrollTop);
    //     };
}

function promo_close() {
    document.getElementById("promo").style.display = "none";
    document.getElementById("fade").style.display = "none";
    // window.onscroll = function() {};
}
var a = 1;

function tick(int) {
    if (int == a) {
        a = 2;
        document.getElementById("bi").style.display = "block";
        document.getElementById("tic").style.display = "block";
    }
}

function tick2(int) {
    if (int == a) {
        a = 2;
        document.getElementById("bi2").style.display = "block";
        document.getElementById("tic2").style.display = "block";
    }
}

function tick3(int) {
    if (int == a) {
        a = 2;
        document.getElementById("bi3").style.display = "block";
        document.getElementById("tic3").style.display = "block";
    }
}

function tick4(int) {
    if (int == a) {
        a = 2;
        document.getElementById("bi4").style.display = "block";
        document.getElementById("tic4").style.display = "block";
    }
}

function tick5(int) {
    if (int == a) {
        a = 2;
        document.getElementById("bi5").style.display = "block";
        document.getElementById("tic5").style.display = "block";
    }
}

function tick6(int) {
    if (int == a) {
        a = 2;
        document.getElementById("bi6").style.display = "block";
        document.getElementById("tic6").style.display = "block";
    }
}

function tick7(int) {
    if (int == a) {
        a = 2;
        document.getElementById("bi7").style.display = "block";
        document.getElementById("tic7").style.display = "block";
    }
}

function tick8(int) {
    if (int == a) {
        a = 2;
        document.getElementById("bi8").style.display = "block";
        document.getElementById("tic8").style.display = "block";
    }
}

function tick9(int) {
    if (int == a) {
        a = 2;
        document.getElementById("bi9").style.display = "block";
        document.getElementById("tic9").style.display = "block";
    }
}

function tick10(int) {
    if (int == a) {
        a = 2;
        document.getElementById("bi10").style.display = "block";
        document.getElementById("tic10").style.display = "block";
    }
}

function tick11(int) {
    if (int == a) {
        a = 2;
        document.getElementById("bi11").style.display = "block";
        document.getElementById("tic11").style.display = "block";
    }
}

function tick12(int) {
    if (int == a) {
        a = 2;
        document.getElementById("bi12").style.display = "block";
        document.getElementById("tic12").style.display = "block";
    }
}

function tick13(int) {
    if (int == a) {
        a = 2;
        document.getElementById("bi13").style.display = "block";
        document.getElementById("tic13").style.display = "block";
    }
}

function tic() {
    document.getElementById("tic").style.display = "none";
    document.getElementById("bi").style.display = "none";
    a = 1;
}

function tic2() {
    document.getElementById("tic2").style.display = "none";
    document.getElementById("bi2").style.display = "none";
    a = 1;
}

function tic3() {
    document.getElementById("tic3").style.display = "none";
    document.getElementById("bi3").style.display = "none";
    a = 1;
}

function tic4() {
    document.getElementById("tic4").style.display = "none";
    document.getElementById("bi4").style.display = "none";
    a = 1;
}

function tic5() {
    document.getElementById("tic5").style.display = "none";
    document.getElementById("bi5").style.display = "none";
    a = 1;
}

function tic6() {
    document.getElementById("tic6").style.display = "none";
    document.getElementById("bi6").style.display = "none";
    a = 1;
}

function tic7() {
    document.getElementById("tic7").style.display = "none";
    document.getElementById("bi7").style.display = "none";
    a = 1;
}

function tic8() {
    document.getElementById("tic8").style.display = "none";
    document.getElementById("bi8").style.display = "none";
    a = 1;
}

function tic9() {
    document.getElementById("tic9").style.display = "none";
    document.getElementById("bi9").style.display = "none";
    a = 1;
}

function tic10() {
    document.getElementById("tic10").style.display = "none";
    document.getElementById("bi10").style.display = "none";
    a = 1;
}

function tic11() {
    document.getElementById("tic11").style.display = "none";
    document.getElementById("bi11").style.display = "none";
    a = 1;
}

function tic12() {
    document.getElementById("tic12").style.display = "none";
    document.getElementById("bi12").style.display = "none";
    a = 1;
}

function tic13() {
    document.getElementById("tic13").style.display = "none";
    document.getElementById("bi13").style.display = "none";
    a = 1;
}

function ethereum() {
    document.getElementById("ethereum").style.display = "block";
    document.getElementById("bsc").style.display = "none";
    document.getElementById("tron").style.display = "none";
    document.getElementById("btn-ethereum").style.backgroundColor = "#EF8D21";
    document.getElementById("btn-bsc").style.backgroundColor = "#d6d6d6";
    document.getElementById("btn-tron").style.backgroundColor = "#d6d6d6";
}

function bsc() {
    document.getElementById("ethereum").style.display = "none";
    document.getElementById("bsc").style.display = "block";
    document.getElementById("tron").style.display = "none";
    document.getElementById("btn-ethereum").style.backgroundColor = "#d6d6d6";
    document.getElementById("btn-bsc").style.backgroundColor = "#EF8D21";
    document.getElementById("btn-tron").style.backgroundColor = "#d6d6d6";
}

function tron() {
    document.getElementById("ethereum").style.display = "none";
    document.getElementById("bsc").style.display = "none";
    document.getElementById("tron").style.display = "block";
    document.getElementById("btn-ethereum").style.backgroundColor = "#d6d6d6";
    document.getElementById("btn-bsc").style.backgroundColor = "#d6d6d6";
    document.getElementById("btn-tron").style.backgroundColor = "#EF8D21";
}