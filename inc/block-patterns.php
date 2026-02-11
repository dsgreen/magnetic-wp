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
		'magnetic-wp/hero',
		array(
			'title'       => __( 'Hero', 'magnetic-wp' ),
			'description' => __( 'Full-width hero section with a background image, dark overlay, heading, and subtitle. Replaces the featured image header.', 'magnetic-wp' ),
			'categories'  => array( 'magnetic-wp' ),
			'content'     => '<!-- wp:cover {"dimRatio":50,"overlayColor":"dark","isUserOverlayColor":true,"minHeight":75,"minHeightUnit":"vh","align":"full","style":{"spacing":{"padding":{"top":"8em","bottom":"2em","left":"2em","right":"2em"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","wideSize":"1160px"}} -->
<div class="wp-block-cover alignfull" style="margin-top:0;margin-bottom:0;padding-top:8em;padding-right:2em;padding-bottom:2em;padding-left:2em;min-height:75vh"><span aria-hidden="true" class="wp-block-cover__background has-dark-background-color has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"5rem","fontWeight":"300"}},"textColor":"white"} -->
<h1 class="wp-block-heading has-white-color has-text-color" style="font-size:5rem;font-weight:300">Your Page Title</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"2.2rem"}},"textColor":"white"} -->
<p class="has-white-color has-text-color" style="font-size:2.2rem">Add a subtitle or lead text here.</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->',
		)
	);

	register_block_pattern(
		'magnetic-wp/image-left-text-right',
		array(
			'title'       => __( 'Image Left, Text Right', 'magnetic-wp' ),
			'description' => __( 'Two-column layout with a large image on the left and text on the right, matching homepage sections 1 and 3.', 'magnetic-wp' ),
			'categories'  => array( 'magnetic-wp' ),
			'content'     => '<!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":{"left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-columns alignfull" style="margin-top:0;margin-bottom:0"><!-- wp:column {"width":"50%","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
<div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:50%"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"50%","className":"mwp-p-2 mwp-px-md-5"} -->
<div class="wp-block-column is-vertically-aligned-center mwp-p-2 mwp-px-md-5" style="flex-basis:50%"><!-- wp:heading -->
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
			'content'     => '<!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":{"left":"0"},"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-columns alignfull" style="margin-top:0;margin-bottom:0"><!-- wp:column {"width":"50%","className":"mwp-order-md-last","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}}} -->
<div class="wp-block-column mwp-order-md-last" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:50%"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="" alt=""/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"50%","className":"mwp-order-md-first mwp-p-2 mwp-px-md-5"} -->
<div class="wp-block-column is-vertically-aligned-center mwp-order-md-first mwp-p-2 mwp-px-md-5" style="flex-basis:50%"><!-- wp:heading -->
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
<!-- /wp:column --></div>
<!-- /wp:columns -->',
		)
	);

	register_block_pattern(
		'magnetic-wp/full-width-cta-dark',
		array(
			'title'       => __( 'Full-Width CTA Dark', 'magnetic-wp' ),
			'description' => __( 'Full-width dark section with text on the left and a call-to-action button on the right, matching homepage section 5.', 'magnetic-wp' ),
			'categories'  => array( 'magnetic-wp' ),
			'content'     => '<!-- wp:group {"align":"full","backgroundColor":"dark","textColor":"white","className":"mwp-p-2 mwp-px-md-5","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-white-color has-dark-background-color has-text-color has-background mwp-p-2 mwp-px-md-5" style="margin-top:0;margin-bottom:0"><!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
<div class="wp-block-columns are-vertically-aligned-center alignwide"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"textColor":"white"} -->
<h2 class="wp-block-heading has-white-color has-text-color">Your Heading Here</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Add your content here. This full-width dark section is ideal for call-to-action areas or highlighting important information.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:buttons {"className":"mwp-justify-md-end","layout":{"type":"flex"}} -->
<div class="wp-block-buttons mwp-justify-md-end"><!-- wp:button {"backgroundColor":"brand","textColor":"white"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-brand-background-color has-text-color has-background wp-element-button">Get Started</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
		)
	);
}
add_action( 'init', 'magnetic_wp_register_block_patterns' );
