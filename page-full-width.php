<?php
/**
 *
 * Template Name: Full Width
 * Full width page, no sidebar.
 *
 * @package _s
 */

get_header(); ?>
    <main class="col-12 col site-main" id="main" role="main">

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
<?php
get_footer();
