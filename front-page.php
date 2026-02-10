<?php
/**
 *
 * Front Page template with a background image header, maximum width.
 *
 * When homepage widget areas are active, uses the classic widget-based layout.
 * When no homepage widgets are active, uses a full-width block layout.
 *
 * @package Magnetic WP
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'template-parts/image-header' ); ?>
<div class="site-content" id="content">
  <main class="site-main" id="main">

	<?php
	if ( magnetic_wp_has_homepage_widgets() ) :
		get_template_part( 'template-parts/content', 'front-page' );
	else :
		get_template_part( 'template-parts/content', 'page' );
	endif;
	?>

  </main>
</div>
<?php endwhile; ?>
<?php get_footer();