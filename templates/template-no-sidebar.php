<?php
/**
 *
 * Template Name: No Sidebar
 * Page with no sidebar.
 *
 * @package Magnetic WP
 */

get_header(); ?>
<div class="site-content container" id="content">
  <div class="row">
    <div class="col-12">
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
  </div>
</div>
<?php
get_footer();
