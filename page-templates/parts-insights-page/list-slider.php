<section class="insights-slider-wrapper">
	<div class="container" id="content">
		<div class="row">
			<div class="col-12 content-area" id="primary">
				<div class="insights-slider">
					<?php
					$i = 1;
					$j = 0;
					// Check rows exists.
					if ( have_rows( 'infuse2020_insights_slider' ) ):
						// Loop through rows.
						while ( have_rows( 'infuse2020_insights_slider' ) ) : the_row();

							// Load sub field value.
							$background = get_sub_field( 'background' );
							$pre_header = get_sub_field('pre_header');
							$title      = get_sub_field( 'title' ); 
							$sub_header = get_sub_field('sub_header');
							$category   = get_sub_field('category');
							if( $category ): 
								$category_url = $category['url'];
								$category_title = $category['title'];
								$category_target = $category['target'] ? $category['target'] : '_self';
							endif;
							$btn        = get_sub_field( 'btn' );
							if ( $btn ):
								$btn_url    = $btn['url'];
								$btn_title  = $btn['title'];
								$btn_target = $btn['target'] ? $btn['target'] : '_self';
							endif;
							// Do something...
							?>
							<div>
								<div class="col-8 pl-0">
									<h2 class="title" onclick="location.href='<?php echo esc_url( $btn_url ); ?>';">
										<?php if ($pre_header): ?>
											<span class="pre-header"><?php echo strip_tags( $pre_header, '<br><strong><span>' ); ?></span>
										<?php endif; ?>
										<span><?php echo strip_tags( $title, '<br><strong><span>' ); ?></span>
										<?php if ($sub_header):?>
											<span class="sub-header"><?php echo strip_tags( $sub_header, '<br><strong><span>' ); ?></span>
										<?php endif; ?>
									</h2>									
									<span class="separator"></span>
									<span class="category"><a href="<?php echo esc_url( $category_url ); ?>" target="<?php echo esc_attr( $category_target ); ?>"><?php echo esc_html( $category_title ); ?>
										<svg xmlns="http://www.w3.org/2000/svg" width="23" height="9" viewBox="0 0 23 9" fill="none">
											<path d="M22.8487 4.85356C23.0439 4.65829 23.0439 4.34171 22.8487 4.14645L19.6667 0.964468C19.4714 0.769206 19.1548 0.769206 18.9596 0.964468C18.7643 1.15973 18.7643 1.47631 18.9596 1.67157L21.788 4.5L18.9596 7.32843C18.7643 7.52369 18.7643 7.84027 18.9596 8.03554C19.1548 8.2308 19.4714 8.2308 19.6667 8.03554L22.8487 4.85356ZM0.495117 5L22.4951 5L22.4951 4L0.495117 4L0.495117 5Z" fill="#FFFFFF"/>
										</svg></a>
									</span>
									<a class="btn btn-secondary" href="<?php echo esc_url( $btn_url ); ?>"
									   target="<?php echo esc_attr( $btn_target ); ?>"><?php echo esc_html( $btn_title ); ?></a>
								</div>
								<?php
								add_action('wp_footer', function () use ( $i, $background ) {
									echo"<style>.slide" . $i . "-current {background-image: url('" . $background . "');}</style>";

								} );
								?>
							</div>
							<?php
							$images[$j] =  array($background);
							$j ++;
							$i ++;
							// End loop.
						endwhile;

					// No value.
					else :
						// Do something...
					endif;

					?>
				</div>
				<div class="dots-container">
					<div class="custom-dots"></div>
					<div class="slider-arrrow">
						<a class="slick-prev-btn"></a>
						<a class="slick-next-btn"></a>
					</div>
				</div>
			</div><!-- #primary -->
		</div><!-- .row end -->
	</div><!-- #content -->
	<?php
	$x = 0;
	foreach ($images as $image) {
		?>
			
			<div class="slider-image-container super-slide-<?php echo $x; ?>" style="background-image: url('<?php echo $image[0]; ?>');"></div>

		<?php
		$x++;
	}
	?>
</section><!-- #insights-page-wrapper -->