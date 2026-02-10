<?php
/**
 * Heading Block Accessibility Enhancements
 *
 * @package ltic-block-a11y
 */

namespace UBC\LTIC\Block_A11y;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add tabindex="-1" to heading blocks.
 *
 * @param string $block_content The block content.
 * @param array  $block         The block data.
 *
 * @return string The modified block content.
 */
function add_tabindex_to_heading_block( $block_content, $block ) {
	if ( 'core/heading' !== $block['blockName'] ) {
		return $block_content;
	}

	$processor = new \WP_HTML_Tag_Processor( $block_content );

	if ( $processor->next_tag( array( 'class_name' => 'wp-block-heading' ) ) ) {
		$processor->set_attribute( 'tabindex', '-1' );
		$block_content = $processor->get_updated_html();
	}

	return $block_content;
}

add_filter( 'render_block', __NAMESPACE__ . '\\add_tabindex_to_heading_block', 10, 2 );
