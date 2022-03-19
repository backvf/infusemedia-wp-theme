<?php

    $args = [
        'orderby' => 'date',
        'order' => 'ASC',
        'post_status' => 'publish',
        'post_type' => 'clients',
        'posts_per_page' => -1,
    ];

    $clientsQuery = new WP_Query($args);

?>

<div id="clientsList">
    <?php
        while($clientsQuery->have_posts()) : $clientsQuery->the_post();
            if(has_post_thumbnail()){ 
                echo '<div class="clients-col"><span class="helper"></span>';
                the_post_thumbnail();
                echo '</div>';
            }
        endwhile;
    ?>
</div>

<div class="clientButtonContainer">
        <button id="showMoreClients"> SHOW MORE </button>
</div>

<script type="text/javascript">

    jQuery(document).ready(function($){
        
        size_li = $("#clientsList div.clients-col").size();

        x=15;

        $('#clientsList div.clients-col:lt('+x+')').show().css({"opacity": "1", "visibility": "visible", "animation": "fade 1s"});
        
        
        $('#showMoreClients').click(function () {
            x= (x+10 <= size_li) ? x+10 : size_li;
            $('#clientsList div.clients-col:lt('+x+')').show().css({"opacity": "1", "visibility": "visible", "animation": "fade 1s"});
            if(x == size_li){
                $('#showMoreClients').hide();
            }
        });
    });

</script>
