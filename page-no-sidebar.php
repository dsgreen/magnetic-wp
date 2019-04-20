<?php
/**
 *
 * Template Name: No Sidebar
 * Page with no sidebar.
 *
 * @package _s
 */

get_header(); ?>
<section class="site-content container" id="content">
  <div class="row">
    <div class="col-12">
      <main class="site-main" id="main" role="main">

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
</section>
<?php
get_footer();
