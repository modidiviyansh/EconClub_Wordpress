<?php
/*
 * Register Theme Customizer
 */

add_action('customize_register', 'cocobasic_customize_register');

function cocobasic_customize_register($wp_customize) {

    function cocobasic_clean_html($value) {
        $allowed_html_array = cocobasic_allowed_html();
        $value = wp_kses($value, $allowed_html_array);
        return $value;
    }

    function cocobasic_sanitize_select($input, $setting) {
        $input = sanitize_key($input);
        $choices = $setting->manager->get_control($setting->id)->choices;
        return ( array_key_exists($input, $choices) ? $input : $setting->default );
    }

    class CocoBasicWP_Customize_Textarea_Control extends WP_Customize_Control {

        public $type = 'textarea';

        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
            </label>
            <?php
        }

    }

    //------------------------- MENU SECTION ---------------------------------------------

    $wp_customize->add_section('cocobasic_menu_settings', array(
        'title' => esc_html__('Menu Settings', 'pekko-wp'),
        'priority' => 30
    ));


    $wp_customize->add_setting('cocobasic_menu_text', array(
        'default' => '',
        'sanitize_callback' => 'cocobasic_clean_html'
    ));

    $wp_customize->add_control(new CocoBasicWP_Customize_Textarea_Control($wp_customize, 'cocobasic_menu_text', array(
        'label' => esc_html__('Welcome Text', 'pekko-wp'),
        'section' => 'cocobasic_menu_settings',
        'settings' => 'cocobasic_menu_text'
    )));


    $wp_customize->add_setting('cocobasic_show_search', array(
        'default' => 'no',
        'sanitize_callback' => 'cocobasic_clean_html'
    ));

    $wp_customize->add_control('cocobasic_show_search', array(
        'label' => esc_html__('Show Search in Menu', 'pekko-wp'),
        'section' => 'cocobasic_menu_settings',
        'settings' => 'cocobasic_show_search',
        'type' => 'radio',
        'choices' => array(
            'yes' => esc_html__('Yes', 'pekko-wp'),
            'no' => esc_html__('No', 'pekko-wp'),
    )));

    $wp_customize->add_setting('cocobasic_menu_burger_color', array(
        'default' => '#4d4d4d',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_menu_burger_color', array(
        'label' => esc_html__('Menu Burger Color', 'pekko-wp'),
        'section' => 'cocobasic_menu_settings',
        'settings' => 'cocobasic_menu_burger_color'
    )));


    $wp_customize->add_setting('cocobasic_menu_number_color', array(
        'default' => '#666666',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_menu_number_color', array(
        'label' => esc_html__('Menu Number Color', 'pekko-wp'),
        'section' => 'cocobasic_menu_settings',
        'settings' => 'cocobasic_menu_number_color'
    )));


    $wp_customize->add_setting('cocobasic_menu_underilne_color', array(
        'default' => '#333333',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_menu_underilne_color', array(
        'label' => esc_html__('Menu Item Underline Color', 'pekko-wp'),
        'section' => 'cocobasic_menu_settings',
        'settings' => 'cocobasic_menu_underilne_color'
    )));
    
    
    $wp_customize->add_setting('cocobasic_submenu_color', array(
        'default' => '#bbbbbb',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_submenu_color', array(
        'label' => esc_html__('Sub Menu Item Color', 'pekko-wp'),
        'section' => 'cocobasic_menu_settings',
        'settings' => 'cocobasic_submenu_color'
    )));


    $wp_customize->add_setting('cocobasic_menu_background_color', array(
        'default' => '#000000',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_menu_background_color', array(
        'label' => esc_html__('Menu Background Color', 'pekko-wp'),
        'section' => 'cocobasic_menu_settings',
        'settings' => 'cocobasic_menu_background_color'
    )));


    $wp_customize->add_setting('cocobasic_menu_background_img', array(
        'capability' => 'edit_theme_options',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cocobasic_menu_background_img', array(
        'label' => esc_html__('Menu Background Image', 'pekko-wp'),
        'section' => 'cocobasic_menu_settings',
        'settings' => 'cocobasic_menu_background_img'
    )));

    //------------------------- END MENU SECTION ---------------------------------------------
    //
    //
    //----------------------------- BLOG SECTION  ---------------------------------------------

    $wp_customize->add_section('cocobasic_blog_section', array(
        'title' => esc_html__('Blog Settings', 'pekko-wp'),
        'priority' => 33
    ));


    $wp_customize->add_setting('cocobasic_blog_title_position', array(
        'default' => '',
        'sanitize_callback' => 'cocobasic_clean_html'
    ));
    $wp_customize->add_control('cocobasic_blog_title_position', array(
        'label' => esc_html__('Blog Title position', 'pekko-wp'),
        'section' => 'cocobasic_blog_section',
        'settings' => 'cocobasic_blog_title_position',
    ));

    $wp_customize->add_setting('cocobasic_loading_section', array(
        'default' => 'button',
        'sanitize_callback' => 'cocobasic_clean_html'
    ));
    $wp_customize->add_control('cocobasic_loading_section', array(
        'label' => esc_html__('Blog More Loading', 'pekko-wp'),
        'section' => 'cocobasic_blog_section',
        'settings' => 'cocobasic_loading_section',
        'type' => 'radio',
        'choices' => array(
            'button' => esc_html__('Button', 'pekko-wp'),
            'scroll' => esc_html__('Scroll', 'pekko-wp'),
    )));


    //----------------------------- END BLOG SECTION  ---------------------------------------------
    //   
    //   
    //   
    //
    //
    //----------------------------- IMAGE SECTION  ---------------------------------------------

    $wp_customize->add_section('cocobasic_image_section', array(
        'title' => esc_html__('Images Section', 'pekko-wp'),
        'priority' => 33
    ));


    $wp_customize->add_setting('cocobasic_preloader', array(
        'capability' => 'edit_theme_options',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cocobasic_preloader', array(
        'label' => esc_html__('Preloader Gif', 'pekko-wp'),
        'section' => 'cocobasic_image_section',
        'settings' => 'cocobasic_preloader'
    )));

    $wp_customize->add_setting('cocobasic_preloader_width', array(
        'sanitize_callback' => 'cocobasic_clean_html'
    ));

    $wp_customize->add_control('cocobasic_preloader_width', array(
        'label' => esc_html__('Preloader Width:', 'pekko-wp'),
        'section' => 'cocobasic_image_section',
        'settings' => 'cocobasic_preloader_width'
    ));

    $wp_customize->add_setting('cocobasic_body_background', array(
        'capability' => 'edit_theme_options',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cocobasic_body_background', array(
        'label' => esc_html__('Body Background Image', 'pekko-wp'),
        'section' => 'cocobasic_image_section',
        'settings' => 'cocobasic_body_background'
    )));

    $wp_customize->add_setting('cocobasic_header_logo', array(
        'default' => get_template_directory_uri() . '/images/logo.png',
        'capability' => 'edit_theme_options',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cocobasic_header_logo', array(
        'label' => esc_html__('Header Logo', 'pekko-wp'),
        'section' => 'cocobasic_image_section',
        'settings' => 'cocobasic_header_logo'
    )));

    $wp_customize->add_setting('cocobasic_logo_width', array(
        'default' => "135px",
        'sanitize_callback' => 'cocobasic_clean_html'
    ));

    $wp_customize->add_control('cocobasic_logo_width', array(
        'label' => esc_html__('Logo Width:', 'pekko-wp'),
        'section' => 'cocobasic_image_section',
        'settings' => 'cocobasic_logo_width',
        'priority' => 999
    ));


    //----------------------------- END IMAGE SECTION  ---------------------------------------------
    //
    //
    //
    //---------------------------------- COLORS SECTION --------------------

    $wp_customize->add_setting('cocobasic_preloader_background_color', array(
        'default' => '#000000',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_preloader_background_color', array(
        'label' => esc_html__('Preloader Background Color', 'pekko-wp'),
        'section' => 'colors',
        'settings' => 'cocobasic_preloader_background_color'
    )));

    $wp_customize->add_setting('cocobasic_body_background_color', array(
        'default' => '#000000',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_body_background_color', array(
        'label' => esc_html__('Body Background Color', 'pekko-wp'),
        'section' => 'colors',
        'settings' => 'cocobasic_body_background_color'
    )));

    $wp_customize->add_setting('cocobasic_body_color', array(
        'default' => '#ffffff',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_body_color', array(
        'label' => esc_html__('Body Color', 'pekko-wp'),
        'section' => 'colors',
        'settings' => 'cocobasic_body_color'
    )));

    $wp_customize->add_setting('cocobasic_global_color', array(
        'default' => '#ff0000',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_global_color', array(
        'label' => esc_html__('Global Color', 'pekko-wp'),
        'section' => 'colors',
        'settings' => 'cocobasic_global_color'
    )));


    //---------------------------------------- END COLORS SECTION ------------------------------------------------------
    //
    //
    //
    //---------------------------------- FOOTER SECTION --------------------

    if (function_exists('elementor_fail_php_version')) {

        $wp_customize->add_section('cocobasic_footer_section', array(
            'title' => esc_html__('Footer', 'pekko-wp'),
            'priority' => 99
        ));

        $wp_customize->add_setting('cocobasic_select_footer', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'cocobasic_sanitize_select',
            'default' => '',
        ));


        $wp_customize->add_control('cocobasic_select_footer', array(
            'type' => 'select',
            'section' => 'cocobasic_footer_section',
            'label' => esc_html__('Custom footer layout', 'pekko-wp'),
            'description' => esc_html__('select one of Elementor templates', 'pekko-wp'),
            'choices' => cocobasic_create_footer_list()
        ));
    }


    //---------------------------------------- END FOOTER SECTION ------------------------------------------------------
    //
    //
    //
    //
    //--------------------------------------------------------------------------
    $wp_customize->get_setting('cocobasic_preloader_background_color')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_body_background_color')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_body_color')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_menu_burger_color')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_menu_number_color')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_menu_underilne_color')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_submenu_color')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_menu_background_color')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_global_color')->transport = 'postMessage';
    //--------------------------------------------------------------------------
    /*
     * If preview mode is active, hook JavaScript to preview changes
     */
    if ($wp_customize->is_preview() && !is_admin()) {
        add_action('customize_preview_init', 'cocobasic_customize_preview_js');
    }
}

/**
 * Bind Theme Customizer JavaScript
 */
function cocobasic_customize_preview_js() {
    wp_enqueue_script('cocobasic-customizer', get_template_directory_uri() . '/admin/js/custom-admin.js', array('customize-preview'), '', true);
}

/*
 * Generate CSS Styles
 */

class CocoBasicLiveCSS {

    public static function cocobasic_theme_customized_style() {
        echo '<style id="cocobasic-customizer-style" type="text/css">' .
        cocobasic_generate_css('.ccb-css .doc-loader', 'background-color', 'cocobasic_preloader_background_color') .
        cocobasic_generate_css('body.ccb-css', 'background-color', 'cocobasic_body_background_color') .
        cocobasic_generate_css('body.ccb-css, body.ccb-css a, .ccb-css.single-post .post-info-wrapper .text-holder, .ccb-css .form-submit input[type=submit], .ccb-css .sm-clean a, .ccb-css .sm-clean a:hover, .ccb-css .sm-clean a:focus, .ccb-css .sm-clean a:active, .ccb-css #header-main-menu .search-field, .ccb-css .search-field, .ccb-css #commentform #email, .ccb-css #commentform #author, .ccb-css #commentform #comment', 'color', 'cocobasic_body_color') .
        cocobasic_generate_css('.ccb-css.single .nav-links:before, .ccb-css #toggle.on:before, .ccb-css #toggle.on:after', 'background-color', 'cocobasic_body_color') .
        cocobasic_generate_css('.ccb-css .form-submit input[type=submit], .ccb-css #header-main-menu .search-field:focus, .ccb-css .search-field:focus', 'border-color', 'cocobasic_body_color') .
        cocobasic_generate_css('.ccb-css #header-main-menu .search-field::-webkit-input-placeholder, .ccb-css .search-field::-webkit-input-placeholder, .ccb-css #commentform input[type=text]::-webkit-input-placeholder, .ccb-css #commentform input[type=email]::-webkit-input-placeholder, .ccb-css #commentform textarea::-webkit-input-placeholder', 'color', 'cocobasic_body_color') .
        cocobasic_generate_css('.ccb-css #header-main-menu .search-field:-ms-input-placeholder, .ccb-css .search-field:-ms-input-placeholder, .ccb-css #commentform input[type=text]:-ms-input-placeholder, .ccb-css #commentform input[type=email]:-ms-input-placeholder, .ccb-css #commentform textarea:-ms-input-placeholder', 'color', 'cocobasic_body_color') .
        cocobasic_generate_css('.ccb-css #header-main-menu .search-field::placeholder, .ccb-css .search-field::placeholder, .ccb-css #commentform input[type=text]::placeholder, .ccb-css #commentform input[type=email]::placeholder, .ccb-css #commentform textarea::placeholder', 'color', 'cocobasic_body_color') .
        cocobasic_generate_css('.ccb-css #toggle:before, .ccb-css #toggle:after, .ccb-css #toggle .menu-line', 'background-color', 'cocobasic_menu_burger_color') .
        cocobasic_generate_css('.ccb-css span.menu-num, .ccb-css .sm-clean a span.sub-arrow', 'color', 'cocobasic_menu_number_color') .
        cocobasic_generate_css('.ccb-css .sm-clean .sub-menu li a, .ccb-css .sm-clean .children li a', 'color', 'cocobasic_submenu_color') .
        cocobasic_generate_css('.ccb-css .sm-clean > li > a:after', 'background-color', 'cocobasic_menu_underilne_color') .
        cocobasic_generate_css('.ccb-css .menu-holder-back', 'background-color', 'cocobasic_menu_background_color') .
        cocobasic_generate_css('.ccb-css .sm-clean a.current', 'color', 'cocobasic_global_color') .
        cocobasic_generate_css('.ccb-css .toggle-holder:after', 'background-color', 'cocobasic_global_color') .
        cocobasic_generate_additional_css() .
        '</style>';
    }

}

/*
 * Generate CSS Class - Helper Method
 */

function cocobasic_generate_css($selector, $style, $mod_name, $prefix = '', $postfix = '', $rgba = '') {
    $return = '';
    $mod = get_option($mod_name);
    if (!empty($mod)) {
        if ($rgba === true) {
            $mod = '0px 0px 50px 0px ' . cardea_hex2rgba($mod, 0.65);
        }
        $return = sprintf('%s { %s:%s; }', $selector, $style, $prefix . $mod . $postfix
        );
    }
    return $return;
}

function cocobasic_generate_additional_css() {
    $allowed_html_array = cocobasic_allowed_html();
    $return = '';
    if (get_theme_mod('cocobasic_blog_title_position') != ''):
        $return .= '.blog .blog-item-holder h2.entry-title{margin-bottom: ' . get_theme_mod('cocobasic_blog_title_position') . ';}';
    endif;
    if (get_theme_mod('cocobasic_preloader_width') != ''):
        $return .= '.ccb-css .doc-loader img{width: ' . get_theme_mod('cocobasic_preloader_width') . ';}';
    endif;
    if (get_theme_mod('cocobasic_logo_width') != ''):
        $return .= '.ccb-css .header-logo img{width: ' . get_theme_mod('cocobasic_logo_width') . ';}';
    endif;
    if ((get_option('cocobasic_body_background') !== '' && get_option('cocobasic_body_background') !== false)):
        $return .= 'body.cocobasic-has-background {background-image: url(' . esc_url(get_option('cocobasic_body_background', get_template_directory_uri() . '/images/lines.png')) . '); background-repeat: no-repeat; background-position: bottom right;}';
    endif;
    if ((get_option('cocobasic_menu_background_img') !== '' && get_option('cocobasic_menu_background_img') !== false)):
        $return .= '.menu-holder-back {background-image: url(' . esc_url(get_option('cocobasic_menu_background_img', get_template_directory_uri() . '/images/lines.png')) . ');}';
    endif;
    $return = wp_strip_all_tags($return);
    return $return;
}

function cocobasic_create_footer_list() {

    $listArray = ['' => ''];

    global $post;

    $elementorLoop = new WP_Query(array(
        'post_type' => 'elementor_library',
        'post_status' => 'publish',
        'posts_per_page' => '-1'
    ));

    while ($elementorLoop->have_posts()) : $elementorLoop->the_post();
        $listArray += [ $post->ID => $post->post_name];
    endwhile;

    wp_reset_query();
    return $listArray;
}
?>