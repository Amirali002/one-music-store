(function($) {
    'use strict';

    var browserWindow = $(window);

    browserWindow.on('load', function() {
        $('.preloader').fadeOut('slow', function() {
            $(this).remove();
        });
    });

    if ($.fn.classyNav) {
        $('#oneMusicNav').classyNav();
    }

    if ($.fn.owlCarousel) {
        var welcomeSlide = $('.hero-slides');
        var testimonials = $('.testimonials-slide');
        var albumSlides = $('.albums-slideshow');

        welcomeSlide.owlCarousel({
            items: 1,
            margin: 0,
            loop: true,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 7000,
            smartSpeed: 1000,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut'
        });

        welcomeSlide.on('translate.owl.carousel', function() {
            var slideLayer = $("[data-animation]");
            slideLayer.each(function() {
                var anim_name = $(this).data('animation');
                $(this).removeClass('animated ' + anim_name).css('opacity', '0');
            });
        });

        welcomeSlide.on('translated.owl.carousel', function() {
            var slideLayer = welcomeSlide.find('.owl-item.active').find("[data-animation]");
            slideLayer.each(function() {
                var anim_name = $(this).data('animation');
                $(this).addClass('animated ' + anim_name).css('opacity', '1');
            });
        });

        $("[data-delay]").each(function() {
            var anim_del = $(this).data('delay');
            $(this).css('animation-delay', anim_del);
        });

        $("[data-duration]").each(function() {
            var anim_dur = $(this).data('duration');
            $(this).css('animation-duration', anim_dur);
        });

        testimonials.owlCarousel({
            items: 1,
            margin: 0,
            loop: true,
            dots: false,
            autoplay: true
        });

        albumSlides.owlCarousel({
            items: 5,
            margin: 30,
            loop: true,
            nav: true,
            navText: ['<i class="fa fa-angle-double-left"></i>', '<i class="fa fa-angle-double-right"></i>'],
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 750,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 4
                },
                1200: {
                    items: 5
                }
            }
        });
    }

    if ($.fn.imagesLoaded) {
        $('.oneMusic-albums').imagesLoaded(function() {
            $('.catagory-menu').on('click', 'a', function() {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({
                    filter: filterValue
                });
            });

            var $grid = $('.oneMusic-albums').isotope({
                itemSelector: '.single-album-item',
                percentPosition: true,
                masonry: {
                    columnWidth: '.single-album-item'
                }
            });
        });
    }

    if ($.fn.magnificPopup) {
        $('.video--play--btn').magnificPopup({
            disableOn: 0,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: true,
            fixedContentPos: false
        });
    }

    if ($.fn.scrollUp) {
        browserWindow.scrollUp({
            scrollSpeed: 1500,
            scrollText: '<i class="fa fa-angle-up"></i>'
        });
    }

    if ($.fn.counterUp) {
        $('.counter').counterUp({
            delay: 10,
            time: 2000
        });
    }

    if ($.fn.sticky) {
        $(".oneMusic-main-menu").sticky({
            topSpacing: 0
        });
    }

    if ($.fn.circleProgress) {
        $('#circle').circleProgress({
            size: 160,
            emptyFill: "rgba(0, 0, 0, .0)",
            fill: '#000000',
            thickness: '3',
            reverse: true
        });
        $('#circle2').circleProgress({
            size: 160,
            emptyFill: "rgba(0, 0, 0, .0)",
            fill: '#000000',
            thickness: '3',
            reverse: true
        });
        $('#circle3').circleProgress({
            size: 160,
            emptyFill: "rgba(0, 0, 0, .0)",
            fill: '#000000',
            thickness: '3',
            reverse: true
        });
        $('#circle4').circleProgress({
            size: 160,
            emptyFill: "rgba(0, 0, 0, .0)",
            fill: '#000000',
            thickness: '3',
            reverse: true
        });
    }

    if ($.fn.audioPlayer) {
        $('audio').audioPlayer();
    }

    if ($.fn.tooltip) {
        $('[data-toggle="tooltip"]').tooltip()
    }

    $('a[href="#"]').on('click', function($) {
        $.preventDefault();
    });

    if (browserWindow.width() > 767) {
        new WOW().init();
    }

    $('.catagory-menu a').on('click', function() {
        $('.catagory-menu a').removeClass('active');
        $(this).addClass('active');
    })

})(jQuery);