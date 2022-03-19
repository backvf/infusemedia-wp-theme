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
 * @var string $image          The ID of the background image for the slide
 * @var string $imageco          The ID of the background image for the slide
 * @var array  $imageUrl       The array with Image URL and sisez for the
 *                             background of the slide ['0' => 'url',
 *                             '1' => 'width', '2' => 'height', '3' => 'icon']
 * @var string $css_class css class created by the desing options
 * @var string $name The name
 * @var string $title The title
 * @var string $detail The detail
 * @var string $content The content
 */

$image = $el_class = $imageco = $imageUrl = $css = '';
$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$imageUrl = wp_get_attachment_image_src($image, 'full', false);
$imageAlt = get_post_meta($image, '_wp_attachment_image_alt', TRUE);
$imageUrlco = wp_get_attachment_image_src($imageco, 'full', false);
$imageAltco = get_post_meta($imageco, '_wp_attachment_image_alt', TRUE);
$css_class = apply_filters(
    VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    vc_shortcode_custom_css_class($css, ' '),
    $this->settings['base'],
    $atts
);

?>
<div class="infuse-quote <?php echo esc_attr($css_class); ?>">
    <div class="quote-icon-wrapper">
        <img src="<?php echo $imageUrl[0]; ?>" alt="<?php echo $imageAlt; ?> "/>
    </div>
    <div class="quote-wrapper">
        <?php echo $content; ?>
    </div>
    <div class="quote-person">
        <div class="image-wrapper">
            <img src="<?php echo $imageUrlco[0]; ?>" alt="<?php echo $imageAltco; ?> "/>
        </div>
        <div class="description-wrapper">
            <span class="name"><?php echo $name; ?></span>
            <span class="title"><?php echo $title; ?></span>
            <span class="detail"><?php echo $detail; ?></span>
        </div>
    </div>
</div>