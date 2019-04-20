<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-md-4 col-lg-3">
  <aside class= widget-area" id="secondary" role="complementary">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
  </aside>
</div>
