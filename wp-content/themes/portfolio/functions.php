<?php
/**
 * portfolio functions and definitions
 *
 * @package portfolio
 */
 
/**
 * register the theme update
 */ 
require 'theme-updates/theme-update-checker.php';
$MyThemeUpdateChecker = new ThemeUpdateChecker(
'portfolio', //Theme slug. Usually the same as the name of its directory.
'http://modernthemes.net/updates/?action=get_metadata&slug=portfolio' //Metadata URL.
);

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'portfolio_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function portfolio_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on portfolio, use a find and replace
	 * to change 'portfolio' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'portfolio', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'small-square', 400, 400, array( 'center', 'center' ) );
	add_image_size( 'large-square', 650, 600, array( 'center', 'center' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'portfolio' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );


	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'portfolio_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // portfolio_setup
add_action( 'after_setup_theme', 'portfolio_setup' );

/**
 * Load Google Fonts.
 */
function load_fonts() {
            wp_register_style('googleFonts', '//fonts.googleapis.com/css?family=Raleway:800|Oswald:300|Libre+Baskerville:400,400italic,700');  
            wp_enqueue_style( 'googleFonts');
        }
    
    add_action('wp_print_styles', 'load_fonts');
	
/**
* Register and load font awesome CSS files using a CDN.
*
* @link http://www.bootstrapcdn.com/#fontawesome
* @author FAT Media 
*/
	
add_action( 'wp_enqueue_scripts', 'portfolio_enqueue_awesome' );

function portfolio_enqueue_awesome() {
wp_enqueue_style( 'portfolio-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css', array(), '4.6.0' );
}

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function portfolio_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'portfolio' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div class="col-1-3"><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></div>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	//Register the sidebar widgets   
	register_widget( 'portfolio_Video_Widget' ); 
	register_widget( 'portfolio_Contact_Info' ); 
	
}
add_action( 'widgets_init', 'portfolio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function portfolio_scripts() {
	wp_enqueue_style( 'portfolio-style', get_stylesheet_uri() );
	
	$headings_font = esc_html(get_theme_mod('headings_fonts')); 
	$body_font = esc_html(get_theme_mod('body_fonts')); 
	
	if( $headings_font ) {
		wp_enqueue_style( 'portfolio-headings-fonts', '//fonts.googleapis.com/css?family='. $headings_font );	
	} else {
		wp_enqueue_style( 'portfolio-libre', '//fonts.googleapis.com/css?family=Libre+Baskerville:400,400italic,700'); 
	}	
	if( $body_font ) {
		wp_enqueue_style( 'portfolio-body-fonts', '//fonts.googleapis.com/css?family='. $body_font );	
	} else {
		wp_enqueue_style( 'portfolio-body-libre', '//fonts.googleapis.com/css?family=Libre+Baskerville:400,400italic,700'); 
	}
	
	wp_enqueue_style( 'portfolio-pushMenu', get_template_directory_uri() . '/css/jPushMenu.css' );
	
	if ( file_exists( get_stylesheet_directory_uri() . '/inc/my_style.css' ) ) {
	wp_enqueue_style( 'portfolio-mystyle', get_stylesheet_directory_uri() . '/inc/my_style.css', array(), false, false );
	} 
	
	if ( is_admin() ) {
    wp_enqueue_style( 'portfolio-codemirror', get_stylesheet_directory_uri() . '/css/codemirror.css', array(), '1.0' ); 
	} 
	
	if ( get_theme_mod('portfolio_animate') != 1 ) {
		
		wp_enqueue_script( 'portfolio-wow', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), true ); 
		wp_enqueue_style( 'portfolio-animate-css', get_stylesheet_directory_uri() . '/css/animate.css', array() );
		wp_enqueue_script( 'portfolio-wow-init', get_template_directory_uri() .  '/js/wow-init.js', array( 'jquery' ), true );
	}  
	
	wp_enqueue_script( 'portfolio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'portfolio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'portfolio-parallax', get_template_directory_uri() . '/js/parallax.js', array('jquery'), false, false );
	wp_enqueue_script( 'portfolio-pushMenu', get_template_directory_uri() . '/js/jPushMenu.js', array('jquery'), false, true );
	wp_enqueue_script( 'portfolio-codemirrorJS', get_template_directory_uri() . '/js/codemirror.js', array(), false, true);
	wp_enqueue_script( 'portfolio-cssJS', get_template_directory_uri() . '/js/css.js', array(), false, true);
	wp_enqueue_script( 'portfolio-placeholder', get_template_directory_uri() . '/js/jquery.placeholder.js', array('jquery'), false, true); 
 	wp_enqueue_script( 'portfolio-placeholdertext', get_template_directory_uri() . '/js/placeholdertext.js', array('jquery'), false, true);
	wp_enqueue_script( 'portfolio-buggyfill', get_template_directory_uri() . '/js/viewport-units-buggyfill.js', array(), false, true );
	
	if ( is_page_template( 'page-contact.php' ) ) { 
	wp_enqueue_script( 'portfolio-validate', get_template_directory_uri() . '/js/jquery.validate.min.js', array('jquery'), false, true);
	wp_enqueue_script( 'portfolio-verify', get_template_directory_uri() . '/js/verify.js', array('jquery'), false, true);  
	} 

	wp_enqueue_script( 'portfolio-scripts', get_template_directory_uri() . '/js/portfolio.scripts.js', array(), false, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'portfolio_scripts' );

/**
 * Load html5shiv
 */
function portfolio_html5shiv() {
    echo '<!--[if lt IE 9]>' . "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action( 'wp_head', 'portfolio_html5shiv' ); 

/**
 * Change the excerpt length
 */
function portfolio_excerpt_length( $length ) {
	
	$excerpt = get_theme_mod('exc_length', '30');
	return $excerpt; 

}

add_filter( 'excerpt_length', 'portfolio_excerpt_length', 999 );


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
 * Include additional custom admin panel features. 
 */
require get_template_directory() . '/panel/functions-admin.php';
require get_template_directory() . '/panel/theme-admin_page.php'; 

/**
 * Google Fonts  
 */
require get_template_directory() . '/inc/gfonts.php';

/**
 * Include additional custom features.
 */
require get_template_directory() . '/inc/my-custom-css.php';
require get_template_directory() . '/inc/socialicons.php';

/**
 * register your custom widgets
 */ 
require get_template_directory() . "/widgets/contact-info.php";
require get_template_directory() . "/widgets/video-widget.php";

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Activate for a child theme.  Always use a child theme to make edits.
 */
require_once( trailingslashit( get_template_directory() ) . '/inc/use-child-theme.php' );

/**
 * Add work custom post type to post archive.
 */
function portfolio_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'nav_menu_item', 'work'
		));
	  return $query;
	}
}
add_filter( 'pre_get_posts', 'portfolio_add_custom_types' );

/**
 * Work Post Type.
 */
function work_post_type() {

	$labels = array(
		'name'                => _x( 'Work', 'Post Type General Name', 'portfolio' ), 
		'singular_name'       => _x( 'Work', 'Post Type Singular Name', 'portfolio' ),
		'menu_name'           => __( 'Works', 'portfolio' ),
		'parent_item_colon'   => __( 'Parent Item:', 'portfolio' ),
		'all_items'           => __( 'All Work', 'portfolio' ),
		'view_item'           => __( 'View Works', 'portfolio' ),
		'add_new_item'        => __( 'Add New Item', 'portfolio' ),
		'add_new'             => __( 'Add New', 'portfolio' ),
		'edit_item'           => __( 'Edit Work', 'portfolio' ),
		'update_item'         => __( 'Update Work', 'portfolio' ),
		'search_items'        => __( 'Search Works', 'portfolio' ),
		'not_found'           => __( 'Not found', 'portfolio' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'portfolio' ), 
	);
	$args = array(
		'label'               => __( 'work', 'portfolio' ),
		'description'         => __( 'Add work to your portfolio.', 'portfolio' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'editor', 'comments' ),
		'taxonomies'          => array( 'thumbnail', 'category' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'work', $args );

}

// Hook into the 'init' action
add_action( 'init', 'work_post_type', 0 );	

function work_metaboxes( $meta_boxes ) {
    $prefix = '_wk_'; // Prefix for all fields
    $meta_boxes['work_metabox'] = array(
        'id' => 'work_metabox',
        'title' => 'Sticky Post',
        'pages' => array('work', 'post'), // post type
        'context' => 'side',
        'priority' => 'low',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
    			'name' => 'Stick This Post To Front Page',
    			'id' => $prefix . 'work_checkbox',
    			'type' => 'checkbox'
			),
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'work_metaboxes' );

add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( 'meta/init.php' );
    }
}