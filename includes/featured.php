<div id="top">
    <div class="grid_12 alpha">
        <div id="featured">
            <div id="mygallery" class="stepcarousel">
                <div class="belt">
                	<?php 
						// Check if Featured category set
						global $wpdb;
						$featured = get_option('woo_featured_category'); 
						if ($featured <> "ALL") {
							$feat_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE name = '$featured'");
                     		query_posts("showposts=".get_option('woo_scroller_posts')."&cat=".$feat_id); 
						} else {
                     		query_posts("showposts=".get_option('woo_scroller_posts')."&cat=-".get_option('woo_blog_cat'));							
						}							
					?>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>		        					
                
                    <div class="panel">
                    
                        <div style="float:left;width:700px;">
                                            
                            <div class="grid_7 alpha">
                               <?php woo_get_image('image','400','267'); ?>
                            </div><!-- / #grid_8 -->
                           
                            <div class=" grid_5 omega">
                                <div class="featured_text">
                                    <h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                                    <?php the_excerpt(); ?>
                                </div>
                            </div><!-- / #grid_4 -->
                        
                        </div>
                    
                        <br class="fix" />
            
                    </div><!-- / panel -->
                    
                    <?php endwhile; endif; ?>
                    
                </div><!-- / belt -->
            </div><!-- / mygallery -->
        </div><!-- / featured -->
    </div><!-- / grid_12 -->
        
    <div class="grid_4 omega">
        <div id="about">
        
            <h2><?php echo stripslashes(get_option('woo_about_header')); ?></h2>           
            <p><?php if (get_option('woo_about_photo')) { ?><img alt="" class="about_image" src="<?php echo get_option('woo_about_photo'); ?>" /><?php } ?><?php echo stripslashes(get_option('woo_about_text')); ?></p>
             <p><?php if (get_option('woo_about_button')) { ?><a class="about_button" href="<?php echo get_option('woo_button_link'); ?>" title="<?php _e('Read more about me',woothemes); ?>"><?php echo stripslashes(get_option('woo_about_button')); ?></a><?php } ?></p>

        </div><!-- / #about -->
    </div><!-- / #grid_4 -->
            
</div><!-- / #top -->
           
<div class="grid_16 alpha omega" id="slider_nav">
    <div class="grid_6 alpha">
    	<a href="javascript:stepcarousel.stepBy('mygallery', -1)"><img src="<?php bloginfo('template_directory'); ?>/images/arr-left.png" alt="<?php _e('Back',woothemes); ?>" /> <?php _e('Previous',woothemes); ?></a>
    </div>
    <div class="grid_6" style="text-align:right;">
    	<a href="javascript:stepcarousel.stepBy('mygallery', 1)"><?php _e('Next',woothemes); ?> <img src="<?php bloginfo('template_directory'); ?>/images/arr-right.png" alt="<?php _e('Forward',woothemes); ?>" /></a>
    </div>
    <div class="grid_4 omega">
        <p><a class="rss_subscribe" href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" title="Subscribe to our RSS feed"> <?php _e('Subscribe to the feed',woothemes); ?></a></p>
    </div>
</div>            
        
        
        