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
 * @var string $text
 * @var string $number
 * @var string $value
 * @var string $color
 */

$text = $el_class = $number = $value = $color = $css = '';
$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$css_class = apply_filters(
    VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    vc_shortcode_custom_css_class($css, ' '),
    $this->settings['base'],
    $atts
);

?>
<div class="infuse-progress-bar <?php echo esc_attr($css_class); ?> <?php echo esc_attr($el_class);?>">
    <div class="container">
        <div class="row">
            <div class="w-100 mt-auto">
                <div class="right-side" style="border-color: <?php echo $color; ?>;">
                    <span class="title"><?php echo $text; ?></span>
                </div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $value; ?>%; background-color: <?php echo $color; ?>;" aria-valuenow="<?php echo $value ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="fixed-bar" style="background: <?php echo $color; ?>;">
                    <span><?php echo $number; ?></span>
                    <span class="triangle-right" style="border-color: transparent transparent transparent <?php echo $color; ?>;"></span>
                </div>
            </div>

        </div>
    </div>
</div>