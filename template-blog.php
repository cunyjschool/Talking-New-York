<?php get_header(); ?> 
			
			<div id="main" class="grid_8 alpha">

			<h2 class="arh"><?php echo single_cat_title(); ?></h2>
            
                            <?php query_posts($query_string . '&showposts=30'); ?>    
                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                <?php $wp_query->is_home = false; ?>
                                <div class="entry">
                                <h3 style="margin-bottom:10px;"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                                <p class="post_meta"><span class="date"><?php the_time('j F Y') ?></span> <span class="comments"><?php comments_popup_link(__('No Comments',woothemes), __('1 Comment',woothemes), __('% Comments',woothemes)); ?></span></p>
                                <?php the_excerpt() ?>
                                </div>
                            
                            <?php endwhile; endif; ?>
                            
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