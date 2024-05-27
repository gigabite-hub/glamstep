<?php //Start building your awesome child theme functions

add_action( 'wp_enqueue_scripts', 'bazien_enqueue_styles', 100 );
function bazien_enqueue_styles() {
    wp_enqueue_style( 'bazien-child-styles',  get_stylesheet_directory_uri() . '/style.css', array( 'nova-bazien-styles' ), wp_get_theme()->get('Version') );

    wp_enqueue_script( 'bazien-main', get_stylesheet_directory_uri() . '/main.js',
		array( 
			'jquery',
		),
		wp_get_theme()->get('Version'),
		true
	);
    wp_enqueue_script( 'font-awesome', 'https://kit.fontawesome.com/2e71d1c020.js', 
        array( 'jquery' ),
        wp_get_theme()->get('Version'), 
        false 
    );
}

