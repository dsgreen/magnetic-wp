<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Magnetic WP
 */

?>
<?php if (
	// these templates have special markup, exclude from the following
  // closing tags from header.php
	!is_page_template('templates/template-image-header.php') &&
	!is_page_template('templates/template-no-sidebar.php') &&
	!is_page_template('templates/template-full-width.php') &&
	!is_front_page()
) : ?>
  </div><!-- end row -->
</div><!-- end site-content -->
<?php endif; ?>

<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) : ?>
<section class="footer-widgets">
  <div class="container">
    <div class="row">
      <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
      <div class="col-sm-4">
	      <?php dynamic_sidebar( 'footer-1' ); ?>
      </div>
      <?php
      endif;
      if ( is_active_sidebar( 'footer-2' ) ) : ?>
      <div class="col-sm-4">
	      <?php dynamic_sidebar( 'footer-2' ); ?>
      </div>
      <?php
      endif;
      if ( is_active_sidebar( 'footer-3' ) ) : ?>
      <div class="col-sm-4">
	      <?php dynamic_sidebar( 'footer-3' ); ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<footer class="site-footer">
  <div class="container site-info">
    <div class="row">
      <div class="col-sm-6">
	      <?php
        if ( is_active_sidebar( 'footer-text' ) ) :

            dynamic_sidebar( 'footer-text' );

	      else :
            ?>

          <p>&copy; <?php
              esc_html_e('Copyright ', 'magnetic-wp'); echo date('Y') . ' '; bloginfo( 'name' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
              esc_html_e('. Proudly powered by ', 'magnetic-wp');
              ?>
          <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'magnetic-wp' ) ); ?>" rel="nofollow"><?php
              esc_html_e('WordPress', 'magnetic-wp'); ?></a>.</p>

	      <?php
        endif;
	      ?>
      </div>
      <div class="col-sm-6">
        <p class="text-right"><a href="#top" class="back-to-top"><i class="fa-solid fa-angle-up fa-2x" title="<?php
                esc_attr_e( 'Back to top', 'magnetic-wp' ); ?>"></i></a></p>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
