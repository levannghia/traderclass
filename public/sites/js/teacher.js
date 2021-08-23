var coll = document.getElementsByClassName("collapsible");
var i;

$(function() {
    $(".btn_subcribe_teacher").click(function() {
        var _token = $('meta[name="csrf-token"]').attr('content');
        var data_form = $("#form_subcribe_teacher").serialize();
        $.ajax({
            url: "/subcribe-teacher",
            type: "POST",
            data: "_token=" + _token + "&" + data_form,
            beforeSend: function() {
                $(".error_cate").hide();
                $(".error_input").hide();
                $(".error_agree").hide();
            },
            success: function(data) {
                console.log(data)
                if (!data.status) {
                    data.error.course_category_id != undefined ? $(".error_cate").html(
                        data.error.course_category_id).show() : "";
                    data.error.email != undefined ? $(".error_input").html(data.error
                        .email).show() : "";
                    data.error.agree_chk != undefined ? $(".error_agree").html(data
                        .error.agree_chk).show() : "";
                } else {
                    swal("Sucessfuly, Thank you!", "We're will contact soon!",
                        "success").then((value) => {
                        if (value) {
                            location.reload();
                        }
                        if (value == null) {
                            location.reload();
                        }
                    });
                }
            },
        });
    });
});

for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.maxHeight) {
            content.style.maxHeight = null;
        } else {
            content.style.maxHeight = content.scrollHeight + "px";
        }
    });
}

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
        txtValue = a[i].textContent || a[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
        } else {
            a[i].style.display = "none";
        }
    }
}

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });
}

window.document.onkeydown = function(e) {
    if (!e) {
        e = event;
    }
    if (e.keyCode == 27) {
        lightbox_close();
    }
}

function lightbox_open(name) {

    var lightBoxVideo = document.getElementById("VisaChipCardVideo");
    var videoFile = name;
    $('#light video source').attr('src', videoFile);
    $("#light video")[0].load();
    window.scrollTo(0, 0);
    document.getElementById('light').style.display = 'block';
    document.getElementById('fade').style.display = 'block';
    scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
        window.onscroll = function() {
            window.scrollTo(scrollLeft, scrollTop);
        };
    lightBoxVideo.play();
}

function share_open() {
    window.scrollTo(0, 0);
    document.getElementById('share').style.display = 'block';
    document.getElementById('fade').style.display = 'block';
    scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
        window.onscroll = function() {
            window.scrollTo(scrollLeft, scrollTop);
        };
}

function lightbox_close() {
    var lightBoxVideo = document.getElementById("VisaChipCardVideo");
    document.getElementById('share').style.display = 'none';
    document.getElementById('light').style.display = 'none';
    document.getElementById('fade').style.display = 'none';
    lightBoxVideo.pause();
    window.onscroll = function() {};
}

document.getElementById("copyButton").addEventListener("click", function() {
    copyToClipboard(document.getElementById("copyTarget"));
});

function copyToClipboard(elem) {
    // create hidden text element, if it doesn't already exist
    var targetId = "_hiddenCopyText_";
    var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
    var origSelectionStart, origSelectionEnd;
    if (isInput) {
        // can just use the original source element for the selection and copy
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
    } else {
        // must use a temporary form element for the selection and copy
        target = document.getElementById(targetId);
        if (!target) {
            var target = document.createElement("textarea");
            target.style.position = "absolute";
            target.style.left = "-9999px";
            target.style.top = "0";
            target.id = targetId;
            document.body.appendChild(target);
        }
        target.textContent = elem.textContent;
    }
    // select the content
    var currentFocus = document.activeElement;
    target.focus();
    target.setSelectionRange(0, target.value.length);

    // copy the selection
    var succeed;
    try {
        succeed = document.execCommand("copy");
    } catch (e) {
        succeed = false;
    }
    // restore original focus
    if (currentFocus && typeof currentFocus.focus === "function") {
        currentFocus.focus();
    }

    if (isInput) {
        // restore prior selection
        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
    } else {
        // clear temporary content
        target.textContent = "";
    }
    return succeed;
}

function hover(int) {
    if (int == 1) {
        document.getElementById('1').style.borderBottom = "2px solid #ffffff";
        document.getElementById('2').style.borderBottom = "2px solid #323741";
        document.getElementById('3').style.borderBottom = "2px solid #323741";
    } else if (int == 2) {
        document.getElementById('1').style.borderBottom = "2px solid #323741";
        document.getElementById('2').style.borderBottom = "2px solid #ffffff";
        document.getElementById('3').style.borderBottom = "2px solid #323741";
    } else {
        document.getElementById('1').style.borderBottom = "2px solid #323741";
        document.getElementById('2').style.borderBottom = "2px solid #323741";
        document.getElementById('3').style.borderBottom = "2px solid #ffffff";
    }
}

function body() {
    document.getElementById('1').style.borderBottom = "2px solid #ffffff";
}