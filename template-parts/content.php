<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magnetic WP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="post-wrap">
    <header class="entry-header">
      <div class="entry-meta">
      <?php
      magnetic_wp_print_categories();
      ?>
      </div>
      <?php
      if ( is_singular() ) :
        the_title( '<h1 class="entry-title">', '</h1>' );
      else :
        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
      endif;
      ?>
      <div class="entry-meta">
      <?php
      if ( 'post' === get_post_type() ) :
        magnetic_wp_posted_on();
        magnetic_wp_posted_by();
        magnetic_wp_comments_link();
      endif; ?>
      </div>
    </header>
    <div class="entry-content">
    <?php magnetic_wp_post_thumbnail('magnetic_wp_extra_large'); ?>
    <?php
    if ( is_single() ) {
      the_content( sprintf(
        wp_kses(
          /* translators: %s: Name of current post. Only visible to screen readers */
          __( 'Continue reading<span class="sr-only"> "%s"</span>', 'magnetic-wp' ),
          array(
            'span' => array(
              'class' => array(),
            ),
          )
        ),
          wp_kses_post( get_the_title() )
      ) );

      wp_link_pages( array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'magnetic-wp' ),
        'after'  => '</div>',
      ) );
    } else {
	    the_excerpt();
    }
    ?>
    </div>
    <footer class="entry-footer">
      <?php
      if ( is_single() ) {
        magnetic_wp_entry_footer();
      }
      ?>
    </footer>
  </div>
</article>
