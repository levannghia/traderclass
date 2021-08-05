$(document).ready(function () {
    var delay = 300;
    $('#mobile-nav>ul>.nav-item').each(function () {
        $(this).css('transition-delay', delay + 'ms');
        delay = delay + 100;
        $(".label-sub").addClass('arrowed');
    });
    $('#toggle-menu').click(function () {
        closeOut();
    });
    $('#mobile-nav .arrowed').click(function () {
        $(this).toggleClass('selected').siblings().removeClass("selected");
        if ($(this).next('ul.sub-nav').is(':visible')) {
            $(this).next('ul.sub-nav').slideUp('slow');
        } else {
            $(this).next('ul.sub-nav').slideDown('slow');
        }
    });

});

function closeOut() {
    $('body').toggleClass('scroll-jam').append("<div class='sidebar_overlay' onclick='closeMenu()'></div>");
    $('#sidebar').toggleClass('nav-slide');
    $('#mobile-nav>ul>.nav-item').toggleClass('item-slide').removeClass('selected');
    $('#mobile-nav>ul .sub-nav').each(function () {
        $(this).hide();
    });
    $(".label-sub").removeClass('selected');
}

function closeMenu() {
    closeOut();
    $(".sidebar_overlay").remove();
}