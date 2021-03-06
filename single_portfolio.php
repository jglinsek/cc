<?php
/**
 * @package WordPress
 * @subpackage Apex_Theme
 */
?>
    
<?php get_header(); ?>

<?php
	if ( function_exists( 'get_option_tree') ) {
		$apex_foliosingledate = get_option_tree( 'value_portfoliosingledate' );
		$apex_foliosinglepostinfo = get_option_tree('value_portfoliopostinfo', '', false, true );
		if(!is_array($apex_foliosinglepostinfo)){ $apex_foliosinglepostinfo = array(); }
	}

	$apexlang_in = __('in', 'apex');
	$apexlang_by = __('by', 'apex');
	
	$templateurl = get_template_directory_uri();
	$commentsvar = false;
	$pagecustoms = getOptions();
	
	if (isset($pagecustoms["header_title"])){$apex_htitle = $pagecustoms['header_title'];}else{$apex_htitle = "";}
	if (isset($pagecustoms["sidebar_orientation"])){$apex_sideo = $pagecustoms['sidebar_orientation'];}else{$apex_sideo = 1;}
	if ($apex_sideo == 0){$conorient = "right"; $sideoffset = ""; $conoffset = "offset-by-one";}else{$conorient = "left"; $sideoffset = "offset-by-one"; $conoffset = "";}
	if (isset($pagecustoms["sidebar"])){$apex_sidebar = $pagecustoms["sidebar"];}else{$apex_sidebar = "Page Sidebar";}
?>

<!-- Page Title
================================================== -->

<div class="sixteen columns row divide notop">
    <h3 class="titledivider"><?php echo $apex_htitle ?></h3>
    <div class="dividerline"></div>
</div>

<!-- Content Holder -->
<div class="eleven columns <?php echo $conoffset ?> row content <?php echo $conorient ?>">
	
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    
		<?php
        $blogimageurl = wp_get_attachment_url( get_post_thumbnail_id() );
        $post_time_day = get_post_time('j', true);
        $post_time_monthyear = get_post_time('M Y', true);
		global $post;
        $post_time_daymonthyear = date_i18n(get_option('date_format'), strtotime($post->post_date_gmt));
        $posttags = get_the_tags(); 
		$entrycategory = get_the_term_list( '', $pcat, '', ', ', '' );
        
        $postcustoms = getOptions();
        if (isset($postcustoms["postformat_type"])){$apex_postformat = $postcustoms['postformat_type'];}else{$apex_postformat = 0;}
        if (isset($postcustoms["postformat_slider"])){
            $slider_imagearr = $postcustoms['postformat_slider'];
            $slider_imagelist = explode("\n", str_replace("\r", "", $slider_imagearr));
        }else{
            $slider_imagelist = 0;
        }
        if (isset($postcustoms["postformat_video"])){$apex_postvideo = $postcustoms['postformat_video'];}else{$apex_postvideo = "";}
        ?>

            <!-- Blogpost -->
            <div class="eleven columns row alpha blogpost noborderbottom <?php get_post_class(); ?>" id="post-<?php the_ID(); ?>">
            	<?php if($apex_postformat!=0){ ?>
                    <div class="eleven columns alpha blogimage">
                        <?php if($apex_postformat==1){ ?>
                        	<?php echo '<img src="'.get_template_directory_uri().'/functions/thumb.php?src='.$blogimageurl.'&amp;h=360&amp;w=640&amp;zc=1" alt="" class="scale-with-grid" />'; ?>
                        <?php } else if($apex_postformat==2){ ?>
                            <div class="flexslider clearfix">
                                <ul class="slides">
                                    <?php foreach($slider_imagelist as $slider_image):
                                        echo '<li><img src="'.$slider_image.'" alt="" /></li>';
                                    endforeach; ?>
                                </ul>
                            </div>
                        <?php } else if($apex_postformat==3){ ?>
                            <div class="scalevid">
                                <iframe src="http://www.youtube.com/embed/<?php echo $apex_postvideo ?>?hd=1&amp;wmode=opaque&amp;controls=1&amp;showinfo=0" width="640" height="360"></iframe>
                            </div>
                        <?php } else if($apex_postformat==4){ ?>
                            <div class="scalevid">
                                <iframe src="http://player.vimeo.com/video/<?php echo $apex_postvideo ?>?title=0&amp;byline=0&amp;portrait=0" width="640" height="360"></iframe>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php if($apex_foliosingledate == "Date Box"){ ?>
                <div class="one column row alpha">
                    <div class="blogdate"><div class="day"><?php echo $post_time_day ?></div><span><?php echo $post_time_monthyear ?></span></div>
                </div>
                <div class="nine columns row offset-by-one omega">
                <?php } else { ?>
                <div class="eleven columns row alpha">
                <?php } ?>
                    <div class="blogtitle"><h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4></div>
                    <div class="postinfo">
                    <?php if (in_array("Date",$apex_foliosinglepostinfo)){ echo $post_time_daymonthyear ?> &nbsp; <span class="divide">|</span> &nbsp; <?php } ?>
					<?php if (in_array("Categories",$apex_foliosinglepostinfo)){ echo $apexlang_in ?> <?php echo $entrycategory ?> &nbsp; <span class="divide">|</span> &nbsp; <?php } ?>
					<?php if (in_array("Author",$apex_foliosinglepostinfo)){ echo $apexlang_by ?> <?php the_author(); ?> &nbsp; <span class="divide">|</span> &nbsp; <?php } ?>
					<?php if (in_array("Comments",$apex_foliosinglepostinfo)){ if ( comments_open() ) : ?><?php comments_popup_link(__('No Comments', 'apex'), __('One Comment', 'apex'), __( '% Comments', 'apex')); ?> &nbsp; <span class="divide">|</span> &nbsp; <?php endif; } ?>
                    </div>
                    <div class="postcontent"><?php the_content(); ?></div>
                </div>
                <div class="clear"></div>
            </div> 
            
            <!-- Post Comments -->
            <?php comments_template('', true); ?>
        	<?php if($commentsvar) comment_form(); ?>
            <!-- Post Comments End -->

	<?php endwhile; ?>
    <!-- Pagination -->
    <?php if(function_exists('pagination')){ pagination(); }else{ paginate_links(); } ?>
    <!-- Pagination End -->
	<?php else : ?>
    <div class="eleven columns alpha">
        <p><?php _e('Oops, we could not find what you were looking for...', 'apex'); ?></p>
    </div>
    <?php endif; ?>
 
</div>

<!-- Sidebar
================================================== -->

<div class="four columns sidebar <?php echo $sideoffset ?> content">

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($apex_sidebar) ) : ?>
    
        <div class="widget">
            <h5>Sidebar Widget Area</h5>
            <div>
            Please configure this Widget Area in the Admin Panel under Appearance -> Widgets
            </div>
            <div class="clear"></div>
        </div>
    
    <?php endif; ?>

<div class="clear"></div>
</div>

<?php get_footer(); ?>