<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header(); ?>
<section class="site-content container" id="content">
  <div class="row">
    <div class="col col-8<?php if (!is_active_sidebar( 'sidebar-1' ) ) { echo " offset-2"; } ?>">
      <main class="site-main" id="main" role="main">

      <?php
      while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', get_post_type() );

        the_post_navigation();

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;

      endwhile; // End of the loop.
      ?>

      </main>
    </div>
    <?php get_sidebar(); ?>
  </div>
</section>
<?php
get_footer();
