<?php
/**
 * Magnetic WP functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Magnetic WP
 */

if ( ! function_exists( 'magnetic_wp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function magnetic_wp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Magnetic WP, use a find and replace
		 * to change 'magnetic-wp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'magnetic-wp', get_template_directory() . '/languages' );

		/*
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Gutenberg opt-in
		 */
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'editor-style.css' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Register custom image sizes.
		 */
		add_image_size( 'magnetic_wp_extra_large', 1400, 1400 );

		/*
		 * Add sizes for use in attachment display settings menu.
		 */
		add_filter('image_size_names_choose', 'magnetic_wp_custom_image_sizes' );
		function magnetic_wp_custom_image_sizes( $sizes ) {
			return array_merge( $sizes, array(
				'magnetic_wp_extra_large' => __( 'Extra Large', 'magnetic-wp' )
			) );
		}

		/*
		 * Register main navigation menu.
		 */
		register_nav_menus(
		    array(
		    	'primary' => esc_html__( 'Primary', 'magnetic-wp' ),
		    )
        );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
		    'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script'
            )
        );

		/*
		 * Add theme support for selective refresh for widgets.
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
		    'custom-logo',
            array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
            )
        );
	}
endif;
add_action( 'after_setup_theme', 'magnetic_wp_setup' );

/**
 * Change the excerpt 'more' link.
 */
function magnetic_wp_excerpt_more( $more ) {
   // if within the WP admin, return the more tag
   if ( is_admin() ) {
	  return $more;
   }
   // modify and return the more link
	return sprintf( '&hellip;<div class="more-wrap"><a href="%1$s" class="more-link">%2$s</a></div>',
		esc_url( get_permalink( get_the_ID() ) ),
		// translators: continue reading post title
		sprintf( __( 'Continue to %s', 'magnetic-wp' ), esc_html( get_the_title( get_the_ID() ) ) )
	);
}
add_filter('excerpt_more', 'magnetic_wp_excerpt_more');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * Set this to a larger size. Image responsiveness handled via CSS in this theme.
 *
 * https://codex.wordpress.org/Content_Width
 * https://wycks.wordpress.com/2013/02/14/why-the-content_width-wordpress-global-kinda-sucks/
 */
function magnetic_wp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'magnetic_wp_content_width', 2500 ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
}
add_action( 'after_setup_theme', 'magnetic_wp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function magnetic_wp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage 1 Left Column', 'magnetic-wp' ),
		'id'            => 'home-1-1',
		'description'   => esc_html__( 'First homepage section, left content area.', 'magnetic-wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage 1 Right Column', 'magnetic-wp' ),
		'id'            => 'home-1-2',
		'description'   => esc_html__( 'First homepage section, right content area.', 'magnetic-wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage 2 Left Column', 'magnetic-wp' ),
		'id'            => 'home-2-1',
		'description'   => esc_html__( 'Second homepage section, left content area.', 'magnetic-wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage 2 Right Column', 'magnetic-wp' ),
		'id'            => 'home-2-2',
		'description'   => esc_html__( 'Second homepage section, right content area.', 'magnetic-wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage 3 Left Column', 'magnetic-wp' ),
		'id'            => 'home-3-1',
		'description'   => esc_html__( 'Third homepage section, left content area.', 'magnetic-wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage 3 Right Column', 'magnetic-wp' ),
		'id'            => 'home-3-2',
		'description'   => esc_html__( 'Third homepage section, right content area.', 'magnetic-wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage 4 Left Column', 'magnetic-wp' ),
		'id'            => 'home-4-1',
		'description'   => esc_html__( 'Fourth homepage section, left content area.', 'magnetic-wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage 4 Right Column', 'magnetic-wp' ),
		'id'            => 'home-4-2',
		'description'   => esc_html__( 'Fourth homepage section, right content area.', 'magnetic-wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage 5', 'magnetic-wp' ),
		'id'            => 'home-5',
		'description'   => esc_html__( 'Fifth homepage section.', 'magnetic-wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'magnetic-wp' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'magnetic-wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'magnetic-wp' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'magnetic-wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'magnetic-wp' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'magnetic-wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'magnetic-wp' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'magnetic-wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Text', 'magnetic-wp' ),
		'id'            => 'footer-text',
		'description'   => esc_html__( 'Set footer text here.', 'magnetic-wp' ),
		'before_widget' => '',
		'after_widget'  => '',
	) );
}
add_action( 'widgets_init', 'magnetic_wp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function magnetic_wp_scripts() {
    /*
     * Development mode
     * Set $dev to true to load unminified JS for debugging.
     */
    $dev = false;
    $min_version = ($dev === true) ? '' : '.min';
    $theme_dir = get_template_directory();
    $theme_uri = get_template_directory_uri();

    /*
     * Header scripts and styles
     * Bootstrap grid, plugins, other
     */
	// Bootstrap grid only (v4.6.2 — could be upgraded to Bootstrap 5.x in a future release):
	wp_enqueue_style( 'bootstrap-grid', get_stylesheet_directory_uri() . '/bootstrap/bootstrap-grid.min.css', array(), '4.6.2' );
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/fontawesome/css/all.min.css', array(), '6.7.2' );

	// Enqueue theme fonts
	wp_enqueue_style( 'magnetic_wp-fonts', $theme_uri . '/assets/css/font-roboto.css', array(), filemtime( $theme_dir . '/assets/css/font-roboto.css' ), 'all' );

    // Magnetic WP/main site styles (follows Bootstrap & plugins in case any overrides in main site styles)
    wp_enqueue_style( 'magnetic-wp-style', get_stylesheet_uri(), array(), filemtime( get_stylesheet_directory() . '/style.css' ) );

    /*
     * Footer scripts
     */
	// plugin scripts, followed by main site script
	wp_enqueue_script( 'jquery-hoverintent', $theme_uri . '/js/hoverintent.js', array('jquery'), 'r7', array( 'strategy' => 'defer', 'in_footer' => true ) );
	wp_enqueue_script( 'jquery-superfish', $theme_uri . '/js/superfish.min.js', array('jquery'), '1.7.10', array( 'strategy' => 'defer', 'in_footer' => true ) );
	wp_enqueue_script( 'magnetic-wp-script', $theme_uri . '/js/main' . $min_version . '.js', array('jquery'), filemtime( $theme_dir . '/js/main' . $min_version . '.js' ), array( 'strategy' => 'defer', 'in_footer' => true ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'magnetic_wp_scripts' );

/**
 * Remove the 'no-js' class on the document element.
 *
 * Hooked early to wp_head so it runs before any styles are parsed.
 */
function magnetic_wp_no_js_script() {
	echo '<script>document.documentElement.classList.remove("no-js");</script>' . "\n";
}
add_action( 'wp_head', 'magnetic_wp_no_js_script', 1 );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Block patterns.
 */
require get_template_directory() . '/inc/block-patterns.php';
