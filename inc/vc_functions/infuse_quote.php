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
function infuse_quote_before_init()
{
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_infuse_quote extends WPBakeryShortCode
        {
        }
    }
    vc_map([
        "name" => __("Infuse Quote", 'infusemedia'),
        "base" => "infuse_quote",
        "show_settings_on_create" => false,
        "category" => __("INFUSEmedia", 'infusemedia'),
        "params" => [
            [
                "type" => "attach_image",
                "heading" => __("Quote Icon", "infusemedia"),
                "param_name" => "image",
                "description" => __("Add the quote icon.", "infusemedia")
            ],
            [
                "type" => "textarea_html",
                "heading" => __("Quote", "infusemedia"),
                "param_name" => "content",
                "description" => __("Add the subtitle heading .", "infusemedia")
            ],
            [
                "type" => "attach_image",
                "heading" => __("Company/Person Image", "infusemedia"),
                "param_name" => "imageco",
                "description" => __("Add the quote image.", "infusemedia")
            ],
            [
                "type" => "textfield",
                "heading" => __("Name", "infusemedia"),
                "param_name" => "name",
                "description" => __("Add the name of the person/company.", "infusemedia")
            ],
            [
                "type" => "textfield",
                "heading" => __("Title", "infusemedia"),
                "param_name" => "title",
                "description" => __("Add the title of the person/company.", "infusemedia")
            ],
            [
                "type" => "textfield",
                "heading" => __("Detail", "infusemedia"),
                "param_name" => "detail",
                "description" => __("Add the detail of the person/company.", "infusemedia")
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
add_action('vc_before_init', 'infuse_quote_before_init', 15);
