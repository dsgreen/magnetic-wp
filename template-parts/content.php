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
      <div class="entry-meta">
      <?php
      _s_print_categories();
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
        _s_posted_on();
        _s_posted_by();
        _s_comments_link();
      endif; ?>
      </div>
    </header>
    <div class="entry-content">
    <?php _s_post_thumbnail('extra_large'); ?>
    <?php
    if ( is_single() ) {
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
    } else {
	    the_excerpt();
    }
    ?>
    </div>
    <footer class="entry-footer">
      <?php
      if ( is_single() ) {
        _s_entry_footer();
      }
      ?>
    </footer>
  </div>
</article>
