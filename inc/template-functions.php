<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package magnetic
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function magnetic_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a page class to style header & navigation with a featured background image.
	if ( is_page_template( 'templates/template-image-header.php' ) ||
		 is_page_template( 'front-page.php' ) )
	{
		$classes[] = 'body--transparent-header';
	}

	return $classes;
}
add_filter( 'body_class', 'magnetic_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function magnetic_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'magnetic_pingback_header' );
