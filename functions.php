<?php //Start building your awesome child theme functions

add_action( 'wp_enqueue_scripts', 'bazien_enqueue_styles', 100 );
function bazien_enqueue_styles() {
    wp_enqueue_style( 'bazien-child-styles',  get_stylesheet_directory_uri() . '/style.css', array( 'nova-bazien-styles' ), wp_get_theme()->get('Version') );
}
