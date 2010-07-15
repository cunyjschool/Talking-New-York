<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title>
<?php if ( is_home() ) { ?><?php bloginfo('name'); ?><?php } ?>
<?php if ( is_search() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php _e('Search Results',woothemes); ?><?php } ?>
<?php if ( is_author() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php _e('Author Archives',woothemes); ?><?php } ?>
<?php if ( is_single() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_page() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php wp_title(''); ?><?php } ?>
<?php if ( is_category() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php _e('Archive',woothemes); ?>&nbsp;|&nbsp;<?php single_cat_title(); ?><?php } ?>
<?php if ( is_month() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php _e('Archive',woothemes); ?>&nbsp;|&nbsp;<?php the_time('F'); ?><?php } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php _e('Tag Archive',woothemes); ?>&nbsp;|&nbsp;<?php  single_tag_title("", true); } } ?>
</title>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/960.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" media="all" />

<!--[if IE 6]>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/pngfix.js"></script>
<![endif]--> 

<!--[if lte IE 7]>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/ie.css" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/js/menu.js"></script>
<![endif]-->

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />

<?php if ( is_single() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
    
</head>

<body <?php if ( is_front_page() || is_home() ) { ?> id="home"<?php } ?> class="custom">
	<div id="wrap">
    
        <div id="nav_wrapper">
            <ul id="nav">
                <li<?php if(is_home()) echo ' class="current_page_item"'; ?>><a href="<?php bloginfo('url'); ?>">Home</a></li>
                
                <?php if ( get_option('woo_blog_navigation') == 'true' && get_option('woo_blog_subnavigation') =='false' ) { ?>
                <li <?php if ( is_category() || is_single() || is_tag() || is_archive() ) { ?> class="current_page_item" <?php } ?>><a href="<?php echo get_option('home'); echo get_option('woo_blog_permalink'); ?>" title="<?php _e('Blog',woothemes); ?>"><span class="left"></span><?php _e('Blog',woothemes); ?><span class="right"></span></a></li><?php } ?>
                
                <?php if ( get_option('woo_blog_subnavigation') == 'true' && get_option('woo_blog_navigation' ) =='true' ) { ?><?php wp_list_categories('child_of=' . get_option( 'woo_blog_cat' ) . '&hide_empty=&title_li=<a href="' . get_option('home') . get_option('woo_blog_permalink') .'" title="'. __('Blog',woothemes) .'"><span class="left"></span>'. __('Blog',woothemes) .'<span class="right"></span></a>'); ?><?php } ?>
            
                <?php wp_list_pages('sort_column=menu_order&depth=3&title_li=&exclude='.get_option('woo_nav_exclude')); ?>
            </ul>
        </div><!-- / #nav_wrapper -->
                
		<div id="header">
            <div class="container_16">
                <div class="grid_8 alpha">
                
                    <h1 id="logo"><a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?>"><img src="<?php if ( get_option('woo_logo') <> "" ) {  echo get_option('woo_logo'); } else { ?><?php bloginfo('template_directory'); ?>/<?php woo_style_path(); ?>/logo.png<?php } ?>" alt="" /></a></h1>
            
                </div><!-- / #grid_8 -->
                <div class="grid_8 omega">
                
               <!-- Top Banner Ad or Dropdown Starts -->
                <?php 
             $ad_yes =     get_option('woo_ad_header');
             $ad_code =      get_option('woo_ad_header_code');
             $ad_image =     get_option('woo_ad_header_image');
             $ad_url =      get_option('woo_ad_header_url');
             
             if($ad_yes == 'true'){
             ?>
            <div class="header_banner_ad">
            <?php 
            if($ad_code != ''){ echo stripcslashes($ad_code); }
            else { 
            ?>
            <a href="<?php echo $ad_url;  ?>" title="<?php _e('Advert',woothemes); ?>"><img class="title" src="<?php echo $ad_image; ?>" alt="" /></a>
            <?php
             } 
             ?>
            </div>
            <?php }
            
            else {
              ?>
              <!--
              <div id="button"> 
                        <img src="<?php bloginfo('template_directory'); ?>/<?php woo_style_path(); ?>/button.png" width="184" height="32" alt="" class="menu_class" />
                        <ul class="the_menu">
                            <?php wp_list_categories('sort_column=menu_order&depth=3&title_li=&exclude='.get_option('woo_nav_exclude')); ?>
                        </ul>                        
              </div>         
            -->
            <div id="searchbar"><form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
            	<fieldset>
            		<p><input type="text" value="<?php the_search_query(); ?>" name="s" id="s" /><input type="submit" id="searchsubmit" value="Search" /></p>
            	</fieldset>
            </form>
            </div>
 
            
            <?php } ?>
            
             <!-- Top Banner Ad or Dropdown Ends -->                  
    
                </div><!-- / #grid_8 -->
            </div><!-- / #container_16 -->
		</div><!-- / #header -->

        <div id="content">
			<div id="contentWrap" class="container_16">