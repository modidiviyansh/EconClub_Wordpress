<?php


function pekko_wp_child_enqueue_styles() {  
    wp_enqueue_style( 'pekko-main-theme-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'pekko-child-main-theme-style',get_stylesheet_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'pekko_wp_child_enqueue_styles', 11);

function pekko_child_lang_setup() {
    load_child_theme_textdomain( 'pekko-wp', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'pekko_child_lang_setup' );

?>