<?php
/**
 *
 * Front page template.
 *
 * @package _s
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'template-parts/image-header' ); ?>

  <?php if ( !is_active_sidebar( 'sidebar-1' ) ) : ?>
  <main class="col-sm-10 offset-sm-1 site-main" id="main" role="main">
	<?php else : ?>
  <main class="col-sm-9 site-main" id="main" role="main">
		<?php endif; ?>
			<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>

			<?php endwhile; // End of the loop. ?>

    </main>
<?php
get_sidebar();
get_footer();
