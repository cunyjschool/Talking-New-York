    <div class="widget">

    <h3 id="popular"><?php echo $text; ?></h3>

        <ul class="news">

        <?php
        global $wpdb;
         $result = $wpdb->get_results("SELECT comment_count,ID,post_title FROM $wpdb->posts ORDER BY comment_count DESC LIMIT 0 , $amount");
        foreach ($result as $post) {
        setup_postdata($post);
        $postid = $post->ID;
        $commentcount = $post->comment_count;
        if ($commentcount != 0) { ?>

        <li>
                    <a title="<?php echo get_the_title($postid); ?>" href="<?php echo get_permalink($postid); ?>"><?php woo_get_image('image','50','50','thumbnail',90,$postid); ?></a>  
                    <div class="content">
                        <h4><a href="<?php echo get_permalink($postid); ?>"><?php echo get_the_title($postid); ?></a></h4>
                        <p class="post_meta"><?php comments_number('No comments','1 comment','% comments'); ?>.</p>
                    </div>
                    <div style="clear:both"></div></li>
        <?php } } ?>

        </ul>

    </div><!-- / #widget -->