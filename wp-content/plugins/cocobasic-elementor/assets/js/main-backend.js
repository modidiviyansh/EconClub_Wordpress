(function ($) {
    "use stict";
    $(window).on('elementor/frontend/init', function () {

        elementorFrontend.hooks.addAction('frontend/element_ready/coco-portfolio.default', function () {
            animateElement();
            isotopeSetUp();
        });

        elementorFrontend.hooks.addAction('frontend/element_ready/coco-imageslider.default', function () {
            imageSliderSettings();
        });
    });


    function animateElement(e) {
        $(".animate").each(function (i) {
            var top_of_object = $(this).offset().top;
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if ((bottom_of_window - 70) > top_of_object) {
                $(this).addClass('show-it');
            }
        });
    }

    function isotopeSetUp() {
        $('.grid').imagesLoaded(function () {
            $('.grid').isotope({
                itemSelector: '.grid-item',
                transitionDuration: 0,
                masonry: {
                    columnWidth: '.grid-sizer'
                }
            });
            $('.grid').isotope('layout');
        });
    }

    function imageSliderSettings() {
        $(".simple-image-slider-wrapper").each(function () {
            var id = $(this).attr('id');
            var auto_value = window[id + '_auto'];
            var speed_value = window[id + '_speed'];
            auto_value = (auto_value === 'true') ? true : false;
            if (auto_value === true)
            {
                var mySwiper = new Swiper('#' + id, {
                    autoplay: {
                        delay: speed_value
                    },
                    slidesPerView: 1,
                    pagination: {
                        el: '.swiper-pagination-' + id,
                        clickable: true
                    }
                });
                $('#' + id).hover(function () {
                    mySwiper.autoplay.stop();
                }, function () {
                    mySwiper.autoplay.start();
                });
            } else {
                var mySwiper = new Swiper('#' + id, {
                    slidesPerView: 1,
                    pagination: {
                        el: '.swiper-pagination-' + id,
                        clickable: true
                    }
                });
            }
        });
    }

})(jQuery);