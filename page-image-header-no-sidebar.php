<?php
/**
 *
 * Template Name: Big Image Header, Full Width
 * Page with a big image header.
 *
 * @package _s
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'template-parts/image-header' ); ?>
<section class="site-content container" id="content">
  <div class="row">
      <main class="col-12 col site-main" id="main" role="main">

              <?php get_template_part( 'template-parts/content', 'page' ); ?>

              <?php
                  // If comments are open or we have at least one comment, load up the comment template.
                  if ( comments_open() || get_comments_number() ) :
                      comments_template();
                  endif;
              ?>

          <?php endwhile; // End of the loop. ?>

      </main>
  </div>
</section>
<?php get_footer();
?>
