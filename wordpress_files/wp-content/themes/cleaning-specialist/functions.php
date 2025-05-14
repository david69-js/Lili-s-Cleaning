<?php
/**
 * Cleaning Specialist functions and definitions.
 *
 * @package Cleaning Specialist
 */

/**
 *  Defining Constants
 */

// Core Constants
define('CLEANING_SPECIALIST_REQUIRED_PHP_VERSION', '5.6' );
define('CLEANING_SPECIALIST_DIR_PATH', get_template_directory());
define('CLEANING_SPECIALIST_DIR_URI', get_template_directory_uri());
define('CLEANING_SPECIALIST_AUT','https://www.legacytheme.net/products/free-cleaning-wordpress-theme/');

if ( ! function_exists( 'cleaning_specialist_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cleaning_specialist_setup() {
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

     // support alig-wide
    add_theme_support( 'align-wide' );

    add_theme_support( "wp-block-styles" );

    load_theme_textdomain( 'cleaning-specialist', get_template_directory() . '/languages' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'cleaning-specialist' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(      
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    // Gallery post format
    add_theme_support( 'post-formats', array( 'gallery' ));

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'cleaning_specialist_setup' );

// custom header
    add_theme_support('custom-header', array(
            'width'                  => 1920, 
            'height'                 => 400,  
            'flex-height'            => true,
            'flex-width'             => true,
            'header-text'            => true, // Enable or disable header text
            'default-text-color'     => '000000', // Default header text color
            'wp-head-callback'       => 'cleaning_specialist_header_style',
        ) );

// custom-background
    add_theme_support( 'custom-background', array(
          'default-color' => 'ffffff',
        ));

// Style the header
function cleaning_specialist_header_style() {
    $cleaning_specialist_header_image = get_header_image();    
    $cleaning_specialist_header_text_color = get_header_textcolor();
   
     if (get_theme_support('custom-header', 'default-text-color') !== $cleaning_specialist_header_text_color || !empty($cleaning_specialist_header_image)) {
            ?>
        <style type="text/css" id="entr-header-css">
            <?php
            // Has a Custom Header been added?
            if (!empty($cleaning_specialist_header_image)) :
                ?>
                 #custom-header {
                    background-image: url(<?php header_image(); ?>);
                    background-repeat: no-repeat;
                    background-position: 50% 50%;
                    -webkit-background-size: cover;
                    -moz-background-size:    cover;
                    -o-background-size:      cover;
                    background-size:         cover;
                }
            <?php endif; ?> 
            <?php
                if ('blank' === $cleaning_specialist_header_text_color) :
                ?>
                    .site-title a,.site-description {
                        color: #<?php echo esc_attr( $cleaning_specialist_header_text_color ); ?>;
                    }
                <?php elseif ('' !== $cleaning_specialist_header_text_color) : ?>
                    .site-title a,.site-description {
                        color: #<?php echo esc_attr($cleaning_specialist_header_text_color); ?>;
                    }            
                <?php endif; ?>
        </style>
    <?php
        }
    }
// site-title-checkbox
// Remove "Display Site Title and Tagline" checkbox from Customizer
function cleaning_specialist_remove_header_text_display_checkbox( $wp_customize ) {
    $wp_customize->remove_control( 'display_header_text' ); // Removes the checkbox
}
add_action( 'customize_register', 'cleaning_specialist_remove_header_text_display_checkbox', 11 );

/**
* Custom logo
*/
function cleaning_specialist_logo_setup(){
    add_theme_support('custom-logo', array(
        'height' => 65,
        'width' => 350,
        'flex-height' => true,
        'flex-width' => true,
    ));
}
add_action('after_setup_theme', 'cleaning_specialist_logo_setup');

// logo-resizer
function cleaning_specialist_logo_dynamic_css() {
    $cleaning_specialist_logo_width = get_theme_mod( 'cleaning_specialist_logo_width', 150 );
    ?>
    <style type="text/css">
        .logo .custom-logo {
            max-width: <?php echo esc_attr( $cleaning_specialist_logo_width ); ?>px;
            height: auto;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'cleaning_specialist_logo_dynamic_css' );

// buttons
function cleaning_specialist_custom_button_styles() {
    $cleaning_specialist_radius = get_theme_mod( 'cleaning_specialist_button_border_radius', '5px' );
    $cleaning_specialist_padding = get_theme_mod( 'cleaning_specialist_button_padding', '8px 36px' );
    ?>
    <style type="text/css">
        .btn,
        .button,
        button,
        input[type="submit"],
        .wp-block-button__link,#blog-section .read-more a,.read-more a,a.hdr-clnr-btn.btn,a.hdr-call-btn.btn {
            border-radius: <?php echo esc_attr($cleaning_specialist_radius); ?>;
            padding: <?php echo esc_attr($cleaning_specialist_padding); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'cleaning_specialist_custom_button_styles' );

function cleaning_specialist_customize_fonts() {
    $cleaning_specialist_body_font = get_theme_mod('cleaning_specialist_body_font_family', 'Montserrat, sans-serif');
    $cleaning_specialist_heading_font = get_theme_mod('cleaning_specialist_heading_font_family', 'Montserrat, sans-serif');

    // Extract Google font names (e.g., Roboto from "Roboto, sans-serif")
    $cleaning_specialist_body_font_name = trim(explode(',', $cleaning_specialist_body_font)[0]);
    $cleaning_specialist_heading_font_name = trim(explode(',', $cleaning_specialist_heading_font)[0]);

    // Generate Google Fonts URL
    $cleaning_specialist_google_font_url = 'https://fonts.googleapis.com/css2?family=' . urlencode($cleaning_specialist_body_font_name) . '&family=' . urlencode($cleaning_specialist_heading_font_name) . '&display=swap';

    // Enqueue fonts
    wp_enqueue_style('cleaning-specialist-fonts', $cleaning_specialist_google_font_url, array(), null);

    // Custom inline style for font application
    $custom_css = "
        body, p, span, label, div {
            font-family: {$cleaning_specialist_body_font};
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: {$cleaning_specialist_heading_font};
        }
    ";
    wp_add_inline_style('cleaning-specialist-fonts', $custom_css);
}
add_action('wp_enqueue_scripts', 'cleaning_specialist_customize_fonts');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cleaning_specialist_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cleaning_specialist_content_width', 640 );
}
add_action( 'after_setup_theme', 'cleaning_specialist_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cleaning_specialist_widgets_init() {
	//Footer widget columns
    $cleaning_specialist_widget_num = absint(get_theme_mod( 'cleaning_specialist_footer_widgets', '4' ));
    for ( $i=1; $i <= $cleaning_specialist_widget_num; $i++ ) :
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Column', 'cleaning-specialist' ) . $i,
            'id'            => 'footer-' . $i,
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="section %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title" itemprop="name">',
            'after_title'   => '</h4>',
        ) );
    endfor;

    register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'cleaning-specialist' ),
		'id'            => 'primary-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'cleaning-specialist' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

     register_sidebar( array(
        'name'          => esc_html__( 'Sidebar 2', 'cleaning-specialist' ),
        'id'            => 'sidebar-2',
        'description'   => esc_html__( 'Add widgets here.', 'cleaning-specialist' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar 3', 'cleaning-specialist' ),
        'id'            => 'sidebar-3',
        'description'   => esc_html__( 'Add widgets here.', 'cleaning-specialist' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'cleaning_specialist_widgets_init' );

/** 
* Excerpt More
*/
function cleaning_specialist_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}
    return '&hellip;';
}
add_filter('excerpt_more', 'cleaning_specialist_excerpt_more');


/** 
* Custom excerpt length.
*/
function cleaning_specialist_excerpt_length() {
	$length= intval(get_theme_mod('cleaning_specialist_posts_excerpt_length',30));
    return $length;
}
add_filter('excerpt_length', 'cleaning_specialist_excerpt_length');

/*
script goes here
*/
function cleaning_specialist_scripts() {

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.3.3');
    wp_enqueue_style( 'bootstrap-icons', get_template_directory_uri() . '/css/bootstrap-icons.css', array(), '5.3.3');
    wp_enqueue_style( 'cleaning-specialist-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));
    wp_style_add_data('cleaning-specialist-style', 'rtl', 'replace');
	wp_enqueue_style( 'm-customscrollbar', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.css', array(), '3.1.5');    
    wp_enqueue_style( 'Montserrat-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap', array(), '1.0');       
    wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri() . '/css/owl.carousel' . '.css', array(), '2.3.4' );

     // Block stylesheet.
    wp_enqueue_style( 'cleaning-specialist-block-style', get_theme_file_uri( '/css/blocks-styles.css' ), array( 'cleaning-specialist-style' ), '1.0' );
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'), '1.3', true );
	
	wp_enqueue_script( 'resize-sensor', get_template_directory_uri() . '/js/ResizeSensor.js',array(),'1.0.0', true );
	wp_enqueue_script( 'm-customscrollbar-js', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.js',array(),'3.1.5', true );	
    
	wp_enqueue_script( 'html5shiv',get_template_directory_uri().'/js/html5shiv.js',array(), '3.7.3');
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'respond', get_template_directory_uri().'/js/respond.js' );
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), '5.3.3', true );

    wp_enqueue_script( 'cleaning-specialist-main-js', get_template_directory_uri() . '/js/main.js', array('jquery', 'customize-preview'), '1.0', true );
    wp_enqueue_script( 'owl-carouselscript', get_template_directory_uri() . '/js/owl.carousel' . '.js', array( 'jquery' ), '2.3.4', true );
    
}
add_action( 'wp_enqueue_scripts', 'cleaning_specialist_scripts' );

/**
* Custom search form
*/
function cleaning_specialist_search_form( $form ) {
    $form = '<form method="get" id="searchform" class="searchform" action="' . esc_url(home_url( '/' )) . '" >
    <div class="search">
      <input type="text" value="' . get_search_query() . '" class="blog-search" name="s" id="s" placeholder="'. esc_attr__( 'Search here','cleaning-specialist' ) .'">
      <label for="searchsubmit" class="search-icon"><i class="bi bi-search"></i></label>
      <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search','cleaning-specialist' ) .'" />
    </div>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'cleaning_specialist_search_form', 100 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function cleaning_specialist_pingback_header() {
    if ( is_singular() && pings_open() ) {
       printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
    }
}
add_action( 'wp_head', 'cleaning_specialist_pingback_header' );

// Add WooCommerce support to the theme
function cleaning_specialist_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'cleaning_specialist_add_woocommerce_support' );

// Change the number of product columns in WooCommerce shop page
function cleaning_specialist_change_woocommerce_shop_columns( $columns ) {
    $columns = 3; // Change this number to your desired column count (e.g., 2, 3, 4, etc.)
    return $columns;
}
add_filter( 'loop_shop_columns', 'cleaning_specialist_change_woocommerce_shop_columns', 999 );

// Track post views
function cleaning_specialist_set_post_views($postID) {
    $cleaning_specialist_count_key = 'cleaning_specialist_post_views_count';
    $cleaning_specialist_count = get_post_meta($postID, $cleaning_specialist_count_key, true);
    if ($cleaning_specialist_count == '') {
        $cleaning_specialist_count = 0;
        delete_post_meta($postID, $cleaning_specialist_count_key);
        add_post_meta($postID, $cleaning_specialist_count_key, '1');
    } else {
        $cleaning_specialist_count++;
        update_post_meta($postID, $cleaning_specialist_count_key, $cleaning_specialist_count);
    }
}

// Don't count views on preview/admin
function cleaning_specialist_track_post_views($post_id) {
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    cleaning_specialist_set_post_views($post_id);
}
add_action('wp_head', 'cleaning_specialist_track_post_views');


/**
 * Customizer additions.
 */
require get_parent_theme_file_path() . '/inc/customizer/customizer.php';

/**
 * Template functions
 */
require get_parent_theme_file_path() . '/inc/template-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path() . '/inc/template-tags.php';

/**
 * Custom template hooks for this theme.
 */
require get_parent_theme_file_path() . '/inc/template-hooks.php';

/**
 * Extra classes for this theme.
 */
require get_parent_theme_file_path() . '/inc/extras.php';

 /**getstart*/
require get_template_directory() . '/inc/cleaning-specialist-get-theme-info.php';

if ( ! function_exists( 'cleaning_specialist_admin_scripts' ) ) :
    function cleaning_specialist_admin_scripts($hook) {
        wp_enqueue_style( 'cleaning-specialist-get-theme-info-css', get_template_directory_uri() . '/css/cleaning-specialist-get-theme-info.css', false ); 
    }
endif;
add_action( 'admin_enqueue_scripts', 'cleaning_specialist_admin_scripts' );
/**
 * Upgrade to Pro
 */
require_once( trailingslashit( get_template_directory() ) . 'cleaning-specialist-pro/class-customize.php' );

/**
 * Notices
 */
require_once get_parent_theme_file_path( '/inc/activation-notice/class-welcome-notice.php' );

/**
 * Theme DEMO IMPORT.
 */
require get_template_directory() . '/inc/quick-start-page.php';

/**
 * Theme TGM.
 */
require get_template_directory() . '/inc/tgm/tgm.php';

// Add this function to  theme for the deprecated error
function get_page_id_by_title($title) {
    $query = new WP_Query(array(
        'post_type'      => 'page',
        'posts_per_page' => 1,
        'post_status'    => 'publish',
        's'              => $title,
    ));

    if ($query->have_posts()) {
        foreach ($query->posts as $post) {
            if (strcasecmp($post->post_title, $title) === 0) {
                return $post->ID;
            }
        }
    }

    return false; // Return false if not found
}