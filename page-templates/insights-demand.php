<?php
/*
 * Template Name: Insights for Demand Generation
 * Template Post Type: insights
 */
 ?>
<?php get_header(); ?>
<?php
global $wp;
$current_url = home_url(add_query_arg(array(), $wp->request));
?>
<style>
.guide__link-big p, .guide__link p{
	color:#fff!important;
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
<section class="guide-head" style="background-image:url(<?php the_field('background_image'); ?>);">
    <div class="cover">
        <h1 class="guide-head__ttl">
            <?php the_field("title"); ?>
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
                <div class="guide__content guide__content--l">
									<div class="guide__row guide__row--p1 guide__row--f">
										<h2 class="guide__ttl scrollspy-section" id="what-is-demand">
				
                	<?php the_field("what_is_demand_generation_-_title"); ?>
										</h2>
										<div class="guide__text">					
					<?php the_field("text"); ?>
										</div>
									</div>	
									<div class="guide__row guide__row--no-p">
										<div class="guide__wide-img">
										<?php 
										$id=get_the_ID();
										
										$img=get_field("image",$id);
										
										?>
											<img src="<?php 
											echo $img["url"];
											 ?>" alt=" <?php echo $img["alt"];?>" title=" <?php echo $img["alt"];?>">
										</div>
									</div>
									<div class="guide__row guide__row--grey guide__row--p1">
										<h2 class="guide__ttl scrollspy-section" id="what-important">
											<?php the_field("title_why"); ?>
										</h2>
										<div class="guide__text">
											<?php the_field("text_why"); ?>
										</div>
										<?php
										$id=get_the_ID();
										$blocks=get_field('blocks',$id);
										$i=1;
										foreach ($blocks as $b)
										{
											if($i==1)
											{
										?>
										<div class="guide__subttl-c scrollspy-section" id="<?php echo $b['anchor'];?>">
											<div class="guide__subttl-icon">
											
												<img src="<?php echo $b['image']['url'];?>" alt="<?php echo $b['image']['alt'];?>" title="<?php echo $b['image']['alt'];?>"/>
											</div>
											<div class="guide__subttl-text">
												<h3 class="guide__subttl">
													<?php echo $b['title'];?>
												</h3>
											</div>
										</div>
										<div class="guide__text">
											<?php echo $b['text'];?>
										</div>
										</div>
										<div class="guide__row guide__row--p1">
										<?php }
										else
										{
											?>
											<div class="guide__subttl-c scrollspy-section <?php echo $b['CSS'];?>" id="<?php echo $b['anchor'];?>">
											<div class="guide__subttl-icon">
												<img src="<?php echo $b['image']['url'];?>" alt="<?php echo $b['image']['alt'];?>" title="<?php echo $b['image']['alt'];?>">
											</div>
											<div class="guide__subttl-text">
												<h3 class="guide__subttl">
													<?php echo $b['title'];?>
												</h3>
											</div>
										</div>
										<div class="guide__text">
											<?php echo $b['text'];?>
										</div>	
										
											<?php
											
										}
										$i++;
										}?>
									</div>
										<a href="<?php the_field('link_orange');?>" target="_blank" class="guide__row guide__row--or2 guide__row--p6 guide__arrow-c">
										<div class="guide__link" style="max-width:500px;">
										<div class="guide__text">
										<?php echo the_field('link_orange_text');?>
										<div class="guide__arrow">
										<div class="guide__arrow-svg">
										<svg width="56" height="8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M55.854 4.354a.5.5 0 0 0 0-.708L52.672.464a.5.5 0 1 0-.707.708L54.793 4l-2.828 2.828a.5.5 0 1 0 .707.708l3.182-3.182zM0 4.5h55.5v-1H0v1z" fill="#fff"></path></svg>
										</div>
										</div>
										</div>
										</div>
										</a>
									<?php
									$i=1;
									$examples=get_field('examples',$id);
									foreach ($examples as $b) {
									?>

<div class="guide__row <?php echo $b['css'];?>">
										<div class="guide__abmst">
											<div class="guide__abmst-text">
												<div class="guide__text">
												<?php if($i==1){?>
													<h2 class="guide__ttl scrollspy-section" style="max-width:570px;" id="examples">
														Examples of B2B Demand Generation Strategies
													</h2>
												<?php }?>
													<h2 class="guide__step scrollspy-section" id="<?php echo $b['anchor'];?>">
														<?php echo $b['title'];?>
													</h2>
													<?php echo $b['text'];
													$list=$b['list'];
													if(count($list)>2){
													?>
													<div class="guide-segm guide-segm--2" style="margin-bottom:-10px;">
														<div class="guide-segm__item guide-segm__item--gr">
															<?php echo $list[0]['text'];?>
														</div>
														<div class="guide-segm__item guide-segm__item--gr">
															<?php echo $list[1]['text'];?>
														</div>
														<div class="guide-segm__item guide-segm__item--gr">
															<?php echo $list[2]['text'];?>
														</div>
														<div class="guide-segm__item guide-segm__item--gr">
															<?php echo $list[3]['text'];?>
														</div>
														<div class="guide-segm__item guide-segm__item--gr">
															<?php echo $list[4];?>
														</div>
														<div class="guide-segm__item guide-segm__item--gr">
															<?php echo $list[5]['text'];?>
														</div>
													</div>
													<?php } ?>
												</div>
												</div>
											<div class="guide__abmst-right guide__abmst-right--h2">
												<div class="guide__abmst-img guide__abmst-img--vs-create">
													<img src="<?php echo $b['image']['url'];?>" alt="<?php echo $b['image']['alt'];?>" title="<?php echo $b['image']['alt'];?>" />
												</div>
											</div>												
											

										</div>
										<div class="guide__text">
										<?php echo $b['text2'];?>
										</div>
</div>										
										<?php
										$bi=1;
										foreach($b['blocks'] as $bl)
										{
											?>
											
<div class="guide__row <?php echo $bl['css'];?>">
<div class="guide__subttl-c">
<div class="guide__subttl-icon">
<img src="<?php echo $bl['image']['url'];?>" alt="<?php echo $bl['image']['alt'];?>" title="<?php echo $bl['image']['alt'];?>">
</div>
<div class="guide__subttl-text">
<h3 class="guide__subttl">
<?php echo $bl['title'];?>
</h3>
</div>
</div>
<div class="guide__text" style="max-width:1065px;">
<?php echo $bl['text'];?>
</div>
</div>											
<?php 
if($bl['link']!=''){
	
$stripes='<div class="guide__row-stripes guide__row-stripes--1" style="--stripesR:29px;"><div></div></div>';	
if($bl['link_stripes']!='') {$stripes=$bl['link_stripes'];}
	?>
<a href="<?php echo $bl['link'];?>" target="_blank" class="guide__row <?php echo $bl['link_css'];?> guide__row--p2 guide__arrow-c">
<?php echo $stripes; ?>


<div class="guide__link">
<div class="guide__link-text">
<?php echo $bl['link_text'];?>
<div class="guide__arrow">
<div class="guide__arrow-svg">
<svg width="56" height="8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M55.854 4.354a.5.5 0 0 0 0-.708L52.672.464a.5.5 0 1 0-.707.708L54.793 4l-2.828 2.828a.5.5 0 1 0 .707.708l3.182-3.182zM0 4.5h55.5v-1H0v1z" fill="#fff"></path></svg>
</div>
</div>
</div>
</div>
</a>
<?php }
if($bl['text_after_link']!=''){php ?>
<div class="guide__row guide__row--grey guide__row--p1">
<div class="guide__text" style="max-width:1060px;">
<?php echo $bl['text_after_link'];?>
</div>
</div>
<?php }
?>											
											<?php
											$bi++;
										}
										?>
										
										<?php $i++;
										}?>
							<div class="guide__row guide__row--bl2 guide__row--p1">
<div class="guide__cable">
<div class="guide__cable-text">
<div class="guide__text" style="max-width:1030px;">
<h2 class="guide__ttl scrollspy-section" id="what-is-lead" data-id="what-is-lead">
<?php the_field('title_lead');?>
</h2>
<?php the_field('text_lead');?>
</div>
</div>
<div class="guide__cable-img">
<?php 
$img=get_field('image_lead',get_the_ID());
?>
<img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>" title="<?php echo $img['alt'];?>"> 
</div>
</div>
<div class="guide__text" style="max-width:1030px;">
<?php the_field('text_lead2');?>
</div>
</div>											
<?php 
$i=0;
$blocks=get_field('blocks_lead',$id);
$bi=1;
foreach ($blocks as $b)
{

?>
<div class="guide__row <?php echo $b['css'];?> guide__row--p1">
<div class="guide__abmst">
<div class="guide__abmst-text">
<div class="guide__text" style="max-width:645px;">
<h2 class="guide__step scrollspy-section" id="<?php echo $b['anchor'];?>" data-id="<?php echo $b['anchor'];?>">
<?php echo $b['title'];?>
</h2>
<?php echo $b['text'];?>
</div>
</div>
<div class="guide__abmst-right guide__abmst-right--h2">
<div class="guide__abmst-img guide__abmst-img--aw">
<img src="<?php echo $b['image']['url'];?>" alt="<?php echo $b['image']['alt'];?>" title="<?php echo $b['image']['alt'];?>">
</div>
</div>
</div>
<div class="guide__text" style="max-width:1025px;">
<?php echo $b['text2'];?>
</div>
</div>
<?php		
if($b['link']!='')	{
	?>
<a href="<?php echo $b['link'];?>" target="_blank" class="guide__row <?php echo $b['link_css'];?> guide__arrow-c">
<?php if($bi!=3){?>
<div class="guide__row-stripes guide__row-stripes--2 guide__row-stripes--st1" style="--stripesR:29px;">
<div></div>
<div></div>
<div></div>
</div>
<div class="guide__link">
<div class="guide__link-text">
<?php echo $b['link_text'];?>
<div class="guide__arrow">
<div class="guide__arrow-svg">
<svg width="56" height="8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M55.854 4.354a.5.5 0 0 0 0-.708L52.672.464a.5.5 0 1 0-.707.708L54.793 4l-2.828 2.828a.5.5 0 1 0 .707.708l3.182-3.182zM0 4.5h55.5v-1H0v1z" fill="#fff"></path></svg>
</div>
</div>
</div>
</div>
<?php }  else {?>
<div class="guide__link guide__link--cal">
<div class="guide__link-big" style="max-width:740px;">
<?php echo $b['link_text'];?>
</div>
<div class="guide__link-space"></div>
<div class="guide__text" style="max-width:620px;">
<?php echo $b['link_text2'];?>
<div class="guide__arrow">
<div class="guide__arrow-svg">
<svg width="56" height="8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M55.854 4.354a.5.5 0 0 0 0-.708L52.672.464a.5.5 0 1 0-.707.708L54.793 4l-2.828 2.828a.5.5 0 1 0 .707.708l3.182-3.182zM0 4.5h55.5v-1H0v1z" fill="#fff"></path></svg>
</div>
</div>
</div>
</div>
<div class="guide__cal">
<img src="/images/guides/icon_calendar.svg" alt="">
</div>
<?php } ?>
</a>	
	<?php
}
	$i++;
	$bi++;
}
?>
<div class="guide__row guide__row--p1">
<div class="guide__text" style="max-width:1030px;">
<?php the_field('lp_text');?>
</div>
</div>

<a href="<?php the_field('look_link');?>" target="_blank" class="guide__row guide__row--bl4 guide__row--p3 guide__arrow-c">
<div class="guide__row-stripes guide__row-stripes--vs1 guide__row-stripes--st1" style="--stripesR:76px;">
<div></div>
<div></div>
<div></div>
</div>
<div class="guide__link">
<div class="guide__link-big" style="max-width:630px;">
<?php the_field('look_link_text1');?>
</div>
<div class="guide__link-space"></div>
<div class="guide__text" style="max-width:645px;">
<?php the_field('look_link_text2');?>
<div class="guide__arrow">
<div class="guide__arrow-svg">
<svg width="56" height="8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M55.854 4.354a.5.5 0 0 0 0-.708L52.672.464a.5.5 0 1 0-.707.708L54.793 4l-2.828 2.828a.5.5 0 1 0 .707.708l3.182-3.182zM0 4.5h55.5v-1H0v1z" fill="#fff"></path></svg>
</div>
</div>
</div>
</div>
</a>

<div class="guide__row guide__row--p1">
<div class="guide__text">
<h2 class="guide__ttl scrollspy-section" id="vs" style="max-width:810px;" data-id="vs">
<?php the_field('title_vs');?>
</h2>
<?php the_field('text_vs');?>
</div>
<div class="image-with-share" style="display: none;">
<div class="image-with-share-image">
<?php $img=get_field('image_vs',get_the_ID());


?>
<img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>" title="<?php echo $img['alt'];?>">
</div>
<div class="image-with-share-button">
<div class="image-with-share-button-link-wrap">
<div class="image-with-share-button-link">
<img src="/wp-content/themes/infusemedia/frontend/images/content/share.svg">
<img src="/wp-content/themes/infusemedia/frontend/images/content/share-ok.svg">
</div>
<div class="image-with-share-ok">
Copied to<br>clipboard!
</div>
</div>
<div class="image-with-share-button-text">SHARE<br>On Your Site</div>
</div>
</div>
<div style="display:none;">
<p>
Demand Generation:
</p>
<ul>
<li>
Guest posts
</li>
<li>
Email marketing
</li>
<li>
Webinars
</li>
<li>
Social media posts
</li>
<li>
Free tools
</li>
<li>
Podcasts
</li>
<li>
Videos
</li>
<li>
Articles on trending topics
</li>
<li>
Direct mail
</li>
<li>
Sweepstakes and contests
</li>
<li>
SEO-focused content
</li>
<li>
Deep media
</li>
<li>
Paid advertising
</li>
</ul>
<table>
<thead>
<tr>
<th>
</th>
<th>
</th>
<th>
Lead Generation
</th>
</tr>
</thead>
<tbody>
<tr>
<td>
Attract
</td>
<td>
1
</td>
<td>
Campaigns
</td>
</tr>
<tr>
<td>
Interact
</td>
<td>
2
</td>
<td>
Leads
</td>
</tr>
<tr>
<td>
Track/Manage
</td>
<td>
3
</td>
 <td>
Opportunities
</td>
</tr>
<tr>
<td>
Close
</td>
<td>
4
</td>
<td>
Sales
</td>
</tr>
<tr>
<td>
Loyalty
</td>
<td>
5
</td>
<td>
Clients
</td>
</tr>
<tr>
<td>
</td>
<td>
</td>
<td>
Retention
</td>
</tr>
</tbody>
</table>
</div>
<div class="guide__text">
<?php the_field('text_vs_2');?>
</div>
<div class="image-with-share" style="display: none;">
<div class="image-with-share-image">
<?php $img=get_field('image_vs_2',get_the_ID());?>
<img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>" title="<?php echo $img['alt'];?>">
</div>
<div class="image-with-share-button">
<div class="image-with-share-button-link-wrap">
<div class="image-with-share-button-link">
<img src="/wp-content/themes/infusemedia/frontend/images/content/share.svg">
<img src="/wp-content/themes/infusemedia/frontend/images/content/share-ok.svg">
</div>
<div class="image-with-share-ok">
Copied to<br>clipboard!
</div>
</div>
<div class="image-with-share-button-text">SHARE<br>On Your Site</div>
</div>
</div>
<div class="guide__text">
<?php the_field('text_vs_3');?>
</div>
</div>
<div class="guide__row guide__row--grey guide__row--p1">
<h2 class="guide__ttl scrollspy-section" id="together" style="max-width:710px;" data-id="together">
<?php the_field('title_how');?>
</h2>
<div class="guide__text">
<?php the_field('text_how');?>
</div>
</div>
<div class="guide__row guide__row--no-p">
<div class="guide__wide-img guide__wide-img--b guide__wide-img--b-or">
<?php $img=get_field('image_how',get_the_ID());?>
<img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>" title="<?php echo $img['alt'];?>">
</div>
</div>
<div class="guide__row guide__row--p1">
<h2 class="guide__ttl scrollspy-section" id="final" data-id="final">
<?php the_field('title_final');?>
</h2>
<div class="guide__text">
<?php the_field('text_final');?>
</div>
</div>
<a href="<?php the_field('link_final');?>" target="_blank" class="guide__row guide__row--or2 guide__row--p6 guide__arrow-c">
<div class="guide__link" style="max-width:500px;">
<div class="guide__text">
<?php the_field('link_final_text');?>
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