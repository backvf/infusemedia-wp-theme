new Vue({
	el: '#insights-app',
	data: {
		isCategoryFilterOpened: false,
		selectedCategories: [],
		isLoading: false,
		loadMore: true,
		nextOffset: 0,
		searchResults: [],
		searchQuery: '',
		filterXhr: null,
		isSearched: false,
		showInstantResults: false,
		showMoreButtonIsVisible: false,
		instantSearchNoResults: false
	},
	computed: {
		categoryFilterOpenerButtonText: function () {
			if (this.selectedCategories.length === 0) {
				return 'FILTER BY CATEGORY';
			} else if (this.selectedCategories.length === 1) {
				return "FILTERED BY " + this.selectedCategories[0].name;
			} else {
				return "FILTERED BY MORE THAN ONE CATEGORY"
			}
		},
		selectedCategoriesIds: function () {
			return this.selectedCategories.map(function (cat) {
				return cat.id
			});
		}
	},
	methods: {
		clearSearch: function (event) {
			console.log(event);
			this.searchQuery = '';
			this.searchResults = [];
			this.showMoreButtonIsVisible = false;
			this.showInstantResults = false;
			this.instantSearchNoResults = false;
			if (this.isSearched) {
				this.refreshInsightsPage();
			}
		},
		openCategoryDropdown: function () {
			this.isCategoryFilterOpened = !this.isCategoryFilterOpened;
		},
		resetCategoryFilter: function () {
			this.selectedCategories = [];
		},
		showSearchResults: function () {
			this.isSearched = true;
			this.refreshInsightsPage();
		},
		showMoreInsights: function () {
			this.isLoading = true;
			var that = this;
			that.filterXhr = jQuery.ajax({
				url: wp_ajax.ajax_url,
				data: {
					action: 'insights_filtered_list',
					categories: this.selectedCategoriesIds,
					search: this.search,
					postsPerPage: 12,
					offset: this.nextOffset
				},
				type: 'post',
				success: function (resultText) {
					var result = JSON.parse(resultText);
					if (result.status === 'success') {
						jQuery('#insights-posts').append(result.html);
						that.nextOffset = result.nextOffset;
					}
					if (result.status === 'nodata') {
					}

					that.loadMore = result.loadMore;
				},
				error: function (result) {
					console.warn(result);
				},
				complete: function () {
					that.isLoading = false;
				}
			});
		},
		instantSearch: function () {
			var that = this;
			if (this.searchQuery.length >= 1) {
				that.filterXhr = jQuery.ajax({
					url: wp_ajax.ajax_url,
					data: {
						action: 'instant_search_results',
						categories: this.selectedCategoriesIds,
						search: this.searchQuery,
					},
					type: 'post',
					success: function (resultText) {
						var result = JSON.parse(resultText);
						if (result.status === 'success') {
							that.searchResults = result.insights;
							that.instantSearchNoResults = false;
						} else if (result.status === 'no-results') {
							that.searchResults = [];
							that.instantSearchNoResults = true;
						}

						that.showInstantResults = true;
						that.showMoreButtonIsVisible = result.showMore;
					},
					error: function (result) {
						console.warn(result);
					}
				});
			} else {
				that.searchResults = [];
				that.instantSearchNoResults = false;

				that.showInstantResults = false;
				that.showMoreButtonIsVisible = false;
			}
		},
		refreshInsightsPage: function () {
			this.showInstantResults = false;
			this.isLoading = true;
			this.nextOffset = 0;
			var that = this;
			jQuery.ajax({
				url: wp_ajax.ajax_url,
				data: {
					action: 'insights_filtered_list',
					categories: this.selectedCategoriesIds,
					search: this.searchQuery,
					postsPerPage: 14,
					offset: this.nextOffset
				},
				type: 'post',
				success: function (resultText) {

					var result = JSON.parse(resultText);
					if (result.status === 'success') {
						that.nextOffset += 14;
					}
					jQuery('#insights-posts').html(result.html);
					that.loadMore = result.loadMore;
				},
				error: function (result) {
					console.warn(result);
				},
				complete: function () {
					that.isLoading = false;
				}
			});
		},


		filterCategoriesByHas: function () {
			var urlHash = window.location.hash;
			if (urlHash) {
				this.selectedCategories = [];
				urlHash = urlHash.replace("#", "");
				var items = document.querySelectorAll('[data-slug="' + urlHash + '"]');
				console.log(items);
				for (var i = 0; i < items.length; i++) {
					console.log(items[i]);
					items[i].click();
				}
			}
		},

		documentClick: function (e) {
			var el = document.getElementById('insights-select-wrapper');
			var target = e.target
			if (el && el !== target && !el.contains(target)) {
				this.isCategoryFilterOpened = false;
			}
		}
	},
	watch: {
		selectedCategories: function () {
			this.refreshInsightsPage();
			this.instantSearch();
		},
	},
	created: function () {
		document.addEventListener('click', this.documentClick)
	},
	mounted: function () {
		this.nextOffset = parseInt(document.getElementById('nextOffsetInitialValue').value);
		this.filterCategoriesByHas();
		var that = this;
		window.addEventListener("hashchange", function () {
			that.filterCategoriesByHas();
		}, false);

	},
	destroyed: function () {
		document.removeEventListener('click', this.documentClick)
	},
});
