<?php

/**
 * INFUSEmedia Devider
 *
 * PHP version 7
 *
 * @category  PHP
 * @package   INFUSEmedia Helper
 * @author    INFUSEmedia inc <developer@INFUSEmedia.com>
 * @copyright 2020 INFUSEmedia
 *
 */
function infuse_spacer_before_init()
{
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_infuse_spacer extends WPBakeryShortCode
        {
        }
    }
    vc_map([
        "name" => __("Spacer", 'infusemedia'),
        "base" => "infuse_spacer",
        "show_settings_on_create" => false,
        "category" => __("INFUSEmedia", 'infusemedia'),
        'description' => __('Adjust space between components.', 'infusemedia'),
        "params" => [
            [
                'type'        => 'number',
                'class'       => '',
                'heading'     => __("<i class='dashicons dashicons-desktop'></i> Desktop", 'infusemedia'),
                'param_name'  => 'height_desktop',
                'admin_label' => true,
                'value'       => 10,
                'min'         => 1,
                'max'         => 500,
                'suffix'      => 'px',
                'edit_field_class' => 'vc_col-sm-3 vc_column',
                'description' => __('width:  >1441px', 'infusemedia'),
            ],
            [
                'type'        => 'number',
                'class'       => '',
                'heading'     => __("<i class='dashicons dashicons-desktop'></i> Desktop Small", 'infusemedia'),
                'param_name'  => 'height_desktop_small',
                'admin_label' => true,
                'value'       => 10,
                'min'         => 1,
                'max'         => 500,
                'suffix'      => 'px',
                'edit_field_class' => 'vc_col-sm-3 vc_column',
                'description' => __('width:  1200px > 1440', 'infusemedia'),
            ],
            [
                'type'        => 'number',
                'class'       => '',
                'heading'     => __("<i class='dashicons dashicons-desktop'></i> Desktop Smaller", 'infusemedia'),
                'param_name'  => 'height_desktop_smaller',
                'admin_label' => true,
                'value'       => '',
                'min'         => 1,
                'max'         => 500,
                'suffix'      => 'px',
                'edit_field_class' => 'vc_col-sm-5 vc_column',
                'description' => __('width:  1200px > 1299', 'infusemedia'),
            ],
            [
                'type'             => 'number',
                'class'            => '',
                'heading'          => __("<i class='dashicons dashicons-tablet' style='transform: rotate(90deg);'></i> Tabs", 'infusemedia'),
                'param_name'       => 'height_on_tabs',
                'admin_label'      => true,
                'value'            => '',
                'min'              => 1,
                'max'              => 500,
                'suffix'           => 'px',
                'edit_field_class' => 'vc_col-sm-3 vc_column',
                'description' => __('width:  992px > 1199px', 'infusemedia'),
            ],
            [
                'type'             => 'number',
                'class'            => '',
                'heading'          => __("<i class='dashicons dashicons-tablet'></i> Tabs", 'infusemedia'),
                'param_name'       => 'height_on_tabs_portrait',
                'admin_label'      => true,
                'value'            => '',
                'min'              => 1,
                'max'              => 500,
                'suffix'           => 'px',
                'edit_field_class' => 'vc_col-sm-8 vc_column',
                'description' => __('width:  768px > 991px', 'infusemedia'),
            ],
            [
                'type'             => 'number',
                'class'            => '',
                'heading'          => __("<i class='dashicons dashicons-smartphone' style='transform: rotate(90deg);'></i> Mobile", 'infusemedia'),
                'param_name'       => 'height_on_mob_landscape',
                'admin_label'      => true,
                'value'            => '',
                'min'              => 1,
                'max'              => 500,
                'suffix'           => 'px',
                'edit_field_class' => 'vc_col-sm-3 vc_column',
                'description' => __('width:  576 > 767px', 'infusemedia'),
            ],
            [
                'type'             => 'number',
                'class'            => '',
                'heading'          => __("<i class='dashicons dashicons-smartphone'></i> Mobile", 'infusemedia'),
                'param_name'       => 'height_on_mob',
                'admin_label'      => true,
                'value'            => '',
                'min'              => 1,
                'max'              => 500,
                'suffix'           => 'px',
                'edit_field_class' => 'vc_col-sm-8 vc_column',
                'description' => __('width:  0 > 575px', 'infusemedia'),
            ],
        ]
    ]);
}
add_action('vc_before_init', 'infuse_spacer_before_init', 15);
