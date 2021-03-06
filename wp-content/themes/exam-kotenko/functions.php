<?php
/**
 * exam-kotenko functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package exam-kotenko
 */

if ( ! function_exists( 'exam_kotenko_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function exam_kotenko_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on exam-kotenko, use a find and replace
	 * to change 'exam-kotenko' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'exam-kotenko', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'exam-kotenko' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'exam_kotenko_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'exam_kotenko_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function exam_kotenko_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'exam_kotenko_content_width', 640 );
}
add_action( 'after_setup_theme', 'exam_kotenko_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function exam_kotenko_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'exam-kotenko' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'exam-kotenko' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'exam_kotenko_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function exam_kotenko_scripts() {
    wp_enqueue_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', true);
    wp_enqueue_style('gulp', get_template_directory_uri() . '/css/libs.min.css');
    wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_style('slick', get_template_directory_uri() . '/libs/slick/slick.css');
    wp_enqueue_style('slick', get_template_directory_uri() . '/libs/slick/slick-theme.css');

	wp_enqueue_style( 'exam-kotenko-style', get_stylesheet_uri() );

	wp_enqueue_script( 'exam-kotenko-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );


	wp_enqueue_script( 'exam-kotenko-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    wp_enqueue_script('gulp', get_template_directory_uri() . '/js/libs.min.js');
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js');
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/libs/slick/slick.min.js');

}
add_action( 'wp_enqueue_scripts', 'exam_kotenko_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

//LOGO
add_theme_support( 'custom-logo' );

// Creates Movie Reviews Custom Post Type Services
function services_reviews_init() {
    $args = array(
        'label' => 'Services',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'services-reviews'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type( 'services-reviews', $args );
}
add_action( 'init', 'services_reviews_init' );

// Creates Movie Reviews Custom Post Type Carousel
function carousel_reviews_init() {
    $args = array(
        'label' => 'Carousel',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'carousel-reviews'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type( 'carousel-reviews', $args );
}
add_action( 'init', 'carousel_reviews_init' );

// Creates Movie Reviews Custom Post Type Works
function works_reviews_init() {
    $args = array(
        'label' => 'Works',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'works-reviews'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type( 'works-reviews', $args );
}
add_action( 'init', 'works_reviews_init' );

// Pagination blog page
function custom_pagination($numpages = '', $pagerange = '', $paged='') {

    if (empty($pagerange)) {
        $pagerange = 2;
    }

    /**
     * This first part of our function is a fallback
     * for custom pagination inside a regular loop that
     * uses the global $paged and global $wp_query variables.
     *
     * It's good because we can now override default pagination
     * in our theme, and use this function in default quries
     * and custom queries.
     */
    global $paged;
    if (empty($paged)) {
        $paged = 1;
    }
    if ($numpages == '') {
        global $wp_query;
        $numpages = $wp_query->max_num_pages;
        if(!$numpages) {
            $numpages = 1;
        }
    }

    /**
     * We construct the pagination arguments to enter into our paginate_links
     * function.
     */
    $pagination_args = array(
        'base'            => get_pagenum_link(1) . '%_%',
        'format'          => 'page/%#%',
        'total'           => $numpages,
        'current'         => $paged,
        'show_all'        => False,
        'end_size'        => 1,
        'mid_size'        => $pagerange,
        'prev_next'       => True,
        'prev_text'       => __('&laquo;'),
        'next_text'       => __('&raquo;'),
        'type'            => 'plain',
        'add_args'        => false,
        'add_fragment'    => ''
    );

    $paginate_links = paginate_links($pagination_args);

    if ($paginate_links) {
        echo "<nav class='custom-pagination'>";
        echo $paginate_links;
        echo "</nav>";
    }
}

// Add section for title page
add_action('admin_menu', function(){
    add_theme_page('customize', 'customize', 'edit_theme_options', 'customize.php');
});

add_action('customize_register', function($customizer){
    $customizer->add_section(
        'example_section_one',
        array(
            'title' => 'Background for title page',
            'description' => 'Background',
            'priority' => 35,
        )
    );
    $customizer->add_setting(
        'copyright_textbox',
        array('default' => 'Title page')
    );
    $customizer->add_control(
        'copyright_textbox',
        array(
            'label' => 'Text',
            'section' => 'example_section_one',
            'type' => 'text',
        )
    );
    $customizer->add_setting('img-upload');
    $customizer->add_control(
        new WP_Customize_Image_Control(
            $customizer,
            'img-upload',
            array(
                'label' => 'Upload img',
                'section' => 'example_section_one',
                'settings' => 'img-upload'
            )
        )
    );
});

add_theme_support( 'post-thumbnails' );