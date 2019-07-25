<?php
/**
 *
 * Front Page template with a background image header, maximum width.
 *
 * @package magnetic
 */

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'template-parts/image-header' ); ?>
<section class="site-content" id="content">
  <main class="site-main" id="main">

              <?php get_template_part( 'template-parts/content', 'front-page' ); ?>

          <?php endwhile; // End of the loop. ?>

  </main>
</section>
<?php get_footer();
