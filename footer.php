</div><!-- container -->

	<!-- Footer
	================================================== -->
    
    <?php
		if ( function_exists( 'get_option_tree') ) {
			$apex_widgets_footer = get_option_tree( 'value_footerwidgetsactive' );
			if($apex_widgets_footer=="Yes"){$f_widgets = "";}else{$f_widgets = "footerhide";}
			$apex_layout_footer = get_option_tree( 'value_footerlayout' );
			if($apex_layout_footer=="full"){$f_full = "full";}else{$f_full = "";}
			$apex_layout_subfooter = get_option_tree( 'value_subfooterlayout' );
			if($apex_layout_subfooter=="full"){$sf_full = "full";}else{$sf_full = "";}
			$apex_footerleft_text = get_option_tree( 'text_footerleft');
			$apex_footerright_text = get_option_tree( 'text_footerright');
			$apex_link_facebook = get_option_tree( 'value_sociallinkfacebook');
			$apex_link_twitter = get_option_tree( 'value_sociallinktwitter');
			$apex_link_googleplus = get_option_tree( 'value_sociallinkgoogleplus');
			$apex_link_vimeo = get_option_tree( 'value_sociallinkvimeo');
			$apex_link_youtube = get_option_tree( 'value_sociallinkyoutube');
			$apex_link_flickr = get_option_tree( 'value_sociallinkflickr');
			$apex_link_linkedin = get_option_tree( 'value_sociallinklinkedin');
			$apex_link_rss = get_option_tree( 'value_sociallinkrss');
		} 
	?>

    <div id="back-to-top">
        <a href="#top" class="linkbg">&and; Back to Top</a>
    </div>

    <div class="container main">
        <div class="sixteen columns row">
            <?php if(function_exists('selfserv_shareaholic')) { selfserv_shareaholic(); } ?>
        </div>
    </div>

    <!-- Change to class="container footerwrap full" for a full-width footer -->
	<div class="container footerwrap <?php echo $f_full ?> <?php echo $f_widgets ?>">
        <div class="footer <?php echo $f_widgets ?>">
        	<div class="sixteen columns">
            
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Widget Slot 1") ) : ?>
                
                    <div class="four columns widget alpha">
                        <h5>Footer Widget Slot 1</h5>
                        <div>
                        Please configure this Widget in the Admin Panel under Appearance -> Widgets -> Footer Widget Slot 1
                        </div>
                        <div class="clear"></div>
                    </div>
                
                <?php endif; ?>
                
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Widget Slot 2") ) : ?>
                
                    <div class="four columns widget">
                        <h5>Footer Widget Slot 2</h5>
                        <div>
                        Please configure this Widget in the Admin Panel under Appearance -> Widgets -> Footer Widget Slot 2
                        </div>
                        <div class="clear"></div>
                    </div>
                
                <?php endif; ?>
                
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Widget Slot 3") ) : ?>
                
                    <div class="four columns widget">
                        <h5>Footer Widget Slot 3</h5>
                        <div>
                        Please configure this Widget in the Admin Panel under Appearance -> Widgets -> Footer Widget Slot 3
                        </div>
                        <div class="clear"></div>
                    </div>
                
                <?php endif; ?>
                
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Widget Slot 4") ) : ?>
                
                    <div class="four columns widget omega">
                        <h5>Footer Widget Slot 4</h5>
                        <div>
                        Please configure this Widget in the Admin Panel under Appearance -> Widgets -> Footer Widget Slot 4
                        </div>
                        <div class="clear"></div>
                    </div>
                
                <?php endif; ?>

                <div class="clear"></div>
                
            </div>
        </div>
	</div><!-- container -->
    
    <!-- Sub-Footer
	================================================== -->
    
    <!-- Change to class="container subfooterwrap full" for a full-width subfooter -->
    <div class="container subfooterwrap <?php echo $sf_full ?>">
    	<div class="subfooter">
        	<div class="eight columns"><?php echo $apex_footerleft_text ?></div>
            <div class="eight columns socialholder">
                <div class="table">
                    <ul class="socialicons">
                        <?php $apex_socialarray = get_option_tree('value_footersocials', '', false, true ); ?>
                        <?php if(!is_array($apex_socialarray)){ $apex_socialarray = array(); } ?>
                        <?php if (in_array("Facebook",$apex_socialarray)){ ?>
                            <li><a href="<?php echo $apex_link_facebook ?>" class="social_facebook" target="_blank"></a></li>
                        <?php } ?>
                        <?php if (in_array("Twitter",$apex_socialarray)){ ?>
                            <li><a href="<?php echo $apex_link_twitter ?>" class="social_twitter" target="_blank"></a></li>
                        <?php } ?>
                        <?php if (in_array("GooglePlus",$apex_socialarray)){ ?>
                            <li><a href="<?php echo $apex_link_googleplus ?>" class="social_googleplus" target="_blank"></a></li>
                        <?php } ?>
                        <?php if (in_array("Vimeo",$apex_socialarray)){ ?>
                            <li><a href="<?php echo $apex_link_vimeo ?>" class="social_vimeo" target="_blank"></a></li>
                        <?php } ?>
                        <?php if (in_array("Youtube",$apex_socialarray)){ ?>
                            <li><a href="<?php echo $apex_link_youtube ?>" class="social_youtube" target="_blank"></a></li>
                        <?php } ?>
                        <?php if (in_array("Linkedin",$apex_socialarray)){ ?>
                            <li><a href="<?php echo $apex_link_linkedin ?>" class="social_linkedin" target="_blank"></a></li>
                        <?php } ?>
                        <?php if (in_array("Flickr",$apex_socialarray)){ ?>
                            <li><a href="<?php echo $apex_link_flickr ?>" class="social_flickr" target="_blank"></a></li>
                        <?php } ?>
                        <?php if (in_array("Rss",$apex_socialarray)){ ?>
                            <li><a href="<?php echo $apex_link_rss ?>" class="social_rss" target="_blank"></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="socialtext"><?php echo $apex_footerright_text ?></div>
            </div>
        </div>
    </div>

<!-- End Document
================================================== -->

<?php wp_footer(); ?>
</body>
</html>