<?php

function my_theme_enqueue_styles() {

    $parent_style = 'sungit-lite-allstyles';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/assets/css/sungit-lite.css' );
    wp_enqueue_style( 'sungit-lite-stocherkahn-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

?>