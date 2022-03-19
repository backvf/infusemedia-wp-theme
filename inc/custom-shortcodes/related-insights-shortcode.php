<section class="insights-listing related-insights">
    <div class="container">
        <div id="insights-posts" class="posts row">
            <?php 
                $new_limit = 8;

                $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
                $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
                $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
                $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
                $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
                if ($iphone || $android || $ipad || $ipod || $berry == true){
                    $new_limit = 4;
                }
                $args = array(
                    'post_type' => 'insights',
                    'posts_per_page' => $new_limit,
                );
                global $postNumber;
                $postNumber = 1;

                $query = new WP_Query($args);

                if($query->have_posts()):
                    while($query->have_posts()) : $query->the_post();
                        get_template_part('page-templates/parts-insights-page/list-article');
                        $postNumber++;
                    endwhile;
                endif;

                wp_reset_postdata();

            ?>
        </div>
        <div class="text-center show-more-button">
            <a href="/insights/" class="btn btn-primary">Show more</a>
        </div>
    </div>
</section>