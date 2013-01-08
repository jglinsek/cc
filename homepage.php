<?php
/* 
Template Name: Home
*/ 
?>
    
<?php get_header(); ?>

<?php
	if ( function_exists( 'get_option_tree') ) {
		$home_sliderlayout = get_option_tree( 'value_homesliderlayout' );
		$home_slidertext = get_option_tree( 'text_homeslider' );
		$home_portfoliolayout = get_option_tree( 'value_homeportfoliolayout' );
		$home_portfoliocount = get_option_tree( 'value_homeportfoliocount' );
		$home_portfoliotitle = get_option_tree( 'text_homeportfoliotitle' );
		$home_portfoliotitletagtext = get_option_tree( 'text_homeportfoliolinktext' );
		$home_portfoliotitletagurl = get_option_tree( 'text_homeportfoliolinkurl' );
		$home_newstextlayout = get_option_tree( 'value_newstextlayout' );
		$home_newscount = get_option_tree( 'value_homenewscount' );
		$home_newstitle = get_option_tree( 'text_homenewstitle' );
		$home_newstitletagtext = get_option_tree( 'text_homenewslinktext' );
		$home_newstitletagurl = get_option_tree( 'text_homenewslinkurl' );
		$home_texttitle = get_option_tree( 'text_homeabouttitle' );
		$home_abouttitletagtext = get_option_tree( 'text_homepageaboutlinktext' );
		$home_abouttitletagurl = get_option_tree( 'text_homepageaboutlinkurl' );
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

<!-- Slider
================================================== -->

<div class="sixteen columns row">
<?php 
	if ( function_exists( 'get_option_tree' ) ) {
		$slides = get_option_tree( 'slider_home', '', false, true, -1 );
		if ($home_sliderlayout=="With Text"){
			echo '<div class="twelve columns alpha"><div class="flexslider clearfix"><ul class="slides">';
			foreach( $slides as $slide ) {
				if($slide['image']==""){
					$slide['image'] = $templateurl.'/images/demo/700x350.jpg';
				}
				if($slide['description']!=null){
					if($slide['link']==""){
						echo '<li><img src="'.$slide['image'].'" alt="'.$slide['title'].'"/><p class="flex-caption">'.$slide['description'].'</p></li>';
					}else{
						echo '<li><a href="'.$slide['link'].'"><img src="'.$slide['image'].'" alt="'.$slide['title'].'"/></a><p class="flex-caption">'.$slide['description'].'</p></li>';
					}
				}else{
					if($slide['link']==""){
						echo '<li><img src="'.$slide['image'].'" alt="'.$slide['title'].'"/></li>';
					}else{
						echo '<li><a href="'.$slide['link'].'"><img src="'.$slide['image'].'" alt="'.$slide['title'].'"/></a></li>';
					}
				}
			}
			echo '</ul></div></div>';
			echo '<div class="four columns omega slidertext">'.$home_slidertext.'</div>';
		}else if ($home_sliderlayout=="Full"){
			echo '<div class="flexslider clearfix"><ul class="slides">';
			foreach( $slides as $slide ) {
				if($slide['image']==""){
					$slide['image'] = $templateurl.'/images/demo/940x350.jpg';
				}
				if($slide['description']!=null){
					if($slide['link']==""){
						echo '<li><img src="'.$slide['image'].'" alt="'.$slide['title'].'"/><p class="flex-caption">'.$slide['description'].'</p></li>';
					}else{
						echo '<li><a href="'.$slide['link'].'"><img src="'.$slide['image'].'" alt="'.$slide['title'].'"/></a><p class="flex-caption">'.$slide['description'].'</p></li>';
					}
				}else{
					if($slide['link']==""){
						echo '<li><img src="'.$slide['image'].'" alt="'.$slide['title'].'"/></li>';
					}else{
						echo '<li><a href="'.$slide['link'].'"><img src="'.$slide['image'].'" alt="'.$slide['title'].'"/></a></li>';
					}
				}
			}
            echo '</ul></div><div class="sliderspacefix"></div>';
		}
	}
?>
</div>

<?php if ($home_portfoliolayout!="Off") { ?>

    <!-- Portfolio
    ================================================== -->
    
    <div class="sixteen columns row divide">
        <h3 class="titledivider"><?php echo $home_portfoliotitle ?></h3>
        <?php if($home_portfoliotitletagtext!=""){ echo '<div class="rightlink"><a href="'.$home_portfoliotitletagurl.'" class="titlelink">'.$home_portfoliotitletagtext.'</a></div>'; } ?>
        <div class="dividerline"></div>
    </div>
        
    <?php 
    $args=array(
        'post_type' => $ptype,
        'posts_per_page' => $home_portfoliocount
    );
    $temp = $wp_query; 
    $wp_query = null;
    $wp_query = new WP_Query();
    $wp_query->query($args);
    $terms = get_terms($pcat);
    ?>
    
    <!-- Portfolio Filters
    ================================================== -->
    
    <?php if ($home_portfoliolayout=="No Categories") { 
    	echo '<div class="sixteen columns row portfolio_filter" style="display: none;">';
    } else if ($home_portfoliolayout=="Categories") {
    	echo '<div class="sixteen columns row portfolio_filter">';
    } ?>
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
	
    <!-- Portfolio Teasers
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
     
<?php } ?> 
        
<?php if ($home_newstextlayout=="News And Text") { ?>
        
<!-- News
================================================== -->

<div class="eight columns row">
    <div class="eight columns divide alpha">
        <h3 class="titledivider"><?php echo $home_newstitle ?></h3>
        <?php if($home_newstitletagtext!=""){ echo '<div class="rightlink"><a href="'.$home_newstitletagurl.'" class="titlelink">'.$home_newstitletagtext.'</a></div>'; } ?>
        <div class="dividerlinehalf"></div>
    </div>
    <div class="eight columns alpha">
    	
        <?php
    	$newsargs = array( 'numberposts' => $home_newscount, 'orderby' => 'post_date', 'post_type' => 'post' );
		$newslist = get_posts( $newsargs );
		
		foreach ($newslist as $newspost) :  setup_postdata($newspost);
		
			$newscategory = get_the_category($newspost->ID);
			$newsfirst_category = $newscategory[0]->cat_name;
			$newsrepl = strtolower((preg_replace('/\s+/', '-', $newsfirst_category)));
			$newsbase = home_url();
			$newsimageurl = wp_get_attachment_url( get_post_thumbnail_id($newspost->ID) ); 
			$newsexcerpt = excerpt(15);
			/*$newsexcerpt = $newspost->post_excerpt;*/
		
			echo '<div class="eight columns alpha newsteaser row">';
			if ($newsimageurl != "") {
				 echo '<a href="'.$newsbase.'/'.$newsrepl.'/'.$newspost->post_name.'" class="borderhover"><img src="'.get_template_directory_uri().'/functions/thumb.php?src='.$newsimageurl.'&amp;h=75&amp;w=75&amp;zc=1" alt=""/></a>';
			}
			if ($newsimageurl != "") {
				echo '<div class="topline"><a href="'.$newsbase.'/'.$newsrepl.'/'.$newspost->post_name.'">'.$newspost->post_title.'</a></div><div class="subline">'.date_i18n(get_option('date_format'), strtotime($newspost->post_date_gmt)).'</div>';
				echo '<div class="newsexcerpt">'.$newsexcerpt.'</div></div>';
			}else{
				echo '<div class="topline" style="margin-left:0;"><a href="'.$newsbase.'/'.$newsrepl.'/'.$newspost->post_name.'">'.$newspost->post_title.'</a></div><div class="subline" style="margin-left:0;">'.date_i18n(get_option('date_format'), strtotime($newspost->post_date_gmt)).'</div>';
				echo '<div class="newsexcerpt" style="margin-left:0;">'.$newsexcerpt.'</div></div>';
			}

        endforeach;
		?>
        
    </div>
</div>

<!-- Info Text 
================================================== -->

<div class="eight columns row">
    <div class="eight columns divide alpha">
        <h3 class="titledivider"><?php echo $home_texttitle ?></h3>
        <?php if($home_abouttitletagtext!=""){ echo '<div class="rightlink"><a href="'.$home_abouttitletagurl.'" class="titlelink">'.$home_abouttitletagtext.'</a></div>'; } ?>
        <div class="dividerlinehalf"></div>
    </div>
    <div class="eight columns alpha">
		<?php if(have_posts()) : while(have_posts()) : the_post(); the_content(); endwhile; endif; ?><div class="clear"></div>
    </div>
</div>
        
<?php } else if ($home_newstextlayout=="Text And Sidebar") { ?> 

<!-- Text Content With Sidebar
================================================== -->

<div class="sixteen columns row divide">
    <h3 class="titledivider"><?php echo $home_texttitle ?></h3>
    <?php if($home_abouttitletagtext!=""){ echo '<div class="rightlink"><a href="'.$home_abouttitletagurl.'" class="titlelink">'.$home_abouttitletagtext.'</a></div>'; } ?>
    <div class="dividerline"></div>
</div>

<!-- Content Holder
================================================== -->

<div class="eleven columns <?php echo $conoffset ?> row <?php echo $conorient ?> content" style="padding-top:0;">
	<?php if(have_posts()) : while(have_posts()) : the_post(); the_content(); endwhile; endif; ?><div class="clear"></div>         
</div>

<!-- Sidebar
================================================== -->

<div class="four columns sidebar <?php echo $sideoffset ?> content" style="padding-top:0;">

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

<?php } else if ($home_newstextlayout=="Full Text") { ?> 
    
<!-- Full Text Content
================================================== -->

<div class="sixteen columns row divide">
    <h3 class="titledivider"><?php echo $home_texttitle ?></h3>
    <?php if($home_abouttitletagtext!=""){ echo '<div class="rightlink"><a href="'.$home_abouttitletagurl.'" class="titlelink">'.$home_abouttitletagtext.'</a></div>'; } ?>
    <div class="dividerline"></div>
</div>

<!-- Content Holder
================================================== -->

<div class="sixteen columns row">
	<?php if(have_posts()) : while(have_posts()) : the_post(); the_content(); endwhile; endif; ?><div class="clear"></div>
</div>

<?php } else {?>

<!-- Space Adjuster
================================================== -->

<div class="sixteen columns bottomadjust"></div><div class="clear"></div>

<?php } ?>

<?php get_footer(); ?>