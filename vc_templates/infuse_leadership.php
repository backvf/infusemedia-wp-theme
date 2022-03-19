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
 * @var string $el_class  class of the Info Banner
 * @var string $name
 * @var string $image
 * @var string $jobtitle
 * @var string $content
 */

$name = $el_class = $jobtitle = $image = $css = '';
$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$imageUrl = wp_get_attachment_image_src($image, 'full', false);
$imageAlt = get_post_meta($image, '_wp_attachment_image_alt', TRUE);
// $cta_build_link = vc_build_link($cta_link);

$css_class = apply_filters(
    VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    vc_shortcode_custom_css_class($css, ' '),
    $this->settings['base'],
    $atts
);

?>
<div class="infuse-leadership <?php echo esc_attr($css_class); ?> <?php echo esc_attr($el_class);?>">
    <div class="flip-card">
    <div class="flip-card-inner">
        <div class="flip-card-front">
            <div>
                <img class="image" src="<?php echo $imageUrl[0]; ?>" alt="<?php echo $imageAlt; ?>" width="457" height="365"/>
            </div>
            <h2 class="name"><?php echo $name; ?></h2>
            <p class="job-title"><?php echo $jobtitle; ?></p>
            <div class="mt-auto more-link d-none d-lg-block">More</div>
            <div class="description d-block d-lg-none"><p><?php echo $content; ?></p></div>
        </div>
        <div class="flip-card-back d-none d-lg-block">
            <h2 class="name"><?php echo $name; ?></h2>
            <p class="job-title"><?php echo $jobtitle; ?></p>
            <div class="description"><p class="text-white"><?php echo $content; ?></p></div>
        </div>
    </div>
    </div>
</div>