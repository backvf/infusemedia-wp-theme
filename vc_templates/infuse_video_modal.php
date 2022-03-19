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
 * @var array  $imageUrl       The array with Image URL and sisez for the
 *                             background of the slide ['0' => 'url',
 *                             '1' => 'width', '2' => 'height', '3' => 'icon']
 * @var string $css_class css class created by the desing options
 * @var string $videourl The subtitle
 * @var string $title_infusemedia          The title of the slide
 */

$image = $el_class = $imageUrl = '';
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
$current_id = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', mt_rand(1,10))), 1, 10);

// $url = "http://www.youtube.com/watch?v=C4kxS1ksqtw&feature=relate";
// parse_str( parse_url( $url, PHP_URL_QUERY ), $infusemedia_var );
// $vid_id = $infusemedia_var['v'];    
  // Output: C4kxS1ksqtw
?>

<div class="video-modal-image-trigger" onclick="jQuery('#infusemedia-modal-video').modal('show');">
    <img src="<?php echo $imageUrl[0]; ?>" alt="<?php echo $imageAlt; ?>"/>
</div>

<!-- Modal -->
<div class="modal fade" id="infusemedia-modal-video" tabindex="-1" role="dialog" aria-labelledby="infusemedia-modal-videoTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <video width="100%" height="350" controls>
            <source src="<?php echo $videourl; ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
      </div>
    </div>
  </div>
</div>
