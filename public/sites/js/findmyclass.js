var a = 0;

function up_down(intt) {
    var span_Text = document.getElementById("upp").innerText;
    document.getElementById("bi").style.display = "block";
    document.getElementById("up").style.display = "block";
    a = parseInt(span_Text) + 1;
    document.getElementById("upp").innerHTML = a;
}

function up_down2(intt) {
    document.getElementById("bi2").style.display = "block";
    document.getElementById("up2").style.display = "block";
    a = a + 1;
    document.getElementById("upp").innerHTML = a;
}

function up_down3(intt) {
    document.getElementById("bi3").style.display = "block";
    document.getElementById("up3").style.display = "block";
    a = a + 1;
    document.getElementById("upp").innerHTML = a;
}

function up() {
    document.getElementById("bi").style.display = "none";
    document.getElementById("up").style.display = "none";
    a = a - 1;
    document.getElementById("upp").innerHTML = a;
}

function up2() {
    document.getElementById("bi2").style.display = "none";
    document.getElementById("up2").style.display = "none";
    a = a - 1;
    document.getElementById("upp").innerHTML = a;
}

function up3() {
    document.getElementById("bi3").style.display = "none";
    document.getElementById("up3").style.display = "none";
    a = a - 1;
    document.getElementById("upp").innerHTML = a;
}

function classify() {
    window.location.href = "MasterClass.html";
}