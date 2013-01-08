<?php
/* 
Template Name: Archive
*/ 
?>
    
<?php get_header(); ?>

<?php
	if ( function_exists( 'get_option_tree') ) {
		$apex_blogoverviewdate = get_option_tree( 'value_blogoverviewpostdate' );
		$apex_blogoverviewpostinfo = get_option_tree('value_blogoverviewpostinfo', '', false, true );
		if(!is_array($apex_blogoverviewpostinfo)){ $apex_blogoverviewpostinfo = array(); }
	}

	$apexlang_in = __('in', 'apex');
	$apexlang_by = __('by', 'apex');
	
	$page_ID = idbyslug ('archive');
	$pagecustoms = getOptions($page_ID);
	
	if (isset($pagecustoms["header_title"])){$apex_htitle = $pagecustoms['header_title'];}else{$apex_htitle = "";}
	if (isset($pagecustoms["sidebar_orientation"])){$apex_sideo = $pagecustoms['sidebar_orientation'];}else{$apex_sideo = 1;}
	if ($apex_sideo == 0){$conorient = "right"; $sideoffset = ""; $conoffset = "offset-by-one";}else{$conorient = "left"; $sideoffset = "offset-by-one"; $conoffset = "";}
	if (isset($pagecustoms["sidebar"])){$apex_sidebar = $pagecustoms["sidebar"];}else{$apex_sidebar = "Page Sidebar";}

    if(isset($wp_query->query_vars['taxonomy']) && taxonomy_exists($wp_query->query_vars['taxonomy'])) {
        $value    = get_query_var($wp_query->query_vars['taxonomy']);
        if (term_exists($wp_query->query_vars['term'])) {
            $term = get_term_by( 'slug', get_query_var( 'term'  ),$wp_query->query_vars['taxonomy'] );
            $apex_htitle = $term->name.'.';
        }
   }

   if (isset($pagecustoms["portfolio_category"])){
        $ptype = $pagecustoms['portfolio_category'];
        $pcat = "category_".$ptype;
    }
    if (isset($pagecustoms["portfolio_layout"])){$apex_foliolayout = $pagecustoms['portfolio_layout'];}else{$apex_foliolayout = 0;}
    if ($apex_foliolayout == 0){$foliocolumns = "four"; $foliocolumnsnum = 4; $folioteasers = "teasers";}else{$foliocolumns = "eight"; $foliocolumnsnum = 2; $folioteasers = "teasers_large";}
    if (isset($pagecustoms["portfolio_alpha"])){ if($pagecustoms['portfolio_alpha']!=""){$apex_folioalpha = $pagecustoms['portfolio_alpha'];}else{$apex_folioalpha = 0;}}else{
$apex_folioalpha = 0;}
?>

<!-- Page Title
================================================== -->

<div class="sixteen columns row divide notop">
    <h3 class="titledivider"><?php echo $apex_htitle ?></h3>
    <div class="dividerline"></div>
</div>


<?php
    if(!isset($wp_query->query_vars['taxonomy']) || !taxonomy_exists($wp_query->query_vars['taxonomy'])) {
?>
    <!-- Content Holder -->
    <div class="eleven columns <?php echo $conoffset ?> row content <?php echo $conorient ?>">
    	
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        
    		<?php
            $blogimageurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
            $post_time_day = get_post_time('j', true);
            $post_time_monthyear = get_post_time('M Y', true);
            $post_time_daymonthyear = date_i18n(get_option('date_format'), strtotime($post->post_date_gmt));
            $posttags = get_the_tags(); 
            
            $postcustoms = getOptions($post->ID);
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
                <div class="eleven columns row alpha blogpost <?php get_post_class(); ?>" id="post-<?php the_ID(); ?>">
                        <div class="eleven columns alpha blogimage">
                            <?php if($blogimageurl!="" && $apex_postformat!=2 && $apex_postformat!=3 && $apex_postformat!=4){ ?>
                            	<a href="<?php the_permalink(); ?>" data-text="&raquo; <?php _e('Read More', 'apex'); ?>" class="hovering"><?php echo '<img src="'.get_template_directory_uri().'/functions/thumb.php?src='.$blogimageurl.'&amp;h=360&amp;w=640&amp;zc=1" alt="" class="scale-with-grid" />'; ?></a>
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
					<?php if($apex_blogoverviewdate == "Date Box"){ ?>
                    <div class="one column row alpha">
                        <div class="blogdate"><div class="day"><?php echo $post_time_day ?></div><span><?php echo $post_time_monthyear ?></span></div>
                    </div>
                    <div class="nine columns row offset-by-one omega">
                    <?php } else { ?>
                    <div class="eleven columns row alpha">
                    <?php } ?>
                        <div class="blogtitle"><h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4></div>
                        <div class="postinfo">
						<?php if (in_array("Date",$apex_blogoverviewpostinfo)){ echo $post_time_daymonthyear ?> &nbsp; <span class="divide">|</span> &nbsp; <?php } ?>
                        <?php if (in_array("Categories",$apex_blogoverviewpostinfo)){ echo $apexlang_in ?> <?php the_category(' ',' '); ?> &nbsp; <span class="divide">|</span> &nbsp; <?php } ?>
                        <?php if (in_array("Author",$apex_blogoverviewpostinfo)){ echo $apexlang_by ?> <?php the_author(); ?> &nbsp; <span class="divide">|</span> &nbsp; <?php } ?>
                        <?php if (in_array("Comments",$apex_blogoverviewpostinfo)){ if ( comments_open() ) : ?><?php comments_popup_link(__('No Comments', 'apex'), __('One Comment', 'apex'), __( '% Comments', 'apex')); ?> &nbsp; <span class="divide">|</span> &nbsp; <?php endif; } ?>
                        </div>
                        <div class="postcontent"><?php echo excerpt(35); ?><br/><br/><a href="<?php the_permalink(); ?>" class="link">&raquo; <?php _e('Read More', 'apex'); ?></a></div>
                    </div>
                    <div class="clear"></div>
                </div> 

    	<?php endwhile; ?>
        <!-- Pagination -->
        <?php if(function_exists('pagination')){ pagination(); }else{ paginate_links(); } ?>
        <!-- Pagination End -->
    	<?php else : ?>
        <div class="eleven columns row alpha">
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
<?php
    } //end normal archive
    else{ 
    //start portfolio archive
    $args=array(
        'post_type' => $ptype,
        'posts_per_page' => 199
    );
    $temp = $wp_query; 
?>

<!-- Portfolio
================================================== -->

<div class="sixteen columns row <?php echo $folioteasers ?> portfolio">

    <?php if ($wp_query->have_posts()) : ?>
    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
    
    <?php   
        $custom = get_post_custom($post->ID);
        $foliocatlist = get_the_term_list( $post->ID, $pcat, '', ', ', '' );
        $entrycategory = get_the_term_list( $post->ID, $pcat, '', '_', '' );
        $entrycategory = strip_tags($entrycategory);
        $entrycategory = strtolower($entrycategory);
        $entrycategory = str_replace(' ', '-', $entrycategory);
        $entrycategory = str_replace('_', ' ', $entrycategory);
        $entrytitle = get_the_title();
        $blogimageurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
    ?>

    <div class="<?php echo $foliocolumns ?> columns teaser all-group <?php echo $entrycategory ?>">
       <a href="<?php the_permalink(); ?>" data-text="&raquo; <?php _e('Visit Project', 'apex'); ?>" class="hovering"><?php echo '<img src="'.get_template_directory_uri().'/functions/thumb.php?src='.$blogimageurl.'&amp;h=272&amp;w=460&amp;zc=1" alt="" class="scale-with-grid" />'; ?></a>
       <div class="pluswrap">
           <a href="<?php the_permalink(); ?>" class="bigplus"></a>
           <div class="topline"><a href="<?php the_permalink(); ?>"><?php echo $entrytitle ?></a></div>
           <div class="subline"><?php echo $foliocatlist ?></div>
       </div>
    </div>
    
    <?php endwhile; ?>
    <?php else : ?>
    <div class="eleven columns row alpha">
        <p><?php _e('Oops, we could not find what you were looking for...', 'apex'); ?></p>
    </div>
    <?php endif; ?>
    
    <?php 
    $wp_query = null; 
    $wp_query = $temp;
    wp_reset_query();
    ?>
    
	<div class="clear"></div>
</div><div class="clear"></div>

<!-- Space Adjuster
================================================== -->

<div class="sixteen columns bottomadjust"></div><div class="clear"></div>

<script type="text/javascript">                                 
    jQuery(document).ready(function() {
        jQuery('.portfolio<?php echo $foliocolumnsnum ?>column').tpportfolio({
            speed:500,
            row:<?php echo $foliocolumnsnum ?>,
            nonSelectedAlpha:<?php echo $apex_folioalpha ?>,
            portfolioContainer:'.portfolio'
        });
    });
</script>

<?php
    }
?>


<!-- Space Adjuster
================================================== 

<div class="sixteen columns bottomadjust"></div> -->

<?php get_footer(); ?>