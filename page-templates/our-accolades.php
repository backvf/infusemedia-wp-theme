<?php
/**
 * Template Name: Our Accolades
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header(); ?>

<style>
.banner-accolades-play{
	position:absolute;
	left:70%;
	top:35%;
}
.banner-accolades_bg-one{
	position:relative;
}
.banner-accolades-play a{
	display:inline-block;
	cursor:pointer;
	transition:ease all 0.3s;
}
.banner-accolades-play a:hover{
	transition:ease all 0.3s;
	transform:scale(1.1);
}
.banner-accolades-video{
	display:none;
}
.banner-accolades-video.active{
	position:absolute;
	
	height:100%;
	
	top:0;
	right:0;
	bottom:0;
	display:inline-block;
	
}
@media screen and (max-width: 767px)
{
	.banner-accolades-play{
		left:0;
		right:0;
		text-align:center;
		bottom: 13%;
		top: auto;
	}
}
</style>
<script>
<?php
$url=$_SERVER["REQUEST_URI"];
if(strpos($url,'#video'))
{
	?>
	$(document).ready(function(){
	$('#acc-video').trigger('play');
	});
	<?php
}
?>
function AccPlay()
{
	$('.mypopup').addClass('on');
	$('.mypopup').removeClass('off');
	$('#acc-video').trigger('play');
	$('.mypopup-play').hide();
	$("#acc-video").prop('muted', false);
}
</script>
<section class="banner-accolades banner-accolades_bg-one" style="background-image: url('<?php the_field( 'hero_image_mobile' ); ?>')">

    <div class="banner-accolades__cover cover">
        <div class="banner-accolades__content">
            <div class="banner-accolades__info">
                <h1 class="banner-accolades__title"><?php the_field( 'hero_title' ); ?></h1>
                <p class="banner-accolades__text"><?php the_field( 'hero_text' ); ?></p>
            </div>
        </div>
    </div>
	<div class="banner-accolades-play">
	<a onclick="AccPlay()"><img src="/wp-content/themes/infusemedia/img/play.png"></a>
	</div>
	
</section>
<!-- End (banner-accolades) -->
<!-- (core-values) -->
<section class="core-values">
    <a href="<?php echo esc_html( get_field( 'cta_link' ) ); ?>" class="core-values__link">
        <div class="core-values__cover cover">
            <div class="core-values__label">
                <span><?php the_field( 'cta_text' ); ?></span>
                <svg class="core-values__label-arrow">
                    <use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/frontend/images/icons2.svg#icon-wide-pointer"></use>
                </svg>
            </div>
        </div>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/frontend/images/inner-parallelepipeds.svg" alt="" class="core-values__bg">
    </a>
</section>
<!-- End (core-values) -->
<!-- (our-accolades-history) -->
<section class="our-accolades-history">
    <?php if ( have_rows( 'history_items' ) ) : ?>
        <?php $i = 3;?>
        <?php while ( have_rows( 'history_items' ) ) : the_row(); ?>
            <div class="our-accolades-history__block <?php echo $i%2 ? '' : 'our-accolades-history__block_reverse'; ?>">
                <div class="our-accolades-history__img-container">
                    <img src="<?php the_sub_field( 'background' ); ?>" alt="" class="our-accolades-history__img">
                    <img src="<?php the_sub_field( 'badge' ); ?>" alt="" class="our-accolades-history__logo">
                    <div class="our-accolades-history__year">
                        <span><?php the_sub_field( 'year' ); ?></span>
                    </div>
                </div>
                <div class="our-accolades-history__cover cover">
                    <div class="our-accolades-history__wrapper">
                        <div class="our-accolades-history__text">
                            <p><?php the_sub_field( 'text' ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php $i++;?>
        <?php endwhile; ?>
    <?php endif; ?>
</section>
<!-- End (our-accolades-history) -->
<!-- (awards) -->
<section class="awards">
    <div class="awards__cover cover">
        <div class="awards__list">
            <?php if ( have_rows( 'awards_items' ) ) : ?>
                <?php while ( have_rows( 'awards_items' ) ) : the_row(); ?>
                    <div class="awards__item">
                        <div class="awards__item-info">
                            <div class="awards__year">
                                <span><?php the_sub_field( 'year' ); ?></span>
                            </div>
                            <div class="awards__item-img-container">
                                <img src="<?php the_sub_field( 'badge' ); ?>" alt="" class="awards__item-img">
                            </div>
                            <div class="awards__item-content">
                                <?php the_sub_field( 'text' ); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- End (awards) -->
<style>
    @media (min-width:768px) {
        .banner-accolades_bg-one {
            background-image: url('<?php the_field( 'hero_image_desktop' ); ?>') !important;
        }
    }
</style>

<?php get_footer(); ?>