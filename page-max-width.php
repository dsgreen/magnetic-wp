<?php
/**
 *
 * Template Name: No Sidebar, Max Width
 * Page with no sidebar, max width.
 *
 * @package magnetic
 */

get_header(); ?>
<section class="site-content" id="content">
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
</section>
<?php
get_footer();
