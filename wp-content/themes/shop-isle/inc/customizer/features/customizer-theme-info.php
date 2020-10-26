<?php
/**
 * Theme info customizer controls.
 *
 * @package ShopIsle
 */
/**
 * Hook Theme Info section to customizer.
 *
 * @param object $wp_customize The wp_customize object.
 */
function shopisle_theme_info_customize_register( $wp_customize ) {
	// Include theme info control class.
	require_once( get_template_directory() . '/inc/customizer/class/class-shopisle-info.php' );
	// Include upsell class.
	require_once( get_template_directory() . '/inc/customizer/customizer-upsell/class-shopisle-control-upsell.php' );
}
add_action( 'customize_register', 'shopisle_theme_info_customize_register' );
