var coll = document.getElementsByClassName("item");
var i = 0;

for (i; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        window.location.href = "Detailed course.html"
    });
}