// $('video').parent().click(function() {
//     if ($(this).children(".video").get(0).paused) {
//         $(this).children(".video").get(0).play();
//         $(this).children(".playpause").fadeOut();
//         console.log("Play")
//     } else {
//         $(this).children(".video").get(0).paused;
//         $(this).children(".playpause").fadeIn();
//         console.log("Pause")
//     }
// });

function nextvideo(name) {
    var videoFile = name;
    $('.wrappe video source').attr('src', videoFile);
    $(".wrappe video")[0].load();
}