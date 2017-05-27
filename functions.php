<?php
function wpinternationlizationtheme_enqueue_styles() {

    $parent_style = 'parent-style'; 

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'wpinternationlizationtheme_enqueue_styles' );


function wpinternationlizationtheme_setup(){
    $domain = 'wpinternationlizationtheme';
    // wp-content/languages/wpinternationlizationtheme/de_DE.mo
    load_theme_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain );
    // wp-content/themes/wpinternationlizationtheme/languages/de_DE.mo
    load_theme_textdomain( $domain, get_stylesheet_directory() . '/languages' );
    // wp-content/themes/wpinternationlizationtheme/languages/de_DE.mo
    load_theme_textdomain( $domain, get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'wpinternationlizationtheme_setup' );


function wpinternationlizationtheme_after($content) {
    return $content . __('Read more', 'wpinternationlizationtheme');
}
add_filter('the_content', 'wpinternationlizationtheme_after');


?>