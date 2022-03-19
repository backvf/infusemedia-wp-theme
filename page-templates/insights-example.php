<?php
/*
 * Template Name: Insights for Examples
 * Template Post Type: insights
 */
 ?>
<?php get_header(); ?>
<?php
global $wp;
$current_url = home_url(add_query_arg(array(), $wp->request));
?>
<!--<script src='/wp-content/themes/infusemedia/frontend/examples/js/scripts.js'></script>-->
<link rel='stylesheet' href='/wp-content/themes/infusemedia/frontend/examples/css/guides.css' media='all' />
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
            30 Examples <br>of Creative <br>Content <br>Marketing <br>Done Right
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
                								<ul class="guide-menu__sublist  guide-menu__sublist--exes">
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
						<div class="guide__row guide__row--last guide__row--f">
						<div class="guide__text">
						<?php the_field('top_content');?>
						</div>
						</div>
						<?php
						$ID=get_the_ID();
						
						$fs=get_field('first_steps',$ID);
						
						?>
									<div class="guide__row guide__row--p1">
										<h2 class="guide__ttl scrollspy-section" id="first-steps" style="margin-bottom:0!important;">
											First Steps
											
										</h2>
									</div>
									<div class="guide__row guide__row--no-p">
										<div class="guide__wide-img">
											<img src="<?php echo $fs['image'];?>" alt="" />
										</div>
									</div>
									<div class="guide__row guide__row--p1">
										<div class="guide__text" style="max-width:1030px;">
										<?php echo $fs['text'];?>
										</div>
									</div>
									<div class="guide__row guide__row--p1 guide__row--grey">		
									<?php 
									
									foreach ($fs["items"] as $r){
										
										?>
										<div class="guide__subttl-c guide__subttl-c--l scrollspy-section" id="<?php echo $r['anchor'];?>">
											<div class="guide__subttl-icon">
												<img src="<?php echo $r['image'];?>" alt="" />
											</div>
											<div class="guide__subttl-text">
												<h3 class="guide__subttl">
													<?php echo $r['title']; ?>
												</h3>
											</div>
										</div>
										<div class="guide__text" style="max-width:1030px;">
											
												<?php echo $r['text'];?>
											
										</div>										
									<?php }?>
									
									</div>
									<div class="guide__row guide__row--p1">
										<h2 class="guide__ttl scrollspy-section" id="content-marketing-examples" style="margin-bottom:0!important;">
											30 Creative Content Marketing Examples
										</h2>
									</div>
									<?php 
									$items=get_field('items');
									$n=1;
									$bl1=get_field('block1');
									$bl2=get_field('block2');
									foreach ($items as $i)
									{
										if($n==16)
										{
											?>
<a href="<?php echo $bl1['link'];?>" target="_blank" class="guide__row guide__row--bl4 guide__row--p3 guide__arrow-c">
										<div class="guide__row-right guide__row-right--t5 guide__row-right--striped"></div>
										<div class="guide__link">
											<div class="guide__link-big" style="max-width:800px;">
												<?php echo $bl1['text1'];?>
											</div>
											<div class="guide__link-space"></div>
											<div class="guide__link-med" style="font-family:'Roboto';font-weight:400;font-size:15px;line-height:23px;">
												<?php echo $bl1['text2'];?>
												<div class="guide__arrow">
													<div class="guide__arrow-svg">
														<svg width="56" height="8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M55.854 4.354a.5.5 0 0 0 0-.708L52.672.464a.5.5 0 1 0-.707.708L54.793 4l-2.828 2.828a.5.5 0 1 0 .707.708l3.182-3.182zM0 4.5h55.5v-1H0v1z" fill="#fff"></path></svg>
													</div>
												</div>
											</div>
										</div>
									</a>											
											<?php
										}
										
										$imgleft=$i['image_left'];
										$imgright=$i['image_right'];
										$imgtop=$i['image_top'];
										$imgbottom=$i['image_bottom'];
										
										$bg=$i['background_color'];
										$style='';
										if($bg!="") {$style="background-color:$bg";}
										$white='';
										if($i['link_color']=='white'){
											$white=' guide-ex--white guide-ex__ttl--w ';
										}
										if($imgtop['image']!='')
										{
											$imgclass='';
											if($imgleft['css']!='') {$imgclass=$imgleft['css'];}
											
										?>
									<div class="guide-ex guide-ex--<?php echo $n;?> scrollspy-section" id="<?php echo $i['anchor'];?>" style="<?php echo $style; ?>">
									
										<?php if($i['title_after_image']=='yes'){?>
										<div class="guide__row guide__row--p2 guide__row--ex1 <?php echo $imgtop['css1'];?>">
											<div class="guide-ex__<?php echo $n;?>-img <?php echo $imgtop['css2'];?>">
												<picture>
												<?php if($imgtop['image_mobile']!=''){?>
											<source srcset="<?php echo $imgtop['image_mobile'];?>" type="image/png" media="(max-width:767px)">
												<?php } ?>
													<source srcset="<?php echo $imgtop['image'];?>" type="image/jpeg">
													<img src="<?php echo $imgtop['image'];?>" alt="" />
												</picture>
											</div>
										</div>
										<div class="guide__row guide__row--p3 guide__row--ex2">
											<div class="guide-ex__ttl <?php echo $white;?>">
												<div class="guide-ex__ttl-row">
													<a class="guide-ex__ttl-link" href="<?php echo $i['link'];?>" target="_blank"></a>
													<div class="guide-ex__ttl-head">
														<span>#<?php echo $i['number'];?></span> <?php echo $i['title'];?> 
													</div>
												</div>
												<div class="guide-ex__ttl-auth">
													<span>(<?php echo $i['sub_title'];?>)</span>
												</div>
											</div>
											<div class="guide__text">
												<?php echo $i['content'];?>
											</div>
											
										</div>	
											<?php
										if($i["citate"]!=""){ ?>
<div class="guide__row guide__row--p2 guide__row--dark-bl">
<div class="guide-ex__quote" style="max-width:1025px;">
<div class="guide__text">
<p>
<b>
<?php echo $i["citate"];?>
</b>
</p>
</div>
</div>
</div>	
										<?php } ?>											
										<?php } else {?>
										<div class="guide__row guide__row--p2 guide__row--f guide__row--last">
											<div class="guide-ex__ttl <?php echo $white;?>">
												<div class="guide-ex__ttl-row">
													<a class="guide-ex__ttl-link" href="<?php echo $i['link'];?>" target="_blank"></a>
													<div class="guide-ex__ttl-head">
														<span>#<?php echo $i['number'];?></span> <?php echo $i['title'];?>
													</div>
												</div>
												<div class="guide-ex__ttl-auth">
													<span>(<?php echo $i['sub_title'];?>)</span>
												</div>
											</div>
										</div>
										<div class="guide__row guide__row--no-p guide__row--dark-bl">
										<?php if($n==6) {?>
												<img src="<?php echo $imgtop['image'];?>" alt="" />
										<?php } else {?>
											<div class="guide__wide-img guide__wide-img--ex12">
											<picture>
												<?php if($imgtop['image_mobile']!=''){?>
											<source srcset="<?php echo $imgtop['image_mobile'];?>" type="image/png" media="(max-width:767px)">
												<?php } ?>		
																																					<source srcset="<?php echo $imgtop['image'];?>" type="image/jpeg">
												<img src="<?php echo $imgtop['image'];?>" alt="" />
												</picture>
											</div>
										<?php }?>
										</div>
										<div class="guide__row guide__row--p2 guide__row--last">
											<div class="guide__text">
												<?php echo $i['content'];?>
											</div>
										</div>	
										<?php 
										if($i["citate"]!=""){ ?>
<div class="guide__row guide__row--p2 guide__row--dark-bl">
<div class="guide-ex__quote" style="max-width:1025px;">
<div class="guide__text">
<p>
<b>
<?php echo $i["citate"];?>
</b>
</p>
</div>
</div>
</div>	
										<?php } ?>									
										<?php }?>
									</div>
										<?php
										}
										
										if($imgleft['image']!='')
										{
											$mid='';
											$imgclass='';
											if($imgleft['css']!='') {$imgclass=$imgleft['css'];}
											if($n==9) {$mid=' guide-ex__row--mid ';
											}
											$contclass='';
											if($n==16) {
												$imgclass='guide-ex__img--ex16';
												$contclass='guide-ex__cont--ex16';
											}
											if($n==30) {
												$imgclass='guide-ex__img--ex30';
												$contclass='guide-ex__cont--ex30';
											}
										?>
									<div class="guide-ex <?php echo $i['css'];?> <?php echo $white;?>   scrollspy-section guide-ex--2" id="<?php echo $i['anchor'];?>" style="<?php echo $style; ?>">
									

										<div class="guide-ex__row <?php echo $mid?>">
											<div class="guide-ex__img <?php echo $imgclass;?>">
											<?php if($imgleft['image_additional']!=""){?>
												<div class="guide-ex__2-back">
													<img src="<?php echo $imgleft['image_additional'];?>" alt="" />
												</div>	
											<?php } ?>
											<?php if($imgleft['video_link']!='') {?>
											<a href="<?php echo $imgleft['video_link'];?>" target="_blank"> <?php }?>
												<picture>
												<?php if($imgleft['image_mobile']!=''){?>
											<source srcset="<?php echo $imgleft['image_mobile'];?>" type="image/png" media="(max-width:767px)">
												<?php } ?>
													<source srcset="<?php echo $imgleft['image'];?>" type="image/jpeg">											
												<img src="<?php echo $imgleft['image'];?>" alt="" />
												</picture>
											<?php if($imgleft['video_link']!='') {?></a><?php } ?>
											</div>
											<div class="guide-ex__cont <?php echo $contclass;?>">
												<div class="guide-ex__ttl <?php echo $white;?>">
													<div class="guide-ex__ttl-row">
														<a class="guide-ex__ttl-link" href="<?php echo $i['link'];?>" target="_blank"></a>
														<div class="guide-ex__ttl-head" style="max-width:520px;">
															<span>#<?php echo $i['number'];?></span> <?php echo $i['title'];?>
														</div>
													</div>
													<div class="guide-ex__ttl-auth">
														<span>(<?php echo $i['sub_title'];?>)</span>
													</div>
												</div>
												<div class="guide__text">
													<?php echo $i['content'];?>
												</div>
											</div>
										</div>
																	
									
									</div>

										<?php
										}
										
									if($i['background_image']!='')
									{
										?>
										<div class="guide-ex guide-ex--white guide-ex--pt1 guide-ex--pb1 scrollspy-section" id="<?php echo $i['anchor'];?>" style="<?php echo $style; ?>">
										<div class="guide-ex__14-bg">
											<picture>
												<source srcset="/wp-content/themes/infusemedia/frontend/examples/images/guides/blank.png" type="image/png" media="(max-width:1000px)">

												<source srcset="<?php echo $i['background_image'];?>" type="image/jpeg">
												<img src="<?php echo $i['background_image'];?>" alt="" />
											</picture>
										</div>
										<div class="guide-ex__row guide-ex__row--mid guide-ex__row--ex14">
											<div class="guide-ex__img guide-ex__img--ex14 guide-ex__img--fw">
												<a href="<?php echo $imgleft['video_link'];?>" target="_blank">
													<picture>
														<source srcset="/wp-content/themes/infusemedia/frontend/examples/images/guides/ex/ex14_2.jpg" type="image/png" media="(max-width:1000px)">

														<source srcset="/wp-content/themes/infusemedia/frontend/examples/images/guides/ex/icon_play.png" type="image/png">
														<img src="/wp-content/themes/infusemedia/frontend/examples/images/guides/ex/icon_play.png" alt="" />
													</picture>
												</a>
											</div>
											<div class="guide-ex__cont">
												<div class="guide-ex__ttl guide-ex__ttl--w">
													<div class="guide-ex__ttl-row">
														<a class="guide-ex__ttl-link" href="<?php echo $i['link'];?>" target="_blank"></a>
														<div class="guide-ex__ttl-head" style="max-width:480px;">
															<span>#<?php echo $i['number'];?></span> <?php echo $i['title'];?>
														</div>
													</div>
													<div class="guide-ex__ttl-auth">
														<span>(<?php echo $i['sub_title'];?>)</span>
													</div>
												</div>
												<div class="guide__text">
													<?php echo $i['content'];?>
												</div>
											</div>
										</div>
									</div>										
										<?php
									}

										
									$n++;	
									}
									$f=get_field('footer');
									$fun=$f['fun'];
									$b1=$fun['block_1'];
									$b2=$fun['block_2'];
									$b3=$fun['block_3'];
									$b4=$fun['block_4'];
									?>									

<div class="guide__row guide__row--f guide__row--last">
										<h2 class="guide__ttl scrollspy-section" id="conclusion">
											<?php echo $f['title'];?>
										</h2>
										<h3 class="guide__subttl" style="max-width:840px;color:#1C3C70;">
											<?php echo $f['text'];?>
										</h3>
									</div>
									<br />
									<div class="guide__row guide__row--p3 guide__row--grey">
										<div class="guide__subttl-c guide__subttl-c--l scrollspy-section" id="fun">
											<div class="guide__subttl-icon">
												<img src="<?php echo $fun['image'];?>" alt="" />
											</div>
											<div class="guide__subttl-text">
												<h3 class="guide__subttl">
													<?php echo $fun['title'];?>
												</h3>
											</div>
										</div>
										<div class="guide__text" style="max-width:970px;">
											<?php echo $fun['text'];?>
										</div>
									</div>
									<div class="guide__row guide__row--no-p">
										<div class="guide-ex__funds">
											<div class="guide-ex__fund">
												<div class="guide__subttl-c guide__subttl-c--ex guide__subttl-c--l scrollspy-section" id="<?php echo $b1['anchor'];?>">
													<div class="guide__subttl-icon">
													<?php if($b1['image']!=''){?>
														<img src="<?php echo $b1['image'];?>" alt="" />
													<?php } ?>
													<?php if($b1['image2']!=''){?>
														<img src="<?php echo $b1['image2'];?>" alt="" />
													<?php } ?>

													</div>
													<div class="guide__subttl-text">
														<h3 class="guide__subttl">
															<?php echo $b1['title'];?>
														</h3>
													</div>
												</div>
												<div class="guide__text" style="max-width:420px;">
													<?php echo $b1['text'];?>
												</div>
											</div>
											<div class="guide-ex__fund">
												<div class="guide__subttl-c guide__subttl-c--ex guide__subttl-c--l scrollspy-section" id="<?php echo $b2['anchor'];?>">
													<div class="guide__subttl-icon">
											<?php if($b2['image']!=''){?>
														<img src="<?php echo $b2['image'];?>" alt="" />
													<?php } ?>
													<?php if($b2['image2']!=''){?>
														<img src="<?php echo $b2['image2'];?>" alt="" />
													<?php } ?>
													</div>
													<div class="guide__subttl-text">
														<h3 class="guide__subttl">
															<?php echo $b2['title'];?>
														</h3>
													</div>
												</div>
												<div class="guide__text" style="max-width:540px;">
													<?php echo $b1['text'];?>
												</div>
											</div>
											<div class="guide-ex__fund">
												<div class="guide__subttl-c guide__subttl-c--ex guide__subttl-c--l scrollspy-section" id="<?php echo $b3['anchor'];?>">
													<div class="guide__subttl-icon">
											<?php if($b3['image']!=''){?>
														<img src="<?php echo $b3['image'];?>" alt="" />
													<?php } ?>
													<?php if($b3['image2']!=''){?>
														<img src="<?php echo $b3['image2'];?>" alt="" />
													<?php } ?>

													</div>
													<div class="guide__subttl-text">
														<h3 class="guide__subttl">
															<?php echo $b3['title'];?>
														</h3>
													</div>
												</div>
												<div class="guide__text" style="max-width:420px;">
													<?php echo $b3['text'];?>
												</div>
											</div>
											<div class="guide-ex__fund">
												<div class="guide__subttl-c guide__subttl-c--ex guide__subttl-c--l scrollspy-section" id="<?php echo $b4['anchor'];?>">
													<div class="guide__subttl-icon">
											<?php if($b4['image']!=''){?>
														<img src="<?php echo $b4['image'];?>" alt="" />
													<?php } ?>
													<?php if($b4['image2']!=''){?>
														<img src="<?php echo $b4['image2'];?>" alt="" />
													<?php } ?>
													
													</div>
													<div class="guide__subttl-text">
														<h3 class="guide__subttl">
															<?php echo $b4['title'];?>
														</h3>
													</div>
												</div>
												<div class="guide__text" style="max-width:420px;">
													<?php echo $b4['text'];?>
												</div>
											</div>
										</div>
									</div>
<a href="<?php echo $bl2['link'];?>" target="_blank" class="guide__row guide__row--or2 guide__row--p3 guide__arrow-c">
										<div class="guide__row-right guide__row-right--t5"></div>
										<div class="guide__link">
											<div class="guide__link-big" style="max-width:740px;">
												<?php echo $bl2['text1'];?>
											</div>
											<div class="guide__link-space"></div>
											<div class="guide__link-med" style="font-family:'Roboto';font-weight:400;font-size:15px;line-height:23px;">
												<?php echo $bl2['text2'];?>
												<div class="guide__arrow">
													<div class="guide__arrow-svg">
														<svg width="56" height="8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M55.854 4.354a.5.5 0 0 0 0-.708L52.672.464a.5.5 0 1 0-.707.708L54.793 4l-2.828 2.828a.5.5 0 1 0 .707.708l3.182-3.182zM0 4.5h55.5v-1H0v1z" fill="#fff"/></svg>
													</div>
												</div>
											</div>
										</div>
									</a>						
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