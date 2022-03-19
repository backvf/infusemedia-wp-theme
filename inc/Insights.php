<?php


class Insights
{
	public function __construct()
	{


		add_action('wp_enqueue_scripts', [$this, 'include_scripts']);

		add_action('wp_ajax_nopriv_insights_filtered_list', [$this, 'ajaxFilteredList']);
		add_action('wp_ajax_insights_filtered_list', [$this, 'ajaxFilteredList']);

		add_action('wp_ajax_nopriv_instant_search_results', [$this, 'instant_search_results_ajax']);
		add_action('wp_ajax_instant_search_results', [$this, 'instant_search_results_ajax']);
	}

	public static function generateList()
	{
		(new InsightsList())->generate(true);
	}


	public function include_scripts()
	{

		if (is_page_template('page-templates/insights-page.php')) {
			wp_enqueue_script('insights-vuejs', get_template_directory_uri() . '/js/vue.js', [], null, true);
			wp_enqueue_script('insights-script', get_template_directory_uri() . '/js/scripts.js', [
				'insights-vuejs',
				'jquery'
			], null, true);

			wp_localize_script('insights-script', 'wp_ajax',
				array('ajax_url' => admin_url('admin-ajax.php'))
			);
		}
	}


	public function ajaxFilteredList()
	{

		$categories = isset($_POST['categories']) ? $_POST['categories'] : false;
		$search = isset($_POST['search']) ? $_POST['search'] : false;
		$postsPerPage = isset($_POST['postsPerPage']) ? $_POST['postsPerPage'] : false;
		$offset = isset($_POST['offset']) ? $_POST['offset'] : false;
		$args = [];

		if ($postsPerPage) {
			$args['posts_per_page'] = $postsPerPage;
		}
		if ($offset) {
			$args['offset'] = $offset;
		}

		if ($categories) {
			$args['category__in'] = $categories;
		}

		if ($search) {
			$args['s'] = $search;
		}

		ob_start();

		$insightsList = new InsightsList($args);
		$insightsList->generate();

		$insights = ob_get_clean();

		echo json_encode([
			'status' => $insightsList->getStatus(),
			'html' => $insights,
			'loadMore' => $insightsList->isLoadMore(),
			'nextOffset' => $insightsList->getNextOffset(),
			'currentPositionsCount' => $insightsList->getCurrentPosition(),
		]);
		die();
	}


	public function instant_search_results_ajax()
	{

		$categories = isset($_POST['categories']) ? $_POST['categories'] : false;
		$search = isset($_POST['search']) ? $_POST['search'] : false;
		$posts_per_page = 6;
		$args = array(
			'post_type' => 'insights',
            'post_status' => 'publish',
			'suppress_filters' => true,
			'posts_per_page' => $posts_per_page,
		);

		if (isset($categories)) {
			$args['category__in'] = $categories;
		}

		if (isset($search)) {
			$args['s'] = $search;
		}

		$query = new WP_Query($args);
		$searchResults = [];
		if ($query->have_posts()):
			while ($query->have_posts()) : $query->the_post();
				$searchResults[] = [
					'post_id' => get_the_ID(),
					'permalink' => get_the_permalink(),
					'title' => html_entity_decode(get_the_title())
				];
			endwhile;
			$status = 'success';
		else:
			$status = 'no-results';
		endif;

		wp_reset_postdata();


		echo json_encode([
			'status' => $status,
			'insights' => $searchResults,
			'showMore' => ($query->found_posts > $posts_per_page),
		]);
		die();
	}
}

new Insights();
