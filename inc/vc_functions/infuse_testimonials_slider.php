<?php

/**
 * INFUSEmedia Video Modal Definition
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
function infuse_testimonials_slider_before_init()
{

    $testimonialsCategory = [
        'All Categories' => '-'
    ];

    $args = array(
        'taxonomy'               => array('testimonials_category'),
    );

    $the_query = new WP_Term_Query($args);
    foreach ($the_query->get_terms() as $term) {
        $testimonialsCategory[$term->name] = $term->slug;
    }
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_infuse_testimonials_slider extends WPBakeryShortCode
        {
        }
    }
    vc_map([
        "name" => __("Testimonials Slider", 'infusemedia'),
        "base" => "infuse_testimonials_slider",
        "category" => __("INFUSEmedia", 'infusemedia'),
        "params" => [
            [
                "type" => "dropdown",
                "heading" => __("Category", "infusemedia"),
                "param_name" => "category",
                "description" => __("Select the testimonials category needed.", "infusemedia"),
                "value" => $testimonialsCategory
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
add_action('vc_before_init', 'infuse_testimonials_slider_before_init', 15);
