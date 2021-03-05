<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>        
        <meta charset="<?php bloginfo('charset'); ?>" />        
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />  		
        <?php wp_head(); ?>
    </head>    
    <body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

        <div class="doc-loader">
            <?php if (get_option('cocobasic_preloader') !== '' && get_option('cocobasic_preloader') !== false): ?>                
                <img src="<?php echo esc_url(get_option('cocobasic_preloader', get_template_directory_uri() . '/images/preloader.gif')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
            <?php endif; ?>
        </div>  

        <div class="menu-holder-front">      
            <div class="header-logo">
                <?php if (get_option('cocobasic_header_logo') !== ''): ?>                                                   
                    <a href="<?php echo esc_url(site_url('/')); ?>">
                        <img src="<?php echo esc_url(get_option('cocobasic_header_logo', get_template_directory_uri() . '/images/logo.png')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
                    </a>               
                <?php endif; ?>                                           
            </div>

            <div class="toggle-holder">
                <div id="toggle">
                    <div class="menu-line"></div>
                </div>                
            </div>   
        </div> 

        <div class="menu-holder-back">               
            <div class="menu-wrapper-back">
                <?php
                if (get_theme_mod('cocobasic_show_search') === 'yes') {
                    $menu_search = '<ul id="%1$s" class="%2$s">%3$s</ul>' . get_search_form(false);
                } else {
                    $menu_search = '<ul id="%1$s" class="%2$s">%3$s</ul>';
                }

                if (has_nav_menu("custom_menu")) {
                    wp_nav_menu(
                            array(
                                "container" => "nav",
                                "container_class" => "big-menu",
                                "container_id" => "header-main-menu",
                                "fallback_cb" => false,
                                "menu_class" => "main-menu sm sm-clean",
                                "theme_location" => "custom_menu",
                                "items_wrap" => $menu_search,
                                "walker" => new cocobasic_header_menu()
                            )
                    );
                } else {
                    echo '<nav id="header-main-menu" class="big-menu default-menu"><ul>';
                    wp_list_pages(array("depth" => "3", 'title_li' => ''));
                    echo '</ul>';
                    if (get_theme_mod('cocobasic_show_search') === 'yes') {
                        get_search_form();
                    }
                    echo '</nav>';
                }
                ?>       

                <?php
                $allowed_html_array = cocobasic_allowed_html();
                if (get_theme_mod('cocobasic_menu_text') != ''):
                    echo '<div class="menu-right-text">';
                    echo do_shortcode(wp_kses(__(get_theme_mod('cocobasic_menu_text') ? get_theme_mod('cocobasic_menu_text') : 'Default Menu Text', 'pekko-wp'), $allowed_html_array));
                    echo '</div>';
                endif;
                ?>                                       
            </div>
        </div>                    