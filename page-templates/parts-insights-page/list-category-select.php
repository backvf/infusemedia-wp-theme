
<div class="categories" @click.stop.self="clearSearch">
	<div class="insights-select" id="insights-select-wrapper">
		<div class="select-selected">
			<button id="category-select-button" @click="openCategoryDropdown" :class="{'openned' : isCategoryFilterOpened}">
				{{categoryFilterOpenerButtonText}}
			</button>
		</div>
		<div id="category-select-items" class="select-items" :class="{'select-hide' : !isCategoryFilterOpened}">
			<?php
			$categories = get_categories( [
					'exclude'    => [ 1, 15 ],
					'option_all' => 'FILTER BY CATEGORY'
			] );
			?>
			<?php foreach ( $categories as $cat ) : ?>
				<div class="select-item">
					<label>
						<span class="select-items__checkbox">
							<input type="checkbox"
								   data-slug="<?php echo $cat->slug;?>"
								   name="category-select"
								   v-model="selectedCategories"
								   :value="{'id': '<?php echo $cat->term_id; ?>', 'name' : '<?php echo $cat->name; ?>'}"
								   autocomplete="off"/>
							<span class="select-items__label"><?php echo $cat->name; ?></span>
							<span class="checkmark"></span>
						</span>
					</label>
				</div>
			<?php endforeach; ?>
			<div class="reset-select">
				<button @click="resetCategoryFilter">Reset filters</button>
			</div>
		</div>
	</div>
</div>
