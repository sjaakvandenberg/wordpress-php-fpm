<?php

/*
* Add your own functions here. You can also copy some of the theme functions into this file.
* Wordpress will use those functions instead of the original functions then.
*/

add_action( 'wp_enqueue_scripts', 'add_customjs', 'enfold_parent_theme_enqueue_styles' );

if (!(is_admin() )) {
    function defer_parsing_of_js ( $url ) {
        if ( FALSE === strpos( $url, '.js' ) ) return $url;
        if ( strpos( $url, 'jquery.js' ) ) return $url;
        return "$url' defer onload='";
    }
    add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
}

function enfold_parent_theme_enqueue_styles() {
    wp_enqueue_style( 'enfold-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'enfold-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'enfold-style' )
    );

}

function add_customjs() {
   wp_enqueue_script( 'customjs', get_stylesheet_directory_uri().'/custom.js', array('jquery'), 1, true );
}

function year_shortcode() {
    $year = date('Y');
    return $year;
}

add_shortcode( 'year', 'year_shortcode' );
remove_action( 'wp_head', 'wp_generator' );

?>
