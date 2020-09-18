<?php
/**
 * magnetic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package magnetic
 */

if ( ! defined( 'THEME_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( 'THEME_VERSION', '1.2' );
}

if ( ! function_exists( 'magnetic_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function magnetic_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on magnetic, use a find and replace
		 * to change 'magnetic' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'magnetic', get_template_directory() . '/languages' );

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
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Register custom image sizes.
		 */
		add_image_size( 'extra_large', 1400, 1400 );

		/*
		 * Add sizes for use in attachment display settings menu.
		 */
		add_filter('image_size_names_choose', 'custom_image_sizes' );
		function custom_image_sizes( $sizes ) {
			return array_merge( $sizes, array(
				'extra_large' => __( 'Extra Large', 'magnetic' )
			) );
		}

		/*
		 * Register main navigation menu.
		 */
		register_nav_menus(
		    array(
		    	'primary' => esc_html__( 'Primary', 'magnetic' ),
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
		 * Set up the WordPress core custom background feature.
		 */
		add_theme_support(
		    'custom-background',
            apply_filters(
                'magnetic_custom_background_args',
                array(
			        'default-color' => 'ffffff',
			        'default-image' => '',
		        )
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

		/*
		 * Change the excerpt 'more' link.
		 */
	   	function new_excerpt_more() {
		   global $post;
		   return '&hellip; <div class="more-wrap"><a href="'. get_permalink($post->ID) . '" title="Continue to ' . wp_kses_post( get_the_title() ) . '" class="more-link">' . wp_kses_post( get_the_title() ) . '</a></div>';
	   	}
	   	add_filter('excerpt_more', 'new_excerpt_more');

		/*
		 * Remove the WordPress version number from the HTML source.
		 */
		add_filter( 'the_generator', '__return_null' );
	}
endif;
add_action( 'after_setup_theme', 'magnetic_setup' );

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
function magnetic_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'magnetic_content_width', 2500 );
}
add_action( 'after_setup_theme', 'magnetic_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function magnetic_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage 1 Left Column', 'magnetic' ),
		'id'            => 'home-1-1',
		'description'   => esc_html__( 'First homepage section, left content area.', 'magnetic' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage 1 Right Column', 'magnetic' ),
		'id'            => 'home-1-2',
		'description'   => esc_html__( 'First homepage section, right content area.', 'magnetic' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage 2 Left Column', 'magnetic' ),
		'id'            => 'home-2-1',
		'description'   => esc_html__( 'Second homepage section, left content area.', 'magnetic' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage 2 Right Column', 'magnetic' ),
		'id'            => 'home-2-2',
		'description'   => esc_html__( 'Second homepage section, right content area.', 'magnetic' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage 3 Left Column', 'magnetic' ),
		'id'            => 'home-3-1',
		'description'   => esc_html__( 'Third homepage section, left content area.', 'magnetic' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage 3 Right Column', 'magnetic' ),
		'id'            => 'home-3-2',
		'description'   => esc_html__( 'Third homepage section, right content area.', 'magnetic' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage 4 Left Column', 'magnetic' ),
		'id'            => 'home-4-1',
		'description'   => esc_html__( 'Fourth homepage section, left content area.', 'magnetic' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage 4 Right Column', 'magnetic' ),
		'id'            => 'home-4-2',
		'description'   => esc_html__( 'Fourth homepage section, right content area.', 'magnetic' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage 5', 'magnetic' ),
		'id'            => 'home-5',
		'description'   => esc_html__( 'Fifth homepage section.', 'magnetic' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'magnetic' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'magnetic' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'magnetic' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'magnetic' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'magnetic' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'magnetic' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'magnetic' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'magnetic' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Text', 'magnetic' ),
		'id'            => 'footer-text',
		'description'   => esc_html__( 'Set footer text here.', 'magnetic' ),
		'before_widget' => '',
		'after_widget'  => '',
	) );
}
add_action( 'widgets_init', 'magnetic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function magnetic_scripts() {
    /*
     * Development mode
     * Use a random number for development to avoid browser caching the theme CSS while it's being worked on
     * (set $dev to true).
     * Could opt to use no query string for production to optimize static resource loading (set THEME_VERSION to null), however:
     * Query strings for static resources OK. See: https://sirv.com/help/resources/remove-query-strings-from-static-resources/
     */
    $dev = false;
    $resource_version = ($dev === true) ? rand() : THEME_VERSION;

    /*
     * Header scripts and styles
     * Bootstrap grid, plugins, other
     */
    // ALTERNATE, full Bootstrap: wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), '4.1.3' );
	// Bootstrap grid only:
	wp_enqueue_style( 'bootstrap-grid', get_stylesheet_directory_uri() . '/css/bootstrap-grid.min.css', array(), '4.1.3' );

	// ALTERNATE, earlier Font Awesome: wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0' );
    wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.1.1/css/all.css', array(), '5.1.1' );

	// custom plugin styles: could opt to put in header-{custom}.php files for select pages, or use template conditionals here
    // EXAMPLE: wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/css/your-custom.css', array(), '1.0.0' );

	// Google fonts
	wp_enqueue_style( 'roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700', array() );

    // magnetic/main site styles (follows Bootstrap & plugins in case any overrides in main site styles)
    wp_enqueue_style( 'main', get_stylesheet_uri(), array(), $resource_version );

    // Modernizr (Minimal build. Configure your own at: https://modernizr.com/)
    wp_enqueue_script( 'modernizr_js', get_template_directory_uri() . '/js/modernizr-custom.js', array(), '3.6.0' );

    /*
     * Footer scripts
     * jQuery note: Remove the 'jquery' dependency from Bootstrap and others to load a custom jQuery version in the footer
     * (not the bundled WP version in header). Many plugins will require jQuery and the bundled WP version will get loaded
     * in the header. If that's the case, DO NOT use the jQuery line below to avoid loading it twice. Try this only if you
     * have full control over the environment and you're trying to fine tune everything.
     */
	// OPTIONAL: wp_enqueue_script( 'jquery_js', get_template_directory_uri() . '/js/jquery.min.js', array(), '3.3.1', TRUE );
	// OPTIONAL: wp_enqueue_script( 'popper_js', get_template_directory_uri() . '/js/popper.min.js', array(), '1.14.3', TRUE );
	// OPTIONAL: wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.1.0', TRUE );

	// plugin scripts, followed by main site script
	wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/js/smoothscroll.min.js', array(), '0.4.4', TRUE );
	wp_enqueue_script( 'hoverintent', get_template_directory_uri() . '/js/hoverintent.js', array(), 'r7', TRUE );
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.min.js', array(), '1.7.10', TRUE );
	wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/main.js', array('jquery'), $resource_version, TRUE );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'magnetic_scripts' );

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
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/*
 * Remove WordPress emoji script from head. OPTIONAL, for fine-tuning.
 */
/*
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
*/