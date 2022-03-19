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
function infuse_leadership_before_init()
{
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_infuse_leadership extends WPBakeryShortCode
        {
        }
    }
    vc_map([
        "name" => __("Leadership", 'infusemedia'),
        "base" => "infuse_leadership",
        "show_settings_on_create" => false,
        "category" => __("INFUSEmedia", 'infusemedia'),
        "params" => [
            [
                "type" => "attach_image",
                "heading" => __("Image", "infusemedia"),
                "param_name" => "image",
                "description" => __("Image.", "infusemedia")
            ],
            [
                "type" => "textfield",
                "heading" => __("Name", "infusemedia"),
                "param_name" => "name",
                "description" => __("Name.", "infusemedia")
            ],
            [
                "type" => "textfield",
                "heading" => __("Job Title", "infusemedia"),
                "param_name" => "jobtitle",
                "description" => __("Job title.", "infusemedia")
            ],
            [
                "type" => "textarea_html",
                "heading" => __("Description", "infusemedia"),
                "param_name" => "content",
                "description" => __("Description.", "infusemedia")
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
add_action('vc_before_init', 'infuse_leadership_before_init', 15);
