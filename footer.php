<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$current_url = home_url($_SERVER['REQUEST_URI']); ?>
<div class="wrapper__footer">
	<!-- (footer) -->
	<footer class="footer">
		<div class="footer__cover <?php echo get_field('disable_page_builder') ? 'cover' : 'container';?>">
			<div class="footer__wrapper">
				<div class="footer__column">
					<div class="footer__column-content">
						<div class="footer__logo">
							<div class="footer__logo-line"></div>
                            <?php $logo_url = '/';
                            foreach (['emea', 'latam', 'apac'] as $slug) {
                                if (strpos($current_url, $slug) !== false) {
                                    $logo_url.= $slug.'/';
                                }
                            }
                            ?>
							<a href="<?php echo $logo_url; ?>" class="footer__logo-link">
								<?php
								$custom_logo_id = get_theme_mod( 'custom_logo' );
								$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
								$custom_logo_alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', true);
								?>
								<img src="<?php echo esc_url( $custom_logo_url )?>" alt="<?php echo $custom_logo_alt; ?>" class="footer__logo-icon">
							</a>
						</div>
						<div class="footer__dop-contacts">
							<div class="footer__email-wrapper">
								<div class="footer__email">
									<a href="mailto:<?php the_field('infuse_company_email_address', 'options');?>" class="footer__email-link"><?php the_field('infuse_company_email_address', 'options');?></a>
								</div>
							</div>
							<div class="footer__social">
								<ul class="footer__social-list">
									<?php
									if( have_rows('infuse_social_icons', 'options') ):
										while ( have_rows('infuse_social_icons', 'options') ) : the_row();
											$i = get_sub_field('icon');
											$link = get_sub_field('url');?>

											<li class="footer__social-item">
												<a href="<?php echo $link['url']; ?>" class="footer__social-link <?php echo $i == 6 ? 'footer__social-link_green' : 'footer__social-link_orange'?>" target="_blank">

													<?php switch ($i) {
														case 3: ?>
															<svg style="border-radius:100%; width:20px; height:auto" class="footer__social-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" x="0px" y="0px" width="50" height="50" viewBox="0 0 50 50" style="null" class="icon icons8-Facebook-Filled" >    <path d="M40,0H10C4.486,0,0,4.486,0,10v30c0,5.514,4.486,10,10,10h30c5.514,0,10-4.486,10-10V10C50,4.486,45.514,0,40,0z M39,17h-3 c-2.145,0-3,0.504-3,2v3h6l-1,6h-5v20h-7V28h-3v-6h3v-3c0-4.677,1.581-8,7-8c2.902,0,6,1,6,1V17z"></path></svg>

															<?php break;
														case 1: ?>
															<svg class="footer__social-icon" width="14" height="14">
																<use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-social-linkedin"></use>
															</svg>
															<?php break;
														case 2: ?>
															<svg class="footer__social-icon" width="18" height="14">
																<use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-social-twitter"></use>
															</svg>
															<?php break;
														case 4: ?>
															<svg class="footer__social-icon" width="16" height="16">
																<use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-social-instagram"></use>
															</svg>
															<?php break;
														case 5: ?>
															<svg class="footer__social-icon" style="width:18px; height:auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
															<?php break;
														case 6: ?>
															<svg class="footer__social-icon" width="14" height="18">
																<use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-social-glassdoor"></use>
															</svg>
															<?php break;
													} ?>

												</a>
											</li>
										<?php endwhile;
									endif;
									?>
								</ul>
							</div>
						</div>
						<div class="footer__main-contacts">
							<div class="footer__main-contacts-info">
								<p><?php the_field('infuse_company_phone_number', 'options'); ?></p>
								<p><?php the_field('infuse_company_address', 'options'); ?></p>
							</div>
							<div class="footer__main-contacts-labels-wrapper">
								<div class="footer__main-contacts-labels-list">
                                    <div class="footer__main-contacts-label">
                                        <a href="https://www.g2.com/products/infusemedia/reviews" target="_blank">
                                        	<img src="/wp-content/themes/infusemedia/img/footer-badge-1.svg" class="footer__main-contacts-label-img">
                                        </a>
                                    </div>
                                    <div class="footer__main-contacts-label">
                                        <a href="https://topworkplaces.com/company/infusemedia/ " target="_blank">
                                        	<img src="/wp-content/themes/infusemedia/img/footer-badge-2.svg?t=2" class="footer__main-contacts-label-img">
                                        </a>
                                    </div>
                                    <div class="footer__main-contacts-label">
                                        <a href="https://www.g2.com/products/infusemedia/reviews" target="_blank">
                                        	<img src="/wp-content/themes/infusemedia/img/footer-badge-3.png" class="footer__main-contacts-label-img">
                                        </a>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?php

					function wpse170033_nav_menu_object_tree( $nav_menu_items_array ) {
					    foreach ( $nav_menu_items_array as $key => $value ) {
					        $value->children = array();
					        $nav_menu_items_array[ $key ] = $value;
					    }

					    $nav_menu_levels = array();
					    $index = 0;
					    if ( ! empty( $nav_menu_items_array ) ) do {
					        if ( $index == 0 ) {
					            foreach ( $nav_menu_items_array as $key => $obj ) {
					                if ( $obj->menu_item_parent == 0 ) {
					                    $nav_menu_levels[ $index ][] = $obj;
					                    unset( $nav_menu_items_array[ $key ] );
					                }
					            }
					        } else {
					            foreach ( $nav_menu_items_array as $key => $obj ) {
					                if ( in_array( $obj->menu_item_parent, $last_level_ids ) ) {
					                    $nav_menu_levels[ $index ][] = $obj;
					                    unset( $nav_menu_items_array[ $key ] );
					                }
					            }
					        }
					        $last_level_ids = wp_list_pluck( $nav_menu_levels[ $index ], 'db_id' );
					        $index++;
					    } while ( ! empty( $nav_menu_items_array ) );

					    $nav_menu_levels_reverse = array_reverse( $nav_menu_levels );

					    $nav_menu_tree_build = array();
					    $index = 0;
					    if ( ! empty( $nav_menu_levels_reverse ) ) do {
					        if ( count( $nav_menu_levels_reverse ) == 1 ) {
					            $nav_menu_tree_build = $nav_menu_levels_reverse;
					        }
					        $current_level = array_shift( $nav_menu_levels_reverse );
					        if ( isset( $nav_menu_levels_reverse[ $index ] ) ) {
					            $next_level = $nav_menu_levels_reverse[ $index ];
					            foreach ( $next_level as $nkey => $nval ) {
					                foreach ( $current_level as $ckey => $cval ) {
					                    if ( $nval->db_id == $cval->menu_item_parent ) {
					                        $nval->children[] = $cval;
					                    }
					                }
					            }
					        }
					    } while ( ! empty( $nav_menu_levels_reverse ) );

					    $nav_menu_object_tree = $nav_menu_tree_build[ 0 ];
					    return $nav_menu_object_tree;
					}
					$nav_menu_items = wp_get_nav_menu_items( 'footer-menu' );
					$tree = wpse170033_nav_menu_object_tree( $nav_menu_items );
			?>
				<div class="footer__content">
					<div class="footer__top-content">
						<img src="/wp-content/themes/infusemedia/img/inc-badges.svg" class="display-mobile" /><br>
						<div class="footer__navs-wrapper">

							<div class="footer__nav-section footer-first-nav">
								<div class="footer__nav-column">
									<h6 class="footer__nav-title">
										<a href="<?php echo $tree[$i]->url; ?>" class="footer__nav-title-link"><?php echo ucwords($tree[0]->title); ?></a>
									</h6>
									<div class="footer__nav-column-wrapper">
										<ul class="footer__nav-list">
											<?php foreach ($tree[0]->children as $sub_item):?>
												<li class="footer__nav-item">
													<a href="<?php echo $sub_item->url; ?>" class="footer__nav-link"><?php echo $sub_item->title; ?></a>
												</li>
											<?php endforeach;?>
										</ul>
									</div>
								</div>
								<div class="footer-col-mob">
									<div class="footer__nav-column">
									<h6 class="footer__nav-title">
									<a href="/who-we-serve/" class="footer__nav-title-link">Who We Serve</a>
									</h6>
									</div>
									<div class="footer__nav-column">
									<h6 class="footer__nav-title">
									<a href="https://infusemedia.com/audiences/" class="footer__nav-title-link">Audiences</a>
									</h6>
									</div>
								</div>
							</div>

							<div class="footer__nav-section footer-right-section">
								<?php for($i=1;$i<count($tree);$i++): ?>
								<div class="footer__nav-column">
									<h6 class="footer__nav-title">
										<a href="<?php echo $tree[$i]->url; ?>" class="footer__nav-title-link"><?php echo ucwords($tree[$i]->title); ?></a>
									</h6>
								</div>
								<!-- <?php if( ($i%3) == 0): ?></div><div class="footer__nav-section"><?php endif; ?> -->
								<?php endfor; ?>
							</div>
						</div>
						<div class="footer__form-wrapper">
							<?php
                                $formshort =  get_field('infuse_form_shortcode', 'options');
                                echo do_shortcode($formshort);
							?>
						</div>
					</div>
					<div class="footer__bootom-content">
						<div class="footer__bootom-content-wrapper">
							<div class="links-footer">
								<div class="links-footer-col links-footer-col-1">
									<img src="/wp-content/themes/infusemedia/img/inc-badges.svg" />
								</div>
								<div class="links-footer-col links-footer-col-2">
									<div class="footer__sub-info-copyright hide-mobile">© <?php echo date('Y')?> <?php the_field('infuse_company_copyright', 'options'); ?></div>
									<?php $items = wp_get_nav_menu_items('privacy-terms');
									$items_count = count($items);
									$i = 1;
									foreach ($items as $item):?>
										<a href="<?php echo $item->url; ?>" class="footer__link-item"><?php echo $item->title; ?></a>
										<?php if ($i<$items_count):?>
											<span class="footer__link-border">|</span>
										<?php endif; ?>
										<?php $i++; ?>
									<?php endforeach;?>
								</div>
								<div class="links-footer-col links-footer-col-3">
								<div class="footer__sub-info-copyright">&nbsp;</div><br>
									<?php $items = wp_get_nav_menu_items('cookies-privacy');
									$items_count = count($items);
									$i = 1;
									foreach ($items as $item):?>
										<a href="<?php echo $item->url; ?>" class="footer__link-item"><?php echo $item->title; ?></a>
										<?php if ($i<$items_count):?>
											<span class="footer__link-border">-</span>
										<?php endif; ?>
										<?php $i++; ?>
									<?php endforeach;?>
									<div class="footer__sub-info-copyright display-mobile">© <?php echo date('Y')?> <?php the_field('infuse_company_copyright', 'options'); ?></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- End (footer) -->

</div>
</div>
<!--
<div class="mypopup">
	<div class="mypopup-bg"></div>
    <div class="mypopup-inner">
    	<div class="mypopup-body">
        	<div class="mypopup-close"><img src="/wp-content/themes/infusemedia/frontend/images/close.svg"></div>
            <div class="mypopup-icon"><img src="/wp-content/themes/infusemedia/frontend/images/inc5000award.svg?ver=4.2.16"></div>
            <div class="mypopup-content">
            	<div class="mypopup-title">
                	Every year, <span style="color: #ec1e27;">The Drum B2B Awards</span> <br>celebrates the best of business marketing.<br><br>
This year, INFUSEmedia won<br> in the <span style="color: #ec1e27;">Best Pro Bono Campaign</span> category.</div>
				<div class="mypopup-text">
                	Join us in celebrating the B2B marketers that bring<br> creativity to their business campaigns.
                </div>
            </div>
        </div>
    </div>
</div>
-->
<style>
#acc-video{
	width:100%;

	height:auto;
}
.mypopup-content{
	position:relative;
}
.mypopup-play{
	position:absolute;
	z-index:10;
	left:0;
	right:0;
	top: calc(50% - 83px);
	text-align:center;
}
.mypopup-play a{
	display:inline-block;
	cursor:pointer;
	transition:ease all 0.3s;
}
.mypopup-play a:hover{
	transition:ease all 0.3s;
	transform:scale(1.1);
}
.mypopup.off{
	display:none!important;
}
</style>
<script>
function AccPlay2()
{
	$=jQuery;
	$('.mypopup').removeClass('off');
	$('#acc-video').trigger('play');
	$('.mypopup-play').hide();
	$("#acc-video").prop('muted', false);
}
</script>
<?php
$ishome=0;
$url=$_SERVER["REQUEST_URI"];
if($url=="/" || $url=="/index.php") {$ishome=1;}
?>
<?php if(!$ishome) { ?>
<div class="mypopup">
	<div class="mypopup-bg"></div>
    <div class="mypopup-inner">
    	<div class="mypopup-body" style="padding:0!important;">
        	<div class="mypopup-close" style="right:-30px!important;top:-30px!important;"><img src="/wp-content/themes/infusemedia/frontend/images/close.svg"></div>

            <div class="mypopup-content">
	<div class="mypopup-play">
	<a onclick="AccPlay2()"><img src="/wp-content/themes/infusemedia/img/play.png"></a>
	</div>
			<video  id="acc-video" controls="controls" src="https://infusemedia.com/images/awards-video.mp4" poster="https://infusemedia.com/images/acc-bg-popup.jpg"></video>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<div id="search-overlay" style="display: none"></div>
<script>
var $=jQuery;
$(document).ready(function(){
<?php
if(!$ishome) { ?>
//$('.mypopup').addClass("off");

<?php }
?>
	if(!$('.mypopup').hasClass("on"))
	{
//	$('.mypopup').addClass("on")
	//$('#acc-video').trigger('play');

//	$("#acc-video").prop('muted', false);
	//$('#acc-video').attr('autoplay',true);
//	setTimeout('startplay()',3000);
	}

<?php

$video=0;
if(isset($_GET["video"])) {$video=1;}
?>

<?php
if($video)
{
	?>


	<?php
}
?>
});
function startplay()
{
	$('#acc-video').trigger('play');
}
</script>
<?php wp_footer(); ?>

<?php

$url=$_SERVER["REQUEST_URI"];
if (strpos($url, '/our-story/') !== false) {
	?>
</div>
	<?php
}

?>

<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/8007211.js"></script>
<!-- End of HubSpot Embed Code -->

<script type="text/javascript">
_linkedin_partner_id = "1782082";
window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
window._linkedin_data_partner_ids.push(_linkedin_partner_id);
</script><script type="text/javascript">
(function(){var s = document.getElementsByTagName("script")[0];
var b = document.createElement("script");
b.type = "text/javascript";b.async = true;
b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
s.parentNode.insertBefore(b, s);})();
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=1782082&fmt=gif" />
</noscript>
<script>(function (c, p, d, u, id, i) {
id = ''; // Optional Custom ID for user in your system
u = 'https://tracking.g2crowd.com/attribution_tracking/conversions/' + c + '.js?p=' + encodeURI(p) + '&e=' + id;
i = document.createElement('script');
i.type = 'application/javascript';
i.async = true;
i.src = u;
d.getElementsByTagName('head')[0].appendChild(i);
}("4114", document.location.href, document));</script>

<style>
	.cookie-ok .cmplz-cookiebanner {
    	display:none !important;
       }
</style>

</body>

</html>
