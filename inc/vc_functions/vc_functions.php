<?php
/**
 * Functions and definitions for WP Bakery (former Visual Studio) plugin
 *
 * PHP version 7
 *
 * @category  PHP
 * @package   Del-One Helper
 * @author    inSegment inc <developer.insegment@gmail.com>
 * @copyright 2018 inSegment
 */


/**
 * Removes the assets for preattyphoto library.
 * We are using different lightbox library
 *
 * @return void
 */
function remove_vc_scripts()
{
    wp_deregister_script('prettyphoto');
    wp_deregister_style('prettyphoto');
}
add_action('wp_enqueue_scripts', 'remove_vc_scripts', 100);

$shortcodes = [
    'infuse_video_modal',
    'infuse_child_pages_grid',
    'infuse_quote',
    'infuse_testimonials_slider',
    'infuse_single_testimonial',
    'infuse_text_with_number',
    'infuse_progress_bar',
    'infuse_leadership',
    'infuse_spacer',
];
/**
 * Include functions based for each shortcode
 */
foreach ($shortcodes as $shortcode) {
    require_once get_template_directory() . '/inc/vc_functions/' . $shortcode . ".php";
}