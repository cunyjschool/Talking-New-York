<?php
/*
Template Name: Category Page
*/

get_header(); ?>

<div id="main" class="grid_16">
<h2 class="single"><?php the_title(); ?></h2>
<?php
if (is_page() ) {
$category = get_post_meta($posts[0]->ID, 'category', true);
}
if ($category) {
$cat = get_cat_ID($category);
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$post_per_page = -1; // -1 shows all posts
$do_not_show_stickies = 1; // 0 to show stickies
$args=array(
'category__in' => array($cat),
'orderby' => 'date',
'order' => 'DESC',
'paged' => $paged,
'posts_per_page' => $post_per_page,
'caller_get_posts' => $do_not_show_stickies
);
$temp = $wp_query;  // assign orginal query to temp variable for later use
$wp_query = null;
$wp_query = new WP_Query($args);
if( have_posts() ) :
while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

<div class="entry">
  <h4 style="margin-bottom:10px;"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
  <p class="post_meta"><span>By <?php the_author_posts_link(); ?> | <?php the_time('j F Y') ?></span> | <?php comments_popup_link(__('No Comments',woothemes), __('1 Comment',woothemes), __('% Comments',woothemes)); ?></p>
  <?php the_excerpt() ?>
  </div>

<?php endwhile; ?>
<div>
<div><?php next_posts_link('« Older Entries') ?></div>
<div><?php previous_posts_link('Newer Entries »') ?></div>
</div>
<?php else : ?>

<h2>Not Found</h2>
<p>Sorry, but you are looking for something that isn't here.</p>
<?php get_search_form(); ?>

<?php endif;

$wp_query = $temp;  //reset back to original query

}  // if ($category)
?>

</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>