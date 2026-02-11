<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Magnetic WP
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function magnetic_wp_body_classes( $classes ) {
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
		 is_page_template( 'templates/template-full-width-hero.php' ) ||
		 is_front_page() )
	{
		$classes[] = 'body--transparent-header';
	}

	// Use full-width block layout on the front page when no homepage widgets are active.
	if ( is_front_page() && ! magnetic_wp_has_homepage_widgets() ) {
		$classes[] = 'page-template-template-full-width';
	}

	return $classes;
}
add_filter( 'body_class', 'magnetic_wp_body_classes' );

/**
 * Check if any homepage widget areas have active widgets.
 *
 * @return bool True if any homepage widget area is active.
 */
function magnetic_wp_has_homepage_widgets() {
	$widget_areas = array(
		'home-1-1', 'home-1-2',
		'home-2-1', 'home-2-2',
		'home-3-1', 'home-3-2',
		'home-4-1', 'home-4-2',
		'home-5',
	);

	foreach ( $widget_areas as $area ) {
		if ( is_active_sidebar( $area ) ) {
			return true;
		}
	}

	return false;
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function magnetic_wp_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'magnetic_wp_pingback_header' );
