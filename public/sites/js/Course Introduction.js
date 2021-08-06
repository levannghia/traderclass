$('video').parent().click(function() {
    if ($(this).children(".video").get(0).paused) {
        $(this).children(".video").get(0).play();
        $(this).children(".playpause").fadeOut();
    } else {
        $(this).children(".playpause").fadeIn();
    }
});

function nextvideo(name) {
    var videoFile = name;
    $('.wrappe video source').attr('src', videoFile);
    $(".wrappe video")[0].load();
}