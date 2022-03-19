<?php
/**
 * UnderStrap enqueue scripts
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_scripts' ) ) {
    /**
     * Load theme's JavaScript and CSS sources.
     */
    function understrap_scripts() {
        global $post;

        $the_theme = wp_get_theme();
        $theme_version = $the_theme->get('Version');
        wp_enqueue_style('new-styles', get_template_directory_uri() . '/frontend/css/new.css', array(), $theme_version);
        if(!is_front_page()) {
            if ($post && get_field('disable_page_builder', $post->ID)) {
                wp_enqueue_style('understrap-styles', get_template_directory_uri() . '/css/theme.redesign.min.css', array(), $theme_version);
            } else {
                wp_enqueue_style('understrap-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $theme_version);
            }
        }
        if ($post && get_field('guide', $post->ID)) {
        	wp_dequeue_style('understrap-styles');
            wp_enqueue_style('overlay-scrollbars', get_template_directory_uri() . '/frontend/libs/overlayscrollbars/OverlayScrollbars.min.css', array(), $theme_version);
            wp_enqueue_script('overlay-scrollbars', get_template_directory_uri() . '/frontend/libs/overlayscrollbars/jquery.overlayScrollbars.min.js', array(), $theme_version, true);

        }
        if(get_post_meta( $post->ID, '_wp_page_template', true ) == "page-templates/our-story.php"){
            wp_dequeue_style('understrap-styles');
        }
        wp_enqueue_script('jquery');
        wp_enqueue_script('understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $theme_version, true);
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
        wp_enqueue_script('js-cookie', get_template_directory_uri() . '/src/js/js.cookie.min.js', array(), $theme_version, true);
        wp_enqueue_style('fonts-roboto', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');
        wp_enqueue_style('fonts-mulish', 'https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap');
        wp_enqueue_style('normalize', get_template_directory_uri() . '/frontend/libs/normalize/normalize.css', array(), $theme_version);

        if (($post && get_field('disable_page_builder', $post->ID)) || is_front_page()) {
            wp_enqueue_style('styles-frontend', get_template_directory_uri() . '/frontend/css/styles.css', array(), $theme_version);
        }
        if ($post && get_field('disable_page_builder', $post->ID)) {
            if(!get_field("guide", $post->ID)) {
                wp_enqueue_script('slick', get_template_directory_uri() . '/frontend/libs/slick/slick.js', array(), $theme_version, true);
                wp_enqueue_style('slick', get_template_directory_uri() . '/frontend/libs/slick/slick.css', array(), $theme_version);
                wp_enqueue_script('fancybox', get_template_directory_uri() . '/frontend/libs/fancybox/fancybox.js', array(), $theme_version, true);
                wp_enqueue_style('fancybox', get_template_directory_uri() . '/frontend/libs/fancybox/fancybox.css', array(), $theme_version);
                wp_enqueue_script('readmore', get_template_directory_uri() . '/frontend/libs/readmore/readmore.js', array(), $theme_version, true);
                wp_enqueue_script('dotdotdot', get_template_directory_uri() . '/frontend/libs/dotdotdot/dotdotdot.js', array(), $theme_version, true);
            }
        }
        if($post && in_array($post->post_name,  ['our-reviews', 'leadership', 'insights'])) {
            wp_enqueue_style('overlay-scrollbars', get_template_directory_uri() . '/frontend/libs/overlayscrollbars/OverlayScrollbars.min.css', array(), $theme_version);
            wp_enqueue_script('overlay-scrollbars', get_template_directory_uri() . '/frontend/libs/overlayscrollbars/jquery.overlayScrollbars.min.js', array(), $theme_version, true);
            wp_enqueue_script('slick', get_template_directory_uri() . '/frontend/libs/slick/slick.js', array(), $theme_version, true);
            wp_enqueue_style('slick', get_template_directory_uri() . '/frontend/libs/slick/slick.css', array(), $theme_version);
        }
        wp_enqueue_style('styles-layout', get_template_directory_uri() . '/frontend/css/layout.css', array(), $theme_version);
        wp_enqueue_style('vf', get_template_directory_uri() . '/frontend/css/vf.css', array(), $theme_version);

        if ($post && get_field("guide", $post->ID)) {
        	wp_enqueue_style('guide-styles', get_template_directory_uri() . '/frontend/css/guides.css', array(), $theme_version);
            wp_enqueue_style('guide-new-styles', get_template_directory_uri() . '/frontend/css/guides-new.css', array(), $theme_version);
            wp_enqueue_style('guide-vs-styles', get_template_directory_uri() . '/frontend/css/vs/guides.css', array(), $theme_version);

        }
        if ($post && $post->post_name == 'who-we-serve' ) {
        	wp_enqueue_style('who-we-serve-styles', get_template_directory_uri() . '/frontend/css/serve.css', array(), $theme_version);
            wp_dequeue_style('understrap-styles');
 			wp_enqueue_script('typed', get_template_directory_uri() . '/frontend/libs/typed/typed.js', array(), $theme_version, true);
            wp_enqueue_script('page-serve-scripts', get_template_directory_uri() . '/frontend/js/page.serve.js', array(), $theme_version, true);
        }

        wp_enqueue_script('scripts', get_template_directory_uri() . '/frontend/js/scripts.js', array(), $theme_version, true);
        $translation_array = ['themeUrl' => get_stylesheet_directory_uri()];
        wp_localize_script( 'scripts', 'data', $translation_array );

        wp_enqueue_script('newjs', get_template_directory_uri() . '/frontend/js/new.js', array(), $theme_version);
        wp_enqueue_style('search', get_template_directory_uri() . '/frontend/css/search.css', array(), $theme_version);
        wp_enqueue_script('search', get_template_directory_uri() . '/js/search.js', array(), $theme_version, true);

    }
} // End of if function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );
