<?php
/* 
Template Name: Page Full-Width
*/ 
?>
    
<?php get_header(); ?>

<?php
	if ( function_exists( 'get_option_tree') ) {
		/* OPTIONS HERE */
	}
	
	$pagecustoms = getOptions();
	
	if (isset($pagecustoms["header_title"])){$apex_htitle = $pagecustoms['header_title'];}else{$apex_htitle = "";}
?>

<!-- Page Title
================================================== -->

<div class="sixteen columns row divide notop">
    <h3 class="titledivider"><?php echo $apex_htitle ?></h3>
    <div class="dividerline"></div>
</div>

<!-- Content Holder -->
<div class="sixteen columns row content">
	<?php if(have_posts()) : while(have_posts()) : the_post(); the_content(); endwhile; endif; ?><div class="clear"></div>
</div>

<!-- Space Adjuster
================================================== 

<div class="sixteen columns bottomadjust"></div>-->

<?php get_footer(); ?>