<?php
/* 
Template Name: Search
*/ 
?>
    
<?php get_header(); ?>

<?php
	if ( function_exists( 'get_option_tree') ) {
		$apex_searchnum = get_option_tree( 'value_searchresultsnumber' );
		$apex_blogoverviewdate = get_option_tree( 'value_blogoverviewpostdate' );
		$apex_blogoverviewpostinfo = get_option_tree('value_blogoverviewpostinfo', '', false, true );
		if(!is_array($apex_blogoverviewpostinfo)){ $apex_blogoverviewpostinfo = array(); }
	}
	
	$page_ID = idbyslug ('search');
	$allsearch = &new WP_Query("s=$s&showposts=-1");
	$searchcount = $allsearch->post_count;
	wp_reset_query();
	
	$searchresultsfor = __('Hits For', 'apex');
	
	$pagecustoms = getOptions($page_ID);
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

	<p style="float: right;"><a class="linkbg" href="#"><?php echo $searchcount." ".$searchresultsfor ?> "<?php the_search_query(); ?>"</a></p>
	
    <?php 
	$paged =
		( get_query_var('paged') && get_query_var('paged') > 1 )
		? get_query_var('paged')
		: 1;
	$args = array(
		'posts_per_page' => $apex_searchnum,
		'paged' => $paged
	);
	$args =
		( $wp_query->query && !empty( $wp_query->query ) )
		? array_merge( $wp_query->query , $args )
		: $args;
	query_posts( $args );
	?>
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
    			
		<?php
        $post_time_day = get_post_time('j', true);
        $post_time_monthyear = get_post_time('M Y', true);
        $post_time_daymonthyear = date_i18n(get_option('date_format'), strtotime($post->post_date_gmt));
        ?>
    
        <!-- Blogpost -->
        <div class="eleven columns row alpha blogpost <?php get_post_class(); ?>" id="post-<?php the_ID(); ?>">
            <?php if($apex_blogoverviewdate == "Date Box"){ ?>
            <div class="one column row alpha">
                <div class="blogdate"><div class="day"><?php echo $post_time_day ?></div><span><?php echo $post_time_monthyear ?></span></div>
            </div>
            <div class="nine columns row offset-by-one omega">
            <?php } else { ?>
            <div class="eleven columns row alpha">
            <?php } ?>
                <div class="blogtitle"><h4 style="margin-bottom:15px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4></div>
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

<!-- Space Adjuster
================================================== 

<div class="sixteen columns bottomadjust"></div> -->

<?php get_footer(); ?>