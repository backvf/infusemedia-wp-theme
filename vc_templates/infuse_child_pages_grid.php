<?php

/**
 * infusemedia Info Banner template
 *
 * PHP version 7
 *
 * @category  PHP
 * @package   infusemedia Helper
 * @author    inSegment inc <developer.insegment@gmail.com>
 * @copyright 2018 inSegment
 *
 * @var string $css       Generated CSS
 * @var string $css_class css class created by the desing options
 * @var string $columns_class          the class assigned for the number of columns
 */

$columns_class = $el_class = '';
$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$css_class = apply_filters(
    VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    vc_shortcode_custom_css_class($css, ' '),
    $this->settings['base'],
    $atts
);


global $post;

$args = array(
    'child_of' => $post->ID,
    'post_type' => 'page',
    'post_status' => 'publish', 
    'sort_column' => 'menu_order'
);

$wwd_childrens = get_pages($args);
?>
<div class="<?php echo $el_class;?> row <?php echo $css_class;?>">
    <?php
    foreach ($wwd_childrens as $wwd_children) {

        $id = $wwd_children->ID;
        $excerpt = get_field("page_excerpt", $id);
    ?>

        <div class="<?php echo $columns_class;?>">
            <div class="child-item">
                <div class="wwd-separator"></div>
                <div class="wwd-title">
                    <?php echo $wwd_children->post_title; ?>
                </div>
                <div class="wwd-spacer"></div>
                <div class="wwd-url-box">
                    <a class="wwd-url" href="<?php echo get_permalink( $id ); ?>"> 
                        <span><?php echo $excerpt;?></span>
                        <i class="fal fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    <?php } ?>

</div>