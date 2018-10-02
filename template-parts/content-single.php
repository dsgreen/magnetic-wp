<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="post-wrap">
    <header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ) : ?>
		  <div class="entry-meta">
			<?php
        _s_print_categories();
			?>
      <p>
			<?php
				_s_posted_on();
				_s_posted_by();
				_s_comments_link();
			?>
      </p>
		  </div>
		<?php
		endif; ?>
	  </header>

	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="sr-only"> "%s"</span>', '_s' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_s' ),
				'after'  => '</div>',
			) );
		?>
	</div>
  </div>
</article>
