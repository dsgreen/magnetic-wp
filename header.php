<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and main content div and a grid row
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
<?php if (
    // add a page class to style header & navigation with a featured background image
    is_page_template('page-image-header.php') ||
    is_page_template('page-image-header-no-sidebar.php') ||
    is_page_template('front-page.php')
) { ?>
<body <?php body_class('body--transparent-header'); ?>>
<?php } else { ?>
<body <?php body_class(); ?>>
<?php }  ?>
<a class="skiplink" href="#content"><?php esc_html_e( 'Skip to main content', 'magnetic' ); ?></a>
<header class="site-header" id="top">
	<div class="container">
		<?php the_custom_logo(); ?>
    <p class="site-title">
      <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
    </p>
    <?php
      $description = get_bloginfo( 'description', 'display' );
      if ( $description || is_customize_preview() ) : ?>
    <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
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

<?php if (
    // these templates have special markup, exclude from the following
    !is_page_template('page-image-header.php') &&
    !is_page_template('page-image-header-no-sidebar.php') &&
    !is_page_template('page-no-sidebar.php') &&
    !is_page_template('front-page.php')
) { ?>
<section class="site-content container" id="content">
  <div class="row">
	  <?php
    // no sidebar active
    if ( ! is_active_sidebar( 'sidebar-1' ) ) : ?>
    <div class="col-12">
    <?php
    // else, we have a sidebar
    else : ?>
    <div class="col-md-8 col-lg-9">
    <?php endif; ?>
      <main class="site-main" id="main">
<?php } ?>