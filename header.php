<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes();?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes();?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes();?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes();?>> <!--<![endif]-->

<head>
	
    <!-- Base
    ================================================== -->
    <title><?php echo get_bloginfo('name'); ?> <?php wp_title(); ?></title>
    <meta http-equiv="Content-Type" content="<?php echo get_bloginfo('html_type'); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta name="description" content="<?php echo get_bloginfo('description'); ?>" />
    <meta name="robots" content="index, follow" />
	<meta name="author" content="">
    <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    
    <!-- Mobile Specific
    ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    
    <!-- Style Sheets
    ================================================== -->
    <?php
        print '<style type="text/css" media="all">';
        print '@import "'.get_template_directory_uri().'/css/base.php";';
		print '@import "'.get_template_directory_uri().'/css/skeleton.css";';
        print '@import "'.get_template_directory_uri().'/css/screen.php";';  
        print '@import "'.get_template_directory_uri().'/custom.css";';
        print '</style>';
    ?>
    
    <link href="http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic" rel="stylesheet" type="text/css" />

    <!--[if IE 7]>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie7.css" type="text/css" media="screen" />
    <![endif]-->
    
    <!-- Favicons
	================================================== -->
    <?php
		if ( function_exists( 'get_option_tree') ) {
			$apex_fav16 = get_option_tree( 'img_favicon16' );
			if($apex_fav16==""){$apex_fav16 = get_template_directory_uri().'/images/favicon.ico';}
			$apex_fav57 = get_option_tree( 'img_favicon57' );
			if($apex_fav57==""){$apex_fav57 = get_template_directory_uri().'/images/apple-touch-icon.png';}
			$apex_fav72 = get_option_tree( 'img_favicon72' );
			if($apex_fav72==""){$apex_fav72 = get_template_directory_uri().'/images/apple-touch-icon-72x72.png';}
			$apex_fav114 = get_option_tree( 'img_favicon114' );
			if($apex_fav114==""){$apex_fav114 = get_template_directory_uri().'/images/apple-touch-icon-114x114.png';}
		}
	?>
	<link rel="shortcut icon" href="<?php echo $apex_fav16 ?>">
	<link rel="apple-touch-icon" href="<?php echo $apex_fav57 ?>">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $apex_fav72 ?>">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $apex_fav114 ?>">
    
    <!--/***********************************************
    * Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
    * This notice MUST stay intact for legal use
    * Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
    ***********************************************/-->
    
    <?php wp_head(); ?>
    
    <?php
		if ( function_exists( 'get_option_tree') ) {
			$apex_logo = get_option_tree( 'img_logo' );
			if($apex_logo==""){$apex_logo = get_template_directory_uri().'/images/logo.png';}
			$apex_logotext = get_option_tree( 'text_logotagline' );
			$apex_layout_topline = get_option_tree( 'value_headertopline' );
			if($apex_layout_topline=="full"){$tl_full = "full"; $tl_wide = "wide";}else{$tl_full = ""; $tl_wide = "";}
			$apex_layout_content = get_option_tree( 'value_contentlayout' );
			if($apex_layout_content=="full"){$lc_full = "full"; $lc_wide = "wide";}else{$lc_full = ""; $lc_wide = "";}
			$apex_default_bgimage = get_option_tree( 'img_bgdefault' );
		}
		
		$pagecustoms = getOptions();
		
		if (isset($pagecustoms["background_image"])){$apex_bgimage = $pagecustoms['background_image'];}else{$apex_bgimage = "";}
		if (isset($pagecustoms["portfolio_layout"])){$apex_portfoliolayout = $pagecustoms['portfolio_layout'];}else{$apex_portfoliolayout = "";}
		if($apex_portfoliolayout==0){$foliocol = "portfolio4column"; }else{$foliocol = "portfolio2column";}
	?>
    
</head>

<body <?php body_class(); ?>> 
    <a name="top"></a>
    <!-- Site Backgrounds
    ================================================== -->
    
    <!-- Change to class="poswrapheaderline wide" and class="headerline full" for a full-width header line -->
    <div class="poswrapheaderline <?php echo $tl_wide ?>"><div class="headerline <?php echo $tl_full ?>"></div></div>  
    <?php if ($apex_bgimage=="" && $apex_default_bgimage=="") { ?><div class="tiledbackground"></div><?php } ?>
    <?php if ($apex_bgimage=="" && $apex_default_bgimage!="") { ?><img src="<?php echo $apex_default_bgimage ?>" alt="" id="background" /><?php } else 
if ($apex_bgimage!="" && $apex_default_bgimage=="") { ?><img src="<?php echo $apex_bgimage ?>" alt="" id="background" /><?php } else 
if ($apex_bgimage!="" && $apex_default_bgimage!="") { ?><img src="<?php echo $apex_bgimage ?>" alt="" id="background" /><?php } ?>
    <!-- Change to class="poswrapper wide" and class="whitebackground full" for a full-width site background -->
    <div class="poswrapper <?php echo $lc_wide ?>"><div class="whitebackground <?php echo $lc_full ?>"></div></div>
    
    <div class="container main <?php echo $foliocol ?>">
    
        <!-- Header | Logo, Menu
        ================================================== -->
    
        <div class="sixteen columns header">
        
            <div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo $apex_logo ?>" alt="" /></a></div>
            <div class="logotext"><?php echo $apex_logotext ?></div>
            <h3 class="logophone" style="display: none;">
                <a href="tel:7632740337" class="linkbg">763-274-0337</a>
            </h3>

            <div class="mainmenu">
            
            	<!-- Regular Main Menu -->
                
                <?php wp_nav_menu( array( 'menu' => 'navigation', 'container_class' => 'ddsmoothmenu', 'container_id' => 'mainmenu', 'theme_location' => 'navigation' ) ); ?>
                
                <!-- Responsive Main Menu -->
                
                <form id="responsive-menu" action="#" method="post">
                    <select>
                        <option value=""><?php _e('Navigation', 'apex'); ?></option>
                    </select>
                </form>
                
            </div>
            <div class="headerdivider"></div>
            
        </div>