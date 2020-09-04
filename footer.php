<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package magnetic
 */

?>
<?php if (
	// these templates have special markup, exclude from the following
  // closing tags from header.php
	!is_page_template('page-image-header.php') &&
	!is_page_template('page-image-header-no-sidebar.php') &&
	!is_page_template('page-no-sidebar.php') &&
	!is_page_template('page-gutenberg.php') &&
	!is_page_template('front-page.php')
) : ?>
  </div>
</section>
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
	      else : ?>
          <p>&copy; <?php esc_html_e('Copyright ', 'magnetic'); echo date('Y') . ' '; bloginfo( 'name' );
          esc_html_e('. Proudly powered by ', 'magnetic'); ?>
          <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'magnetic' ) ); ?>" rel="nofollow"><?php esc_html_e('WordPress', 'magnetic'); ?></a><?php esc_html_e(' and ', 'magnetic'); ?>
          <a href="<?php echo esc_url( __( 'https://magneticthemes.com/', 'magnetic') ); ?>" rel="nofollow"><?php esc_html_e('Magnetic', 'magnetic'); ?></a>.</p>
	      <?php endif; ?>
      </div>
      <div class="col-sm-6">
        <p class="text-right"><a href="#top" class="back-to-top"><i class="fas fa-angle-up fa-2x" title="<?php esc_html_e( 'Back to top', 'magnetic' ); ?>"></i></a></p>
      </div>
    </div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
