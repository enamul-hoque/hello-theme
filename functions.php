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
 * Enqueue Styles and Scripts
 * Open Graph Meta Tags
 * Remove Generator Tags
 * Custom CSS Support
 * Shortcode: Current Year
 * Shortcode: Page Title
 * Woo: Add To Cart Text Option
 * Elementor Custom Widgets
 */

/**
 * Enqueue Styles and Scripts
 *
 * @return void
 */
function hello_elementor_child_enqueue_scripts() {
	$ver = '1.0.011';

	// Styles
	wp_enqueue_style( 'hello-elementor-child-style', get_stylesheet_directory_uri() . '/style.css', ['hello-elementor-theme-style'], $ver );

	// Scripts
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );


/**
 * Open Graph Meta Tags
 */
function hello_elementor_child_open_graph() {
	$logo_id = get_theme_mod( 'custom_logo' );

	if (!$logo_id) {
		return;
	}

	// Get the logo URL
	$logo_url = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( !empty($logo_url) ) {
		$logo_url = $logo_url[0];
	} else {
		return;
	}
	?>
		<!-- Open Graph Meta Tags - Start -->
		<?php if ( get_bloginfo('description') ): ?>
			<meta name="description" content="<?php echo esc_attr( get_bloginfo( 'description' ) ); ?>">
		<?php endif; ?>
		
		<meta property="og:url" content="<?php echo esc_url( home_url() ); ?>">
		<meta property="og:type" content="website">
		<meta property="og:title" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
			<?php if ( get_bloginfo('description') ): ?>
				<meta property="og:description" content="<?php echo esc_attr( get_bloginfo( 'description' ) ); ?>">
			<?php endif; ?>
		<meta property="og:image" content="<?php echo esc_url( $logo_url ); ?>">

		<meta name="twitter:card" content="summary_large_image">
		<meta property="twitter:domain" content="<?php echo esc_url( home_url() ); ?>">
		<meta property="twitter:url" content="<?php echo esc_url( home_url() ); ?>">
		<meta name="twitter:title" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
			<?php if ( get_bloginfo('description') ): ?>
				<meta name="twitter:description" content="<?php echo esc_attr( get_bloginfo( 'description' ) ); ?>">
			<?php endif; ?>
		<meta name="twitter:image" content="<?php echo esc_url( $logo_url ); ?>">
		<!-- Open Graph Meta Tags - End -->
	<?php
}
add_action( 'wp_head', 'hello_elementor_child_open_graph', 2 );


/**
 * Remove Generator Tags
 */
function remove_wp_version() {
	remove_action( 'wp_head', 'wp_generator' );
}
add_action( 'init', 'remove_wp_version' );


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

