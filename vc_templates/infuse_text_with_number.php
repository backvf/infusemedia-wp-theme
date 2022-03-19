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
 */

$text = $el_class = $number = $css = '';
$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$css_class = apply_filters(
    VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    vc_shortcode_custom_css_class($css, ' '),
    $this->settings['base'],
    $atts
);

?>
<div class="infuse-text-with-number <?php echo esc_attr($css_class); ?> <?php echo esc_attr($el_class);?>">
  <span class="left-side-text"><?php echo $text;?></span>
  <span class="dots"></span>
  <span class="right-side-number"><?php echo $number;?></span>
</div>