<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and main content div and a grid row
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<? if (
    is_page_template('page-big-image.php') ||
    is_page_template('page-big-image-full-width.php') ||
    is_page_template('page-big-image-max-width.php')
) { ?>
<body <?php body_class('body--transparent-header'); ?>>
<?php } else { ?>
<body <?php body_class(); ?>>
<?php }  ?>
<a class="skiplink" href="#content"><?php esc_html_e( 'Skip to main content', '_s' ); ?></a>
<header class="site-header" id="top" role="banner">
	<div class="container">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		<button class="nav-toggle">
			<span class="nav-toggle-text">Menu</span>
			<span class="bar"></span>
			<span class="bar"></span>
			<span class="bar"></span>
		</button>
		<nav class="main-navigation hidden" role="navigation">
			<?php wp_nav_menu( array(
					'theme_location'    => 'primary',
					'menu'              => 'primary',
					'depth'             => 1,
					'container'         => '',
					'container_class'   => '',
					'container_id'      => '',
					'menu_class'        => ''
			)); ?>
		</nav>
	</div>
</header>

<? if (
    !is_page_template('page-big-image.php') &&
    !is_page_template('page-big-image-full-width.php') &&
    !is_page_template('page-big-image-max-width.php')
) { ?>
<section class="site-content container" id="content">
	<div class="row">
<?php } ?>