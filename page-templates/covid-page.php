<?php
/**
 * Template Name: COVID Page
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
global $wp;
$current_url = home_url(add_query_arg(array(), $wp->request));  ?>

<script>
    jQuery(document).ready(function ($) {
        $('body').on('hsvalidatedsubmit', '.hs-form', function (e) {
            //analytics code goes here
            Cookies.set('submitted-<?php echo get_the_ID(); ?>', '<?php echo get_the_ID(); ?>', { expires: 30 });
        });
    });
</script>


<div class="insights-article covid-template">

<?php

// Check value exists.
if( have_rows('infuse2020_insights_layout') ):

    // Loop through rows.
    while ( have_rows('infuse2020_insights_layout') ) : the_row();

        // Case: header_banner_+_form layout.
        if( get_row_layout() == 'header_banner_form' ):

            // Load sub field value.
            $banner_background = get_sub_field('banner_background');
            // $asset_type = get_sub_field('asset_type');
            $pre_header = get_sub_field('pre_header');
            $asset_title = get_sub_field('asset_title');
            $sub_header = get_sub_field('sub_header');
            $asset_form = get_sub_field('asset_form');
            $ty_msg = get_sub_field('thank_you_message');
            $display_content = get_sub_field('display_content');
            $cookie = 'submitted-' . get_the_ID();
            if(  ( ( $display_content == 'before' || $display_content == 'both' ) && !isset($_COOKIE[$cookie]) ) || ( ( $display_content == 'after' || $display_content == 'both' ) && $_COOKIE[$cookie] == get_the_ID() ) ):
            // Do something... ?>

            <div class="header_banner_form" style="background-image: url('<?php echo $banner_background; ?>');">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="banner-text-wrapper">
                                <div class="banner-type">
                                </div>
                                <div class="banner-title">
                                    <h1>
                                        <?php if ($pre_header): ?>
                                            <span class="pre-header"><?php echo strip_tags( $pre_header, '<br><strong><span>' ); ?></span>
                                        <?php endif; ?>
                                        <span><?php echo strip_tags( $asset_title, '<br><span>' ); ?></span>
                                        <?php if ($sub_header):?>
                                            <span class="sub-header"><?php echo strip_tags( $sub_header, '<br><strong><span>' ); ?></span>
                                        <?php endif; ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="offset-2 col-4 pl-0">
                            <?php if($_COOKIE[$cookie] == get_the_ID()): ?>
                                <div class="banner-form ty-wrap">
                                    <h2>Thank You!</h2>
                                    <div class="ty-msg">
                                        <?php echo $ty_msg; ?>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="banner-form">
                                    <?php echo do_shortcode($asset_form); ?>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif;?>
        <?php

        // Case: header_banner_no_form layout.
        elseif( get_row_layout() == 'header_banner_no_form' ):

            // Load sub field value.
            $banner_background = get_sub_field('banner_background');
            $asset_type = get_sub_field('article_type');
            $asset_title = get_sub_field('article_title');
            $display_content = get_sub_field('display_content');
            $cookie = 'submitted-' . get_the_ID();
            if(  ( ( $display_content == 'before' || $display_content == 'both' ) && !isset($_COOKIE[$cookie]) ) || ( ( $display_content == 'after' || $display_content == 'both' ) && $_COOKIE[$cookie] == get_the_ID() ) ):
            // Do something... ?>

            <div class="header_banner_no_form" style="background-image: url('<?php echo $banner_background; ?>');">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="banner-text-wrapper">
                                <div class="banner-type">
                                    <?php echo esc_html( $asset_type[0]->name ); ?>
                                </div>
                                <div class="banner-title">
                                    <?php echo $asset_title; ?>
                                </div>
                                <div class="banner-date">
                                    <?php echo get_the_date(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php endif;?>
        <?php
        // Case: section_image_with_details_text_right layout.
        elseif( get_row_layout() == 'section_image_with_details_text_right' ):
            // Load sub field value.
            $type = get_sub_field('type');
            $custom_background_color = get_sub_field('custom_background_color');
            $custom_stripes = get_sub_field('custom_stripes');
            $line_above_text = get_sub_field('line_above_text');
            $line_color = get_sub_field('line_color');
            $image = get_sub_field('image');
            $image_name_detail = get_sub_field('image_name_detail');
            $image_title_detail = get_sub_field('image_title_detail');
            $description = get_sub_field('description');
            $current_id = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', mt_rand(1,10))), 1, 10);
            $display_content = get_sub_field('display_content');
            $cookie = 'submitted-' . get_the_ID();
            if(  ( ( $display_content == 'before' || $display_content == 'both' ) && !isset($_COOKIE[$cookie]) ) || ( ( $display_content == 'after' || $display_content == 'both' ) && $_COOKIE[$cookie] == get_the_ID() ) ):
            // Do something... ?>
                <?php if($type == "0"): ?>
                    <div class="section_iwdtr iwdtr-grey" style="background-color: #E5E5E5;">
                <?php elseif($type == "1"):?>
                    <div class="section_iwdtr iwdtr-blue" style="background: linear-gradient(190.67deg, #3ECEDD -38.87%, #005EAB 79.25%);">
                <?php elseif($type == "2"):?>
                    <div id="<?php echo $current_id; ?>" class="section_iwdtr iwdtr-custom" style="background-color: <?php echo $custom_background_color; ?>">
                    <style>
                        <?php echo '#' . $current_id .':after {background-image: url("'. $custom_stripes .'")}'; ?>
                    </style>
                <?php endif;?>
                        <div class="container">
                            <div class="row">
                                <div class="col-2">
                                    <div class="image_details">
                                        <div class="image-wrapper">
                                            <?php if( !empty( $image ) ): ?>
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="image_name_detail">
                                            <?php echo $image_name_detail; ?>
                                        </div>
                                        <div class="image_title_detail">
                                            <?php echo $image_title_detail; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="offset-1 col-9">
                                    <?php if($line_above_text == TRUE): ?>
                                        <div class="line_above_text" style="background-color: <?php echo $line_color; ?>;"></div>
                                    <?php else: ?>
                                        <div class="line_above_text line-disabled"></div>
                                    <?php endif; ?>
                                    <div class="description">
                                        <?php echo $description; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php endif; ?>
        <?php
        // Case: section_text layout.
        elseif( get_row_layout() == 'section_text' ):
            $line_above_text = get_sub_field('line_above_text');
            $line_color = get_sub_field('line_color');
            $grid_list = get_sub_field('grid_list');
            $content_center = get_sub_field('content_center');
            $content = get_sub_field('content');
            $display_content = get_sub_field('display_content');
            $cookie = 'submitted-' . get_the_ID();
            if(  ( ( $display_content == 'before' || $display_content == 'both' ) && !isset($_COOKIE[$cookie]) ) || ( ( $display_content == 'after' || $display_content == 'both' ) && $_COOKIE[$cookie] == get_the_ID() ) ):
            // Do something... ?>
            
                <div class="section_text" style="">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <?php if($line_above_text == TRUE): ?>
                                    <div class="line_above_text" style="background-color: <?php echo $line_color; ?>; <?php echo $content_center ? 'margin-left: auto; margin-right: auto;' : ''; ?>"></div>
                                <?php else: ?>
                                    <div class="line_above_text line-disabled"></div>
                                <?php endif; ?>
                                <div class="content <?php echo $content_center ? 'content-centered' : ''; ?> <?php echo $grid_list ? 'grid-list' : ''; ?>">
                                    <?php echo $content; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endif; ?>
        <?php
        // Case: section_half_image_left_half_text_right layout.
        elseif( get_row_layout() == 'section_half_image_left_half_text_right' ):
            $image = get_sub_field('image');
            $text  = get_sub_field('text');
            $display_content = get_sub_field('display_content');
            $cookie = 'submitted-' . get_the_ID();
            if(  ( ( $display_content == 'before' || $display_content == 'both' ) && !isset($_COOKIE[$cookie]) ) || ( ( $display_content == 'after' || $display_content == 'both' ) && $_COOKIE[$cookie] == get_the_ID() ) ):
            // Do something... ?>
            
                <div class="section_hilhtr" style="">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="image-wrapper">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-wrapper">
                                    <?php echo $text; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endif; ?>
        <?php
        // Case: section_half_image_left_half_text_right layout.
        elseif( get_row_layout() == 'section_background_text_left_image_right' ):
            $background_color = get_sub_field('background_color');
            $line_color = get_sub_field('line_color');
            $text  = get_sub_field('text');
            $image = get_sub_field('image');
            $display_content = get_sub_field('display_content');
            $cookie = 'submitted-' . get_the_ID();
            if(  ( ( $display_content == 'before' || $display_content == 'both' ) && !isset($_COOKIE[$cookie]) ) || ( ( $display_content == 'after' || $display_content == 'both' ) && $_COOKIE[$cookie] == get_the_ID() ) ):
            // Do something... ?>
            
                <div class="section_btlir" style="background-color: <?php echo $background_color; ?>;">
                    <div class="container">
                        <div class="row">
                            <div class="col-9">
                                <div class="line_above_text" style="background-color: <?php echo $line_color; ?>;"></div>
                                <div class="text-wrapper">
                                    <?php echo $text; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="image-wrapper"></div>
                    <style>
                        .insights-article .section_btlir .image-wrapper {
                            background-image: url('<?php echo $image; ?>');
                        }
                    </style>
                </div>

            <?php endif; ?>
            <?php
            // Case: section_client_left_description_right layout.
            elseif( get_row_layout() == 'section_client_left_description_right' ):
                
            $image = get_sub_field('image');
            $client_name = get_sub_field('client_name');
            $client_title = get_sub_field('client_title');
            $display_content = get_sub_field('display_content');
            $cookie = 'submitted-' . get_the_ID();
            if(  ( ( $display_content == 'before' || $display_content == 'both' ) && !isset($_COOKIE[$cookie]) ) || ( ( $display_content == 'after' || $display_content == 'both' ) && $_COOKIE[$cookie] == get_the_ID() ) ):
            // Do something... ?>
            
                <div class="section_cldr" style="">
                    <div class="container">
                        <div class="row">
                            <div class="col-3 col-left-wrapper">
                                <div class="client">
                                    <div class="client-image">
                                        <?php if( !empty( $image ) ): ?>
                                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                        <?php endif; ?>
                                    </div>
                                    <div class="client-details">
                                        <div class="client-name"><?php echo $client_name; ?></div>
                                        <div class="client-title"><?php echo $client_title; ?></div>
                                    </div>
                                </div>
                                <div class="share-buttons hidden-small">
                                    <ul>
                                        <li class="share">Share:</li>
                                        <li class="linkedin-share"><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $current_url; ?>&title=<?php echo wp_title(); ?>" target="_blank"><icon class="fab fa-linkedin-in"></icon></a></li>
                                        <li class="twitter-share"><a href="https://twitter.com/intent/tweet?url=<?php echo $current_url; ?>" target="_blank"><icon class="fab fa-twitter"></icon></a></li>
                                        <li class="mail-share"><a href="mailto:info@example.com?&subject=<?php echo wp_title(); ?>&body=<?php echo $current_url; ?>&title=&summary=&source=" target="_blank"><icon class="fas fa-envelope"></icon></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-9">
                                <?php

                                    // Check value exists.
                                    if( have_rows('description_content') ):

                                        // Loop through rows.
                                        while ( have_rows('description_content') ) : the_row();

                                            // Case: simple_text layout.
                                            if( get_row_layout() == 'simple_text' ):
                                                $simple_text = get_sub_field('text');
                                                // Do something...
                                                ?>
                                                <div class="simple-text"><?php echo $simple_text; ?></div>
                                                <?php
                                            // Case: highlights layout.
                                            elseif( get_row_layout() == 'highlights' ): 
                                                $title = get_sub_field('title');
                                                $highlight = get_sub_field('highlight');
                                                // Do something...
                                                ?>
                                                <div class="highlights-title"><?php echo $title; ?></div>
                                                <div class="highlights-wrapper row">
                                                    <?php

                                                    // Check rows exists.
                                                    if( have_rows('highlight') ):

                                                        // Loop through rows.
                                                        while( have_rows('highlight') ) : the_row();

                                                            // Load sub field value.
                                                            $highlight = get_sub_field('highlight');
                                                            // Do something...
                                                            ?><div class="highlight col-4"><?php echo $highlight; ?></div><?php

                                                        // End loop.
                                                        endwhile;

                                                    // No value.
                                                    else :
                                                        // Do something...
                                                    endif;
                                                    ?>
                                                </div>
                                                <?php
                                            endif;

                                        // End loop.
                                        endwhile;

                                    // No value.
                                    else :
                                        // Do something...
                                    endif;

                                ?>
                                <div class="share-buttons hidden-large">
                                    <ul>
                                        <li class="share">Share:</li>
                                        <li class="linkedin-share"><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $current_url; ?>&title=<?php echo wp_title(); ?>" target="_blank"><icon class="fab fa-linkedin-in"></icon></a></li>
                                        <li class="twitter-share"><a href="https://twitter.com/intent/tweet?url=<?php echo $current_url; ?>" target="_blank"><icon class="fab fa-twitter"></icon></a></li>
                                        <li class="mail-share"><a href="mailto:info@example.com?&subject=<?php echo wp_title(); ?>&body=<?php echo $current_url; ?>&title=&summary=&source=" target="_blank"><icon class="fas fa-envelope"></icon></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endif; ?>
        <?php
        // Case: Download layout.
        elseif( get_row_layout() == 'section_download_asset' ):
            $asset_image = get_sub_field('asset_image');
            $asset_name  = get_sub_field('asset_name');
            $asset_file  = get_sub_field('asset_file');
            $display_content = get_sub_field('display_content');
            $cookie = 'submitted-' . get_the_ID();
            if(  ( ( $display_content == 'before' || $display_content == 'both' ) && !isset($_COOKIE[$cookie]) ) || ( ( $display_content == 'after' || $display_content == 'both' ) && $_COOKIE[$cookie] == get_the_ID() ) ):
            // Do something... ?>

                <div class="section_da" style="">
                    <div class="container">
                        <div class="row">
                            <div class="asset-image">
                                <?php if( !empty( $asset_image ) ): ?>
                                    <img src="<?php echo esc_url($asset_image['url']); ?>" alt="<?php echo esc_attr($asset_image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="asset-description">
                                <div class="asset-name"><?php echo $asset_name; ?></div>
                                <div class="asset-download"><a class="btn btn-secondary" href="<?php echo $asset_file; ?>">DOWNLOAD PDF</a></div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endif;?>             
                
        <?php
        // Case: section_related_insights layout.
        elseif( get_row_layout() == 'section_related_insights' ):
            $title = get_sub_field('title');
            $related_insights  = get_sub_field('related_insights');
            $display_content = get_sub_field('display_content');
            $cookie = 'submitted-' . get_the_ID();
            if(  ( ( $display_content == 'before' || $display_content == 'both' ) && !isset($_COOKIE[$cookie]) ) || ( ( $display_content == 'after' || $display_content == 'both' ) && $_COOKIE[$cookie] == get_the_ID() ) ):
            // Do something... ?>
            
                <div class="section_ri" style="">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-title"><h3><?php echo $title; ?></h3></div>
                                <div class="related-insights row">
                                <?php
                                    if( $related_insights ): ?>
                                        <?php foreach( $related_insights as $post ): 

                                            // Setup this post for WP functions (variable must be named $post).
                                            setup_postdata($post); ?>
                                                <div class="insight-post <?php post_class_by_number();?>" >
                                                    <div class="insights-article-container <?php postCatsSlug(); ?>">
                                                        <div class="container h-100 position-relative <?php has_background_class();?>" style="<?php maybe_background_style();?>">
                                                            <div class="row h-100">
                                                                <div class="d-flex flex-column front-card h-100 w-100 <?php echo is_special_article_in_list() ? 'col-6':'' ?>">
                                                                    <span class="category"> <?php postCategoryNames(); ?> </span>
                                                                    <?php the_title('<h3 class="article-title">','</h3>'); ?>
                                                                    <?php $posturl = get_the_permalink(); ?>
                                                                    <a href="<?php echo $posturl; ?>" class="read-more-btn mt-auto">Read More
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="9" viewBox="0 0 23 9" fill="none">
                                                                            <path d="M22.8487 4.85356C23.0439 4.65829 23.0439 4.34171 22.8487 4.14645L19.6667 0.964468C19.4714 0.769206 19.1548 0.769206 18.9596 0.964468C18.7643 1.15973 18.7643 1.47631 18.9596 1.67157L21.788 4.5L18.9596 7.32843C18.7643 7.52369 18.7643 7.84027 18.9596 8.03554C19.1548 8.2308 19.4714 8.2308 19.6667 8.03554L22.8487 4.85356ZM0.495117 5L22.4951 5L22.4951 4L0.495117 4L0.495117 5Z" fill="#0097DD"/>
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <a href="<?php echo $posturl; ?>" class="row h-100 post-excerpt d-none">
                                                                <p><?php the_field('excerpt'); ?></p>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="9" viewBox="0 0 23 9" fill="none">
                                                                    <path d="M22.8487 4.85356C23.0439 4.65829 23.0439 4.34171 22.8487 4.14645L19.6667 0.964468C19.4714 0.769206 19.1548 0.769206 18.9596 0.964468C18.7643 1.15973 18.7643 1.47631 18.9596 1.67157L21.788 4.5L18.9596 7.32843C18.7643 7.52369 18.7643 7.84027 18.9596 8.03554C19.1548 8.2308 19.4714 8.2308 19.6667 8.03554L22.8487 4.85356ZM0.495117 5L22.4951 5L22.4951 4L0.495117 4L0.495117 5Z" fill="#0097DD"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                        <?php endforeach; ?>
                                        <?php 
                                        // Reset the global post object so that the rest of the page works correctly.
                                        wp_reset_postdata(); ?>
                                    <?php endif; ?>    
                                </div>                                  
                                <div class="dots-container">
                                    <div class="custom-dots-insights"></div>
                                    <div class="slider-arrrow"> 
                                        <a class="slick-prev-btn slick-prev-btn-insights"></a>
                                        <a class="slick-next-btn slick-next-btn-insights"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        <?php endif; ?>    
        <?php
        // Case: section_highlights layout.
        elseif( get_row_layout() == 'section_highlights' ):
            $display_content = get_sub_field('display_content');
            $cookie = 'submitted-' . get_the_ID();
            if(  ( ( $display_content == 'before' || $display_content == 'both' ) && !isset($_COOKIE[$cookie]) ) || ( ( $display_content == 'after' || $display_content == 'both' ) && $_COOKIE[$cookie] == get_the_ID() ) ):
            // Do something... ?>
            
                <div class="section_highlights" style="">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <?php 
                                $title = get_sub_field('title');
                                // Do something...
                                ?>
                                <div class="highlights-title"><?php echo $title; ?></div>
                                <div class="highlights-wrapper row">
                                    <?php
                                    // Check rows exists.
                                    if( have_rows('highlight') ):

                                        // Loop through rows.
                                        while( have_rows('highlight') ) : the_row();

                                            // Load sub field value.
                                            $highlight = get_sub_field('highlight');
                                            // Do something...
                                            ?><div class="highlight col-4"><?php echo $highlight; ?></div><?php

                                        // End loop.
                                        endwhile;

                                    // No value.
                                    else :
                                        // Do something...
                                    endif;
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            <?php endif; ?>    
        <?php
        // Case: section_quote layout.
        elseif( get_row_layout() == 'section_quote' ):
            $client_name  = get_sub_field('client_name');
            $client_quote = get_sub_field('client_quote');
            $display_content = get_sub_field('display_content');
            $cookie = 'submitted-' . get_the_ID();
            if(  ( ( $display_content == 'before' || $display_content == 'both' ) && !isset($_COOKIE[$cookie]) ) || ( ( $display_content == 'after' || $display_content == 'both' ) && $_COOKIE[$cookie] == get_the_ID() ) ):
            // Do something... ?>
            
                <div class="section_quote" style="">
                    <div class="container">
                        <div class="row">
                            <div class="col-10">    
                                <div class="client-name"><?php echo $client_name; ?></div>
                                <div class="client-quote"><?php echo $client_quote; ?></div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endif; ?>    
        <?php
        // Case: section_left_text_right_image_simple layout.
        elseif( get_row_layout() == 'section_left_text_right_image_simple' ):
            $background_color = get_sub_field('background_color');
            $text  = get_sub_field('text');
            $image = get_sub_field('image');
            $display_content = get_sub_field('display_content');
            $cookie = 'submitted-' . get_the_ID();
            if(  ( ( $display_content == 'before' || $display_content == 'both' ) && !isset($_COOKIE[$cookie]) ) || ( ( $display_content == 'after' || $display_content == 'both' ) && $_COOKIE[$cookie] == get_the_ID() ) ):
            // Do something... ?>
            
                <div class="section_ltris" style="background-color: <?php echo $background_color; ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <?php echo $text; ?>
                            </div>
                            <div class="col-6">
                                <?php if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endif; ?>    
        <?php
        // Case: section_share layout.
        elseif( get_row_layout() == 'section_share' ):
            $center_section = get_sub_field('center_section');
            $display_content = get_sub_field('display_content');
            $cookie = 'submitted-' . get_the_ID();
            if(  ( ( $display_content == 'before' || $display_content == 'both' ) && !isset($_COOKIE[$cookie]) ) || ( ( $display_content == 'after' || $display_content == 'both' ) && $_COOKIE[$cookie] == get_the_ID() ) ):
            // Do something... ?>
                <div class="section_share <?php echo $center_section ? 'section-centered' : '' ?>" style="">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">    
                                <div class="share-buttons">
                                    <ul>
                                        <li class="share">Share:</li>
                                        <li class="linkedin-share"><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $current_url; ?>&title=<?php echo wp_title(); ?>" target="_blank"><icon class="fab fa-linkedin-in"></icon></a></li>
                                        <li class="twitter-share"><a href="https://twitter.com/intent/tweet?url=<?php echo $current_url; ?>" target="_blank"><icon class="fab fa-twitter"></icon></a></li>
                                        <li class="mail-share"><a href="mailto:info@example.com?&subject=<?php echo wp_title(); ?>&body=<?php echo $current_url; ?>&title=&summary=&source=" target="_blank"><icon class="fas fa-envelope"></icon></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>    

        <?php

        // Case: section_link layout.
        elseif( get_row_layout() == 'section_link' ):
            $display_content = get_sub_field('display_content');
            $background_color = get_sub_field('background_color');
            $link = get_sub_field('link');
            if(  ( ( $display_content == 'before' || $display_content == 'both' ) && !isset($_COOKIE[$cookie]) ) || ( ( $display_content == 'after' || $display_content == 'both' ) && $_COOKIE[$cookie] == get_the_ID() ) ):
            // Do something... ?>
                <div class="section_link" style="<?php echo $background_color ? 'background-color: ' . $background_color : 'background: linear-gradient(46.13deg, #014861 -1.01%, #1176A1 52.53%, #20A4E1 87.53%), linear-gradient(181.58deg, #47CEDC -53.98%, #0D60A9 103.45%);' ;?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">    
                                <div class="link-button-wrapper">
                                    <?php if( $link ): 
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                        ?>
                                        <a class="link-button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>    

        <?php

        endif;

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif; ?>

</div>



<?php get_footer(); ?>