<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package magnetic
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="post-wrap">
	<?php magnetic_post_thumbnail('extra_large'); ?>

	<header class="entry-header">

    <div class="entry-meta">
      <?php magnetic_print_categories(); ?>
		</div>

    <?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header>

	<div class="entry-content">
		<?php
			the_excerpt( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="sr-only"> "%s"</span>', 'magnetic' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'magnetic' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<footer class="entry-footer">
		<?php
		magnetic_posted_on();
		magnetic_posted_by();
		?>
	</footer>
  </div>
</article>
