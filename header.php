<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$url=$_SERVER["REQUEST_URI"];
$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> style="visibility:hidden; <?php if(get_field("guide")): ?>--guW:1903px;<?php endif; ?>">
<head>

	<script>(function (c, p, d, u, id, i) {
	id = ''; // Optional Custom ID for user in your system
	u = 'https://tracking.g2crowd.com/attribution_tracking/conversions/' + c + '.js?p=' + encodeURI(p) + '&e=' + id;
	i = document.createElement('script');
	i.type = 'application/javascript';
	i.async = true;
	i.src = u;
	d.getElementsByTagName('head')[0].appendChild(i);
	}("4114", document.location.href, document));</script>


	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-57767766-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-57767766-1');
	gtag('config', 'AW-622377272');
	</script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZN1SMJJT9V"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-ZN1SMJJT9V');
    </script>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head();

	?>
	<style><?php the_field('infusemedia_fold_css', 'options'); ?></style>

	<script>
	jQuery(document).ready(function ($) {
		$(document).ready(function() {
			document.getElementsByTagName("html")[0].style.visibility = "visible";
		});
	});


	</script>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<?php $current_url = home_url($_SERVER['REQUEST_URI']);

if (strpos($url, '/our-story/') !== false)
{
	?>
	<div class="smooth-scroll our-story-scroll" data-scroll-container>
	<?php
}
?>
<div class="wrapper <?php if(get_field("guide")): ?>wrapper--guides<?php endif; ?> transition-disabled" id="wrapper">
    <div class="wrapper__content">
        <!-- (main-header) -->
        <div class="main-header" id="main-header" data-scroll="" data-scroll-sticky="" data-scroll-target="#wrapper">
            <!-- (views) -->
            <div class="views" id="views">
                <div class="views__cover <?php echo get_field('disable_page_builder') ? 'cover' : 'container';?>">
                    <div class="views__wrapper">
                        <ul class="views__list">
                            <li class="views__item <?php if ( get_current_blog_id() == 1 ) {echo 'active';} ?>">
                                <a href="/?noredirect=true" class="views__link">
                                    <div class="views__bg"></div>
                                    <span>North America</span>
                                </a>
                            </li>
                            <li class="views__item <?php if (strpos($current_url, 'emea') !== false) {echo 'active';} ?>">
                                <a href="/emea/?noredirect=true" class="views__link">
                                    <div class="views__bg"></div>
                                    <span>Emea</span>
                                </a>
                            </li>
                            <li class="views__item <?php if (strpos($current_url, 'latam') !== false) {echo 'active';} ?>">
                                <a href="/latam/?noredirect=true" class="views__link">
                                    <div class="views__bg"></div>
                                    <span>Latam</span>
                                </a>
                            </li>
                            <li class="views__item <?php if (strpos($current_url, 'apac') !== false) {echo 'active';} ?>">
                                <a href="/apac/?noredirect=true" class="views__link">
                                    <div class="views__bg"></div>
                                    <span>Apac</span>
                                </a>
                            </li>
                        </ul>
                        <div class="views__button-close link-views">
                            <svg class="views__button-icon-close">
                                <use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-cross"></use>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End (views) -->
            <div class="main-header__wrapper compensate-for-scrollbar">
                <!-- (header) -->
                <header class="header">
                    <div class="header__cover <?php echo get_field('disable_page_builder') ? 'cover' : 'container';?>">
                        <div class="header__wrapper">
                            <div class="header__logo">
                                <?php $logo_url = '/';
                                foreach (['emea', 'latam', 'apac'] as $slug) {
                                    if (strpos($current_url, $slug) !== false) {
                                        $logo_url.= $slug.'/';
                                    }
                                }
                                ?>
                                <a href="<?php echo $logo_url; ?>" class="header__logo-link">
                                    <?php
                                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                                    $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
                                    $custom_logo_alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', true);
                                    ?>
                                    <img src="<?php echo esc_url( $custom_logo_url )?>" alt="<?php echo $custom_logo_alt; ?>" class="header__logo-icon">
                                </a>
                            </div>
                            <div class="header__buttons">
                                <div class="header__search">
                                    <?php echo file_get_contents( get_stylesheet_directory_uri() . '/img/menu-search.svg' ); ?>
                                </div>
                                <div class="header__pull" id="pull">
                                    <div class="header__pull-icon">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="header__wrapper-nav" id="header-nav">
                                <div class="header__cover-nav">
                                    <div class="header__sub-link-wrapper link-container">
                                        <a href="#" class="header__sub-link link-event link-views">
                                            <div class="header__sub-link-cover cover">
                                                <div class="header__sub-link-label">
                                                    <?php if (strpos($current_url, 'latam') !== false){
                                                        echo'LATAM';
                                                    }elseif (strpos($current_url, 'emea') !== false) {
                                                        echo'EMEA';
                                                    }elseif (strpos($current_url, 'apac') !== false) {
                                                        echo'APAC';
                                                    }else{
                                                        echo'NORTH AMERICA';
                                                    } ?>

                                                    <svg class="header__sub-link-arrow">
                                                        <use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-arrow-stupid"></use>
                                                    </svg>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="header__links-view sub-links-container">
                                            <ul class="header__links-view-list">
                                                <li class="header__links-view-item <?php if ( get_current_blog_id() == 1 ) {echo 'active';} ?>">
                                                    <a href="/?noredirect=true" class="header__links-view-element">
                                                        <div class="header__links-view-element-cover cover">
                                                            <div class="header__links-view-element-label">North America</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="header__links-view-item <?php if (strpos($current_url, 'latam') !== false) {echo 'active';} ?>">
                                                    <a href="/latam/?noredirect=true" class="header__links-view-element">
                                                        <div class="header__links-view-element-cover cover">
                                                            <div class="header__links-view-element-label">Latam</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="header__links-view-item <?php if (strpos($current_url, 'emea') !== false) {echo 'active';} ?>">
                                                    <a href="/emea/?noredirect=true" class="header__links-view-element">
                                                        <div class="header__links-view-element-cover cover">
                                                            <div class="header__links-view-element-label">Emea</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="header__links-view-item <?php if (strpos($current_url, 'apac') !== false) {echo 'active';} ?>">
                                                    <a href="/apac/?noredirect=true" class="header__links-view-element">
                                                        <div class="header__links-view-element-cover cover">
                                                            <div class="header__links-view-element-label">Apac</div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <nav class="header__nav">
                                        <ul class="header__nav-list">
                                            <?php $items = wp_get_nav_menu_items('main-menu');
                                            foreach ($items as $item): ?>
                                                <?php $children = [];
                                                foreach ($items as $child) {
                                                    if ($child->menu_item_parent == $item->ID) {
                                                        $children[] = $child;
                                                    }
                                                }
                                                ?>
                                                <?php if ($item->post_parent == 0):
                                                    $active = false;
                                                    foreach ($children as $child) {
                                                        if ($child->ID == get_the_ID()) {
                                                            $active = true;
                                                        }
                                                        if ($item->ID == get_the_ID()) {
                                                            $active = true;
                                                        }
                                                    }
                                                    ?>
                                                    <li class="header__nav-item link-container <?php echo $active ? 'active' : ''; ?>  <?php echo $children ? 'has-children' : ''; ?>">
                                                        <?php if($children):?>
                                                            <a href="<?php echo $item->url; ?>" class="header__nav-link link-event">
                                                                <div class="header__nav-link-cover cover">
                                                                    <div class="header__nav-link-label">
                                                                        <?php echo $item->title; ?>
                                                                        <svg class="header__nav-link-arrow">
                                                                            <use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-arrow-stupid"></use>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        <?php else:?>
                                                            <a href="<?php echo $item->url; ?>" class="header__nav-link link-event">
                                                                <div class="header__nav-link-cover cover"><?php echo $item->title; ?></div>
                                                            </a>
                                                        <?php endif;?>
                                                        <?php if($children):?>
                                                            <div class="header__sub-nav sub-links-container">
                                                                <ul class="header__sub-nav-list">
                                                                    <?php foreach ($children as $sub_item):?>
                                                                        <li class="header__sub-nav-item">
                                                                            <a href="<?php echo $sub_item->url; ?>" class="header__sub-nav-link">
                                                                                <div class="header__sub-nav-cover cover">
                                                                                    <div class="header__sub-nav-label">
                                                                                        <svg class="header__sub-nav-arrow">
                                                                                            <use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-arrow-stupid"></use>
                                                                                        </svg>
                                                                                        <?php echo $sub_item->title; ?>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                    <?php endforeach;?>
                                                                </ul>
                                                            </div>
                                                        <?php endif;?>
                                                    </li>
                                            <?php endif;?>
                                            <?php endforeach;?>
                                            <li class="header__nav-item header__nav-item-search link-container">
                                                <a href="#" class="header__nav-link header__nav-link-search">
                                                    <?php echo file_get_contents( get_stylesheet_directory_uri() . '/img/menu-search.svg' ); ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- End (header) -->
                <!-- (fixed-header) -->
                <div class="fixed-header">
                    <div class="fixed-header__cover cover">
                        <div class="fixed-header__wrapper">
                            <div class="fixed-header__logo">


								 <a href="<?php echo $logo_url; ?>" class="fixed-header__logo-link">
                                    <?php
                                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                                    $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
                                    $custom_logo_alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', true);
                                    ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/frontend/images/icon-small-logo.svg" alt="INFUSE media" class="fixed-header__logo-icon">
                                </a>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- End (fixed-header) -->
            </div>
        <div class="main-search" style="display: none">
            <div class="<?php echo get_field('disable_page_builder') ? 'cover' : 'container';?>">
                    <?php echo do_shortcode('[wd_asp id=2]'); ?>
                    <div class="search-filter">
                        <div class="search-filter-header closed">Filters</div>
                        <div class="search-filter-options">
                            <div class="search-filter-options-inner"></div>
                        </div>
                    </div>
            </div>
        </div>
        </div>

    </div>
        <!-- End (main-header) -->
