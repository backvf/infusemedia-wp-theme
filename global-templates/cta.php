<?php while( have_rows('ctas') ) : the_row(); ?>
	<?php if (get_sub_field('cta_position') == $args['position']):?>
	<section class="link">
		<a href="<?php the_sub_field('cta_page_link'); ?>" class="link__container">
			<div class="link__cover cover">
				<div class="link__text">
					<span><?php the_sub_field('cta_title'); ?></span>
					<svg class="link__pointer">
						<use xlink:href="<?php echo get_template_directory_uri() ?>/frontend/images/icons.svg#icon-pointer"></use>
					</svg>
				</div>
			</div>
		</a>
	</section>
	<?php endif; ?>
<?php endwhile;?>

