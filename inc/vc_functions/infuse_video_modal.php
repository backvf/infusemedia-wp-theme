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
function infuse_video_modal_before_init()
{
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_infuse_video_modal extends WPBakeryShortCode
        {
        }
    }
    vc_map([
        "name" => __("Video Modal", 'infusemedia'),
        "base" => "infuse_video_modal",
        "show_settings_on_create" => false,
        "category" => __("INFUSEmedia", 'infusemedia'),
        "params" => [
            [
                "type" => "textfield",
                "heading" => __("Video URL", "infusemedia"),
                "param_name" => "videourl",
                "description" => __("Add the subtitle heading .", "infusemedia")
            ],
            [
                "type" => "attach_image",
                "heading" => __("Image", "infusemedia"),
                "param_name" => "image",
                "description" => __("Add the video trigger image.", "infusemedia")
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
add_action('vc_before_init', 'infuse_video_modal_before_init', 15);
