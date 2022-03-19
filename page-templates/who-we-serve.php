<?php
/**
 * Template Name: Who We Serve
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header(); ?>

<style>
  .banner-serve {
      background: #1478A3 url(<?php the_field("intro_bg"); ?>) 54% top / cover no-repeat;
  }
  .our-reviews__footer .slick-dots {
  	flex-wrap:nowrap;
  }
  @media (max-width: 1500px) {
	.our-reviews .slick-dots button {
    	width: 35px !important;
	}
  }
  @media (max-width: 1400px) {
	.our-reviews .slick-dots button {
    	width: 25px !important;
	}
  }  
  @media (max-width: 1024px) {
	.our-reviews .slick-dots button {
    	width: 15px !important;
	}
  }    
  @media (max-width: 768px) {
	.our-reviews .slick-dots button {
    	width: 8px !important;
	}
	.our-reviews .slick-dots li {
    	padding: 2px;
	}    
  }    
</style>

<!-- (banner-serve) -->
<section class="banner-serve">
  <div class="banner-serve__cover cover">
    <div class="banner-serve__content">
      <h6 class="banner-serve__small-title"><?php the_field("intro_title_1"); ?></h6>
      <h1 class="banner-serve__title"><?php the_field("intro_title_2"); ?><br><span class="banner-serve__title-sub-container"><span class="banner-serve__title-sub-text" id="banner-serve-typed"></span></span></h1>
    </div>
  </div>
</section>
<!-- End (banner-serve) -->
<!-- (serve-advantages) -->
<section class="serve-advantages">
  <div class="serve-advantages__cover cover">
    <div class="serve-advantages__header">
      <p class="serve-advantages__text"><?php the_field("text_line_1"); ?></p>
      <h2 class="serve-advantages__title"><?php the_field("text_line_2"); ?></h2>
    </div>
    <div class="serve-advantages__list">
      <?php while(have_rows("items")): the_row(); ?>
      <div class="serve-advantages__item">
        <div class="serve-advantages__item-img-container">
          <a href="https://infusemedia.com/audiences/" class="serve-advantages__item-img-cover">
            <img src="<?php the_sub_field("icon1"); ?>" alt="<?php the_sub_field("link_title"); ?>" class="serve-advantages__item-icon">
            <img src="<?php the_sub_field("icon2"); ?>" alt="<?php the_sub_field("link_title"); ?>" class="serve-advantages__item-img">
          </a>
        </div>
        <div class="serve-advantages__item-content">
          <h5 class="serve-advantages__item-title">
            <a href="https://infusemedia.com/audiences/" class="serve-advantages__item-title-link"><?php the_sub_field("link_title"); ?></a>
          </h5>
          <p class="serve-advantages__item-text"><?php the_sub_field("link_text"); ?></p>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<!-- End (serve-advantages) -->
<!-- (container-link) -->
<section class="container-link">
  <a href="https://infusemedia.chilipiper.com/book/website-meetings" class="container-link__wrapper">
    <div class="container-link__cover cover">
      <div class="container-link__label">
        <span>Book a 30-minute call</span>
        <svg class="container-link__label-arrow">
          <use xlink:href="/wp-content/themes/infusemedia/frontend/images/icons.svg?t=1#icon-wide-pointer"></use>
        </svg>
      </div>
    </div>
    <img src="/wp-content/themes/infusemedia/frontend/images/inner-parallelepipeds.svg" alt="" class="container-link__bg">
  </a>
</section>
<!-- End (container-link) -->
<!-- (serve-info) -->
<section class="serve-info">
<a name="link1"></a>
  <div class="serve-info__content">
    <div class="serve-info__img-container">
      <div class="serve-info__img-wrapper">
        <a href="https://infusemedia.com/insight/what-is-buyer-intent-data-for-b2b-marketing/?submissionGuid=275f1155-42f9-4fda-a2ef-dd200578074a" class="serve-info__img-cover">
          <img src="/wp-content/themes/infusemedia/frontend/images/serve/img-serve-info-1.png" alt="Demand professionals" class="serve-info__img serve-info__img_one">
        </a>
      </div>
      <a href="https://infusemedia.com/insight/what-is-buyer-intent-data-for-b2b-marketing/?submissionGuid=275f1155-42f9-4fda-a2ef-dd200578074a" class="serve-info__img-link-container">
        <div class="serve-info__link-wrapper">
          <div class="serve-info__link serve-info__link_orange">
            <div class="serve-info__link-text">Read the whitepaper</div>
            <svg class="serve-info__link-arrow">
              <use xlink:href="/wp-content/themes/infusemedia/frontend/images/icons.svg?t=1#icon-wide-pointer"></use>
            </svg>
          </div>
        </div>
      </a>
    </div>
    <div class="serve-info__description" style="background-image: url(/wp-content/themes/infusemedia/frontend/images/serve/bg-serve-info-1.jpg);">
      <div class="serve-info__description-content">
        <div class="serve-info__header">
          <h4 class="serve-info__title">Demand professionals</h4>
          <h6 class="serve-info__sub-title">
            <a href="https://infusemedia.com/insight/what-is-buyer-intent-data-for-b2b-marketing/" class="serve-info__sub-title-link">Leverage intent</a>
          </h6>
        </div>
        <p class="serve-info__text">Lower your CPL and fill your funnel at the top or bottom. Create a stream of conversation-ready leads for the sales team.</p>
        <ul class="serve-info__list">
          <li class="serve-info__list-item"><strong>Omnichannel approach:</strong> Identify your audience’s preferred channels with usage data and engage with content and ads;</li>
          <li class="serve-info__list-item"><strong>Key accounts:</strong> Pinpoint your key accounts or target a curated list by our experts.</li>
        </ul>
      </div>
    </div>
  </div>
  <a name="link2"></a>
  <div class="serve-info__content serve-info__content_reverse">
    <div class="serve-info__img-container">
      <div class="serve-info__img-wrapper">
        <a href="https://infusemedia.com/insight/the-cmo-guide-to-modern-content-syndication/" class="serve-info__img-cover">
          <img src="/wp-content/themes/infusemedia/frontend/images/serve/img-serve-info-2.png" alt="Marketers" class="serve-info__img serve-info__img_two">
        </a>
      </div>
      <a href="https://infusemedia.com/insight/the-cmo-guide-to-modern-content-syndication/" class="serve-info__img-link-container">
        <div class="serve-info__link-wrapper">
          <div class="serve-info__link serve-info__link_orange">
            <div class="serve-info__link-text">Read the whitepaper</div>
            <svg class="serve-info__link-arrow">
              <use xlink:href="/wp-content/themes/infusemedia/frontend/images/icons.svg?t=1#icon-wide-pointer"></use>
            </svg>
          </div>
        </div>
      </a>
    </div>
    <div class="serve-info__description" style="background-image: url(/wp-content/themes/infusemedia/frontend/images/serve/bg-serve-info-2.jpg);">
      <div class="serve-info__description-content">
        <div class="serve-info__header">
          <h4 class="serve-info__title">Marketers</h4>
          <h6 class="serve-info__sub-title">Steer growth</h6>
        </div>
        <p class="serve-info__text">Generate brand awareness and qualified leads to grow your business.</p>
        <ul class="serve-info__list">
          <li class="serve-info__list-item"><strong>Brand amplification:</strong> Reach any B2B audience with relevant content to keep your brand top of mind;</li>
          <li class="serve-info__list-item"><strong>Lead nurturing:</strong> Address objections and hook leads until it’s time for a sales meeting.</li>
        </ul>
        <div class="serve-info__sub-link-cover">
          <a href="https://infusemedia.com/insight/the-lead-nurturing-playbook-what-content-works-for-each-step-of-the-sales-funnel/" class="serve-info__sub-link-container serve-info__sub-link-container_orange">
            <div class="serve-info__sub-link-wrapper">
              <div class="serve-info__link serve-info__link_white">
                <div class="serve-info__link-text">Read the “Lead nurturing playbook” now</div>
                <svg class="serve-info__link-arrow">
                  <use xlink:href="/wp-content/themes/infusemedia/frontend/images/icons.svg?t=1#icon-wide-pointer"></use>
                </svg>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <a name="link3"></a>
  <div class="serve-info__content">
    <div class="serve-info__img-container">
      <div class="serve-info__img-wrapper">
        <a href="https://infusemedia.com/insight/how-to-build-an-awesome-sdr-team/" class="serve-info__detail-container">
          <div class="serve-info__detail">
            <div class="serve-info__detail-content">
              <div class="serve-info__detail-img-container serve-info__detail-img-container_big">
                <img src="/wp-content/themes/infusemedia/frontend/images/serve/img-serve-info-3.png" alt="Sales professionals" class="serve-info__detail-img">
                <img src="/wp-content/themes/infusemedia/frontend/images/serve/icon-serve-info-3.svg" alt="" class="serve-info__detail-arrow serve-info__detail-arrow_big">
              </div>
              <h6 class="serve-info__detail-title"><span>How to Build<br></span> an Awesome SDR Team</h6>
            </div>
            <div class="serve-info__detail-link-container">
              <div class="serve-info__link serve-info__link_orange">
                <div class="serve-info__link-text">Watch the webinar</div>
                <svg class="serve-info__link-arrow">
                  <use xlink:href="/wp-content/themes/infusemedia/frontend/images/icons.svg?t=1#icon-wide-pointer"></use>
                </svg>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="serve-info__description" style="background-image: url(/wp-content/themes/infusemedia/frontend/images/serve/bg-serve-info-3.jpg);">
      <div class="serve-info__description-content">
        <div class="serve-info__header">
          <h4 class="serve-info__title">Sales professionals</h4>
          <h6 class="serve-info__sub-title">Grow your pipeline</h6>
        </div>
        <p class="serve-info__text">Close deals with a pipeline of leads from a database <br>of <strong><a href="https://infusemedia.com/audiences/">138+ million decision makers.</a></strong></p>
        <ul class="serve-info__list">
          <li class="serve-info__list-item"><strong>Lead verification:</strong> Clean your pipeline with <a href="https://www.letsverify.com/">Let’s Verify</a>, our wholly-owned data verification and validation team. Remove leads with missing data, duplicates, or those that don’t meet your target criteria;</li>
          <li class="serve-info__list-item"><strong>Guaranteed lead quality:</strong> Use the <a href="https://grader.infusemedia.com/">proprietary lead grader</a> to evaluate your list and generate SQLs at scale.</li>
        </ul>	<a name="link4"></a>
        <!-- <div class="serve-info__sub-link-cover">
          <a href="#" class="serve-info__sub-link-container serve-info__sub-link-container_orange">
            <div class="serve-info__sub-link-wrapper">
              <div class="serve-info__link serve-info__link_white serve-info__link_reverse">
                <div class="serve-info__link-text">Read the “Lead nurturing playbook” now</div>
                <svg class="serve-info__link-arrow">
                  <use xlink:href="/wp-content/themes/infusemedia/frontend/images/icons.svg?t=1#icon-wide-pointer"></use>
                </svg>
              </div>
            </div>
          </a>
        </div> -->
      </div>
    </div>
  </div>
  	
  <div class="serve-info__content serve-info__content_reverse">
    <div class="serve-info__img-container">
      <div class="serve-info__img-wrapper">
        <a href="https://infusemedia.com/insight/competitive-displacement-how-to-win-market-share-with-a-customer-centric-lens/" class="serve-info__sub-info-container">
          <div class="serve-info__sub-info">
            <h6 class="serve-info__sub-info-title"><span>“How to win Market Share</span> with a customer-centric lens”</h6>
            <div class="serve-info__sub-info-link-container">
              <div class="serve-info__link serve-info__link_orange">
                <div class="serve-info__link-text">Read the whitepaper</div>
                <svg class="serve-info__link-arrow">
                  <use xlink:href="/wp-content/themes/infusemedia/frontend/images/icons.svg?t=1#icon-wide-pointer"></use>
                </svg>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="serve-info__description" style="background-image: url(/wp-content/themes/infusemedia/frontend/images/serve/bg-serve-info-4.jpg);">
      <div class="serve-info__description-content">
        <div class="serve-info__header">
          <h4 class="serve-info__title">Executives</h4>
          <h6 class="serve-info__sub-title">Innovate faster</h6>
        </div>
        <p class="serve-info__text">Displace competitors by targeting their accounts and count on timely support to craft unique demand generation strategies.</p>
        <ul class="serve-info__list">
          <li class="serve-info__list-item"><strong>Competitive displacement:</strong> Identify clients of your competitors and target them with a client-centric approach;</li>
          <li class="serve-info__list-item"><strong>Global expert support:</strong> 500+ demand generation experts in every time zone to assist your campaigns.</li>
        </ul>
        <div class="serve-info__sub-link-cover">
          <a href="https://infusemedia.com/insight/how-to-leverage-your-competitors-to-grow-market-share/" class="serve-info__sub-link-container serve-info__sub-link-container_orange">
            <div class="serve-info__sub-link-wrapper">
              <div class="serve-info__link serve-info__link_white">
                <div class="serve-info__link-text">Watch "a bigger slice of the pie" now</div>
                <svg class="serve-info__link-arrow">
                  <use xlink:href="/wp-content/themes/infusemedia/frontend/images/icons.svg?t=1#icon-wide-pointer"></use>
                </svg>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  	<a name="link5"></a>
  <div class="serve-info__content">
    <div class="serve-info__img-container">
      <div class="serve-info__img-wrapper">
        <a href="https://infusemedia.com/insight/infusemedia-meets-moi-globals-demanding-hql-quotas/" class="serve-info__sub-text-container">
          <div class="serve-info__sub-text">
            <div class="serve-info__sub-text-img-container">
              <img src="/wp-content/themes/infusemedia/frontend/images/serve/img-serve-info-5.png" alt="Agency partners" class="serve-info__sub-text-img">
            </div>
            <h6 class="serve-info__sub-text-title">MOI Global’s <span>Demanding HQL Quotas</span></h6>
          </div>
        </a>
      </div>
      <a href="https://infusemedia.com/insight/infusemedia-meets-moi-globals-demanding-hql-quotas/" class="serve-info__img-link-container serve-info__img-link-container_blue">
        <div class="serve-info__link-wrapper">
          <div class="serve-info__bg-light"></div>
          <div class="serve-info__link serve-info__link_white">
            <div class="serve-info__link-text">Read the case study</div>
            <svg class="serve-info__link-arrow">
              <use xlink:href="/wp-content/themes/infusemedia/frontend/images/icons.svg?t=1#icon-wide-pointer"></use>
            </svg>
          </div>
        </div>
      </a>
    </div>
    <div class="serve-info__description" style="background-image: url(/wp-content/themes/infusemedia/frontend/images/serve/bg-serve-info-5.jpg);">
      <div class="serve-info__description-content">
        <div class="serve-info__header">
          <h4 class="serve-info__title">Agency partners</h4>
          <h6 class="serve-info__sub-title">Demonstrate value</h6>
        </div>
        <p class="serve-info__text">Grow your agency with a healthy pipeline of leads.</p>
        <ul class="serve-info__list">
          <li class="serve-info__list-item"><strong>Meet lead quotas:</strong> no matter how strict the client quota, we meet it with buyer intent HQLs;</li>
          <li class="serve-info__list-item"><strong>Multi-touch content marketing:</strong> nurture leads with eBooks, whitepapers, emails, social media, and SEO-optimized articles.</li>
        </ul>
		<a name="link6"></a>
      </div>
    </div>
	
  </div>
  	
  <div class="serve-info__content serve-info__content_reverse">
    <div class="serve-info__img-container">
      <div class="serve-info__img-wrapper">
        <a href="https://infusemedia.com/insight/why-todays-channel-program-is-broken-and-how-to-fix-it/" class="serve-info__detail-container">
          <div class="serve-info__detail">
            <div class="serve-info__detail-content">
              <div class="serve-info__detail-img-container serve-info__detail-img-container_small">
                <img src="/wp-content/themes/infusemedia/frontend/images/serve/img-serve-info-6.png" alt="Sales professionals" class="serve-info__detail-img">
                <img src="/wp-content/themes/infusemedia/frontend/images/serve/icon-serve-info-6.svg" alt="" class="serve-info__detail-arrow serve-info__detail-arrow_small">
                <div class="serve-info__detail-line"></div>
              </div>
              <h6 class="serve-info__detail-title"><span>Why Today's Channel Program is Broken</span> ––and How to Fix It</h6>
            </div>
            <div class="serve-info__detail-link-container">
              <div class="serve-info__link serve-info__link_orange">
                <div class="serve-info__link-text">Watch the webinar</div>
                <svg class="serve-info__link-arrow">
                  <use xlink:href="/wp-content/themes/infusemedia/frontend/images/icons.svg?t=1#icon-wide-pointer"></use>
                </svg>
              </div>
            </div>
          </div>
        </a>
		
      </div>
    </div>
    <div class="serve-info__description" style="background-image: url(/wp-content/themes/infusemedia/frontend/images/serve/bg-serve-info-6.jpg);">
      <div class="serve-info__description-content">
        <div class="serve-info__header">
          <h4 class="serve-info__title">Channel partners</h4>
          <h6 class="serve-info__sub-title">Maximize revenue</h6>
        </div>
        <p class="serve-info__text">Generate the demand your clients need by featuring their brand in AI-curated publications.</p>
        <ul class="serve-info__list">
          <li class="serve-info__list-item"><strong>Content syndication:</strong> impact your audience in our publisher network for 30 industry verticals;</li>
          <li class="serve-info__list-item"><strong>Real-time budget allocation:</strong> track metrics and shift budget from underperforming campaigns to optimize performance.</li>
        </ul>
        <div class="serve-info__sub-link-cover">
          <a href="https://itcurated.com/" class="serve-info__sub-link-container serve-info__sub-link-container_white">
            <div class="serve-info__sub-link-wrapper">
              <div class="serve-info__link serve-info__link_orange">
                <div class="serve-info__link-text">View our publisher network of 30 industry verticals</div>
                <svg class="serve-info__link-arrow">
                  <use xlink:href="/wp-content/themes/infusemedia/frontend/images/icons.svg?t=1#icon-wide-pointer"></use>
                </svg>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End (serve-info) -->
<!-- (container-link) -->
<section class="container-link">
  <a href="https://infusemedia.chilipiper.com/book/website-meetings" class="container-link__wrapper">
    <div class="container-link__cover cover">
      <div class="container-link__label">
        <span>Book a 30-minute call</span>
        <svg class="container-link__label-arrow">
          <use xlink:href="/wp-content/themes/infusemedia/frontend/images/icons.svg?t=1#icon-wide-pointer"></use>
        </svg>
      </div>
    </div>
    <img src="/wp-content/themes/infusemedia/frontend/images/inner-parallelepipeds.svg" alt="" class="container-link__bg">
  </a>
</section>
<!-- End (container-link) -->
<!-- (our-reviews) -->
<section class="our-reviews">
  <div class="our-reviews__cover cover">
    <div class="our-reviews__header" id="our-reviews-header">
      <h4 class="our-reviews__title">Our reviews</h4>
    </div>
    <div class="our-reviews__carousel-container">
      <div class="our-reviews__wrapper">
        <div class="our-reviews__carousel" id="our-reviews-carousel">
          <?php $reviews = get_posts([
                      'post_type' => 'reviews',
                      'numberposts' => -1,
                  ])?>
          <?php foreach ($reviews as $post): setup_postdata($post); ?>
          <div class="our-reviews__slide">
            <div class="our-reviews__info">
              <div class="our-reviews__item-content">
                <div class="our-reviews__user-info">
                  <div class="our-reviews__user-img-container">
                    <?php $thumb = get_the_post_thumbnail_url( get_the_ID(), "thumbnail" ); ?>
                    <img src="<?php echo $thumb; ?>" alt="Ryan Varma" class="our-reviews__user-img">
                  </div>
                  <div class="our-reviews__user-content">
                    <div class="our-reviews__user-description">
                      <div class="our-reviews__user-header">
                        <div class="our-reviews__user-name"><?php the_title(); ?></div>
                        <div class="our-reviews__user-status"><?php the_field("function"); ?></div>
                      </div>
                      <div class="our-reviews__user-dop-info">
                        <svg class="our-reviews__user-dop-info-icon">
                          <use xlink:href="/wp-content/themes/infusemedia/frontend/images/icons.svg?t=1#icon-review-user"></use>
                        </svg>
                        <?php the_field("blue_text"); ?>
                      </div>
                    </div>
                    <div class="our-reviews__user-date"><?php echo get_the_date(); ?></div>
                  </div>
                </div>
                <div class="our-reviews__text">
                  <?php the_field("content"); ?>
                </div>
              </div>
              <div class="our-reviews__item-footer">
                <a href="<?php the_field("link_url"); ?>" class="our-reviews__item-link">
                  <svg class="our-reviews__item-link-icon">
                    <use xlink:href="/wp-content/themes/infusemedia/frontend/images/icons.svg?t=1#icon-link"></use>
                  </svg>
                  <?php the_field("link_text"); ?>
                </a>
                <div class="our-reviews__item-stars">
                  <?php
                    $stars = ceil(get_field("stars")); 
                    for($i=0;$i<$stars;$i++):
                  ?>
                  <svg class="our-reviews__item-star">
                    <use xlink:href="/wp-content/themes/infusemedia/frontend/images/icons.svg?t=1#icon-star"></use>
                  </svg>
                  <?php endfor; ?>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; wp_reset_postdata(); ?>
        </div>
      </div>
      <svg class="our-reviews__quotes-icon">
        <use xlink:href="/wp-content/themes/infusemedia/frontend/images/icons.svg?t=1#icon-quotes"></use>
      </svg>
    </div>
    <div class="our-reviews__footer">
      <div class="our-reviews__controls">
        <div class="our-reviews__controls-arrow" id="our-reviews-arrow"></div>
        <div class="our-reviews__controls-dots" id="our-reviews-dots"></div>
      </div>
      <div class="our-reviews__clients-container">
        <div class="our-reviews__clients">
          <div class="our-reviews__clients-images-list">
            <div class="our-reviews__client">
              <img src="/wp-content/themes/infusemedia/frontend/images/serve/img-client-1.jpg" alt="" class="our-reviews__client-img">
            </div>
            <div class="our-reviews__client">
              <img src="/wp-content/themes/infusemedia/frontend/images/serve/img-client-2.jpg" alt="" class="our-reviews__client-img">
            </div>
            <div class="our-reviews__client">
              <img src="/wp-content/themes/infusemedia/frontend/images/serve/img-client-3.jpg" alt="" class="our-reviews__client-img">
            </div>
          </div>
        </div>
        <a href="https://www.g2.com/products/infusemedia/reviews" class="our-reviews__clients-link">
          Discover What Our Clients Say
          <svg class="our-reviews__clients-link-arrow">
            <use xlink:href="/wp-content/themes/infusemedia/frontend/images/icons.svg?t=1#icon-short-pointer"></use>
          </svg>
        </a>
      </div>
    </div>
  </div>
</section>
<!-- End (our-reviews) -->
<!-- (growth) -->
<section class="growth">
  <div class="growth__cover cover">
    <h3 class="growth__title"><?php the_field("growth_title"); ?></h3>
    <div class="growth__text">
      <?php the_field("grow_text"); ?>
    </div>
  </div>
</section>
<!-- End (growth) -->
<!-- (container-link) -->
<section class="container-link">
  <a href="https://ownyourfunnel.infusemedia.com/" class="container-link__wrapper">
    <div class="container-link__cover cover">
      <div class="container-link__label">
        <span>Own your funnel</span>
        <svg class="container-link__label-arrow">
          <use xlink:href="/wp-content/themes/infusemedia/frontend/images/icons.svg?t=1#icon-wide-pointer"></use>
        </svg>
      </div>
    </div>
    <img src="/wp-content/themes/infusemedia/frontend/images/inner-parallelepipeds.svg" alt="" class="container-link__bg">
  </a>
</section>
<!-- End (container-link) -->
<!-- (our-accolades) -->
<section class="our-accolades">
  <div class="our-accolades__cover cover">
    <h3 class="our-accolades__title">Our Accolades</h3>
    <div class="our-accolades__list">
      <?php while(have_rows("accolades_1")): the_row(); ?>
      <div class="our-accolades__item">
        <div class="our-accolades__item-content">
          <div class="our-accolades__img-container">
            <img src="<?php the_sub_field("icon"); ?>" alt="<?php the_sub_field("title"); ?>" class="our-accolades__img">
          </div>
          <div class="our-accolades__text"><?php the_sub_field("text"); ?></div>
        </div>
      </div>
      <?php endwhile; ?>
      <div class="our-accolades__bg">
        <div class="our-accolades__bg-wrapper"></div>
      </div>
    </div>
    <div class="our-accolades__list-rewards">
      <?php while(have_rows("list_2")): the_row(); ?>
      <div class="our-accolades__reward">
        <div class="our-accolades__reward-img-container">
          <img src="<?php the_sub_field("icon"); ?>" alt="<?php the_sub_field("title"); ?>" class="our-accolades__reward-img">
        </div>
        <div class="our-accolades__reward-text"><?php the_sub_field("text"); ?></div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<!-- End (our-accolades) -->
<!-- (learn-more) -->
<section class="learn-more">
  <div class="learn-more__cover cover">
    <img src="/wp-content/themes/infusemedia/frontend/images/serve/img-time.svg" alt="" class="learn-more__img-time">
    <div class="learn-more__wrapper">
      <h4 class="learn-more__title"><?php the_field("learn_more_title"); ?></h4>
      <p class="learn-more__text"><?php the_field("learn_more_text"); ?></p>
      <div class="learn-more__link-container">
        <a href="<?php the_field("learn_more_link"); ?>" class="learn-more__link">
          <span>Book a 30-minute call</span>
          <svg class="learn-more__link-arrow">
            <use xlink:href="/wp-content/themes/infusemedia/frontend/images/icons.svg?t=1#icon-wide-pointer"></use>
          </svg>
        </a>
      </div>
    </div>
    <img src="/wp-content/themes/infusemedia/frontend/images/serve/img-calendar.svg" alt="" class="learn-more__img-calendar">
  </div>
</section>
<!-- End (learn-more) -->

<?php get_footer(); ?>