<?php
/**
 * Setup theme customizer options.
 *
 * @package ThinkUpThemes
 */

// Declare prefix global variable
$GLOBALS['alante_thinkup_prefix'] = 'alante_';

// Add Button Link script (used for top level upgrade button)
require_once( trailingslashit( dirname(__FILE__) ) . 'inc/sections/button_link/section_button_link_register.php' );

// Setup custom sections / controls / callbacks
function alante_thinkup_customizer_setup() {

	// Load all custom customizer arrays
	$array_folder = trailingslashit( dirname(__FILE__) ) . 'inc/arrays';
	$array_files  = scandir($array_folder);

	foreach ($array_files as $array_file) {

		if ($array_file === '.' or $array_file === '..') continue;

		if (is_dir($array_folder . '/' . $array_file)) {
			require_once( $array_folder . '/' . $array_file . '/array_' . $array_file . '.php' );
		}
	}

	// Load all custom customizer sections
	$section_folder = trailingslashit( dirname(__FILE__) ) . 'inc/sections';
	$section_files  = scandir($section_folder);

	foreach ($section_files as $section_file) {

		if ($section_file === '.' or $section_file === '..') continue;

		if (is_dir($section_folder . '/' . $section_file)) {
			require_once( $section_folder . '/' . $section_file . '/section_' . $section_file . '.php' );
		}
	}

	// Load all custom customizer controls
	$control_folder = trailingslashit( dirname(__FILE__) ) . 'inc/controls';
	$control_files  = scandir($control_folder);

	foreach ($control_files as $control_file) {

		if ($control_file === '.' or $control_file === '..') continue;

		if (is_dir($control_folder . '/' . $control_file)) {
			require_once( $control_folder . '/' . $control_file . '/control_' . $control_file . '.php' );
		}
	}

	// Load all active callbacks
	$active_callback_folder = trailingslashit( dirname(__FILE__) ) . 'inc/callbacks/active_callback';
	$active_callback_files  = scandir($active_callback_folder);

	foreach ($active_callback_files as $active_callback_file) {

		if ($active_callback_file === '.' or $active_callback_file === '..') continue;

		if (is_dir($active_callback_folder . '/' . $active_callback_file)) {
			require_once( $active_callback_folder . '/' . $active_callback_file . '/active_callback_' . $active_callback_file . '.php' );
		}
	}

	// Load all sanitization callbacks
	$sanitize_callback_folder = trailingslashit( dirname(__FILE__) ) . 'inc/callbacks/sanitize_callback';
	$sanitize_callback_files  = scandir($sanitize_callback_folder);

	foreach ($sanitize_callback_files as $sanitize_callback_file) {

		if ($sanitize_callback_file === '.' or $sanitize_callback_file === '..') continue;

		if (is_dir($sanitize_callback_folder . '/' . $sanitize_callback_file)) {
			require_once( $sanitize_callback_folder . '/' . $sanitize_callback_file . '/sanitize_callback_' . $sanitize_callback_file . '.php' );
		}
	}
}
add_action( 'customize_register', 'alante_thinkup_customizer_setup' );

// Enqueue customizer scripts / styles
function alante_thinkup_customizer_adminscripts() {

	global $alante_thinkup_theme_version;

	// Add theme stylesheets.
	wp_enqueue_style( 'alante-thinkup-customizer', get_template_directory_uri() . '/admin/main/assets/css/thinkup-customizer.css', '', $alante_thinkup_theme_version );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/lib/extentions/font-awesome/css/font-awesome.min.css', '', '4.6.3' );

	// Add theme scripts.
	wp_enqueue_script( 'alante-thinkup-customizer', get_template_directory_uri() . '/admin/main/assets/js/thinkup-customizer.js', array( 'jquery' ), $alante_thinkup_theme_version, true );

}
add_action( 'customize_controls_enqueue_scripts', 'alante_thinkup_customizer_adminscripts' );

// Assign custom function to fetch variable values
if ( !function_exists( 'alante_thinkup_var' ) ) {
	function alante_thinkup_var( $name, $key = false ) {

		global $alante_thinkup_prefix;

		$prefix_name = $alante_thinkup_prefix;

		$thinkup_redux_variables = get_option( $prefix_name . 'thinkup_redux_variables' );
		$options = $thinkup_redux_variables;

		// Set this to your preferred default value
		$var = '';

		if ( empty( $name ) && !empty( $options ) ) {
			$var = $options;
		} else {
			if ( !empty( $options[$name] ) ) {
				if ( !empty( $key ) && !empty( $options[$name][$key] ) && $key !== true ) {
					$var = $options[$name][$key];
				} else if (  !empty( $key ) && empty( $options[$name][$key] ) && $key !== true  ) {
					$var = '0';
				} else {
					$var = $options[$name];
				}
			}
		}

		return $var;
	}
}