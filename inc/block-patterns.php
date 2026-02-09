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
			'description' => __( 'Two-column layout with a large image on the left and text on the right, matching homepage sections 1 and 3.', 'magnetic-wp' ),
			'categories'  => array( 'magnetic-wp' ),
			'content'     => '<!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":{"left":"0"}}}} -->
<div class="wp-block-columns alignfull"><!-- wp:column {"width":"50%","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
<div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:50%"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"50%","style":{"spacing":{"padding":{"top":"2em","right":"5em","bottom":"2em","left":"5em"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-top:2em;padding-right:5em;padding-bottom:2em;padding-left:5em;flex-basis:50%"><!-- wp:heading -->
<h2 class="wp-block-heading">Your Heading Here</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Add your content here. This two-column layout pairs a large image with descriptive text, matching the homepage widget sections of the theme.</p>
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
			'description' => __( 'Two-column layout with text on the left and a large image on the right, matching homepage sections 2 and 4.', 'magnetic-wp' ),
			'categories'  => array( 'magnetic-wp' ),
			'content'     => '<!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":{"left":"0"}}}} -->
<div class="wp-block-columns alignfull"><!-- wp:column {"verticalAlignment":"center","width":"50%","style":{"spacing":{"padding":{"top":"2em","right":"5em","bottom":"2em","left":"5em"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-top:2em;padding-right:5em;padding-bottom:2em;padding-left:5em;flex-basis:50%"><!-- wp:heading -->
<h2 class="wp-block-heading">Your Heading Here</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Add your content here. This two-column layout pairs descriptive text with a large image, matching the homepage widget sections of the theme.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"brand","textColor":"white"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-brand-background-color has-text-color has-background wp-element-button">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"50%","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
<div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:50%"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
		)
	);

	register_block_pattern(
		'magnetic-wp/full-width-dark-section',
		array(
			'title'       => __( 'Full-Width Dark Section', 'magnetic-wp' ),
			'description' => __( 'Full-width section with a dark background, white text, and centered content, matching homepage section 5.', 'magnetic-wp' ),
			'categories'  => array( 'magnetic-wp' ),
			'content'     => '<!-- wp:group {"align":"full","backgroundColor":"dark","textColor":"white","style":{"spacing":{"padding":{"top":"3em","right":"3em","bottom":"3em","left":"3em"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-dark-background-color has-text-color has-background" style="padding-top:3em;padding-right:3em;padding-bottom:3em;padding-left:3em"><!-- wp:heading {"textColor":"white"} -->
<h2 class="wp-block-heading has-white-color has-text-color">Your Heading Here</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Add your content here. This full-width dark section is ideal for call-to-action areas or highlighting important information.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"brand","textColor":"white"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-brand-background-color has-text-color has-background wp-element-button">Get Started</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
		)
	);
}
add_action( 'init', 'magnetic_wp_register_block_patterns' );
