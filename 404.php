<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>
<div class="wrapper" id="error-404-wrapper">

	<section class="intro-section">
		<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
			<div class="row">
				<div class="col-md-12 content-area" id="primary">
					<main class="site-main" id="main">
						<section class="error-404 not-found">
							<header class="page-header">
								<h1 class="page-title"><?php esc_html_e( '404', 'understrap' ); ?></h1>
								<div class="page-content">
									<p>Page not found</p>
									<a href="/" class="btn btn-secondary">Home</a>
								</div>
							</header><!-- .page-header -->
						</section>
					</main>
				</div>
			</div>
		</div>
	</section>

	<section class="insights-section"> 
		<div class="container">
			<div class="row">
				<div class="col-md-10 offset-md-1">
					<h2 class="insights-title">Our Insights</h2>
					<p class="description">To help you sharpen your decision making in today’s increasingly complex world, we are pleased to introduce 
						INFUSE Insights. It’s where marketing, demand, and sales professionals share and challenge each other’s views, 
						unconstrained by popular opinion, with a goal of uncovering opportunities that will lead to growth and innovation.</p>
					<a href="/insights/" class="insights-link">Explore insights </a>
				</div>
			</div>
		</div>
		
		<?php echo do_shortcode('[homepage-insights-widget]')?>
	</section>

</div><!-- #error-404-wrapper -->

<?php
get_footer();
