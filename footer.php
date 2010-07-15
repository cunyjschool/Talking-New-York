                <div id="footer">
				
                <?php 
				if ( $GLOBALS['homepage'] ) 
                	include( TEMPLATEPATH . '/footer-home.php');
                else
                	include( TEMPLATEPATH . '/footer-normal.php');
                ?>

                </div><!-- / #footer -->
            </div><!-- / #contentWrap -->
        </div><!-- / #content -->
    </div><!-- / #wrap -->
        
    <div class="container_16 clearfix">
        <div class="grid_16 credits">
            <p><?php _e('Copyright',woothemes); ?> &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('Icons by ',woothemes); ?> <strong><a href="http://wefunction.com/2008/07/function-free-icon-set/">Wefunction</a></strong>. <?php _e('Designed by ',woothemes); ?> <a href="http://www.woothemes.com"><img src="<?php bloginfo('template_url'); ?>/images/woo-themes.png" alt="Woo Themes" title="" /></a></p>
        </div><!-- / #credits -->
    </div><!-- / #container_16 -->
    
<?php wp_footer(); ?>


<!-- Category dropdown --> 
<script type="text/javascript">
<!--
function showlayer(layer){
var myLayer = document.getElementById(layer);
if(myLayer.style.display=="none" || myLayer.style.display==""){
    myLayer.style.display="block";
} else {
    myLayer.style.display="none";
}
}            
-->
</script>
    
</body>
</html>