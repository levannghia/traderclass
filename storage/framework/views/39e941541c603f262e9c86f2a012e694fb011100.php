<script type="text/javascript">
    $(function() {
        $(".btn_subcribe").click(function() {
            var _token = $('meta[name="csrf-token"]').attr('content');
            var data_form = $("#form_subcribe").serialize();
            $.ajax({
                url: "/subcribe",
                type: "POST",
                data: "_token=" + _token + "&" + data_form,
                beforeSend: function() {
                    console.log("da gui post len")
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

    new WOW().init();
    $('.trader_teacher .owl-carousel').owlCarousel({
        loop: true,
        margin: 15,
        nav: true,
        dots: false,
        navText: [
            `
        <svg width = "11" height = "18" viewBox = "0 0 11 18" fill = "none" xmlns = "http://www.w3.org/2000/svg" >
        <path d="M10.6544 16.2217C10.846 16.0267 10.8455 15.7139 10.6532 15.5195L4.54877 9.35133C4.3561 9.15664 4.35593 8.84319 4.54839 8.64829L10.6527 2.46671C10.8451 2.27181 10.845 1.95835 10.6523 1.76367L9.26227 0.359102C9.0666 0.161382 8.74717 0.161383 8.5515 0.359102L0.348071 8.64829C0.155254 8.84312 0.155254 9.15688 0.348071 9.35171L8.55024 17.6396C8.7464 17.8378 9.06679 17.8373 9.26225 17.6384L10.6544 16.2217Z" fill="#C4C4C4" />
        </svg >
        `, `
        <svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.345604 1.77831C0.153959 1.97333 0.154512 2.28613 0.346844 2.48047L6.45123 8.64867C6.6439 8.84335 6.64407 9.15681 6.45161 9.35171L0.347308 15.5333C0.154853 15.7282 0.155024 16.0416 0.347692 16.2363L1.73773 17.6409C1.9334 17.8386 2.25283 17.8386 2.4485 17.6409L10.6519 9.35171C10.8447 9.15688 10.8447 8.84312 10.6519 8.64829L2.44976 0.360372C2.2536 0.16216 1.93321 0.162727 1.73775 0.361631L0.345604 1.77831Z" fill="#C4C4C4"/>
        </svg>
        `
        ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 4
            }
        }
    })

    $('.client_say .owl-carousel').owlCarousel({
        loop: false,
        margin: 15,
        nav: true,
        autoplay: true,
        navText: [
            `
        <svg width = "11" height = "18" viewBox = "0 0 11 18" fill = "none" xmlns = "http://www.w3.org/2000/svg" >
        <path d="M10.6544 16.2217C10.846 16.0267 10.8455 15.7139 10.6532 15.5195L4.54877 9.35133C4.3561 9.15664 4.35593 8.84319 4.54839 8.64829L10.6527 2.46671C10.8451 2.27181 10.845 1.95835 10.6523 1.76367L9.26227 0.359102C9.0666 0.161382 8.74717 0.161383 8.5515 0.359102L0.348071 8.64829C0.155254 8.84312 0.155254 9.15688 0.348071 9.35171L8.55024 17.6396C8.7464 17.8378 9.06679 17.8373 9.26225 17.6384L10.6544 16.2217Z" fill="#C4C4C4" />
        </svg >
        `, `
        <svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.345604 1.77831C0.153959 1.97333 0.154512 2.28613 0.346844 2.48047L6.45123 8.64867C6.6439 8.84335 6.64407 9.15681 6.45161 9.35171L0.347308 15.5333C0.154853 15.7282 0.155024 16.0416 0.347692 16.2363L1.73773 17.6409C1.9334 17.8386 2.25283 17.8386 2.4485 17.6409L10.6519 9.35171C10.8447 9.15688 10.8447 8.84312 10.6519 8.64829L2.44976 0.360372C2.2536 0.16216 1.93321 0.162727 1.73775 0.361631L0.345604 1.77831Z" fill="#C4C4C4"/>
        </svg>
        `
        ],
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
    })
    $(window).on('scroll', function() {
        //console.log($(this).scrollTop());
        if ($(this).scrollTop() > 10) {
            $('.header_bottom').addClass('h-fixed animated fadeInDown');
        } else {
            $('.header_bottom').removeClass('h-fixed animated fadeInDown');
        }
    });
    /*menu_mobile*/
    var iOS = !!navigator.platform && /iPad|iPhone|iPod/.test(navigator.platform);
    (function($) {
        var delay = 300;
        $('#mobile-nav>ul>.nav-item').each(function() {
            $(this).css('transition-delay', delay + 'ms');
            delay = delay + 100;
            $(".label-sub").addClass('arrowed');
        });
        $('#btn-toggle-sidebar').click(function() {
            closeOut();
        });
        $('#mobile-nav .arrowed').click(function() {
            $(this).toggleClass('selected').siblings().removeClass("selected");
            if ($(this).next('ul.sub-nav').is(':visible')) {
                $(this).next('ul.sub-nav').slideUp('slow');
            } else {
                $(this).next('ul.sub-nav').slideDown('slow');
            }
        });
    }(jQuery));

    function closeOut() {
        jQuery('body').toggleClass('scroll-jam').append("<div class='sidebar_overlay' onclick='closeSidebar()'></div>");
        jQuery('#sidebar').toggleClass('nav-slide');
        jQuery('#mobile-nav>ul>.nav-item').toggleClass('item-slide').removeClass('selected');
        jQuery('#mobile-nav>ul .sub-nav').each(function() {
            jQuery(this).hide();
        });
        jQuery(".label-sub").removeClass("selected");
    }

    function closeSidebar() {
        closeOut();
        jQuery(".sidebar_overlay").remove();
    }


    function toggle() {
        var header = document.querySelector('header');
        var banner = document.querySelector('.main');
        var create_account = document.querySelector('.create-account');
        var log_in = document.querySelector('.log-in');
        var login_with_google = document.querySelector('.login-with-google');
        var login_with_facebook = document.querySelector('.login-with-facebook');
        var reset_password = document.querySelector('.reset-password');

        header.classList.add('active');
        banner.classList.add('active');
        create_account.classList.add('active');
        create_account.classList.remove('active2');
        log_in.classList.remove('active');

        window.addEventListener('mouseup', function my_function(e) {
            if (document.querySelector('.create-account').contains(e.target)) {

            } else {
                header.classList.remove('active');
                banner.classList.remove('active');
                create_account.classList.remove('active');
                log_in.classList.remove('active');
                login_with_google.classList.remove('active');
                login_with_facebook.classList.remove('active');
                reset_password.classList.remove('active');
            }
        });
    }

    function sign_in() {

        var header = document.querySelector('header');
        var banner = document.querySelector('.main');
        var create_account = document.querySelector('.create-account');
        var log_in = document.querySelector('.log-in');
        var reset_password = document.querySelector('.reset-password');

        window.addEventListener('mouseup', myfunc);

        function myfunc(e) {
            if (document.querySelector('.log-in').contains(e.target)) {
                log_in.classList.add('active');
                header.classList.add('active');
                banner.classList.add('active');
            } else {
                // header.classList.remove('active');
                // banner.classList.remove('active');
                create_account.classList.remove('active2');
                // log_in.classList.remove('active');
                // reset_password.classList.remove('active');
            }
        }

        create_account.classList.remove('active');
        create_account.classList.add('active2');
        header.classList.add('active');
        banner.classList.add('active');
        log_in.classList.add('active');
        reset_password.classList.remove('active');
    }

    function login_with_google() {
        var header = document.querySelector('header');
        var banner = document.querySelector('.banner_home');
        var create_account = document.querySelector('.create-account');
        var login_with_google = document.querySelector('.login-with-google');

        window.addEventListener('mouseup', myfunc);

        function myfunc(e) {
            if (document.querySelector('.login-with-google').contains(e.target)) {
                login_with_google.classList.add('active');
                header.classList.add('active');
                banner.classList.add('active');
            } else {
                // header.classList.remove('active');
                // banner.classList.remove('active');
                // create_account.classList.remove('active');
                // log_in.classList.remove('active');
                // reset_password.classList.remove('active');
            }
        }

        header.classList.add('active');
        banner.classList.add('active');
        login_with_google.classList.toggle('active');
        create_account.classList.remove('active');
    }

    function login_with_facebook() {
        var header = document.querySelector('header');
        var banner = document.querySelector('.banner_home');
        var create_account = document.querySelector('.create-account');
        var login_with_facebook = document.querySelector('.login-with-facebook');

        window.addEventListener('mouseup', myfunc);

        function myfunc(e) {
            if (document.querySelector('.login-with-facebook').contains(e.target)) {
                login_with_facebook.classList.add('active');
                header.classList.add('active');
                banner.classList.add('active');
            } else {
                // header.classList.remove('active');
                // banner.classList.remove('active');
                // create_account.classList.remove('active');
                // log_in.classList.remove('active');
                // reset_password.classList.remove('active');
            }
        }

        header.classList.add('active');
        banner.classList.add('active');
        login_with_facebook.classList.toggle('active');
        create_account.classList.remove('active');
    }

    function reset_password() {
        var header = document.querySelector('header');
        var banner = document.querySelector('.banner_home');
        var reset_password = document.querySelector('.reset-password');
        var log_in = document.querySelector('.log-in');

        window.addEventListener('mouseup', myfunc);

        function myfunc(e) {
            if (document.querySelector('.reset-password').contains(e.target)) {
                reset_password.classList.add('active');
                header.classList.add('active');
                banner.classList.add('active');
            } else {
                // header.classList.remove('active');
                // banner.classList.remove('active');
                // create_account.classList.remove('active');
                // log_in.classList.remove('active');
                // reset_password.classList.remove('active');
            }
        }

        header.classList.add('active');
        banner.classList.add('active');
        reset_password.classList.toggle('active');
        log_in.classList.remove('active');
    }




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
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" actives", "");
            dotts[i].className = dotts[i].className.replace(" actives", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " actives";
        dotts[slideIndex - 1].className += " actives";
    }
</script>
<?php /**PATH D:\wamp64\www\traderclass\app\Modules/Sites/Views/inc/script.blade.php ENDPATH**/ ?>