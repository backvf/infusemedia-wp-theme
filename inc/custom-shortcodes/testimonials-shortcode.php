<?php
    $testimonialId = uniqid('testimonials-');
    $args = [
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
        'post_type' => 'testimonials',
    ];

    $testimonialsQuery = new WP_Query($args);
    $testimonialsFirstQuery = new WP_Query($args);

    $path_url = get_page_by_path( '/our-reviews' );
    //echo"<pre>";print_r($path_url);

	if (!function_exists('get_url_by_slug')) {
		function get_url_by_slug($slug)
		{
			$page_url_id = get_page_by_path($slug);
			$page_url_link = get_permalink($page_url_id);
			return $page_url_link;
		}
	}
?>
<style>
ul.testimonials-slider li .dots-container .custom-dots ul.slick-dots li {
     width: 49px;
     height: 5px;
     display: -webkit-box;
     display: -webkit-flex;
     display: -moz-box;
     display: -ms-flexbox;
     display: flex;
     -webkit-box-pack: center;
     -webkit-justify-content: center;
     -moz-box-pack: center;
     -ms-flex-pack: center;
     justify-content: center;
     -webkit-box-align: center;
     -webkit-align-items: center;
     -moz-box-align: center;
     -ms-flex-align: center;
     align-items: center;
     border: 1px solid transparent;
     overflow: hidden;
     position: relative;
     margin: 0 4px;
     background: #bbb;
}
 ul.testimonials-slider li .dots-container .custom-dots ul.slick-dots li.slick-active {
     overflow: visible;
     background: #fe8836;
}
 ul.testimonials-slider li .dots-container .custom-dots ul.slick-dots li:hover {
     border: 1px solid #fe8836;
     background: #fff;
}
 .slick-track {
     padding-top: 0;
}
 .keep-the-link {
     margin-bottom: 50px;
}
 .review-link {
     font-family: Roboto;
     font-style: normal;
     font-weight: bold;
     font-size: 20px;
     line-height: 117.5%;
     text-align: center;
     text-transform: uppercase;
     font-feature-settings: 'cpsp' on;
     color: #1c3c70;
}
 .review-link:after {
     display: inline-block;
     content: url(<?php echo get_stylesheet_directory_uri(); ?>/img/Arrow.png);
     margin-left: 15px;
     background-position: center;
 }
 .dots-container {
     margin-bottom: 0;
}
 .arrow-right-review {
     background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/ico_pagination-left-hover.svg') no-repeat;
     background-position: center;
     transform: rotate(0);
     width: 30px;
}
.testimonial-description p:last-child {
     margin-bottom: 50px;
}
 body .testimonials-wrapper .second-column .second-column-column .testimonials-slider .testimonial-company {
     padding-top: 0px;
     margin-top: 15px;
}
 body .testimonials-wrapper .second-column .second-column-column .testimonials-slider li {
     justify-content: flex-end;
}
body .testimonials-wrapper .second-column .second-column-column .testimonials-slider {
    margin-left: 0;
    margin-bottom: 0;
    margin-top: 25px;
    padding-left: 0;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    visibility: hidden;
}
 body .testimonials-slider .testimonial-description p:last-child {
     font-size: 18px;
     line-height: 26px;
     color: #585858;
     margin-bottom: 50px;
}
.dots-container.bottom{
    position: absolute;
    bottom: 120px;
}
.testimonial-description .wpb_text_column.wpb_content_element {
    padding: 10px;
}
.second-column-column .testimonial-description{
    min-height: 300px;
    display: flex;
}
body .testimonials-wrapper .second-column .second-column-column .testimonials-slider .slick-track {
    align-items: flex-end;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
}
@media (max-width: 1200px) {
     ul.testimonials-slider li .dots-container .custom-dots ul.slick-dots li {
         width: 33px;
         height: 2px;
    }
}

@media screen and (max-width: 768px){
    .first-part{
        display: flex;
        flex-wrap: wrap;
        flex-wrap: wrap;
        justify-content: space-around;
        align-items: center;
    }
    .second-column-column .testimonial-description{
        min-height: 450px;
        display: flex;
    }
    .review-link{
        font-family: Roboto;
        font-style: normal;
        font-weight: bold;
        font-size: 15px;
        line-height: 23px;
        letter-spacing: 0.02em;
        text-transform: uppercase;
        color: #1C3C70;
    }
    .keep-the-link{
        flex-basis: 50%;
        order: 2;
        margin-bottom: 0;
    }
    .dots-container{
        flex-basis: 50%;
    }
    .section-title.mobile.d-lg-none{
        font-size: 40px;
        line-height: 29px;
    }
    .dots-container.bottom {
        position: absolute;
        bottom: 210px;
    }
    .testimonials-wrapper .slider-arrrow.home-page {
        position: inherit;
        bottom: inherit;
        right: inherit;
        margin-top: 20px;
    }
}
@media screen and (max-width: 420px){
    .dots-container{
        flex-basis: 30%;
    }
    .keep-the-link{
        flex-basis: 70%;
        order: 2;
        margin-bottom: 0;
    }
}
</style>
<div class="testimonials-wrapper">
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
                    <div class="first-part">
                        <div class="keep-the-link">
                            <a class="review-link" href="<?php echo get_url_by_slug('about/our-reviews'); ?>">Read our Reviews</a>
                        </div>
                        <div class="dots-container">
                            <span class="quote-icon">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ico_quote.svg">
                            </span>
                            <!-- <div class="custom-dots"></div> -->
                        </div>
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
                                    <li data-index="<?php echo $index; ?>" id="item-<?php echo $index; ?>">
                                        <div class="testimonial-description"><?php the_content(); ?></div>
                                       <!--  <div class="dots-container">
                                            <div class="custom-dots"></div>
                                        </div>  -->
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
                                        <script>
                                            $(document).ready(function(){
                                                var dataId =  $("#item-<?php echo $index; ?>").attr("data-index");
                                            });
                                        </script>
                                    </li>
                                <?php
                                $lastTestimonials .= ob_get_contents();
                                ob_end_clean();
                            }else{
                                ?>
                            <li data-index="<?php echo $index; ?>" class="item-<?php echo $index; ?>">
                                <div class="testimonial-description"><?php the_content(); ?></div>
                                <!-- <div class="dots-container">
                                    <div class="custom-dots"></div>
                                </div>  -->
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
                                <script>
                                    $(document).ready(function(){
                                        var dataIndex =  $(".item-<?php echo $index; ?>").attr("data-index");
                                    });
                                </script>
                            </li>
                            <?php } $index++;?>
                        <?php endwhile;
                        echo $lastTestimonials;
                    endif;
                    wp_reset_postdata(); ?>
                    </ul>
                    <div class="dots-container bottom">
                        <div class="custom-dots"></div>
                    </div>

                    <div class="slider-arrrow home-page">
                        <a class="slick-prev-btn"></a>
                        <a class="slick-next-btn"></a>
                    </div>
                </div>
            </div>
    </div>

</div>

<script>
    jQuery(document).ready(function(){

        //$( ".testimonial-company" ).prepend( $( ".slick-dots" ) );

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
