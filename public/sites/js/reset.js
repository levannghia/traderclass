function text() {
    var x = document.getElementById("pas");
    var y = document.getElementById("pass");
    if (x.type === "password") {
        x.type = "text";
        y.type = "text";
    } else {
        x.type = "password";
        y.type = "password";
    }
}

function sen() {
    var regExp = /^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/;
    var x = document.getElementById("pas");
    var y = document.getElementById("pass");
    if (!regExp.test(x.value)) {
        document.getElementById("error2").style.display = "block";
        document.getElementById("error").style.display = "none";

    } else {
        document.getElementById("error2").style.display = "none";
        if (x.value != y.value) {
            document.getElementById("ches").style.marginTop = "0px"
            document.getElementById("ches").style.marginBottom = "20px"
            document.getElementById("error").style.display = "block";
            document.getElementById('sen').addEventListener("submit", function(e) {
                e.preventDefault();
            });
        } else {
            document.getElementById("share").style.display = "block";
            document.getElementById("fade").style.display = "block";
            document.getElementById('sen').addEventListener("submit", function(e) {
                e.preventDefault();
            });
            document.getElementById("bac").addEventListener("click", function() {
                document.getElementById('sen').submit();
            })
        }
    }
}

function bach() {
    document.getElementById("share").style.display = "none";
    document.getElementById('sen').submit();
    window.location.href = "index.html";
}