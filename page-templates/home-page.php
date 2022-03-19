<?php
/**
 * Template Name: Home Page
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();



?>

<section class="intro">
	<div class="intro__block">
		<div class="intro__bg">
			<img src="<?php the_field("intro_image"); ?>" alt="">
		</div>
		<div class="cover cover--intro">
			<div class="intro__row">
				<div class="intro__left">
					<p class="intro__text">
						<?php the_field("intro_title"); ?>
					</p>
					<h1 class="intro__ttl">
						<?php the_field("intro_subtitle"); ?>
					</h1>
				</div>
				<div class="intro__right">
					<div class="intro__play">
						<a href="<?php the_field("intro_video_link"); ?>" data-fancybox class="intro__play-icon">
							<img class="intro__play-r" src="/wp-content/themes/infusemedia/frontend/images/intro-play.svg" alt="">
							<img class="intro__play-t" src="/wp-content/themes/infusemedia/frontend/images/intro-play2.svg" alt="">
						</a>
						<div class="intro__play-text">
							Watch video
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="intro__bot">
		<div class="intro__item intro__item--1">
			<div class="intro__item-inner">
				<div class="intro__item-left">
					<div class="intro__item-text">
						<?php the_field("intro_item_1_text"); ?>
					</div>
				</div>
				<div class="intro__item-img">
					<img src="/wp-content/uploads/2019/07/Group-450.svg" alt="">
				</div>
			</div>
		</div>
		<div class="intro__item intro__item--2">
			<div class="intro__item-inner">
				<div class="intro__item-left">
					<div class="intro__item-text">
						<?php the_field("intro_item_2_text"); ?>
					</div>
				</div>
				<div class="intro__item-img">
					<img src="/wp-content/themes/infusemedia/frontend/images/content/icon-logo-2.svg" alt="Entrepreneur 360">
				</div>
			</div>
		</div>
		<a href="<?php the_field("intro_last_item_link"); ?>" class="intro__item intro__item--3">
			<div class="intro__item-bg">
				<picture>
					<source srcset="/wp-content/themes/infusemedia/frontend/images/intro-i2.jpg" media="(max-width: 767px)">
					<source srcset="/wp-content/themes/infusemedia/frontend/images/intro-i.jpg">
					<img src="/wp-content/themes/infusemedia/frontend/images/intro-i.jpg" />
				</picture>
			</div>
			<div class="intro__item-inner">
				<div class="intro__item-left">
					<div class="intro__item-all">
						SEE ALL OUR<br> ACCOLADES
					</div>
					<div class="intro__item-arrow">
						<svg width="56" height="8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M55.854 4.354a.5.5 0 0 0 0-.708L52.672.464a.5.5 0 1 0-.707.708L54.793 4l-2.828 2.828a.5.5 0 1 0 .707.708l3.182-3.182zM0 4.5h55.5v-1H0v1z" fill="#fff"/></svg>
					</div>
				</div>
			</div>
		</a>
	</div>
</section>


<!-- (link) -->
<!-- <?php get_template_part('global-templates/cta', null, ['position' => 'after_hero']); ?> -->
<!-- End (link) -->

<!-- (clients' love) -->
<?php the_field('widget'); ?>	
<!-- End (clients' love) -->

<!-- (info) -->
<section class="info">
	<div class="info__cover cover">
		<h2 class="h2 info__title"><?php the_field('info_title'); ?></h2>
		<h3 class="h3 info__sub-title"><?php the_field('info_subtitle'); ?></h3>
		<p class="info__text"><?php the_field('info_text'); ?></p>
	</div>
</section>
<?php get_template_part('global-templates/cta', null, ['position' => 'after_info']); ?>
<!-- End (info) -->
<!-- (solutions) -->
<section class="solutions">
	<div class="solutions__first-section">
		<div class="solutions__cover cover">
			<div class="solutions__wrapper">
				<div class="solutions__info">
					<h4 class="h2 solutions__info-sub-title"><?php the_field('solutions_title'); ?></h4>
					<h3 class="solutions__info-title"><?php the_field('solutions_subtitle'); ?></h3>
					<p class="solutions__info-text"><?php the_field('solutions_text'); ?></p>
				</div>
				<?php $items = get_field('solutions_items'); ?>
				<div class="solutions__list">
					<?php $i = 0;?>
					<?php foreach ($items as $item):
						$i++;
						if($i > 2) {
							break;
						}
						?>
						<div class="solutions__item">
							<div class="solutions__item-bg">
								<div class="solutions__item-bg-wrapper"></div>
							</div>
							<!-- (solution) -->
							<div class="solution solution_white-theme <?php echo $i == 1 ? 'opened' : ''; ?>">
								<div class="solution__wrapper">
									<div class="solution__number">
								  <span>
									<?php echo sprintf('%02d', $i);; ?>
									<svg class="solution__icon-arrow">
									  <use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-arrow-stupid"></use>
									</svg>
								  </span>
									</div>
									<h5 class="h4 solution__name"><?php echo $item['item_title']?></h5>
									<div class="solution__content">
										<p class="solution__description"><?php echo $item['item_text']?></p>
									</div>
								</div>
								<div class="solution__link-container">
									<a href="<?php echo $item['item_page_link'] ?>" class="solution__link">
										<?php echo $item['item_link_text'] ?>
										<svg class="solution__icon-pointer">
											<use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-pointer"></use>
										</svg>
									</a>
								</div>
							</div>
							<!-- End (solution) -->
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="solutions__last-section">
		<div class="solutions__cover cover">
			<div class="solutions__list">
				<?php $i = 0;?>
				<?php foreach ($items as $item):
					$i++;
					if($i < 3) {
						continue;
					}
					?>
					<div class="solutions__item">
						<div class="solutions__item-bg">
							<div class="solutions__item-bg-wrapper"></div>
						</div>
						<!-- (solution) -->
						<div class="solution <?php echo $i == 6 ? 'solution_white-theme' : ''; ?>">
							<div class="solution__wrapper">
								<div class="solution__number">
								<span>
								  <?php echo sprintf('%02d', $i); ?>
								  <svg class="solution__icon-arrow">
									<use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-arrow-stupid"></use>
								  </svg>
								</span>
								</div>
								<h5 class="h4 solution__name"><?php echo $item['item_title']?></h5>
								<div class="solution__content">
									<p class="solution__description"><?php echo $item['item_text']?></p>
								</div>
							</div>
							<div class="solution__link-container">
								<a href="<?php echo $item['item_page_link']?>" class="solution__link">
									<?php echo $item['item_link_text']?>
									<svg class="solution__icon-pointer">
										<use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-pointer"></use>
									</svg>
								</a>
							</div>
						</div>
						<!-- End (solution) -->
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<?php get_template_part('global-templates/cta', null, ['position' => 'after_solutions']); ?>

<!-- End (solutions) -->
<!-- (insights) -->
<section class="insights">
	<div class="insights__cover cover">
		<div class="insights__heading">
			<h3 class="h2 insights__title"><?php the_field('insights_title'); ?></h3>
			<p class="insights__text"><?php the_field('insights_text'); ?></p>
			<div class="insights__link-container">
				<a href="<?php the_field('insights_link_page'); ?>" class="insights__link">
					<?php the_field('insights_link_text'); ?>
					<svg class="insights__link-icon-pointer">
						<use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-pointer"></use>
					</svg>
				</a>
			</div>
		</div>

        <?php $insights = get_posts([
            'post_type' => 'insights',
            'numberposts' => 32,
        ]);
        $slides = [];
        $i = 1;
        $current_slide_size = 0;
        $max_slide_size = 4;
        $max_slides = 8;
        foreach ($insights as $insight) {
            $size = get_field('size', $insight->ID) ?: 1 ;
            if (($current_slide_size + $size) > $max_slide_size) {
                $i++;
                $current_slide_size = 0;
            }
            if($i > $max_slides) {
                break;
            }
            $slides[$i][] = $insight;
            $current_slide_size += $size;
        }
        ?>

        <div class="insights__wrapper">
			<div class="insights__list" id="insights">
				<?php foreach ($slides as $slide):?>
					<div class="insights__slide">
						<div class="insights__elements-list">
                            <?php foreach ($slide as $insight):?>
                                <div class="insights__element-item text-<?php the_field("preview_text_color",$insight->ID); ?> <?php echo (get_field('size', $insight->ID) == 2) ? 'insights__element-item_big' : '' ?>">
                                    <!-- (insight) -->
                                    <div class="insight insight_<?php echo get_field('theme', $insight->ID) ?: 'blue'; ?>">
                                        <?php if (has_post_thumbnail($insight)):?>
                                                <?php $attachment_id = get_post_thumbnail_id( $insight->ID );?>
                                                <img src="<?php echo wp_get_attachment_image_url( $attachment_id, 'medium' )?>"
                                                     alt="<?php echo get_the_title( $insight );?>" class="insight__img">
                                        <?php endif;
                                        $insight_categories = get_the_category($insight->ID);
                                        $insight_categories_names = [];
                                        foreach ($insight_categories as $insight_category) {
                                            $insight_categories_names[] = $insight_category->name;
                                        }
                                        ?>
                                        <div class="insight__cover">
                                            <a href="<?php echo get_the_permalink($insight->ID); ?>" class="insight__main-text <?php echo in_array('Webinar', $insight_categories_names) ? 'disable-hover': '';?>">
                                                <div class="insight__main-text-container"><?php echo get_field('excerpt', $insight->ID) ; ?></div>
                                                <svg class="insight__main-text-icon-pointer">
                                                    <use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-pointer"></use>
                                                </svg>
                                            </a>
                                            <div class="insight__label"><?php echo implode(', ', $insight_categories_names);?></div>
                                            <div class="insight__content">
                                                <h6 class="insight__title"><?php echo get_the_title($insight->ID); ?></h6>
                                                <p class="insight__description"><?php echo get_field('subtitle', $insight->ID); ?></p>
                                            </div>
                                            <?php if (in_array('Webinar', $insight_categories_names)):?>
                                                <div class="insight__webinar-info-container">
                                                    <?php if( have_rows('infuse2020_insights_layout', $insight->ID) ):
                                                        while ( have_rows('infuse2020_insights_layout', $insight->ID) ) : the_row();
                                                            if( get_row_layout() == 'header_banner_form' ):
                                                                $video_duration = get_sub_field('video_duration');
                                                                if($video_duration): ?>
                                                                <div class="insight__webinar-info-duration">
                                                                    <?php echo $video_duration; ?>
                                                                </div>
                                                            <?php endif;
                                                            endif;
                                                        endwhile;
                                                    endif; ?>
                                                    <div class="insight__webinar-info-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                                                            <path d="M48 0C48 16.0164 48 31.9753 48 48C31.9863 48 16.0274 48 0 48C0 31.9836 0 16.0274 0 0C16.0219 0 31.9781 0 48 0ZM17.9955 34.3574C22.8665 30.8624 27.595 27.4717 32.4331 24.0014C27.5703 20.5009 22.8391 17.0965 17.9955 13.6097C17.9955 20.5859 17.9955 27.3702 17.9955 34.3574Z" fill="white" fill-opacity="0.8"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="insight__link-container">
                                                    <a href="<?php echo get_the_permalink($insight->ID); ?>" class="insight__link">
                                                        Read more
                                                        <svg class="insight__link-icon-pointer">
                                                            <use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-pointer"></use>
                                                        </svg>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- End (insight) -->
                                </div>
                            <?php endforeach; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="insights__controls" id="insights-controls">
			<div class="insights__dots" id="insights-dots"></div>
		</div>
	</div>
</section>
<?php get_template_part('global-templates/cta', null, ['position' => 'after_insights']); ?>

<!-- End (insights) -->
<!-- (advantages) -->
<section class="advantages">
	<div class="advantages__cover cover">
		<div class="advantages__list">
			<?php while (have_rows('advantages_items')) : the_row(); ?>
			<div class="advantages__item">
				<div class="advantages__item-content">
					<h5 class="advantages__item-title"><?php echo the_sub_field('item_title')?></h5>
					<p class="advantages__item-text"><?php echo the_sub_field('item_text')?></p>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>

<!-- End (advantages) -->
<!-- (about) -->
<section class="about">
	<div class="about__wrapper">
		<div class="about__cover cover">
			<div class="about__info">
				<img src="<?php echo get_template_directory_uri() ?>/frontend/images/bg-about.svg" alt=""
					 class="about__bg">
				<div class="about__info-wrapper">
					<h3 class="h2 about__title"><?php echo the_field('advantages_title')?></h3>
					<p class="about__text"><?php echo the_field('advantages_text')?></p>
				</div>
				<div class="about__control-container">
					<a href="#video" data-fancybox class="about__control-label"><?php echo the_field('advantages_video_button')?></a>
					<a href="#video" data-fancybox class="about__control-btn">
						<svg class="about__control-btn-icon">
							<use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-play"></use>
						</svg>
					</a>
					<div class="about__control-line"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="about__video">
		<div class="about__video-content">
			<video width="800" height="450" controls id="video" style="display:none;">
				<source src="<?php echo the_field('advantages_video')?>" type="video/mp4">
			</video>
			<a href="#video" data-fancybox class="about__video-event-block">
				<img src="<?php echo the_field('advantages_video_image')?>" alt=""
					 class="about__video-img">
				<svg class="about__video-icon-play about__video-icon-play_not-active">
					<use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-play-not-active"></use>
				</svg>
				<svg class="about__video-icon-play about__video-icon-play_active">
					<use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-play-active"></use>
				</svg>
			</a>
		</div>
	</div>
</section>
<?php get_template_part('global-templates/cta', null, ['position' => 'after_advantages']); ?>

<!-- End (about) -->
<!-- (reviews) -->
<section class="reviews">
	<div class="reviews__bg">
		<div class="reviews__bg-wrapper" style="background-image: url(<?php the_field('testimonials_image'); ?>)"></div>
	</div>
	<div class="reviews__cover cover">
		<div class="reviews__wrapper">
			<div class="reviews__left-content">
				<h3 class="h2 reviews__title"><?php echo the_field('testimonials_title')?></h3>

				<div class="reviews__sub-carousel-wrapper">
					<div class="reviews__sub-carousel" id="reviews-sub-carousel">
						<?php $testimonials = get_posts([
                            'post_type' => 'testimonials',
                            'numberposts' => -1,
                        ]); ?>
						<?php foreach ($testimonials as $testimonial): ?>
							<div class="reviews__sub-carousel-slide">
							<!-- (user) -->
							<div class="user reviews__user">
                                <?php if (has_post_thumbnail($testimonial)):?>
                                <div class="user__img-container">
                                    <?php $attachment_id = get_post_thumbnail_id( $testimonial->ID );?>
                                    <img src="<?php echo wp_get_attachment_image_url( $attachment_id, 'thumbnail' )?>"
                                         alt="<?php echo get_the_title( $testimonial );?>" class="user__img reviews__sub-user-img">
								</div>
                                <?php endif; ?>
                                <div class="user__info">
                                    <h6 class="h6 user__name reviews__sub-user-name"><?php echo get_the_title( $testimonial );?></h6>
                                    <div class="user__company reviews__sub-user-company"><?php echo get_field('testimonials_company', $testimonial->ID); ?></div>
                                    <div class="user__position reviews__sub-user-position"><?php echo get_field('testimonials_job_title', $testimonial->ID); ?></div>
								</div>
							</div>
							<!-- End (user) -->
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="reviews__right-content">
                <div class="reviews__link-wrapper">
                    <a href="<?php echo the_field('testimonials_link_page')?>" class="reviews__link link__text">
                        <span><?php echo the_field('testimonials_link_text')?></span>
                        <svg class="link__pointer">
                            <use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-pointer"></use>
                        </svg>
                    </a>
                </div>
				<div class="reviews__dots-wrapper">
					<div class="reviews__quotes">
						<svg class="reviews__quotes-icon">
							<use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-quotes"></use>
						</svg>
					</div>
					<div class="reviews__dots-container" id="reviews-dots"></div>
				</div>
				<div class="reviews__list-wrapper">
					<div class="reviews__list" id="reviews-list">
						<?php
						array_push($testimonials, array_shift($testimonials));
						array_push($testimonials, array_shift($testimonials));
						foreach ($testimonials as $testimonial): ?>
							<div class="reviews__item">
								<div class="reviews__item-text">
									<div class="reviews__item-text-wrapper">
                                        <?php echo get_post_field('post_content', $testimonial->ID);?>
									</div>
								</div>
								<div class="reviews__item-user">
									<!-- (user) -->
									<div class="user reviews__user">
                                        <?php if (has_post_thumbnail($testimonial)):?>
                                            <div class="user__img-container">
                                                <?php $attachment_id = get_post_thumbnail_id( $testimonial->ID );?>
                                                <img src="<?php echo wp_get_attachment_image_url( $attachment_id, 'thumbnail' )?>"
                                                     alt="<?php echo get_the_title( $testimonial );?>" class="user__img reviews__sub-user-img">
                                            </div>
                                        <?php endif; ?>
										<div class="user__info">
                                            <h6 class="h6 user__name"><?php echo get_the_title( $testimonial );?></h6>
                                            <div class="user__company"><?php echo get_field('testimonials_company', $testimonial->ID); ?></div>
                                            <div class="user__position"><?php echo get_field('testimonials_job_title', $testimonial->ID); ?></div>
										</div>
									</div>
									<!-- End (user) -->
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="reviews__arrows-container" id="reviews-arrows"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_template_part('global-templates/cta', null, ['position' => 'after_reviews']); ?>

<!-- End (reviews) -->
<!-- (clients) -->
<section class="clients">
	<div class="clients__cover cover">
		<h3 class="h2 clients__title"><?php echo the_field('clients_title')?></h3>
		<div class="clients__container" id="clients">
			<div class="clients__list">
				<?php $clients = get_posts([
                    'post_type' => 'clients',
                    'numberposts' => -1,
                ])?>
				<?php foreach ($clients as $client):?>
                    <?php if (has_post_thumbnail($client)):?>
                        <?php $attachment_id = get_post_thumbnail_id( $client->ID );?>
                        <div class="clients__item">
                            <div class="clients__item-wrapper">
                                <img src="<?php echo wp_get_attachment_image_url( $attachment_id, 'full' )?>"
                                     alt="<?php echo get_the_title( $testimonial );?>" class="clients__item-img">
                            </div>
                        </div>
                    <?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<?php get_template_part('global-templates/cta', null, ['position' => 'after_clients']); ?>

<!-- End (clients) -->

<?php get_footer(); ?>