<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $shop_and_commerce_classes Classes for the body element.
 * @return array
 */
function shop_and_commerce_body_classes( $shop_and_commerce_classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$shop_and_commerce_classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$shop_and_commerce_classes[] = 'hfeed';
	}

	return $shop_and_commerce_classes;
}
add_filter( 'body_class', 'shop_and_commerce_body_classes' );
