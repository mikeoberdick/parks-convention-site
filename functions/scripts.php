<?php

function d4tw_enqueue_files () {
    // Get the theme data
    $the_theme = wp_get_theme();
    $theme_version = $the_theme->get( 'Version' );
    $js_version = $theme_version . '.' . time();

    wp_enqueue_script( 'PSC Theme JS', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), $js_version, true );
    wp_enqueue_style( 'Google Fonts', 'https://fonts.googleapis.com/css?family=Roboto|Unica+One&display=swap' );
    wp_enqueue_script( 'Lazy Load JS', 'https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.1.2/dist/lazyload.min.js', array('jquery'), '1.0.0', true );
    
    if ( is_page_template(array('templates/homepage.php', 'templates/accessories.php')) ) {
        wp_enqueue_style( 'Slick CSS', get_stylesheet_directory_uri() . '/slick/slick.css' );
        wp_enqueue_style( 'Slick Theme CSS', get_stylesheet_directory_uri() . '/slick/slick-theme.css' );
        wp_enqueue_script( 'Slick JS', get_stylesheet_directory_uri() . '/slick/slick.min.js', array('jquery'), '1.0.0', true );
    }
}

add_action('wp_enqueue_scripts', 'd4tw_enqueue_files');

?>