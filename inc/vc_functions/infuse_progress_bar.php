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
function infuse_progress_bar_before_init()
{
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_infuse_progress_bar extends WPBakeryShortCode
        {
        }
    }
    vc_map([
        "name" => __("Progress Bar", 'infusemedia'),
        "base" => "infuse_progress_bar",
        "show_settings_on_create" => false,
        "category" => __("INFUSEmedia", 'infusemedia'),
        "params" => [
            [
                "type" => "textfield",
                "heading" => __("Text", "infusemedia"),
                "param_name" => "text",
                "description" => __("The text that is visible on the right side.", "infusemedia")
            ],
            [
                "type" => "textfield",
                "heading" => __("Number", "infusemedia"),
                "param_name" => "number",
                "description" => __("The text that is visible on the progress bar.", "infusemedia")
            ],
            [
                "type" => "textfield",
                "heading" => __("Value", "infusemedia"),
                "param_name" => "value",
                "description" => __("Enter value of bar. Don't add the % symbol.", "infusemedia")
            ],
            [
                "type" => "colorpicker",
                "heading" => __("Color", "infusemedia"),
                "param_name" => "color",
                "description" => __("Bar color.", "infusemedia")
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
add_action('vc_before_init', 'infuse_progress_bar_before_init', 15);
