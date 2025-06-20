<?php
/**
 * KN Holdings functions and definitions
 *
 * @package QP3
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Include custom post types and taxonomies
 */
require get_template_directory() . '/inc/post-types/property.php';
require get_template_directory() . '/inc/media-library.php';
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function QP3_setup()
{
    /*
     * Make theme available for translation.
     */
    load_theme_textdomain('QP3', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'primary-menu' => esc_html__('Primary Menu', 'QP3'),
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
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'QP3_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     */
    add_theme_support(
        'custom-logo',
        array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        )
    );
}
add_action('after_setup_theme', 'QP3_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function QP3_content_width()
{
    $GLOBALS['content_width'] = apply_filters('QP3_content_width', 640);
}
add_action('after_setup_theme', 'QP3_content_width', 0);

/**
 * Register widget area.
 */
function QP3_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'QP3'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'QP3'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}
add_action('widgets_init', 'QP3_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function QP3_scripts()
{
    // Styles
    wp_enqueue_style('fullpage-css', get_template_directory_uri() . '/assets/fullpage/fullpage.min.css', array(), _S_VERSION);
    wp_enqueue_style('swiper-style', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), _S_VERSION);
    wp_enqueue_style('fancybox-css', get_template_directory_uri() . '/assets/css/fancybox.css', array(), _S_VERSION);

    // Main stylesheet compiled from SCSS
    if (file_exists(get_template_directory() . '/main.min.css')) {
        // Production: Use minified CSS
        wp_enqueue_style('QP3-main', get_template_directory_uri() . '/main.min.css', array(), filemtime(get_template_directory() . '/assets/css/main.min.css'));
    } else {
        // Development: Use regular CSS with sourcemaps
        wp_enqueue_style('QP3-main', get_template_directory_uri() . '/main.css', array(), filemtime(get_template_directory() . '/assets/css/main.css'));
    }

    // Legacy stylesheet support (can be removed once fully migrated)
    wp_enqueue_style('QP3-style', get_stylesheet_uri(), array(), filemtime(get_stylesheet_directory() . '/style.css'));
    
    // Property Type taxonomy stylesheet - removed because it's now in Sass
    
    // Scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('fullpage-js', get_template_directory_uri() . '/assets/fullpage/fullpage.min.js', array('jquery'), '3.1.1', true);
    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array('jquery'), '8.3.0', true);
    wp_enqueue_script('product-swiper-js', get_template_directory_uri() . '/assets/js/product-swiper.js', array('jquery', 'swiper-js'), '1.0', true);
    wp_enqueue_script('fancybox-js', get_template_directory_uri() . '/assets/js/fancybox.umd.js', array('jquery'), '4.0.10', true);
    
    // News tabs functionality
    wp_enqueue_script('news-tabs-js', get_template_directory_uri() . '/assets/js/news-tabs.js', array('jquery', 'swiper-js'), '1.0', true);
    
    // Blog functionality
    wp_enqueue_script('blog-js', get_template_directory_uri() . '/assets/js/blog.js', array('jquery', 'swiper-js'), '1.0', true);
    
    // Footer Single functionality (only on single post pages)
    if (is_single()) {
        wp_enqueue_script('footer-single-js', get_template_directory_uri() . '/assets/js/footer-single.js', array('jquery'), '1.0', true);
    }
    
    // Category page functionality
    if (is_category()) {
        wp_enqueue_script('category-js', get_template_directory_uri() . '/assets/js/category.js', array('jquery'), '1.0', true);
    }
    
    // Media Library gallery functionality - load on all pages since gallery can be anywhere
    wp_enqueue_script('media-library-js', get_template_directory_uri() . '/assets/js/media-library.js', array('jquery', 'fancybox-js'), '1.0', true);

    // Main script with Ajax support
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
    wp_localize_script('main-js', 'ajax', array(
        'url' => admin_url('admin-ajax.php')
    ));

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'QP3_scripts');

/**
 * Custom footer for single post pages
 */
function QP3_custom_footer() {
    if (is_single()) {
        get_template_part('footer', 'single');
        exit;
    }
}
add_action('get_footer', 'QP3_custom_footer');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
// require get_template_directory() . '/inc/template-functions.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}
