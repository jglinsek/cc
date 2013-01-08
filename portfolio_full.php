<?php 
/* 
Template Name: Portfolio Full
*/ 
?>
    
<?php get_header(); ?>

<?php
	if ( function_exists( 'get_option_tree') ) {
		/* OPTIONS HERE */
	}
	
	$templateurl = get_template_directory_uri();
	$pagecustoms = getOptions();
	
	if (isset($pagecustoms["header_title"])){$apex_htitle = $pagecustoms['header_title'];}else{$apex_htitle = "";}
	if (isset($pagecustoms["sidebar_orientation"])){$apex_sideo = $pagecustoms['sidebar_orientation'];}else{$apex_sideo = 1;}
	if ($apex_sideo == 0){$conorient = "right"; $sideoffset = ""; $conoffset = "offset-by-one";}else{$conorient = "left"; $sideoffset = "offset-by-one"; $conoffset = "";}
	if (isset($pagecustoms["sidebar"])){$apex_sidebar = $pagecustoms["sidebar"];}else{$apex_sidebar = "Page Sidebar";}
	
	if (isset($pagecustoms["portfolio_category"])){
		$ptype = $pagecustoms['portfolio_category'];
		$pcat = "category_".$ptype;
	}
	if (isset($pagecustoms["portfolio_layout"])){$apex_foliolayout = $pagecustoms['portfolio_layout'];}else{$apex_foliolayout = 0;}
	if ($apex_foliolayout == 0){$foliocolumns = "four"; $foliocolumnsnum = 4; $folioteasers = "teasers";}else{$foliocolumns = "eight"; $foliocolumnsnum = 2; $folioteasers = "teasers_large";}
	if (isset($pagecustoms["portfolio_alpha"])){ if($pagecustoms['portfolio_alpha']!=""){$apex_folioalpha = $pagecustoms['portfolio_alpha'];}else{$apex_folioalpha = 0;}}else{
$apex_folioalpha = 0;}
?>

<!-- Content Block
================================================== -->

<div class="sixteen columns">
	<?php if(have_posts()) : while(have_posts()) : the_post(); the_content(); if( get_the_content() != ""){ ?><div class="sixteen columns alpha bottomadjust"></div><?php } endwhile; endif; ?><div class="clear"></div>
</div>

<!-- Page Title
================================================== -->

<div class="sixteen columns row divide notop">
    <h3 class="titledivider"><?php echo $apex_htitle ?></h3>
    <div class="dividerline"></div>
</div>

<?php 
$args=array(
	'post_type' => $ptype,
	'posts_per_page' => 199
);
$temp = $wp_query; 
$wp_query = null;
$wp_query = new WP_Query();
$wp_query->query($args);
$terms = get_terms($pcat);
?>

<!-- Portfolio Filters
================================================== -->

<div class="sixteen columns row portfolio_filter">
    <ul>
		<?php
        echo '<li><a class="portfolio_selector" data-group="all-group" href="#">'.__('All Projects', 'apex').'</a><span>|</span></li>';
        foreach ( $terms as $term ) {
            $filter_last_item = end($terms);
            if($term!=$filter_last_item){
                echo '<li><a class="portfolio_selector" data-group="'.strtolower(str_replace(" ", "-", $term->name)).'" href="#">'.$term->name.'</a><span>|</span></li>';
            }else{
                echo '<li><a class="portfolio_selector" data-group="'.strtolower(str_replace(" ", "-", $term->name)).'" href="#">'.$term->name.'</a></li>';
            }
        }
        ?>
    </ul>
</div><div class="clear"></div>

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
		if($blogimageurl==""){
			$blogimageurl = $templateurl.'/images/demo/460x272.jpg';
		}
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

<?php get_footer(); ?>