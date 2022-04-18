<style>
.top-details{
	display: flex;
    flex-wrap: wrap;
    background: #FFFFFF;
     box-shadow: 0 -1px 20px 0 #e8e8e8;
     -webkit-box-shadow: 0 -1px 20px 0 #e8e8e8; 
       -moz-box-shadow: 0 -1px 20px 0 #e8e8e8;
       -webkit-appearance: none;
}
.gradient{
    border-radius: 0px;
    box-shadow: 0 -1px 20px 0 #e8e8e8;
     -webkit-box-shadow: 0 -1px 20px 0 #e8e8e8; 
       -moz-box-shadow: 0 -1px 20px 0 #e8e8e8;
       -webkit-appearance: none;
}
#reviews-posts.slick-dotted.slick-slider,
.dots-container.review-page{
    margin-bottom: 40px;
}
.content{
    padding: 25px;
    padding-top: 15px;
}
.image-on{
	flex-basis: 20%;
	height: 100% !important;
    padding: 25px 10px 25px 25px;
}
.review-customer-details{
    padding: 25px;
}
.review-customer-details,
.gradient,
.content{
	height: auto !important;
}
.content .under p{
    margin-bottom: 50px;
}
.gradient{
	display: flex;
    background: linear-gradient(87.72deg, #005EAB 42.79%, #FF492C 87.45%);
    width: 100%;
    padding: 25px;
    justify-content: space-between;
    align-items: center;
    margin-top: -35px;
}
/*#reviews-select-wrapper{
    z-index: 1000;
}*/
.left-part{
    display: flex;
    flex-basis: 50%;
}
.left-part div span{
    font-style: normal;
    font-weight: 800;
    font-size: 15px;
    line-height: 23px;
    letter-spacing: 0.02em;
    text-transform: uppercase;
    color: #fff;
}
.link-on{
    margin-left: 15px;
}
.customer-name{
    display: flex;
    align-items: center;
    width: 100%;
    justify-content: space-between;
}
.customer-name p{
    font-style: normal;
    font-weight: 800;
    font-size: 20px;
    line-height: 29px;
    color: #1C3C70;
    margin-bottom: 0px;
}
.customer-name p.date{
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 29px;
    color: #8D8D8D;
}
.review-customer-details{
    flex-basis: 76%;
    padding: 25px 0;
}
.customer-function{
    font-style: normal;
    font-weight: normal;
    font-size: 16px;
    line-height: 29px;
    color: #1C3C70;
}
.blue-text p{
    font-style: normal;
    font-weight: normal;
    font-size: 16px;
    line-height: 29px;
    color: #FE8836;
    margin-bottom: 0px;
}
.blue-text{
    display: flex;
    align-items: center;
}
.blue-text div{
    flex-basis: 5%;
}
/*.content div p{
    margin-bottom: 60px;
    min-height: 180px;
}*/
#review-category-select-button{
    display: block !important;
}
#review-category-select-button{
    font-weight: 700;
    font-size: 14px;
    line-height: 18px;
    color: #1c3c70;
    background: 0 0;
    border: 0;
    padding: 0;
    width: 100%;
    text-align: left;
    position: relative;
    padding: 17.5px 0;
}
#review-category-select-button::after {
    position: absolute;
    content: "\f078";
    display: block;
    top: 17.5px;
    right: 10px;
    font-family: 'Font Awesome 5 Pro';
}


#review-category-select-button.down:after{
    content: '\f077';
}
#review-category-select-button.up:after {
    content: "\f078";
}
*:focus ,
#review-category-select-button:focus{
    outline: none;
}
.hide{
    display: none;
}
.categories .select-selected {
    width: 100%;
    border: 0;
    border-bottom: 1px solid #1c3c70;
    font-size: 14px;
    line-height: 18px;
    font-weight: 700;
    color: #1c3c70;
}
#review-category-select-button{
    font-style: normal;
    font-weight: bold;
    font-size: 18px;
    line-height: 23px;
    display: flex;
    align-items: center;
    text-transform: uppercase;
}
input[type=checkbox]:checked{
    font-style: normal;
    font-weight: 900;
    font-size: 14px;
    line-height: 18px;
    text-transform: uppercase;
    color: #FFFFFF;
}
#review-select-items.select-items {
    position: absolute;
    padding: 0 25px;
    top: 100%;
    left: 0;
    right: 0;
    z-index: 100;
    text-transform: uppercase;
    background: linear-gradient(144.11deg, #003A68 3.44%, #0086C9 108.54%);
}
.single-white-star{
    margin-right: 5px;
}
#review-select-items.select-items div:hover {
    color: #fff;
    font-weight: normal;
}
#review-select-items .select-item .select-items__checkbox input:checked+.select-items__label {
    color: #fff;
    font-weight: 900;
}
.single-white-star{
    width: 30px;
    height: 30px;
}
.half-image{
    width: 25px;
    height: 30px;
    margin-left: -5px;
}
.all-stars{
    display: flex;
}
.left-part,
.image-on,
.all-stars{
    height: auto !important;
}

#reviews-select-wrapper .select-item .select-items__checkbox .checkmark {
    position: absolute;
    right: 0;
    top: 25px;
    height: 15px;
    width: 15px;
    background-color: transparent;
    border: 1px solid #fff;
}
#reviews-select-wrapper .select-item .select-items__checkbox input:checked~.checkmark {
    background-color: #fff;
}
#reviews-select-wrapper .select-item label {
    width: 100%;
    margin: 0;
    padding: 25px 0;
    cursor: pointer;
}
.all-stars .single-white-star:last-child{
    margin-right: 0;
}

@media screen and (min-width: 768px) and (max-width: 1998px){
    .top-details{
        min-height: 600px;
    }
}
@media screen and (min-width: 1200px){
    .top-details{
        min-height: 400px;
    }
}
@media screen and (min-width: 1000px) and (max-width: 1199px){
    .top-details{
        min-height: 500px;
    }
}
@media screen and (max-width: 1024px){
    .blue-text div{
        flex-basis: 8%;
    }
}
@media screen and (min-width: 991px) and (max-width: 1024px){
    .image-on {
        flex-basis: 25%;
        height: 100% !important;
        padding: 25px 10px 25px 25px;
    }
    .review-customer-details {
        flex-basis: 72%;
        padding: 25px 0;
    }
}
@media (max-width: 767px){
    .homepage-insights-slider .dots-container {
        display: flex;
    }
    .left-part {
        display: flex;
        flex-basis: 45%;
    }
    #reviews-posts .slick-track {
        padding-top: 10px;
    }
    #review-category-select-button{
        font-weight: bold;
        font-size: 14px;
        line-height: 18px;
    }
    #reviews-posts.slick-dotted.slick-slider {
        margin-bottom: 20px;
    }
    .image-on {
        flex-basis: 35%;
        height: 100% !important;
        padding: 25px 10px 25px 25px;
    }
    .review-customer-details {
        flex-basis: 60%;
        padding: 25px 0;
    }
    .date{
        display: none;
    }
    .content .under p{
        height: auto !important;
        margin-bottom: 30px;
    }
    .customer-name p {
        font-style: normal;
        font-weight: 800;
        font-size: 20px;
        line-height: 22px;
        color: #1C3C70;
        margin-bottom: 0px;
    }
    .customer-function {
        font-style: normal;
        font-weight: normal;
        font-size: 15px;
        line-height: 23px;
        color: #1C3C70;
    }
    .blue-text div {
        flex-basis: 10%;
    }
    .blue-text p {
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 18px;
        color: #FE8836;
        margin-bottom: 0px;
    } 
}
@media screen and (max-width: 325px){
    .left-part .link-on a span {
        font-style: normal;
        font-weight: 800;
        font-size: 12px !important;
        line-height: 20px;
        letter-spacing: 0.02em;
        text-transform: uppercase;
        color: #fff;
    }
}
</style>
<?php
     $args = array(
       'type'                     => 'reviews',
       'child_of'                 => 0,
       'parent'                   => '',
       'orderby'                  => 'name',
       'order'                    => 'ASC',
       'hide_empty'               => 1,
       'hierarchical'             => 1,
       'taxonomy'                 => 'reviews_category',
       'pad_counts'               => false );
       
    $categories = get_categories($args);   
       
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-6">
            <div class="categories">
                <div id="reviews-select-wrapper" class="insights-select">
                    <div class="select-selected">
                        <button id="review-category-select-button">
                        FILTER BY INDUSTRIES
                        </button>
                    </div>
                    <div id="review-select-items" class="select-items hide">

                        <?php foreach ($categories as $category) { ?>

                            <div class="select-item">
                                <label>
                                    <span class="select-items__checkbox">
                                        <input type="checkbox"
                                               data-slug="<?php echo $category->slug;?>"
                                               name="category-select"
                                               value=".<?php echo $category->slug;?>" 
                                               autocomplete="off"/>
                                        <span class="select-items__label"><?php echo $category->name; ?></span>
                                        <span class="checkmark"></span>
                                    </span>
                                </label>
                            </div>

                        <?php } ?>
                        <div class="reset-select">
                            <button>Reset filters</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   

<section class="insights-listing homepage-insights-slider">
    <div class="container">
        <div id="reviews-posts" class="posts row">
            <?php 

                $args = array(
                    'post_type' => 'reviews',
                    'posts_per_page' => -1,
                );
                global $postNumber;
                $postNumber = 1;

                $query = new WP_Query($args);

                if($query->have_posts()):
                    while($query->have_posts()) : $query->the_post();
                        global $post;
                        $categories_post = wp_get_object_terms($post->ID, 'reviews_category', ["fields"=>"slugs"]);
                ?>
                        <div class="col <?php echo implode(' ',$categories_post );?>">
                        	<div class="top-details">
                        		<div class="image-on">
                        			<?php the_post_thumbnail(); ?>
                        		</div>
                        		<div class="review-customer-details">
                        			<div class="customer-name">
                                        <p><?php the_title(); ?></p>
                                        <p class="date" class="review-date"><?php echo get_the_date( 'M j, Y' ); ?></p>
                                    </div>
                        			<div class="customer-function"><?php the_field('function'); ?></div>
                        			<div class="blue-text">
                                        <div>
                                             <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Icon_pawn_orange.png">
                                        </div>
                                        <p><?php the_field('blue_text'); ?></p>
                                    </div>
                        		</div>
                        		<div class="content">
                                    <div class="under">
                        			     <?php the_field('content'); ?>
                                    </div>
                        		</div>
                            </div>
                    		<div class="gradient">
                                <div class="left-part">
                                    <div class="image-target">
	                        		     <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Icon_link.png">
                                    </div>
                                    <div class="link-on">
                                        <a href="<?php the_field('link_url'); ?>" target="_blank">
    	                        		     <span><?php the_field('link_text'); ?></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="all-stars">
                                    <?php $number_star = get_field('stars');
                                        $whole = floor($number_star);  // 5
                                        $frac  = fmod($number_star, $whole);

                                        if($frac > 0.5){
                                            $whole = $whole + 1;
                                            $half_star = false;
                                        }
                                        else{
                                            $half_star = true;
                                        }

                                        for ($i = 1; $i <= $whole; $i++){
                                            
                                    ?>
	                        		     <img class="single-white-star full-star" src="<?php echo get_stylesheet_directory_uri(); ?>/img/Star.svg">

                                    <?php } 

                                    if($half_star){ ?>

                                        <img class="half-image" src="<?php echo get_stylesheet_directory_uri(); ?>/img/half_star.svg">

                                    <?php } ?>

                                </div>

                                </div>
                    	</div>
                        

                    <?php  $postNumber++;
                    endwhile;
                endif;

                wp_reset_postdata();

            ?>
        </div>
        <div class="dots-container review-page">
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
       
        $("#reviews-select-wrapper").click(function(){
            if ($("#review-select-items").hasClass("hide")) {

              $('#review-select-items').removeClass('hide');
              $('#review-category-select-button').removeClass('up');
              $('#review-category-select-button').addClass('down');
            }
            else{
              $('#review-select-items').addClass('hide');
              $('#review-category-select-button').removeClass('down');
              $('#review-category-select-button').addClass('up');
            }
        });

        var el = $("#reviews-select-wrapper");
        window.onclick = function(event) {
            if(el!== event.target && !el.has(event.target).length){
                   $('#review-select-items').addClass('hide');
            }
        }
        $(".select-items__checkbox input").click(function(){
            var att = $(this).attr("data-slug");
            $('#reviews-posts').addClass(att);
        });

     });
     jQuery(document).ready(function($){    
        if($('.homepage-insights-slider #reviews-posts').length){
            $('.homepage-insights-slider #reviews-posts').slick({
                slidesToShow: 2,
                slidesToScroll: 1,
                rows: 0,
                dots: true,
                prevArrow: jQuery('.insights-listing .slick-prev-btn-insights'),
                nextArrow: jQuery('.insights-listing .slick-next-btn-insights'),
                appendDots: '.custom-dots-insights',
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
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
                            rows: 1,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
        }

        $('.homepage-insights-slider #reviews-posts').on('setPosition', function () {
            $(this).find('.slick-slide>div>div').height('auto');
            var slickTrack = $(this).find('.slick-slide>div');
            var slickTrackHeight = $(slickTrack).height();
            $(this).find('.slick-slide>div>div').css('height', slickTrackHeight + 'px');
        });

        $(".reset-select").click(function(){
            $('#reviews-posts').slick('slickUnfilter');
        });

        $('.select-item input').on('change', function() {
        
            var filterClass = getFilterValue();
			console.log("filterClass is "+filterClass);
            
            $('#reviews-posts').slick('slickUnfilter');

            if(filterClass){

                $('#reviews-posts').slick('slickFilter', filterClass);
            }

        });

        
     });
      

      function getFilterValue() {
        // Grab all the values from the filters.
        var values = jQuery('#review-select-items').map(function() {
          // For each group, get the select values.
          var groupVal = jQuery(this).find('input:checked').map(function() {
            return jQuery(this).val();
          }).get();
          // join the values together.
          return groupVal.join(',');
        }).get();
        // Remove empty strings from the filter array.
        // and join together with a comma. this way you 
        // can use multiple filters.
        return values.filter(function(n) {
          return n !== "";
        }).join(',');
      }


    /* var max_height = 0;

       jQuery(".content .under").each(function() {
         element = $(this);
         current_height = element.innerHeight();

         if(current_height > max_height){
          max_height = current_height;
         }
       });

       if(max_height > 0){
        jQuery(".content .under").each(function() {
          $(this).css("height", max_height);
        });
       }*/

</script>