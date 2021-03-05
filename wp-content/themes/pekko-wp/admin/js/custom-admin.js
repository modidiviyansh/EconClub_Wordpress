(function ($) {

    "use stict";

    // COLORS                         
    wp.customize('cocobasic_preloader_background_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css1">';

            inlineStyle += '.ccb-css .doc-loader { background-color: ' + to + '; }';            

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css1');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });

    wp.customize('cocobasic_body_background_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css2">';
            
            inlineStyle += 'body.ccb-css { background-color: ' + to + '; }';            

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css2');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });

    wp.customize('cocobasic_body_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css3">';

            inlineStyle += 'body.ccb-css, body.ccb-css a, .ccb-css.single-post .post-info-wrapper .text-holder, .ccb-css .form-submit input[type=submit], .ccb-css .sm-clean a, .ccb-css .sm-clean a:hover, .ccb-css .sm-clean a:focus, .ccb-css .sm-clean a:active, .ccb-css #header-main-menu .search-field, .ccb-css .search-field, .ccb-css #commentform #email, .ccb-css #commentform #author, .ccb-css #commentform #comment { color: ' + to + '; }';                        
            inlineStyle += '.ccb-css.single .nav-links:before, .ccb-css #toggle.on:before, .ccb-css #toggle.on:after { background-color: ' + to + '; }';                        
            inlineStyle += '.ccb-css .form-submit input[type=submit], .ccb-css #header-main-menu .search-field:focus, .ccb-css .search-field:focus { border-color: ' + to + '; }';                        
            inlineStyle += '.ccb-css #header-main-menu .search-field::-webkit-input-placeholder, .ccb-css .search-field::-webkit-input-placeholder, .ccb-css #commentform input[type=text]::-webkit-input-placeholder, .ccb-css #commentform input[type=email]::-webkit-input-placeholder, .ccb-css #commentform textarea::-webkit-input-placeholder { color: ' + to + '; }';                        
            inlineStyle += '.ccb-css #header-main-menu .search-field:-ms-input-placeholder, .ccb-css .search-field:-ms-input-placeholder, .ccb-css #commentform input[type=text]:-ms-input-placeholder, .ccb-css #commentform input[type=email]:-ms-input-placeholder, .ccb-css #commentform textarea:-ms-input-placeholder { color: ' + to + '; }';                        
            inlineStyle += '.ccb-css #header-main-menu .search-field::placeholder, .ccb-css .search-field::placeholder, .ccb-css #commentform input[type=text]::placeholder, .ccb-css #commentform input[type=email]::placeholder, .ccb-css #commentform textarea::placeholder { color: ' + to + '; }';                        

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css3');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });

    wp.customize('cocobasic_menu_burger_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css4">';
            
            inlineStyle += '.ccb-css #toggle:before, .ccb-css #toggle:after, .ccb-css #toggle .menu-line { background-color: ' + to + '; }';            

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css4');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });
    
    wp.customize('cocobasic_menu_number_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css5">';
            
            inlineStyle += '.ccb-css span.menu-num, .ccb-css .sm-clean a span.sub-arrow { color: ' + to + '; }';            

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css5');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });
    
    wp.customize('cocobasic_submenu_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css6">';
            
            inlineStyle += '.ccb-css .sm-clean .sub-menu li a, .ccb-css .sm-clean .children li a { color: ' + to + '; }';            

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css6');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });
    
    wp.customize('cocobasic_menu_underilne_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css7">';
            
            inlineStyle += '.ccb-css .sm-clean > li > a:after { background-color: ' + to + '; }';            

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css7');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });
    
    wp.customize('cocobasic_menu_background_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css8">';
            
            inlineStyle += '.ccb-css .menu-holder-back { background-color: ' + to + '; }';            

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css8');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });
    
    wp.customize('cocobasic_global_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css9">';
            
            inlineStyle += '.ccb-css .sm-clean a.current { color: ' + to + '; }';            
            inlineStyle += '.ccb-css .toggle-holder:after { background-color: ' + to + '; }';            

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css9');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });

})(jQuery);