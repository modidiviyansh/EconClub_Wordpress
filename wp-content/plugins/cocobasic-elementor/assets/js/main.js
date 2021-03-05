(function ($) {
    "use stict";
    var count = 1;
    var portfolioPostsPerPage = $(".grid-item").length;
    var totalNumberOfPortfolioPages = Math.ceil(parseInt(ajax_var_portfolio.total) / portfolioPostsPerPage);
    var currentPosition = $(window).scrollTop();

    $(window).on('scroll', function () {
        if (!$(".elementor-html").length) { //Don't load in Elementor Edit mode
            var scroll = $(window).scrollTop();
            if (scroll > currentPosition) { //Load only on scroll down
                loadMorePortfolioItemsOnScroll();
            }
            currentPosition = scroll;
        }
    });

    setPrettyPhoto();
    showHidePortfolioLoadMoreButton();
    loadMorePortfolioOnClick();

    $(window).on('load', function () {
        imageSliderSettings();
        isotopeSetUp();
    });


    function isotopeSetUp() {
        $('.grid').isotope({
            itemSelector: '.grid-item',
            transitionDuration: 0,
            masonry: {
                columnWidth: '.grid-sizer'
            }
        });
        $('.grid').isotope('layout');
    }

    function showHidePortfolioLoadMoreButton() {
        if (portfolioPostsPerPage < parseInt(ajax_var_portfolio.total)) {
            $('.more-posts-portfolio').css('visibility', 'visible');
            $('.more-posts-portfolio').animate({opacity: 1}, 1500);
        } else {
            $('.more-posts-portfolio').css('display', 'none');
        }
    }

    function loadMorePortfolioOnClick() {
        $('.more-posts-portfolio:visible').on('click', function () {
            count++;
            loadPortfolioMoreItems(count, portfolioPostsPerPage);
            $('.more-posts-portfolio').css('display', 'none');
            $('.more-posts-portfolio-loading').css('display', 'inline-block');
        });
    }

    function loadPortfolioMoreItems(pageNumber, portfolioPostsPerPage) {
        $.ajax({
            url: ajax_var_portfolio.url,
            type: 'POST',
            data: "action=portfolio_ajax_load_more&portfolio_page_number=" + pageNumber + "&portfolio_posts_per_page=" + portfolioPostsPerPage + "&security=" + ajax_var_portfolio.nonce,
            success: function (html) {
                var $newItems = $(html);
                $('.grid').append($newItems);
                $('.grid').imagesLoaded(function () {
                    $('.grid').isotope('appended', $newItems);
                    animateElement();
                    if (count == totalNumberOfPortfolioPages)
                    {
                        $('.more-posts-portfolio').css('display', 'none');
                        $('.more-posts-portfolio-loading').css('display', 'none');
                        $('.no-more-posts-portfolio').css('display', 'inline-block');
                    } else
                    {
                        $('.more-posts-portfolio').css('display', 'inline-block');
                        $('.more-posts-portfolio-loading').css('display', 'none');
                        $(".more-posts-portfolio-holder").removeClass('stop-loading');
                    }
                });
                setPrettyPhoto();
            }
        });
        return false;
    }

    function loadMorePortfolioItemsOnScroll() {
        $(".more-posts-portfolio-holder.scroll").not('.stop-loading').each(function () {
            var top_of_object = $(this).offset().top;
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if ((bottom_of_window - 70) > top_of_object) {
                $(this).addClass('stop-loading');
                count++;
                loadPortfolioMoreItems(count, portfolioPostsPerPage);
                $('.more-posts-portfolio-loading').css('display', 'inline-block');
            }
        });
    }

    function setPrettyPhoto() {
        $('a[data-rel]').each(function () {
            $(this).attr('rel', $(this).data('rel'));
        });
        $("a[rel^='prettyPhoto']").prettyPhoto({
            slideshow: false, 
            overlay_gallery: false, 
            default_width: 1280,
            default_height: 720,
            deeplinking: false,
            social_tools: false,
            iframe_markup: '<iframe src ="{path}" width="{width}" height="{height}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>'
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

    function animateElement(e) {
        $(".animate").each(function (i) {
            var top_of_object = $(this).offset().top;
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if ((bottom_of_window - 70) > top_of_object) {
                $(this).addClass('show-it');
            }
        });
    }

})(jQuery);