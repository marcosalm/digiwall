<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Digital Wall
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function digital_wall_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'digital_wall_jetpack_setup' );
