<?php

$el_class = $css = '';
$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$args = [
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish',
    'post_type' => 'testimonials',
    'posts_per_page' => '1',
    'post__in' => [$testimonial_id]
];
$testimonialsQuery = new WP_Query($args);

$css_class = apply_filters(
    VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    vc_shortcode_custom_css_class($css, ' '),
    $this->settings['base'],
    $atts
);
if($testimonialsQuery->have_posts()):
while($testimonialsQuery->have_posts()): $testimonialsQuery->the_post();
?>
<div class="infuse-quote <?php echo esc_attr($css_class); ?>">
    <div class="quote-icon-wrapper">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ico_quote.svg">
    </div>
    <div class="quote-wrapper">
        <?php the_content(); ?>
    </div>
    <div class="quote-person">
        <div class="image-wrapper">
            <?php the_post_thumbnail( 'thumbnail', [] ); ?>

        </div>
        <div class="description-wrapper">
            <span class="name"><?php the_title(); ?></span>
            <span class="title"><?php the_field('testimonials_job_title'); ?></span>
            <span class="detail"><?php the_field('testimonials_company'); ?></span>
        </div>
    </div>
</div>

<?php 
endwhile;
wp_reset_postdata();
endif;