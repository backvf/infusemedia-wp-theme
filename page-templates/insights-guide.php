<?php
/*
 * Template Name: Insights Guide
 * Template Post Type: insights
 */
 ?>
<?php get_header(); ?>
<?php
global $wp;
$current_url = home_url(add_query_arg(array(), $wp->request));
?>
<style>
.guide__download_sidebar {
  display: inline-flex;
  margin-bottom: 15px;
  position: relative;
}
.share-buttons + .guide__download_sidebar {
  margin-top: 33px;
}
.guide__download-text {
	text-decoration:underline;
}

.guide__download-icon {
	width:21px;
	height:20px;
	background:url(/wp-content/themes/infusemedia/img/icon_download_or.svg) no-repeat center;
	margin-left:7px;
}

.guide__download:hover .guide__download-text,
.guide__download:hover {
	text-decoration: none;
}


</style>
<!-- (guide head) -->
<section class="guide-head" style="background-image:url(<?php the_field('guide-intro-bg'); ?>);">
    <div class="cover">
        <h1 class="guide-head__ttl">
            <?php the_field("guide-intro-title"); ?>
        </h1>
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
                					<?php 
									$pid=get_the_ID();
									$menu=get_field("summary",$pid);
									//while(have_rows("summary")): the_row(); 
									foreach($menu as $m)
									{
									?>
                						<li class="guide-menu__item scrollspy-parent">
                							<a href="<?php 
											//the_sub_field('link'); 
											echo $m['link'];
											?>" class="guide-menu__link guide-menu__link--parent scrollspy-link scrollspy-parent-link">
                							    <?php 
												//the_sub_field("item"); 
												echo $m['item'];
												
												?>
                							</a>
                							<?php 
											//if(have_rows("sub_items")): 
											if(is_array($m['sub_items']) && count($m['sub_items'])){
											?>
                								<div class="guide-menu__arrow"></div>
                								<ul class="guide-menu__sublist">
                									<?php 
													//while(have_rows("sub_items")): the_row(); 
													foreach  ($m['sub_items'] as $sub){
													?>
                									<li class="guide-menu__subitem">
                										<a href="<?php 
														//the_sub_field('link'); 
														echo $sub['link'];
														?>" class="guide-menu__sublink scrollspy-link">
                										    <?php 
															//the_sub_field("item"); 
															echo $sub['item'];
															?>
                										</a>

												<?php 
												//print_r($sub);
												if(is_array($sub['sub_items']) && count($sub['sub_items'])){ ?>
													<div class="guide-menu__arrow"></div>
													<ul class="guide-menu__sublist">
														<?php foreach($sub['sub_items'] as $sub2) {?>
														<li class="guide-menu__subitem">
															<a href="<?php echo $sub2['link']; ?>" class="guide-menu__sublink scrollspy-link">
																<?php echo $sub2['item']; ?>
															</a>
															
														</li>
												<?php } ?>
													</ul>
												<?php } ?>

														
                									</li>
                									<?php 
													//endwhile; 
													}
													?>
                								</ul>
                							<?php 
											//endif; 
											}
											?>
                						</li>	
                					<?php 
									//endwhile; 
									}
									?>
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
						<?php $pdf=get_field('pdf');
						
						?>
						<?php if($pdf!=""){ ?>
										<a class="guide__download guide__download_sidebar" href="<?php echo $pdf;?>" target="_blank">
											<span class="guide__download-text">
												Download PDF
											</span>
											<span class="guide__download-icon"></span>
										</a>						
						<?php } ?>
                	</div>
                </div>                
            </div>
            <div class="guide__right">
                <!-- (guide content) -->
                <div class="guide__content">
                    <?php $guide_content_type = get_field("guide_content_type") ?: 'html'; ?>
                    <?php the_field("guide_".$guide_content_type); ?>
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