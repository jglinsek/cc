<?php
/* 
Template Name: Page With Sidebar
*/ 
?>
    
<?php get_header(); ?>

<?php
	if ( function_exists( 'get_option_tree') ) {
		/* OPTIONS HERE */
	}
	
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
	<?php if(have_posts()) : while(have_posts()) : the_post(); the_content(); endwhile; endif; ?><div class="clear"></div>
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

<div class="sixteen columns bottomadjust"></div>-->

<?php get_footer(); ?>