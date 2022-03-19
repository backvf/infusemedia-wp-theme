<?php if(get_the_category( $id )[0]->slug == "advertisement"):?>
    <?php $destination = get_field('infsue2020_destination', $id); ?>

    <div class="insight-post <?php post_class_by_number();?>" onclick="window.open('<?php echo $destination; ?>'); return false" >
        <div class="insights-article-container  text-<?php the_field("preview_text_color", $id); ?> <?php postCatsSlug(); ?>">
            <div class="container h-100 position-relative <?php has_background_class();?>" style="<?php maybe_background_style();?>">
                <div class="row h-100">
                    <div class="d-flex flex-column front-card h-100 w-100 <?php if(get_field('infuse2020_ad_type')) { if(get_field('infuse2020_ad_type', $id ) == 1) { echo 'fcase'; } elseif (get_field('infuse2020_ad_type', $id ) == 2) { echo 'scase'; } elseif (get_field('infuse2020_ad_type', $id ) == 3) { echo 'tcase'; } }?>">
                        <?php if( get_field('infuse2020_ad_type', $id) == 1 ):?>
                            <?php $use_case = get_field('infuse2020_use-case_1', $id); ?>
                            <h4 class="article-title"><?php echo $use_case['title']; ?></h4>
                            <!--
                            <?php print_r($use_case);?>
                            --> 
                            <p><?php echo $use_case['subtitle']; ?></p>
                            <a href="<?php echo $destination; ?>" class="read-more-btn mt-auto fcase">
                                <span><i class="fas fa-chevron-right"></i></span>
                            </a>
                        <?php elseif( get_field('infuse2020_ad_type', $id) == 2 ): ?>
                            <?php $use_case = get_field('infuse2020_use-case_2', $id); ?>
                            <h4 class="article-title"><?php echo $use_case['title']; ?></h4>
                            <!--
                            <?php print_r($use_case);?>
                            --> 
                            <a href="<?php echo $destination; ?>" class="read-more-btn mt-auto scase">
                                <span><i class="fas fa-chevron-right"></i></span>
                            </a>
                        <?php else: ?>
                            <?php $use_case = get_field('infuse2020_use-case_3', $id); ?>
                            <h4 class="article-title"><?php echo $use_case['title']; ?></h4>
                            <!--
                            <?php print_r($use_case);?>
                            --> 
                            <p><?php echo $use_case['subtitle']; ?></p>
                            <a href="<?php echo $destination; ?>" class="read-more-btn mt-auto tcase">
                                <span><i class="fas fa-chevron-right"></i></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
<?php $posturl = get_the_permalink(); ?>
<div class="insight-post <?php post_class_by_number();?>" onclick="location.href='<?php echo $posturl; ?>';" >
    <div class="insights-article-container text-<?php the_field("preview_text_color", $id); ?> <?php postCatsSlug(); ?>">
        <div class="container h-100 position-relative <?php has_background_class();?>" style="<?php maybe_background_style();?>">
            <div class="row h-100">
                <div class="d-flex flex-column front-card h-100 w-100">
                    <span class="category"> <?php postCategoryNames(); ?> </span>
                    <?php the_title('<h4 class="article-title">','</h4>'); ?>
                        <?php $sub=get_field("sub_title");
                        if($sub!='') {?>
                        <h3 class="article-subtitle"><?php echo $sub;?></h3>
                        <?php } ?>
                        
                        <?php if( (get_the_category( $id )[0]->slug == "webinars") && has_post_thumbnail() ): ?>
                        <?php
                        
                        
                                    // Check value exists.
                                    if( have_rows('infuse2020_insights_layout', $id) ):

                                        // Loop through rows.
                                        while ( have_rows('infuse2020_insights_layout', $id) ) : the_row();

                                        // Case: header_banner_+_form layout.
                                        if( get_row_layout() == 'header_banner_form' ):

                        ?>
                        <?php $video_duration = get_sub_field('video_duration'); ?>

                        <?php
                        
                        
                                    endif;

                                    // End loop.
                                    endwhile;
                                    
                                endif;
                        ?>
                                <div class="webinar-d-wrapper <?php echo empty($video_duration) ? 'no-vid-duration' : false ; ?>">
                                    <?php 
                                    
                                    // Check value exists.
                                    if( have_rows('infuse2020_insights_layout', $id) ):

                                        // Loop through rows.
                                        while ( have_rows('infuse2020_insights_layout', $id) ) : the_row();

                                            // Case: header_banner_+_form layout.
                                            if( get_row_layout() == 'header_banner_form' ):
                                            
                                            $video_duration = get_sub_field('video_duration');

                                                if($video_duration):

                                            ?>
                                                
                                                <div class="video-duration">
                                                    <span><?php echo $video_duration; ?></span>
                                                </div>

                                            <?php
                                            
                                                endif;

                                            endif;

                                        // End loop.
                                        endwhile;

                                    // No value.
                                    else :
                                    // Do something...
                                    endif; ?>
                                    
                                <a href="<?php echo $posturl; ?>" class="read-more-btn mt-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                                        <path d="M48 0C48 16.0164 48 31.9753 48 48C31.9863 48 16.0274 48 0 48C0 31.9836 0 16.0274 0 0C16.0219 0 31.9781 0 48 0ZM17.9955 34.3574C22.8665 30.8624 27.595 27.4717 32.4331 24.0014C27.5703 20.5009 22.8391 17.0965 17.9955 13.6097C17.9955 20.5859 17.9955 27.3702 17.9955 34.3574Z" fill="white" fill-opacity="0.8"/>
                                    </svg>
                                </a>
                            </div>
                        <?php elseif( get_the_category( $id )[0]->slug == "webinars" ): ?>
                        <?php
                        
                        
                                    // Check value exists.
                                    if( have_rows('infuse2020_insights_layout', $id) ):

                                        // Loop through rows.
                                        while ( have_rows('infuse2020_insights_layout', $id) ) : the_row();

                                        // Case: header_banner_+_form layout.
                                        if( get_row_layout() == 'header_banner_form' ):

                        ?>
                        <?php $video_duration = get_sub_field('video_duration'); ?>

                        <?php
                        
                        
                                    endif;

                                    // End loop.
                                    endwhile;
                                    
                                endif;
                        ?>
                            <div class="webinar-d-wrapper <?php echo empty($video_duration) ? 'no-vid-duration' : false ; ?>">
                                <?php 
                                
                                // Check value exists.
                                if( have_rows('infuse2020_insights_layout', $id) ):

                                    // Loop through rows.
                                    while ( have_rows('infuse2020_insights_layout', $id) ) : the_row();

                                        // Case: header_banner_+_form layout.
                                        if( get_row_layout() == 'header_banner_form' ):
                                        
                                        $video_duration = get_sub_field('video_duration');

                                            if($video_duration):
                                        
                                        ?>
                                            
                                            <div class="video-duration">
                                                <span><?php echo $video_duration; ?></span>
                                            </div>

                                        <?php

                                            endif;

                                        endif;

                                    // End loop.
                                    endwhile;

                                // No value.
                                else :
                                // Do something...
                                endif; ?>
                                <a href="<?php echo $posturl; ?>" class="read-more-btn mt-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                                        <path d="M48 0C48 16.0164 48 31.9753 48 48C31.9863 48 16.0274 48 0 48C0 31.9836 0 16.0274 0 0C16.0219 0 31.9781 0 48 0ZM17.9955 34.3574C22.8665 30.8624 27.595 27.4717 32.4331 24.0014C27.5703 20.5009 22.8391 17.0965 17.9955 13.6097C17.9955 20.5859 17.9955 27.3702 17.9955 34.3574Z" fill="#0096DC"/>
                                    </svg>
                                </a>
                            </div>
                        <?php else: ?>
                            <a href="<?php echo $posturl; ?>" class="row h-100 post-excerpt d-none">
                                <p><?php the_field('excerpt'); ?></p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="9" viewBox="0 0 23 9" fill="none">
                                    <path d="M22.8487 4.85356C23.0439 4.65829 23.0439 4.34171 22.8487 4.14645L19.6667 0.964468C19.4714 0.769206 19.1548 0.769206 18.9596 0.964468C18.7643 1.15973 18.7643 1.47631 18.9596 1.67157L21.788 4.5L18.9596 7.32843C18.7643 7.52369 18.7643 7.84027 18.9596 8.03554C19.1548 8.2308 19.4714 8.2308 19.6667 8.03554L22.8487 4.85356ZM0.495117 5L22.4951 5L22.4951 4L0.495117 4L0.495117 5Z" fill="#0097DD"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>