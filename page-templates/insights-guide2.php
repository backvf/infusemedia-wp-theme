<?php
/*
 * Template Name: Insights Guide 2
 * Template Post Type: insights
 */
 ?>
<?php get_header(); ?>
<?php
global $wp;
$current_url = home_url(add_query_arg(array(), $wp->request));
the_post();
?>
<style>
.guide__recommendations-text, .guide__recommendations-text p {
  color: #FFFFFF!important;
  line-height: 24px;
  padding-bottom: 6px;
}
.guide__left-inner {
    height: calc(100vh - 55px);
    position: sticky;
    top: 55px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    padding: 20px 0;
}

</style>
<script>
    jQuery(window).scroll(function() {
	var offtop=600;
	var offbottom=jQuery('.wrapper__footer').offset();
    bottom=offbottom.top-1000;
    
        if (jQuery(window).scrollTop() > offtop && jQuery(window).scrollTop() < bottom) {
		jQuery('.guide__left-inner').css({'position':'fixed'});
		}
		else
		{
		jQuery('.guide__left-inner').css({'position':'sticky'});
		}
		});
</script>
<!-- (guide head) -->
<section class="guide-head" style="background-image:url(<?php the_field('guide-intro-bg'); ?>);">
    <div class="cover">
        <h1 class="guide-head__ttl">
            <?php the_field("guide-intro-title"); ?>
        </h1>
        <h2 class="guide-head__sub-ttl"><?php the_field("sub_title"); ?></h2>
    </div>
    <div class="guide-head__scroll">
    	<div class="cover cover--guide-scr">
    		<div class="guide__sum">
    			<div class="guide__sum-text">
    				Summary
    			</div>
    			<div class="guide__sum-icon"></div>
    		</div>
    	</div>
    </div>
</section>
<!-- End (guide head) -->
<!-- (guide) -->
<section class="guide scrollspy-block" id="guide">
    <div class="cover cover--guide">
        <div class="guide__container">
            <div class="guide__left dt-opened dt--hide-side">
                <div class="guide__trigger-c">
                    <div class="guide__trigger">
                        <div class="guide__trigger-text">
                            Summary
                        </div>
                        <div class="guide__trigger-icon">
                            <img src="https://infusemedia.com/wp-content/themes/infusemedia/frontend/images/guides/guide-trigger.svg" alt="" />
                        </div>
                    </div>
                </div>
                <div class="guide__left-inner">
                	<div class="guide__left-top">
                		<div class="guide__sum">
                			<div class="guide__sum-text">
                				Summary
                			</div>
                			<div class="guide__sum-icon"></div>
                		</div>
                	</div>
                	<div class="guide__left-menu">
                		<div class="guide__left-scroll">
                			<div class="guide-menu">
                            
                				<ul class="guide-menu__list scrollspy-menu">
                                

                					<?php while(have_rows("summary")): the_row(); ?>
                						<li class="guide-menu__item scrollspy-parent">
                							<a href="<?php the_sub_field('link'); ?>" class="guide-menu__link guide-menu__link--parent scrollspy-link scrollspy-parent-link">
                							    <?php the_sub_field("item"); ?>
                							</a>
                							<?php if(have_rows("sub_items")): ?>
                								<div class="guide-menu__arrow"></div>
                								<ul class="guide-menu__sublist">
                									<?php while(have_rows("sub_items")): the_row(); ?>
                									<li class="guide-menu__subitem">
                										<a href="<?php the_sub_field('link'); ?>" class="guide-menu__sublink scrollspy-link">
                										    <?php the_sub_field("item"); ?>
                										</a>
                									</li>
                									<?php endwhile; ?>
                								</ul>
                							<?php endif; ?>
                						</li>	
                					<?php endwhile; ?>
                				</ul>
                			</div>
                		</div>
                	</div>
                	<div class="guide__left-bot">
                		<div class="share-buttons">
                		    <ul>
                		        <li class="share">Share:</li>
                		        <li class="linkedin-share"><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $current_url; ?>&title=<?php echo wp_title(); ?>" target="_blank">
                		                <icon class="fab fa-linkedin-in"></icon>
                		            </a></li>
                		        <li class="twitter-share"><a href="https://twitter.com/intent/tweet?url=<?php echo $current_url; ?>" target="_blank">
                		                <icon class="fab fa-twitter"></icon>
                		            </a></li>
                		        <li class="facebook-share"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_url; ?>" target="_blank">
                		                <icon class="fab fa-facebook"></icon>
                		            </a></li>
                		        <li class="mail-share"><a href="mailto:info@example.com?&subject=<?php echo wp_title(); ?>&body=<?php echo $current_url; ?>&title=&summary=&source=" target="_blank">
                		                <icon class="fas fa-envelope"></icon>
                		            </a></li>
                		    </ul>
                		</div>
                	</div>
                </div>                
            </div>
            <div class="guide__right">
                <!-- (guide content) -->
                <div class="guide__content">
                	
                	<?php 
                    
                    
                    $content=get_field("content_group"); 
                    
					echo $content["top_description"];
					echo $content["top_cta"];
					echo $content["top_description_2"];
					echo $content["recomendations"];
                    
?>
					<div class="guide__experts">
					<?php
					foreach ($content['authors'] as $a)
					{
						?>
<div class="guide__expert-item scrollspy-section <?php echo $a["css_class"];?> clearfix" id="<?php echo $a["anchor"];?>" data-id=""<?php echo $a["anchor"];?>">
<div class="guide__expert-img-container">
<div class="guide__expert-img-wrapper">
<img src="<?php echo $a["avatar"];?>" alt="<?php echo $a["name"];?>" class="guide__expert-img">
</div>
<div class="guide__expert-name"><?php echo $a["name"];?></div>
</div>
<div class="guide__expert-info">
<div class="guide__text">
<?php echo $a["description"];?>
</div>
<div class="guide__about-author">
<h4 class="guide__about-author-title">About the author:</h4>
<div class="guide__text">
<?php echo $a["about"];?>
</div>
</div>
</div>
</div>						
						<?php
					}
					?>
					</div>
					<?php			
					echo $content["final_thoughts"];
					echo $content["bottom_description"];
					?>
                    <a href="https://infusemedia.com/insights/" target="_blank" class="guide__row guide__row--or guide__row--p2 guide__arrow-c">
<div class="guide__row-right"></div>
<div class="guide__link">
<div class="guide__link-text">
Visit the Insights blog
<div class="guide__arrow">
<div class="guide__arrow-svg">
<svg width="56" height="8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M55.854 4.354a.5.5 0 0 0 0-.708L52.672.464a.5.5 0 1 0-.707.708L54.793 4l-2.828 2.828a.5.5 0 1 0 .707.708l3.182-3.182zM0 4.5h55.5v-1H0v1z" fill="#fff"></path></svg>
</div>
</div>
</div>
</div>
</a>
                	<style>
                		.mob-share{
                			display: none;
                		}
                		@media only screen and (max-width: 767px) {
                			.mob-share{
                				display: flex;
                				justify-content: center;
                				margin-top: 20px;
                				padding: 0 15px;
                			}
                			.mob-share .share-buttons{
                				width: auto;
                			}
                		}
                	</style>
            	    <div class="mob-share">
            	    <div class="share-buttons">
            	        <ul>
            	            <li class="share">Share:</li>
            	            <li class="linkedin-share"><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $current_url; ?>&title=<?php echo wp_title(); ?>" target="_blank">
            	                    <icon class="fab fa-linkedin-in"></icon>
            	                </a></li>
            	            <li class="twitter-share"><a href="https://twitter.com/intent/tweet?url=<?php echo $current_url; ?>" target="_blank">
            	                    <icon class="fab fa-twitter"></icon>
            	                </a></li>
            	            <li class="facebook-share"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_url; ?>" target="_blank">
            	                    <icon class="fab fa-facebook"></icon>
            	                </a></li>
            	            <li class="mail-share"><a href="mailto:info@example.com?&subject=<?php echo wp_title(); ?>&body=<?php echo $current_url; ?>&title=&summary=&source=" target="_blank">
            	                    <icon class="fas fa-envelope"></icon>
            	                </a></li>
            	        </ul>
            	    </div>
            		</div>
                </div>
            </div>
            <!-- End (guide content) -->
        </div>
    </div>
    </div>
</section>
<!-- End (guide) -->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<?php get_footer(); ?>