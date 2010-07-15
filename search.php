<?php get_header(); ?>

			
			<div id="main" class="grid_8 alpha">
            
            <h1>Search Results</h1>
        
                <div class="entry">
                    
                    <p style="margin-bottom:0;"><?php _e('Your search topic ',woothemes); ?> <strong><?php echo wp_specialchars($s); ?></strong> <?php _e('returned the following articles',woothemes); ?>:</p>
                    
                </div>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
                <div class="entry">
                
                    <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permalink to ',woothemes); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                    <p class="post_meta"><span><?php _e('Posted in ',woothemes); ?> <?php the_category(', ') ?>. <?php _e('Written by ',woothemes); ?> <?php the_author() ?> on <?php the_time('F jS, Y') ?></p>
                    
                    <?php the_excerpt() ?>
                    
                </div>
            
				<?php endwhile; else: ?>
        
                <div class="entry">
            
                        <p><?php _e('Sorry, no posts matched your criteria',woothemes); ?>.</p>
                                       
                </div>
    
				<?php endif; ?>
                				
				 <div class="more_entries">
					<?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
                    <div class="fl"><?php previous_posts_link(__('&laquo; Newer Entries ',woothemes)) ?></div>
	            	<div class="fr"><?php next_posts_link(__(' Older Entries &raquo;',woothemes)) ?></div>
	            	<br class="fix" />
                    <?php } ?>
                 </div>              
			
			</div><!-- / #main -->

<?php get_sidebar(); ?>
<?php get_sidebar("2"); ?>
<?php get_footer(); ?>