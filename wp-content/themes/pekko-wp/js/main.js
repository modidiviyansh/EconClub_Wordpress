(function ($) {
    "use strict";
    var count = 1;
    var currentPositionPosts = $(window).scrollTop();

    animateElement();
    placeholderToggle();
    setMenu();
    setCustomizerClass();
    $(".site-content").fitVids();
    loadMoreArticleIndex();


    $(window).on('load', function () {

        addMenuNumbers();

        $('#toggle').on("click", multiClickFunctionStop);
        $('.site-content, #toggle').addClass('all-loaded');
        $('.doc-loader').fadeOut();
        $('body').removeClass('wait-preloader');
    });


    $(window).on('scroll', function () {
        animateElement();
        var scrollPosts = $(window).scrollTop();
        if (scrollPosts > currentPositionPosts) { //Load only on scroll down
            loadMorePostsItemsOnScroll();
        }
        currentPositionPosts = scrollPosts;
    });




//------------------------------------------------------------------------
//Helper Methods -->
//------------------------------------------------------------------------

    function placeholderToggle() {
        $('input, textarea').on('focus', function () {
            $(this).data('placeholder', $(this).attr('placeholder'));
            $(this).attr('placeholder', '');
        });
        $('input, textarea').on('blur', function () {
            $(this).attr('placeholder', $(this).data('placeholder'));
        });
    }

    function placeholderToggle() {
        $('input, textarea').on('focus', function () {
            $(this).data('placeholder', $(this).attr('placeholder'));
            $(this).attr('placeholder', '');
        });
        $('input, textarea').on('blur', function () {
            $(this).attr('placeholder', $(this).data('placeholder'));
        });
    }

    function animateElement() {
        $(".animate").each(function (i) {
            var top_of_object = $(this).offset().top;
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if ((bottom_of_window - 70) > top_of_object) {
                $(this).addClass('show-it');
            }
        });
    }

    function multiClickFunctionStop(e) {
        e.preventDefault();
        $('#toggle').off("click");
        $('#toggle').toggleClass("on");

        $('html, body, .menu-holder-back, .menu-holder-front, .site-content').toggleClass("open").delay(500).queue(function (next) {
            $(this).toggleClass("done");
            next();
        });
        $('#toggle').on("click", multiClickFunctionStop);
    }

    function setCustomizerClass() {
        if ($('#cocobasic-customizer-style').length) {
            $('body').addClass('ccb-css');
        }
    }

    function setMenu() {

        //Fix for default menu
        $(".default-menu ul:first").addClass('sm sm-clean main-menu');

        $('.main-menu').smartmenus({
            subMenusSubOffsetX: 1,
            subMenusSubOffsetY: -8,
            markCurrentItem: true
        });

        var $mainMenu = $('.main-menu').on('click', 'span.sub-arrow', function (e) {
            var obj = $mainMenu.data('smartmenus');
            if (obj.isCollapsible()) {
                var $item = $(this).parent(),
                        $sub = $item.parent().dataSM('sub');
                $sub.dataSM('arrowClicked', true);
            }
        }).bind({
            'beforeshow.smapi': function (e, menu) {
                var obj = $mainMenu.data('smartmenus');
                if (obj.isCollapsible()) {
                    var $menu = $(menu);
                    if (!$menu.dataSM('arrowClicked')) {
                        return false;
                    }
                    $menu.removeDataSM('arrowClicked');
                }
            }
        });
    }

    function loadMoreArticleIndex() {
        if (parseInt(ajax_var.posts_per_page_index) < parseInt(ajax_var.total_index)) {
            $('.more-posts').css('visibility', 'visible');
            $('.more-posts').animate({opacity: 1}, 1500);
        } else {
            $('.more-posts, .more-posts-index-holder').css('display', 'none');
        }

        $('.more-posts:visible').on('click', function () {
            $('.more-posts').css('display', 'none');
            $('.more-posts-loading').css('display', 'inline-block');
            count++;
            loadArticleIndex(count);
        });
    }

    function loadArticleIndex(pageNumber) {
        $.ajax({
            url: ajax_var.url,
            type: 'POST',
            data: "action=infinite_scroll_index&page_no_index=" + pageNumber + '&loop_file_index=loop-index&security=' + ajax_var.nonce,
            success: function (html) {
                $('.blog-holder').imagesLoaded(function () {
                    $(".blog-holder").append(html);
                    setTimeout(function () {
                        animateElement();
                        if (count == ajax_var.num_pages_index) {
                            $('.more-posts').css('display', 'none');
                            $('.more-posts-loading').css('display', 'none');
                            $('.no-more-posts').css('display', 'inline-block');
                        } else {
                            $('.more-posts').css('display', 'inline-block');
                            $('.more-posts-loading').css('display', 'none');
                            $(".more-posts-index-holder").removeClass('stop-loading');
                        }
                    }, 100);
                });
            }
        });
        return false;
    }

    function loadMorePostsItemsOnScroll(e) {
        $(".more-posts-index-holder.scroll").not('.stop-loading').each(function (i) {
            var top_of_object = $(this).offset().top;
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if ((bottom_of_window - 170) > top_of_object) {
                $(this).addClass('stop-loading');
                count++;
                loadArticleIndex(count);
                $('.more-posts').css('display', 'none');
                $('.more-posts-loading').css('display', 'inline-block');
            }
        });
    }

    function addMenuNumbers() {
        var n = 0;
        if ($("#header-main-menu .main-menu > li").length) {
            $("#header-main-menu .main-menu > li").each(function () {
                $(this).append('<span class="menu-num">' + (n < 9 ? "0" : "") + (n + 1) + '</span>');
                n++;
            });
            $("#header-main-menu .search-form").append('<span class="menu-num">' + (n < 9 ? "0" : "") + (n + 1) + '</span>');
        }
    }

    function is_touch_device() {
        return !!('ontouchstart' in window);
    }

})(jQuery);