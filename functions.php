<?php
/**
 * UnderStrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
	'/vc_functions/vc_functions.php',       // Load Visual Composer custom elements.

	'/Insights.php',
	'/InsightsList.php',
);

// Understrap

foreach ( $understrap_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}

// Testimonials post type function
function create_testimonials_posttype() {

    register_post_type( 'testimonials',
        array(
            'labels' => array(
                'name' => __( 'Testimonials' ),
                'singular_name' => __( 'Testimonials' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'testimonials'),
            'supports' => array( 'title', 'editor', 'thumbnail' ),
        )
    );

    $labels = array(
		'name'                       => _x( 'Category', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Category', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'testimonials_category', array( 'testimonials' ), $args );
}
add_action( 'init', 'create_testimonials_posttype' );


add_shortcode('testimonials-widget', function () {
    ob_start();
    get_template_part('inc/custom-shortcodes/testimonials-shortcode');
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
});

add_shortcode('homepage-insights-widget', function () {
    ob_start();
    get_template_part('inc/custom-shortcodes/home-insights-shortcode');
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
});

add_shortcode('internal-insights-widget', function () {
    ob_start();
    get_template_part('inc/custom-shortcodes/related-insights-shortcode');
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
});

function infusemedia_setup() {
    add_theme_support('custom-logo');
}

add_action('after_setup_theme', 'infusemedia_setup');

function theme_prefix_the_custom_logo() {

	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}

}

function register_my_menus() {
    register_nav_menus(
      array(
        'footer-menu' => __( 'Footer Menu' ),
        'footer-secondary-menu-middle' =>  __( 'Footer Secondy Menu Middle' ),
        'footer-secondary-menu-right' =>  __( 'Footer Secondy Menu Right' )
      )
    );
  }
  add_action( 'init', 'register_my_menus' );

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page( array(
        'page_title' => 'Theme General Settigns',
        'menu_title' => 'Theme Settings',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect'   => false
    ));
    acf_add_options_page( array(
        'page_title' => 'Theme Header Settigns',
        'menu_title' => 'Header',
        'parent_slug'  => 'theme-general-settings'
    ));
    acf_add_options_page( array(
        'page_title' => 'Theme Footer Settigns',
        'menu_title' => 'Footer',
        'parent_slug'  => 'theme-general-settings'
    ));
}

function wpb_adding_scripts() {

wp_register_script('ResizeSenzor', get_template_directory_uri() . '/src/js/ResizeSenzor.js' , array('jquery'),'1.1', true);

wp_enqueue_script('ResizeSenzor');
}

add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' );

// Clients post type function
function create_clients_posttype() {

    register_post_type( 'clients',
        array(
            'labels' => array(
                'name' => __( 'Clients' ),
                'singular_name' => __( 'Client' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'clients'),
            'supports' => array( 'title', 'thumbnail' ),
        )
    );
}
add_action( 'init', 'create_clients_posttype' );


add_shortcode('clients-widget', function () {
    ob_start();
    get_template_part('inc/custom-shortcodes/clients-shortcode');
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
});


// Insights post type function
function create_insights_posttype() {

    register_post_type( 'Insights',
        array(
            'labels' => array(
                'name' => __( 'Insights' ),
                'singular_name' => __( 'Insight' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'Insight'),
            'supports' => array( 'title', 'thumbnail' ),
            'taxonomies' => array( 'category', 'post_tag' )
        )
    );
}
add_action( 'init', 'create_insights_posttype' );



function infuse2020_vc_fonts( $fonts_list ) {
    $muli->font_family = 'Muli';
    $muli->font_types =    '200 Extra-light regular:200:normal,
                            200 Extra-light italic:200:italic,
                            300 Light regular:300:normal,
                            300 Light italic:300:italic,
                            400 Regular:400:normal,
                            400 Regular italic:400:italic,
                            500 Medium regular:500:normal,
                            500 Medium italic:500:italic,
                            600 Semi-bold regular:600:normal,
                            600 Semi-bold italic:600:italic,
                            700 Bold regular:700:normal,
                            700 Bold italic:700:italic,
                            800 Extra-bold regular:800:normal,
                            800 Extra-bold italic:800:italic,
                            900 Black regular:900:normal,
                            900 Black italic:900:italic';
    $muli->font_styles = 'regular';
    $muli->font_family_description = esc_html_e( 'Select font family', 'helper' );
    $muli->font_style_description = esc_html_e( 'Select font styling', 'helper' );

    return array_merge([$muli], $fonts_list);
}
add_filter('vc_google_fonts_get_fonts_filter', 'infuse2020_vc_fonts');

add_action('wp_logout','ps_redirect_after_logout');
function ps_redirect_after_logout(){
         wp_redirect( '/wp-admin' );
         exit();
}
function create_reviews_posttype() {

    register_post_type( 'reviews',
        array(
            'labels' => array(
                'name' => __( 'Reviews' ),
                'singular_name' => __( 'Reviews' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'reviews'),
            'supports' => array( 'title', 'editor', 'thumbnail' ),
        )
    );

    $labels = array(
        'name'                       => _x( 'Category', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Category', 'text_domain' ),
        'all_items'                  => __( 'All Items', 'text_domain' ),
        'parent_item'                => __( 'Parent Item', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
        'new_item_name'              => __( 'New Item Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Item', 'text_domain' ),
        'edit_item'                  => __( 'Edit Item', 'text_domain' ),
        'update_item'                => __( 'Update Item', 'text_domain' ),
        'view_item'                  => __( 'View Item', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Items', 'text_domain' ),
        'search_items'               => __( 'Search Items', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No items', 'text_domain' ),
        'items_list'                 => __( 'Items list', 'text_domain' ),
        'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'reviews_category', array( 'reviews' ), $args );
}
add_action( 'init', 'create_reviews_posttype' );

add_shortcode('reviews-widget', function () {
    ob_start();
    get_template_part('inc/custom-shortcodes/reviews-shortcode');
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
});

function ourstory_style()
{
	 $r=rand(0,100000000);
	wp_enqueue_style( 'os-css1', '/wp-content/themes/infusemedia/our-story/libs/locomotive-scroll/locomotive-scroll.min.css');
	wp_enqueue_style( 'os-css2', '/wp-content/themes/infusemedia/our-story/css/story.css?'.$r);
}

function ourstory_script()
{


		wp_enqueue_script( 'os-js', '/wp-content/themes/infusemedia/our-story/libs/slick/slick.js');
		wp_enqueue_script( 'os-js1', '/wp-content/themes/infusemedia/our-story/libs/fancybox/fancybox.js');
		wp_enqueue_script( 'os-js2', '/wp-content/themes/infusemedia/our-story/libs/readmore/readmore.js');
		wp_enqueue_script( 'os-js3', '/wp-content/themes/infusemedia/our-story/libs/dotdotdot/dotdotdot.js');
		wp_enqueue_script( 'os-js4', '/wp-content/themes/infusemedia/our-story/libs/locomotive-scroll/gsap-latest.min.js');
		wp_enqueue_script( 'os-js5', '/wp-content/themes/infusemedia/our-story/libs/locomotive-scroll/ScrollTrigger.min.js');
		wp_enqueue_script( 'os-js6', '/wp-content/themes/infusemedia/our-story/libs/locomotive-scroll/locomotive-scroll.min.js');
		wp_enqueue_script( 'os-js7', '/wp-content/themes/infusemedia/our-story/libs/device.js/device.min.js');
}

function vs_style()
{
	 $r=rand(0,100000000);
	//wp_enqueue_style( 'vs-css', '/wp-content/themes/infusemedia/frontend/css/vs/guides.css?'.$r);
	//wp_enqueue_style( 'vs-css2', '/wp-content/themes/infusemedia/frontend/css/vs/article-vs.css?'.$r);
	//wp_enqueue_style( 'vs-css3', '/wp-content/themes/infusemedia/frontend/css/vs/styles.css?'.$r);
}
$url=$_SERVER["REQUEST_URI"];
//echo "url=$url";
if (strpos($url, '/16247/') !== false)
{
add_action( 'wp_enqueue_scripts', 'vs_style');
}
if (strpos($url, '/our-story/') !== false)
{

add_action( 'wp_enqueue_scripts', 'ourstory_style');
add_action( 'wp_enqueue_scripts', 'ourstory_script');
remove_filter( 'the_content', 'wpautop' );
remove_filter('the_excerpt', 'wpautop');
}
remove_filter( 'the_content', 'wpautop' );
remove_filter('the_excerpt', 'wpautop');
add_filter( 'body_class', 'our_story_body_class');
function our_story_body_class( $classes ) {
$url=$_SERVER["REQUEST_URI"];
if($url=='/our-story/'){

          $classes[] = 'page-template-default';
          }
     return $classes;
}
function guide_new_style()
{
   wp_enqueue_style( 'os-css', '/wp-content/themes/infusemedia/frontend/css/guides-new.css');
   wp_enqueue_script( 'os-js-guide', '/wp-content/themes/infusemedia/frontend/libs/overlayscrollbars/jquery.overlayScrollbars.min.js' );
}
$isguide=0;
if($url=='/insight/b2b-lead-generation-and-demand-generation-strategies-for-2020/') {$isguide=1;}
if($url=='/latam/insight/b2b-lead-generation-and-demand-generation-strategies-for-2020/') {$isguide=1;}

//if($isguide)
//{

add_action( 'wp_enqueue_style', 'guide_new_style');

add_image_size( 'search-thumb', 68, 68, true ); // Hard Crop Mode
//}
