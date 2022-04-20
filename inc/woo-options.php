<?php
/**
 * Table of Contents
 * -----------------
 * 
 * Add To Cart Texts Option.
 * Customizer Option: Add To Cart Texts.
 */


/** Add To Cart Texts Option. */
if ( get_theme_mod( 'webex_cart_btn_text' ) ):
    function webex_shop_cart_btn_text() {
        return get_theme_mod( 'webex_shop_cart_btn_text', __( 'Add To Cart', 'woocommerce' ) );
    }
    add_filter( 'woocommerce_product_add_to_cart_text', 'webex_shop_cart_btn_text' );

    function webex_single_cart_btn_text() {
        return get_theme_mod( 'webex_single_cart_btn_text', __( 'Add To Cart', 'woocommerce' ) );
    }
    add_filter( 'woocommerce_product_single_add_to_cart_text', 'webex_single_cart_btn_text' );
endif;


/** Customizer Option: Add To Cart Texts. */
function webex_cart_btn_texts( $wp_customize ) {
    $wp_customize->add_setting( 'webex_cart_btn_text', []);
        $wp_customize->add_control( 'webex_cart_btn_text', [
            'label'    => __( 'Enable Custom Add To Cart Texts below.', 'webex' ),
            'section'  => 'woocommerce_product_catalog',
            'settings' => 'webex_cart_btn_text',
            'type'     => 'checkbox',
        ]);

    $wp_customize->add_setting( 'webex_shop_cart_btn_text', [
        'default'   => __( 'Add To Cart', 'woocommerce' ),
    ]);
        $wp_customize->add_control( 'webex_shop_cart_btn_text', [
            'label'     => __( 'Add To Cart Text: Shop/Archive Pages', 'woocommerce' ),
            'section'   => 'woocommerce_product_catalog',
            'settings'  => 'webex_shop_cart_btn_text',
            'type'      => 'text',
        ]);
    
    $wp_customize->add_setting( 'webex_single_cart_btn_text', [
        'default'   => __( 'Add To Cart', 'woocommerce' ),
    ]);
        $wp_customize->add_control( 'webex_single_cart_btn_text', [
            'label'     => __( 'Add To Cart Text: Single Pages', 'woocommerce' ),
            'section'   => 'woocommerce_product_catalog',
            'settings'  => 'webex_single_cart_btn_text',
            'type'      => 'text',
        ]);
}
add_action( 'customize_register', 'webex_cart_btn_texts' );
