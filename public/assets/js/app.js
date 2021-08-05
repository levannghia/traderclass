$(document).ready(function () {
    $('.banner-home .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    $('.list-customer .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        autoplay: true,
        navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });
    // scroll body to 0px on click
    $('#back-to-top').click(function () {
        $('#back-to-top').tooltip('hide');
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    $('#back-to-top').tooltip('hide');

    //    console.log(data_news);

    /*data_news.each(function (index) {
     console.log(this);
     });*/
    
    if (typeof data_news !== 'undefined') {
        var datanews = JSON.parse(data_news);
        var total_size = datanews.length,
                countNumber = -1;
        $(".result_text_animation").html(`<a href="/blog/${datanews[0].alias}-${datanews[0].id}.html">${datanews[0].title}</a>`);
        var x = setInterval(function () {
            countNumber++;
            var info_ = datanews[countNumber];
            var dataHtml = `
             <a href="/blog/${info_.alias}-${info_.id}.html">${info_.title}</a>
             `;
            $(".result_text_animation").html(dataHtml);
            //stop to start
            if (countNumber == (total_size - 1)) {
                countNumber = -1;
            }
        }, 2500);
    }
});
$(window).on('load', function () {

});
$(window).on('resize', function () {

});
$(window).on('scroll', function () {
    if ($(window).scrollTop() > 80) {
        $('.header-main').addClass('h-fixed animated fadeInDown');
    } else {
        $('.header-main').removeClass('h-fixed animated fadeInDown');
    }
    if ($(window).scrollTop() > 160) {
        $('.header-main').addClass('h-fixed animated fadeInDown');
    } else {
        $('.header-main').removeClass('h-fixed animated fadeInDown');
    }
    if ($(this).scrollTop() > 50) {
        $('#back-to-top').fadeIn();
    } else {
        $('#back-to-top').fadeOut();
    }
});
