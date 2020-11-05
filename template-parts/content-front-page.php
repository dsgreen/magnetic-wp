<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magnetic WP
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container section-intro">
    <div class="row">
      <div class="col-12">
        <div class="entry-content">
          <?php the_content(); ?>
        </div><!-- .entry-content -->
      </div>
    </div>
  </div>
  <?php 
  // Section 1
  if ( is_active_sidebar( 'home-1-1' ) || is_active_sidebar( 'home-1-2' ) ) : ?>
  <div class="row no-gutters align-items-center section-1">
    <div class="col-md-6">
      <?php if ( is_active_sidebar( 'home-1-1' ) ) : ?>
        <?php dynamic_sidebar( 'home-1-1' ); ?>
      <?php endif; ?>
    </div>
    <div class="col-md-6">
      <div class="wrap-inner">
        <?php if ( is_active_sidebar( 'home-1-2' ) ) : ?>
          <?php dynamic_sidebar( 'home-1-2' ); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
	<?php 
  // Section 2
  if ( is_active_sidebar( 'home-2-1' ) || is_active_sidebar( 'home-2-2' ) ) : ?>
  <div class="row no-gutters align-items-center section-2">
    <div class="col-md-6 order-md-last">
      <?php if ( is_active_sidebar( 'home-2-2' ) ) : ?>
        <?php dynamic_sidebar( 'home-2-2' ); ?>
      <?php endif; ?>
    </div>
    <div class="col-md-6 order-md-first">
      <div class="wrap-inner">
        <?php if ( is_active_sidebar( 'home-2-1' ) ) : ?>
          <?php dynamic_sidebar( 'home-2-1' ); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
	<?php endif; ?>
	<?php 
  // Section 3
  if ( is_active_sidebar( 'home-3-1' ) || is_active_sidebar( 'home-3-2' ) ) : ?>
  <div class="row no-gutters align-items-center section-3">
    <div class="col-md-6">
      <?php if ( is_active_sidebar( 'home-3-1' ) ) : ?>
        <?php dynamic_sidebar( 'home-3-1' ); ?>
      <?php endif; ?>
    </div>
    <div class="col-md-6">
      <div class="wrap-inner">
        <?php if ( is_active_sidebar( 'home-3-2' ) ) : ?>
          <?php dynamic_sidebar( 'home-3-2' ); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
	<?php endif; ?>
	<?php 
  // Section 4
  if ( is_active_sidebar( 'home-4-1' ) || is_active_sidebar( 'home-4-2' ) ) : ?>
  <div class="row no-gutters align-items-center section-4">
    <div class="col-md-6 order-md-last">
      <?php if ( is_active_sidebar( 'home-4-2' ) ) : ?>
        <?php dynamic_sidebar( 'home-4-2' ); ?>
      <?php endif; ?>
    </div>
    <div class="col-md-6 order-md-first">
      <div class="wrap-inner">
        <?php if ( is_active_sidebar( 'home-4-1' ) ) : ?>
          <?php dynamic_sidebar( 'home-4-1' ); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
	<?php endif; ?>
	<?php
	// Section 5
	if ( is_active_sidebar( 'home-5' ) ) : ?>
  <div class="section-5">
  <div class="container ">
    <div class="row no-gutters align-items-center">
      <div class="col-12">
        <?php dynamic_sidebar( 'home-5' ); ?>
      </div>
    </div>
  </div>
  </div>
	<?php endif; ?>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="sr-only">%s</span>', 'magnetic-wp' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
              wp_kses_post( get_the_title() )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
