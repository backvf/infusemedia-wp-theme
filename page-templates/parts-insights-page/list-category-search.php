<div class="searching" @click.stop.self="clearSearch">
	<input type="text"  id="search-input" v-model="searchQuery"
		   placeholder="SEARCH BY KEYWORD, ARTICLE TITLE, CATEGORY, ETC."
		   @input="instantSearch"
	>

	<button @click="clearSearch" v-if="searchQuery.length >= 1">x</button>

	<div>
		<div v-for="result in searchResults">
			<a :href="result.permalink">
				{{result.title}}
			</a>
		</div>
		<div v-if="instantSearchNoResults" class="searching__not-results-found">
			<span>We cannot find the content you are looking for.</span>
			<span>Maybe our team can help...</span>

			<a href="<?php the_field('infuse2020_contact_us_button_url');?>" class="searching__not-results-found__contact_button">Contact Us</a>
		</div>
		<div v-if="showMoreButtonIsVisible">
			<button @click="showSearchResults">
				Show more
			</button>
		</div>
	</div>
</div>
