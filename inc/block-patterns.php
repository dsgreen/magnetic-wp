<?php
/**
 * Block Patterns
 *
 * @package Magnetic WP
 */

/**
 * Register block pattern category and patterns.
 */
function magnetic_wp_register_block_patterns() {
	register_block_pattern_category(
		'magnetic-wp',
		array( 'label' => __( 'Magnetic WP', 'magnetic-wp' ) )
	);

	register_block_pattern(
		'magnetic-wp/image-left-text-right',
		array(
			'title'       => __( 'Image Left, Text Right', 'magnetic-wp' ),
			'description' => __( 'Two-column layout with an image on the left and text on the right.', 'magnetic-wp' ),
			'categories'  => array( 'magnetic-wp' ),
			'content'     => '<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading -->
<h2 class="wp-block-heading">Your Heading Here</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Add your content here. This two-column layout works well for pairing images with descriptive text, matching the homepage sections of the theme.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"brand","textColor":"white"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-brand-background-color has-text-color has-background wp-element-button">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
		)
	);

	register_block_pattern(
		'magnetic-wp/text-left-image-right',
		array(
			'title'       => __( 'Text Left, Image Right', 'magnetic-wp' ),
			'description' => __( 'Two-column layout with text on the left and an image on the right.', 'magnetic-wp' ),
			'categories'  => array( 'magnetic-wp' ),
			'content'     => '<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading -->
<h2 class="wp-block-heading">Your Heading Here</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Add your content here. This two-column layout works well for pairing descriptive text with images, matching the homepage sections of the theme.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"brand","textColor":"white"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-brand-background-color has-text-color has-background wp-element-button">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
		)
	);

	register_block_pattern(
		'magnetic-wp/full-width-dark-section',
		array(
			'title'       => __( 'Full-Width Dark Section', 'magnetic-wp' ),
			'description' => __( 'Full-width section with a dark background, white text, and centered content.', 'magnetic-wp' ),
			'categories'  => array( 'magnetic-wp' ),
			'content'     => '<!-- wp:group {"align":"full","backgroundColor":"dark","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-dark-background-color has-text-color has-background"><!-- wp:heading {"textAlign":"center","textColor":"white"} -->
<h2 class="wp-block-heading has-text-align-center has-white-color has-text-color">Your Heading Here</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Add your content here. This full-width dark section is ideal for call-to-action areas or highlighting important information.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"brand","textColor":"white"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-brand-background-color has-text-color has-background wp-element-button">Get Started</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
		)
	);
}
add_action( 'init', 'magnetic_wp_register_block_patterns' );
