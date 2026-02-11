<?php
/**
 *
 * Template Name: Full Width Hero
 * Full-width page with transparent nav overlay and no page title.
 * Use with the Hero block pattern for a background image header.
 *
 * @package Magnetic WP
 */
get_header(); ?>
	<div class="site-content" id="content">
		<main class="site-main" id="main">

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile; // End of the loop.
			?>

		</main>
	</div>
<?php
get_footer();
