<?php get_header(); ?>

<?php 
$in_subcategory_blogs = false;
$cat_id = get_option('woo_blog_cat');
foreach( explode( "/", get_category_children( $cat_id ) ) as $child_category ) {
	if(in_category($child_category)) $in_subcategory_blogs = true;
}
if ((is_category($cat_id) || in_category($cat_id) || $in_subcategory_blogs) && !empty($cat_id)) 
	include (TEMPLATEPATH . '/template-blog.php'); 
else {           

?>
            <div id="albums">
                <div class="container_16">
                 
                    <?php if (have_posts()) : ?>
                    <?php $post = $posts[0]; ?>
                    
                    <div class="grid_16 alpha">
                       <?php if (is_category()) { ?><h2 class="arh"><?php _e('Archive for',woothemes); ?> '<?php echo single_cat_title(); ?>'</h2>
						<?php } elseif (is_day()) { ?><h2 class="arh"><?php _e('Archive for',woothemes); ?> <?php the_time('F jS, Y'); ?></h2>
						<?php } elseif (is_month()) { ?><h2 class="arh"><?php _e('Archive for',woothemes); ?> <?php the_time('F, Y'); ?></h2>
						<?php } elseif (is_year()) { ?><h2 class="arh"><?php _e('Archive for the year',woothemes); ?> <?php the_time('Y'); ?></h2>
						<?php } elseif (is_author()) { ?><h2 class="arh"><?php _e('Archive by Author',woothemes); ?></h2>
						<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?><h2 class="arh"><?php _e('Archives',woothemes); ?></h2>
						<?php } elseif (is_tag()) { ?><h2 class="arh"><?php _e('Tag Archives:',woothemes); ?> <?php echo single_tag_title('', true); ?></h2>	
						<?php } ?>
                    </div>
                    
                    <?php 
                    $counter = 0; $counter2 = 0; 
                    while (have_posts()) : the_post(); $counter++; $counter2++; ?>
                    	
                    <?php if ( $counter2%4 == 1 ) { ?><div class="row_wrap"><?php } ?>
                    
                    <div class="grid_4 <?php echo 'trim trim-' . $counter; if ($counter == 1) { echo ' alpha'; } elseif ($counter == 4) { echo ' omega'; $counter = 0; } ?>">
                        
                        <div class="post-image-block"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php woo_get_image('image','220','150','thumbnail',90,null,'img'); ?></a></div>
    
                        <div class="entry">
                            <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                            <?php the_excerpt(); ?>
                        </div>
                    
                    </div>
                    <?php if ( $counter2%4 == 0 ) { ?></div><?php } ?>
                    <?php if ( $counter == 0 ) { ?><div style="clear:both;height:1px;border-bottom:1px solid #eee;margin-bottom: 20px;"></div><?php } ?>
                    
                    <?php endwhile; 
                    if ($counter2%4 != 0){  ?>
                    </div><div style="clear:both;height:1px;border-bottom:0px solid #eee;margin-bottom: 20px;"></div>
                    <?php  } ?>
                    
                    <div class="more_entries">
						<?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
		                    <div class="fl"><?php previous_posts_link(__('&laquo; Newer Entries ',woothemes)) ?></div>
		                    <div class="fr"><?php next_posts_link(__(' Older Entries &raquo;',woothemes)) ?></div>
		                    <br class="fix" />
                        <?php } ?>
                    </div>
                    
                    <?php else : ?>
                    
                    <h2><?php _e('Not Found',woothemes); ?></h2>
                    
                    <?php include (TEMPLATEPATH . '/searchform.php'); ?>
                    
                    <?php endif; ?>
                    
					 <!-- Leaderboard Ad Starts -->
               		  <?php if (get_option('woo_ad_content') == 'true') include (TEMPLATEPATH . "/ads/archive_ad.php"); ?>
               		 <!-- Leaderboard Ad Ends -->
    
                </div><!-- / #container_16 -->
            </div><!-- / #albums -->

<?php } get_footer(); ?>