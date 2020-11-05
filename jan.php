<?php
/**
 * The plugin main file.
 *
 * @package Jan
 *
 * @wordpress-plugin
 * Plugin Name:     Jan
 * Plugin URI:      https://github.com/richardkorthuis/jan
 * Description:     Change every occurrence of 'Powered by WordPress' with 'Powered by Coffee, much Coffee'.
 * Version:         1.0.0
 * Author:          Richard Korthuis
 * Author URI:      https://github.com/richardkorthuis
 * License:         GPLv3
 * License URI:     http://www.gnu.org/licenses/gpl.html
 */

/**
 * Replace occurrences of 'Powered by WordPress' in the output buffer.
 *
 * @param string $buffer The output buffer.
 *
 * @return string The output buffer.
 */
function jan_callback( $buffer ) {
	$buffer = str_replace( __( 'Powered by WordPress', 'jan' ), __( 'Powered by Coffee, much Coffee', 'jan' ), $buffer );
	return $buffer;
}

/**
 * Start the output buffering.
 */
function jan_buffer_start() {
	ob_start( 'jan_callback' );
}

/**
 * End the output buffering.
 */
function jan_buffer_end() {
	ob_end_flush();
}

add_action( 'after_setup_theme', 'jan_buffer_start' );
add_action( 'shutdown', 'jan_buffer_end' );
