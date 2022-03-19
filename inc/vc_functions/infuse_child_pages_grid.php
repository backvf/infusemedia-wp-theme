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
function infuse_child_pages_grid_before_init()
{


    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_infuse_child_pages_grid extends WPBakeryShortCode
        {
        }
    }
    vc_map([
        "name" => __("Child Pages Grid", 'infusemedia'),
        "base" => "infuse_child_pages_grid",
        "category" => __("INFUSEmedia", 'infusemedia'),
        "params" => [
            [
                "type" => "dropdown",
                "heading" => __("Number of columns", "infusemedia"),
                "param_name" => "columns_class",
                "description" => __("Select the number of columns.", "infusemedia"), 
                "value" => [
                    '3 Columns' => 'child-col three-columns col-lg-4 col-md-6',
                    '2 Columns' => 'child-col two-columns col-md-6',
                ]
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
add_action('vc_before_init', 'infuse_child_pages_grid_before_init', 15);
