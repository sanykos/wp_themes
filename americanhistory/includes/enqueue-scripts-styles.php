<?php 
if(!defined('ABSPATH'))
    exit;


/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', 'american_history_scripts' );
function american_history_scripts() {
	// wp_enqueue_script( 'american-history-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	// wp_enqueue_script( 'american-history-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }

	wp_enqueue_script( 'jQuery', get_template_directory_uri() . '/assets/public/js/libs/jquery.min.js', array(), _S_VERSION, true );

	wp_dequeue_script('common');
	wp_deregister_script('common');
	wp_register_script( 'common', get_template_directory_uri() . '/assets/public/js/common.js', array(), filemtime(  get_template_directory().'/assets/public/js/common.js'), true);
	wp_enqueue_script('common');

	//wp_enqueue_script( 'common', get_template_directory_uri() . '/assets/public/js/common.js', array(), _S_VERSION, true );


}

add_action( 'wp_enqueue_scripts', 'american_history_styles' );
function american_history_styles() {

	wp_enqueue_style( 'american-history-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'maincss', get_template_directory_uri() . '/assets/public/css/main.css', array(), _S_VERSION );
}


