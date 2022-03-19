<?php

$el_class =  '';
$category = '-';
$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$css_class = apply_filters(
    VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,
    vc_shortcode_custom_css_class($css, ' '),
    $this->settings['base'],
    $atts
);


    $testimonialId = uniqid('testimonials-');
    $args = [
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
        'post_type' => 'testimonials',
    ];
    if($category != '-') {
        $args['tax_query'] = [
                [
                    'taxonomy' => 'testimonials_category',
                    'field'    => 'slug',
                    'terms'    => $category,
                ],
            ];
    }

    $testimonialsQuery = new WP_Query($args);
    $testimonialsFirstQuery = new WP_Query($args);
if($testimonialsFirstQuery->found_posts >= 3) :
?>

<div class="testimonials-wrapper <?php echo $el_class;?> <?php $css_class;?>">
    <div class="testimonials-bg"></div>

    <div class="row row_banner">
            <h2 class="section-title d-none d-lg-block">Testimonials</h2>
            <div class="first-column col-lg-6">
                <ul class="testimonials-slider testimonials-first-slider">
                    <?php
                        if ($testimonialsFirstQuery->have_posts()) :
                        while ($testimonialsFirstQuery->have_posts()) : $testimonialsFirstQuery->the_post(); ?>
                            <li>
                                <div class="testimonial-company">
                                    <div class="testimonial-image">
                                        <?php the_post_thumbnail(); ?>
                                    </div>    
                                    <div class="testimonial-company-info">
                                        <h3 class="testimonial-title"><?php the_title(); ?></h3>
                                        <div class="testimonial-description"><?php the_field('testimonials_company'); ?></div>                                    
                                    </div>
                                </div>
                            </li>
                        <?php endwhile;
                    endif;
                    wp_reset_postdata(); ?>
                    </ul>
            </div>

            <div class="second-column col-lg-6">
                <h2 class="section-title mobile d-lg-none">Testimonials</h2>
                <div class="second-column-column">
                    <div class="dots-container">
                        <span class="quote-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ico_quote.svg"></span>
                        <div class="custom-dots"></div>
                    </div>
                    <!-- <div class="slider-progress">
                        <div class="progress"></div>
                    </div> -->

                    <ul class="testimonials-slider testimonials-second-slider">
                    <?php

                        if ($testimonialsQuery->have_posts()) :
                            $index = 1;
                            $lastTestimonials = '';
                        while ($testimonialsQuery->have_posts()) : $testimonialsQuery->the_post(); 
                        if($index < 3){
                                ob_start();
                                ?>
                                    <li data-index="<?php echo $index; ?>">
                                    <?php 
                                    $link = get_field('testimonials_page_link');
                                    if( $link ): 
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                        ?>
                                        <a class="internal-page-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                    <?php endif; ?>
                                        <div class="testimonial-description"><?php the_content(); ?></div>                                        
                                        <div class="testimonial-company">
                                            <div class="testimonial-image">
                                                <?php the_post_thumbnail(); ?>
                                            </div>    
                                            <div class="testimonial-company-info">
                                                <h3 class="testimonial-title"><?php the_title(); ?></h3>
                                                <span><?php the_field('testimonials_company'); ?></span>    
                                                <span class="testimonials-job-title"><?php the_field('testimonials_job_title'); ?></span>    
                                            </div>
                                        </div>
                                    </li>
                                <?php
                                $lastTestimonials .= ob_get_contents();
                                ob_end_clean();
                            }else{
                                ?>
                            <li data-index="<?php echo $index; ?>">
                                <?php 
                                $link = get_field('testimonials_page_link');
                                if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <a class="internal-page-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                <?php endif; ?>
                                <div class="testimonial-description"><?php the_content(); ?></div>
                                <div class="testimonial-company">
                                    <div class="testimonial-image">
                                        <?php the_post_thumbnail(); ?>
                                    </div>    
                                    <div class="testimonial-company-info">
                                        <h3 class="testimonial-title"><?php the_title(); ?></h3>
                                        <span><?php the_field('testimonials_company'); ?></span>    
                                        <span class="testimonials-job-title"><?php the_field('testimonials_job_title'); ?></span>
                                    </div>
                                </div>
                            </li>
                            <?php } $index++;?>
                        <?php endwhile;
                        echo $lastTestimonials;
                    endif;
                    wp_reset_postdata(); ?>
                    </ul>

                    <div class="slider-arrrow"> 
                        <a class="slick-prev-btn"></a>
                        <a class="slick-next-btn"></a>
                    </div>
                </div>
            </div>
    </div>

</div>

<script>
    jQuery(document).ready(function(){    
        
        var timer = 5000;
        var animationSpeed = 10;
        var width = window.innerWidth;
        var changeBefore = false;


        jQuery('.testimonials-first-slider').slick({
            slidesToShow: 2,
            draggable: false,
            swipe: false,
            dots: false,
            arrows: false,
            autoplay: false,
            asNavFor: '.testimonials-second-slider',
            initialSlide: 3,
            responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    // initialSlide: 2,
                }
            }]
        });
      
        jQuery('.testimonials-second-slider').slick({
            slidesToShow: 1,
            draggable: false,
            swipe: false,
            dots: true,
            autoplay: false,
            asNavFor: '.testimonials-first-slider',
            prevArrow: jQuery('.testimonials-wrapper .slick-next-btn'),
            nextArrow: jQuery('.testimonials-wrapper .slick-prev-btn'),
            initialSlide: 3,
            customPaging : function(slider, i) {
                var thumb = jQuery(slider.$slides[i]).data();
                return '<div class="d-none"><div class="svg-here"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve"><style type="text/css">.st0{fill:none;stroke:url(#SVGID_1_);stroke-width:3;}</style><linearGradient id="SVGID_1_" gradientTransform="" x1="28.6965" y1="-19.7217" x2="4.4384" y2="44.7479" gradientUnits="userSpaceOnUse"><stop stop-color="#3286C9"/><stop offset="1" stop-color="#DF1657"/></linearGradient><ellipse transform="matrix(0.7808 -0.6248 0.6248 0.7808 -6.4895 13.5051)" class="st0" cx="16" cy="16" rx="13.95" ry="13.95" stroke-dasharray="88px" stroke-dashoffset="88px"/></svg></div><div class="dot"></dot></div>';
            },
            appendDots: '.custom-dots',
            responsive: [{
                breakpoint: 767,
                settings: {
                    initialSlide: -1,
                }
            }]
        });

        function clearAnimation(){
            var ellipse = jQuery('.custom-dots').find('.svg-here ellipse');
            ellipse.attr('stroke-dashoffset', '88px');
        }
    
        jQuery(document).on('click', '.slick-prev-btn, .slick-next-btn, .slick-dots li', function(){
            clearAnimation();
        });

        setInterval(function(){
            var bef = parseFloat(jQuery('.custom-dots').find('.svg-here ellipse').attr('stroke-dashoffset'));
            var ellipse = jQuery('.custom-dots').find('.svg-here ellipse');
            var dasharray = parseFloat(ellipse.attr('stroke-dasharray'));
            var countPixel = dasharray / (timer / animationSpeed - 1);
            var newdash = bef - countPixel;
            if (newdash <= 0) {
                newdash = 0;
                ellipse.attr('stroke-dashoffset', '88px');
                jQuery('.testimonials-second-slider').slick('slickPrev');
            }else{
                ellipse.attr('stroke-dashoffset', newdash + 'px');
            }
        }, animationSpeed);

        jQuery(window).on('resize orientationchange', function(event) {
            width = window.innerWidth;
            changeSlide(width);
        });

        changeSlide(width);

        function changeSlide(width){
            if (width < 992) {
                if (changeBefore != true) {
                    jQuery(".testimonials-first-slider .slick-track").find('.slick-slide').eq(0).appendTo(".testimonials-first-slider .slick-track");
                    changeBefore = true;
                }
            }else{
                if (changeBefore != false) {
                    jQuery(".testimonials-first-slider .slick-track").find('.slick-slide:last-child').prependTo(".testimonials-first-slider .slick-track");
                    changeBefore = false;
                }
            }
        };
    });
</script>
<?php else: ?>
<div class="alert alert-danger" role="alert">
  Please add at least <strong>3</strong> testimonials in the selected category!
</div>
<?php endif;?>