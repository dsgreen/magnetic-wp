<?php
/**
 *
 * Template Name: Background Image Header
 * Page with a background image header.
 *
 * @package magnetic
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'template-parts/image-header' ); ?>
<section class="site-content container" id="content">
  <div class="row">
    <div class="col-md-8 col-lg-9">
      <main class="site-main" id="main">

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
<?php get_sidebar(); ?>
  </div>
</section>
<?php get_footer();
?>
