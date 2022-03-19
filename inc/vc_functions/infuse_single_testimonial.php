<?php
/**
 * INFUSEmedia Quote Definition
 *
 * PHP version 7
 *
 * @category  PHP
 * @package   INFUSEmedia Helper
 * @author    INFUSEmedia inc <developer@INFUSEmedia.com>
 * @copyright 2020 INFUSEmedia
 *
 * @var string $css       Generated CSS
 * @var string $css_class css class created by the desing options
 */
function infuse_single_testimonial_before_init()
{
    $args = [
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
        'post_type' => 'testimonials',
        'posts_per_page' => '-1'
    ];
    $testimonials = [];
    $testimonialQuery = new WP_Query($args);
    while($testimonialQuery->have_posts()): $testimonialQuery->the_post();
        $testimonials[get_the_title()] = get_the_ID();
    endwhile;
    wp_reset_postdata();
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_infuse_single_testimonial extends WPBakeryShortCode
        {
        }
    }
    vc_map([
        "name" => __("Single Testimonial", 'infusemedia'),
        "base" => "infuse_single_testimonial",
        "show_settings_on_create" => false,
        "category" => __("INFUSEmedia", 'infusemedia'),
        "params" => [
            [
                "type" => "dropdown",
                "heading" => __("Testimonial", "infusemedia"),
                "param_name" => "testimonial_id",
                "description" => __("Select the testimonial.", "infusemedia"),
                "value" => $testimonials
            ],
            [
                "type" => "textfield",
                "heading" => __("Extra class name", "infusemedia"),
                "param_name" => "el_class",
                "description" => __(
                    "If you wish to style particular content element differently,
                    then use this field to add a class name and then refer to it in your css file.",
                    "infusemedia"
                )
            ],
            [
                'type' => 'css_editor',
                'heading' => __('Css', 'infusemedia'),
                'param_name' => 'css',
                'group' => __('Design options', 'infusemedia'),
            ]
        ]
    ]);
}
add_action('vc_before_init', 'infuse_single_testimonial_before_init', 15);
