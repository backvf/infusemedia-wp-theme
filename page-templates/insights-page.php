<?php
/**
 * Template Name: Insights Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
    get_template_part( 'global-templates/hero' );
}
?>
    <style>
        .article-subtitle{
            font-size:1.3rem!important;
            line-height:1.5rem!important;
        }
    </style>
    <div class="wrapper" id="full-width-page-wrapper">
    <div id="insights-app" @click="clearSearch">

        <?php get_template_part( 'page-templates/parts-insights-page/list-slider' ); ?>

        <section class="insights-filters">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-3">
                        <?php get_template_part( 'page-templates/parts-insights-page/list-category-select' ); ?>
                    </div>

                    <div class="col-md-12 col-lg-9">
                        <?php get_template_part( 'page-templates/parts-insights-page/list-category-search' ); ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="insights-listing">
            <div class="container" style="position: relative">
                <div class="infuse-ajax-loader" v-if="isLoading"><img src="<?php echo get_template_directory_uri() ?>/img/infuse-ajax-loader.gif" alt="Article Loader"/></div>
                <div id="insights-posts" class="posts row">
                    <?php Insights::generateList(); ?>
                </div>
            </div>
        </section>

        <section class="show-more-button">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button id="showMoreInsights" v-if="loadMore" @click="showMoreInsights"
                                class="btn btn-secodary btn-show"> SHOW MORE
                        </button>
                    </div>
                </div>
            </div>
        </section>

    </div>

<?php
get_footer();
