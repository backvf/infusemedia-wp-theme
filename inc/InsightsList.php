<?php

class InsightsList
{

	protected $positionsPerPage = 16;
	protected $currentPosition = 1;
	protected $realInsightsPerPage = 0;
	protected $queryArgs;
	protected $loadMore = false;
	protected $status = '';
	protected $foundInsights = 0;

	public function __construct($queryArgs = [])
	{

		if (isset($queryArgs['offset'])) {
			$this->positionsPerPage = $queryArgs['posts_per_page'];
			$this->realInsightsPerPage += $queryArgs['offset'];
		}

		$this->queryArgs = array_merge([
			'post_type' => 'insights',
			'post_status' => 'publish',
			'orderby' => [
				'menu_order' => 'ASC',
				'date' => 'DESC'
			],
			'posts_per_page' => $this->positionsPerPage,
		], $queryArgs);

	}

	public function generate(bool $withOffset = false)
	{
		global $insightIsDoubleWidth;
		$query = $this->getQuery();

		$this->foundInsights = $query->found_posts;
		if ($query->have_posts()):

			while ($query->have_posts() && $this->currentPosition <= $this->positionsPerPage) : $query->the_post();
				$insightIsDoubleWidth = $this->insightIsDoubleWidth();

				$this->realInsightsPerPage++;

				get_template_part('page-templates/parts-insights-page/list-article');

				if ($insightIsDoubleWidth) {
					$this->currentPosition += 2;
				} else {
					$this->currentPosition++;
				}

			endwhile;

			$this->status = 'success';
			if ($this->foundInsights <= $this->realInsightsPerPage) {
				$this->loadMore = false;
			} else {
				$this->loadMore = true;
			}
		else:
			$this->status = 'nodata';
			$this->loadMore = false;
		endif;

		wp_reset_postdata();
		if ($withOffset) {
			printf(
				'<input type="hidden" id="nextOffsetInitialValue" value="%s"/>',
				$this->realInsightsPerPage
			);
		}
	}

	private function getQuery()
	{

		return new WP_Query($this->queryArgs);
	}

	private function insightIsDoubleWidth()
	{
		if ($this->currentPosition % 4 != 0 && $this->shouldBeSpecial(get_the_ID())) {
			return true;
		} else {
			return false;
		}
	}

	private function shouldBeSpecial($postID)
	{
		return get_field('has_super-thumbnail', $postID);
	}

	/**
	 * @return int
	 */
	public function getFoundInsights(): int
	{
		return $this->foundInsights;
	}

	/**
	 * @return bool
	 */
	public function isLoadMore(): bool
	{
		return $this->loadMore;
	}

	/**
	 * @return string
	 */
	public function getStatus(): string
	{
		return $this->status;
	}

	public function getNextOffset()
	{
		return $this->realInsightsPerPage;
	}

	/**
	 * @return int|mixed
	 */
	public function getCurrentPosition()
	{
		return $this->currentPosition;
	}
}
