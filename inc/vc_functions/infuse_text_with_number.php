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
function infuse_text_with_number_before_init()
{
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_infuse_text_with_number extends WPBakeryShortCode
        {
        }
    }
    vc_map([
        "name" => __("Text with number and dots", 'infusemedia'),
        "base" => "infuse_text_with_number",
        "show_settings_on_create" => false,
        "category" => __("INFUSEmedia", 'infusemedia'),
        "params" => [
            [
                "type" => "textfield",
                "heading" => __("Text", "infusemedia"),
                "param_name" => "text",
                "description" => __("The text that is visible on the left side of the dots.", "infusemedia")
            ],
            [
                "type" => "textfield",
                "heading" => __("Number", "infusemedia"),
                "param_name" => "number",
                "description" => __("The text that is visible on the right side of the dots..", "infusemedia")
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
add_action('vc_before_init', 'infuse_text_with_number_before_init', 15);
