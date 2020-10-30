<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and the start of the main content div and layout grid
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package magnetic
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skiplink" href="#content"><?php esc_html_e( 'Skip to main content', 'magnetic' ); ?></a>
<header class="site-header" id="top">
	<div class="container">
		<?php the_custom_logo(); ?>
    <p class="site-title">
      <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
    </p>
    <?php
      $magnetic_description = get_bloginfo( 'description', 'display' );
      if ( $magnetic_description || is_customize_preview() ) : ?>
    <p class="site-description"><?php echo $magnetic_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
    <?php
      endif; ?>
		<button class="nav-toggle">
			<span class="nav-toggle-text">Menu</span>
			<span class="bar"></span>
			<span class="bar"></span>
			<span class="bar"></span>
		</button>
    <nav class="mobile-navigation hidden">
			<?php wp_nav_menu( array(
				'theme_location'    => 'primary',
				'menu'              => 'primary',
				'container'         => '',
				'container_class'   => '',
				'container_id'      => '',
				'menu_class'        => ''
			)); ?>
      <a href="#" class="mobile-nav-close">Close Menu</a>
    </nav>
		<nav class="main-navigation hidden">
			<?php wp_nav_menu( array(
					'theme_location'    => 'primary',
					'menu'              => 'primary',
					'container'         => '',
					'container_class'   => '',
					'container_id'      => '',
					'menu_class'        => ''
			)); ?>
		</nav>
	</div>
</header>

<?php
  if (
    // these templates have special markup, exclude from the following
    !is_page_template('templates/template-image-header.php') &&
    !is_page_template('templates/template-no-sidebar.php') &&
    !is_page_template('templates/template-full-width.php') &&
    !is_page_template('front-page.php')
  ) : ?>
<div class="site-content container" id="content">
  <div class="row">
	  <?php
    // no sidebar active
    if ( ! is_active_sidebar( 'sidebar-1' ) ) : ?>
    <div class="col-12">
    <?php
    // else, we have a sidebar
    else : ?>
    <div class="col-md-8 col-lg-9">
    <?php

    endif;
  endif;