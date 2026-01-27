<?php
/**
 * Plugin Name:       LTIC Block A11y
 * Description:       Accessibility enhancements for WordPress blocks from UBC LTIC.
 * Requires at least: 6.5
 * Requires PHP:      8.2
 * Version:           1.0.0
 * Author:            LTIC WordPress
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ltic-block-a11y
 *
 * @package           ltic-block-a11y
 */

namespace UBC\LTIC\Block_A11y;

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once plugin_dir_path( __FILE__ ) . 'src/block-a11y/heading/block.php';

/**
 * Register and Enqueue the JavaScript which allows us to add accessibility enhancements to blocks.
 *
 * @return void
 *
 * @package UBC Block A11y
 */
function enqueue_block_editor_assets() {
	wp_enqueue_script(
		'ltic-block-a11y-script',
		plugins_url( 'build/index.js', __FILE__ ),
		array( 'wp-blocks' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'build/index.js' ),
		true
	);
}//end enqueue_block_editor_assets()

add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\\enqueue_block_editor_assets' );
