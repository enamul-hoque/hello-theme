<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		'1.0.0'
	);
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );


/**
 * Admin Helpers
 */
function hello_theme_child_admin_enqueues() {
	wp_enqueue_script( 'hello-theme-child-ekit', get_stylesheet_directory_uri() . '/assets/js/admin-ekit.js', ['jquery'], null, true );
}
add_action( 'admin_enqueue_scripts', 'hello_theme_child_admin_enqueues' );


/**
 * Custom CSS Support 
 */
function custom_css_support() {
   require "inc/custom-css.php";
   new Custom_CSS_Support();
}
add_action('elementor/init', 'custom_css_support');
