<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Table of Contents
 * -----------------
 * 
 * Load child theme css and optional scripts
 * Admin Helpers
 * Shortcode: Current Year
 * Woo: Add To Cart Text Option
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function hello_elementor_child_enqueue_scripts() {
	$ver = '1.0.001';

	// Styles.
	wp_enqueue_style( 'hello-elementor-child-style', get_stylesheet_directory_uri() . '/style.css', ['hello-elementor-theme-style'], $ver );

	// Scripts.
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );


/**
 * Custom CSS Support 
 */
function custom_css_support() {
   require "inc/custom-css.php";
   new Custom_CSS_Support();
}
add_action('elementor/init', 'custom_css_support');


/** Shortcode: Current Year **/
function year_shortcode() {
	$y = date('Y');
	return $y;
}
add_shortcode( 'year', 'year_shortcode' );


/** Woo: Add To Cart Text Option */
if ( class_exists( 'woocommerce' ) ):
	include_once( 'inc/woo-options.php' );
endif;
