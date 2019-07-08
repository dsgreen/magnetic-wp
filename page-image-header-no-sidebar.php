<?php
/**
 *
 * Template Name: Background Image Header, No Sidebar
 * Page with a background image header, no sidebar.
 *
 * @package _s
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'template-parts/image-header' ); ?>
<section class="site-content container" id="content">
  <div class="row">
    <div class="col-12">
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
  </div>
</section>
<?php get_footer();
?>
