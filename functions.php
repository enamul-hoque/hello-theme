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
 * Shortcode: Page Title
 * Woo: Add To Cart Text Option
 * Elementor Custom Widgets.
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function hello_elementor_child_enqueue_scripts() {
	$ver = '1.0.007';

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


/** Shortcode: Page Title **/
function page_title_shortcode() {
    $title = get_the_title();
    return $title;
}
add_shortcode( 'page_title', 'page_title_shortcode' );


/** Woo: Add To Cart Text Option */
if ( class_exists( 'woocommerce' ) ):
	include_once( 'inc/woo-options.php' );
endif;


/** Elementor Custom Widgets **/
function el_custom_widgets() {
	require_once(get_stylesheet_directory() . '/widgets/blog-posts.php');
	require_once(get_stylesheet_directory() . '/widgets/contact-form.php');

    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \HelloElementorChild\BlogPosts());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \HelloElementorChild\ContactForm());
}
add_action('elementor/widgets/widgets_registered', 'el_custom_widgets');

