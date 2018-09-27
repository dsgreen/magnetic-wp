<?php
/**
 * The blog index template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>
<section class="site-content container" id="content">
  <main class="site-main" id="main" role="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
        <header>
          <h1 class="sr-only page-title"><?php single_post_title(); ?></h1>
        </header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'blog-index' );

			endwhile;

			numeric_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

  </main>
</section>
<?php
get_footer();