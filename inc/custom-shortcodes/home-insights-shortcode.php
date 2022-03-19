<section class="insights-listing homepage-insights-slider">
    <div class="container">
        <div id="insights-posts" class="posts row">
            <?php 

                $args = array(
                    'post_type' => 'insights',
                    'posts_per_page' => 32,
                );
                global $postNumber;
                $postNumber = 1;

                $query = new WP_Query($args);

                if($query->have_posts()):
                    while($query->have_posts()) : $query->the_post();
                        get_template_part('page-templates/parts-insights-page/list-article');
                        $postNumber++;
                    endwhile;
                endif;

                wp_reset_postdata();

            ?>
        </div>
        <div class="dots-container">
            <div class="custom-dots-insights"></div>
            <div class="slider-arrrow"> 
                <a class="slick-prev-btn slick-prev-btn-insights"></a>
                <a class="slick-next-btn slick-next-btn-insights"></a>
            </div>
        </div>
    </div>
</section>

<script>
     jQuery(document).ready(function($){    
        if($('.homepage-insights-slider #insights-posts').length){
            $('.homepage-insights-slider #insights-posts').slick({
                slidesToShow: 4,
                slidesToScroll: 4,
                rows: 2,
                dots: true,
                prevArrow: jQuery('.insights-listing .slick-prev-btn-insights'),
                nextArrow: jQuery('.insights-listing .slick-next-btn-insights'),
                appendDots: '.custom-dots-insights',
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            rows: 4,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
        }

        $('.homepage-insights-slider #insights-posts').on('setPosition', function () {
            $(this).find('.slick-slide>div>div').height('auto');
            var slickTrack = $(this).find('.slick-slide>div');
            var slickTrackHeight = $(slickTrack).height();
            $(this).find('.slick-slide>div>div').css('height', slickTrackHeight + 'px');
        });
        
     });
</script>