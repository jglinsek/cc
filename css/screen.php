<?php
header("Content-Type: text/css; charset=utf-8");

$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' );

$templateurl = get_template_directory_uri();

if ( function_exists( 'get_option_tree') ) {

	/* GENERAL */
	if(get_option_tree( 'img_bgtile' )!=""){
		$bgurl = get_option_tree( 'img_bgtile' );
	}else{
		$bgurl = $templateurl.'/images/tiles/background_tile1.gif';
	}
	
	/* COLORS */
	$highlightcolor = get_option_tree( 'color_highlight' );

	/* LAYOUT */
	$headertoppadding = get_option_tree( 'value_header_padding_top' );
	$headerbottompadding = get_option_tree( 'value_header_padding_bottom' );

	/* FONTS */
	$headlinefontfamily = get_option_tree( 'font_headlinefamily' );
	$widgetheadlinefontsize = get_option_tree( 'font_widgetfontsize', '', false, true, 0 ).get_option_tree( 'font_widgetfontsize', '', false, true, 1 );
	$pagetitlefontsize = get_option_tree( 'font_pagetitlesize', '', false, true, 0 ).get_option_tree( 'font_pagetitlesize', '', false, true, 1 );
	$fontsizemenu = get_option_tree( 'font_menusize', '', false, true, 0 ).get_option_tree( 'font_menusize', '', false, true, 1 );
	$fontsizesubmenu = get_option_tree( 'font_submenusize', '', false, true, 0 ).get_option_tree( 'font_submenusize', '', false, true, 1 );
}
?>

/*
* Apex V1.0
* Copyright 2012, Damojo
* www.damojothemes.com
*/


/* #Site Styles
================================================== */

/* Main Container */

	.main { padding-bottom: 0px; }
	.fullBg { position: fixed; top: 0; left: 0; overflow: hidden; }
	#background { position: fixed; top: 0; left: 0; overflow: hidden; display: none; }

/* Background */	
	
	.poswrapper { width: 0px; margin-left: auto; margin-right: auto; height: 100%; overflow: visible; }
	.poswrapper.wide { width: 100%; margin-left: 0; margin-right: 0; height: 100%; overflow: visible; }
	.whitebackground { position: fixed; z-index: 0; width: 1080px; height: 100%; margin-left: -540px; background: #f7f7f7; }
	.whitebackground.full { position: fixed;  z-index: 0; width: 100%; height: 100%; left: 0; margin-left: 0px; background: #f7f7f7; }
	.tiledbackground { position: fixed; z-index: 0; width: 100%; height: 100%; left: 0; top: 0; background: url('<?php echo $bgurl ?>') repeat left top; }
	
/* Header */

	.poswrapheaderline { z-index: 2; width: 0px; margin-left: auto; margin-right: auto; height: 100%; overflow: visible; position: relative; }
	.poswrapheaderline.wide { z-index: 2; width: 100%; margin-left: 0; margin-right: 0; height: 100%; overflow: visible; position: relative; }
	.headerline { position: absolute; z-index: 2; width: 1080px; height: 10px; margin-left: -540px; top: 0; background: #422142; border-bottom: 3px solid #422142; }
	.headerline.full { position: absolute; z-index: 2; width: 100%; height: 10px; left: 0; margin-left: 0; top: 0; background: #422142; border-bottom: 3px solid #422142; }
	.header { padding-top: <?php echo $headertoppadding ?>px; padding-bottom: <?php echo $headerbottompadding ?>px; }
	.logo { float: left; margin-right: 20px; }
	.logotext { float: left; font-family:"PT Sans", "Helvetica Neue", Arial, sans-serif; font-size: 11px; color: #777; margin-top: 7px; }
	.mainmenu { float: right; font-family:"PT Sans", "Helvetica Neue", Arial, sans-serif; font-size: 12px; color: #999; margin-top: 45px; margin-bottom: -12px; }
	.headerdivider { float: left; width: 100%; height: 1px; /*border-top: 1px solid #ddd; border-bottom: 1px solid #ddd;*/ }

/* Dividers */

	.divide { height: 30px; margin-bottom: 16px; margin-top: 22px; }
	.divide.notop { margin-top: -8px; }
	.dividerline { position: absolute; z-index: 0; width: 940px; height: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; margin-top: 23px; }
	.dividerlinehalf { position: absolute; z-index: 0; width: 460px; height: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; margin-top: 23px; }
	.dividerlinecolumn { position: absolute; z-index: 0; width: 640px; height: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; margin-top: 23px; }
	.titledivider { position: absolute; background-color: #f7f7f7; z-index: 1; padding-right: 20px; }
    .divide h3 { font-size: <?php echo $pagetitlefontsize ?>; }
	.bottomadjust { padding-bottom:30px; }
	.divide .rightlink{  position: relative; float: right; background-color: #f7f7f7; padding-left: 10px; margin-top: 12px; z-index: 1; }
	
/* Slider */

	.slidertext { float: right; height: 350px; }
	.sliderspacefix { float: left; margin-bottom: 12px; }
	.slidertext h6, .slidertext h5, .slidertext h4, .slidertext h3, .slidertext h2, .slidertext h1 { margin-top: -7px; } 
	/*
	 * jQuery FlexSlider v1.8
	 * http://flex.madebymufffin.com
	 *
	 * Copyright 2011, Tyler Smith
	 * Free to use under the MIT license.
	 * http://www.opensource.org/licenses/mit-license.php
	 */
	 
	/* Browser Resets */
	.flex-container a:active,
	.flexslider a:active {outline: none;}
	.slides,
	.flex-control-nav,
	.flex-direction-nav {margin: 0; padding: 0; list-style: none;} 
	/* FlexSlider Necessary Styles
	*********************************/ 
	.flexslider {width: 100%; margin: 0; padding: 0; }
	.flexslider .slides > li {display: none;} /* Hide the slides before the JS is loaded. Avoids image jumping */
	.flexslider .slides img {max-width: 100%; display: block; margin-bottom: -24px; }
	.flex-pauseplay span {text-transform: capitalize;}
	/* Clearfix for the .slides element */
	.slides:after {content: "."; display: block; clear: both; visibility: hidden; line-height: 0; height: 0;} 
	html[xmlns] .slides {display: block;} 
	* html .slides {height: 1%;}
	/* No JavaScript Fallback */
	/* If you are not using another script, such as Modernizr, make sure you
	 * include js that eliminates this class on page load */
	.no-js .slides > li:first-child {display: block;}
	/* FlexSlider Default Theme
	*********************************/
	.flexslider {background: transparent; border: 0; position: relative; zoom: 1; }
	.flexslider .slides {zoom: 1;}
	.flexslider .slides > li {position: relative;}
	/* Suggested container for "Slide" animation setups. Can replace this with your own, if you wish */
	.flex-container {zoom: 1; position: relative;}
	/* Caption style */
	/* IE rgba() hack */
	.flex-caption {background:none; zoom: 1;}
	.flex-caption {width: auto; max-width: 70%; padding: 3px; padding-left: 15px; padding-right: 15px; position: absolute; left: 0px; bottom: 0px; background: #222; color: #fff; /*text-shadow: 0 -1px 0 rgba(0,0,0,.9);*/ font-size: 13px; font-weight: bold; font-style: italic; line-height: 20px; margin-bottom: -24px;}
	.flex-caption a{ font-size: 13px;  font-style: normal; text-decoration:underline; line-height: 20px; color: #fff;}
	/* Direction Nav */
	ul.flex-direction-nav { position: absolute; bottom: 0px; margin-bottom: -12px; right: 0; }
	.flex-direction-nav li a {width: 25px; height: 25px; display: block; cursor: pointer; position: absolute; text-indent: -9999px;}
	.flex-direction-nav li .next {right: 0; bottom: 0px; background: #222 url('../images/tiles/arrow_right.png') no-repeat 10px 7px; }
	.flex-direction-nav li .prev {right: 26px; bottom: 0px; background: #222 url('../images/tiles/arrow_left.png') no-repeat 9px 7px; }
	.flex-direction-nav li .disabled {opacity: .3; filter:alpha(opacity=30); cursor: default;}
	/*.flex-direction-nav li a.next:hover { background-color: <?php echo $highlightcolor ?>; }
	.flex-direction-nav li a.prev:hover { background-color: <?php echo $highlightcolor ?>; }*/
	/* Control Nav */
	.flex-control-nav {width: 100%; position: absolute; bottom: -30px; text-align: center;}
	.flex-control-nav li {margin: 0 0 0 5px; display: inline-block; zoom: 1; *display: inline;}
	.flex-control-nav li:first-child {margin: 0;}
	.flex-control-nav li a {width: 13px; height: 13px; display: block; background: url(theme/bg_control_nav.png) no-repeat 0 0; cursor: pointer; text-indent: -9999px;}
	.flex-control-nav li a:hover {background-position: 0 -13px;}
	.flex-control-nav li a.active {background-position: 0 -26px; cursor: default;}

/* Teasers / Portfolio */

	h3.info { margin-bottom: 5px; margin-top: -5px; }
	.lightlabel { float: left; color: #ccc; width: 50px; }
	.infofield { float: left; }
	.portfolio .teaser { padding-bottom: 20px; }
	.portfolio .nopadding { padding-bottom: 0px; }
	.portfolio_selector { font-weight: bold; }
	.portfolio_filter ul { float: left; margin: 0; padding: 0; }
	.portfolio_filter ul li { margin: 0; padding: 0; float: left; list-style-type: none; display: inline-block; }
	.portfolio_filter span { padding-left: 10px; padding-right: 10px; color: #ccc; cursor: default; }
	.teasers img, .teasers_large img { float: left; }
	.teasers .topline, .teasers .subline { float: left; width: 163px; }
	.teasers_large .topline, .teasers_large .subline { float: left; width: 403px; }
	.bigplus { float: left; width: 25px; height: 25px; background: #d5d5d5 url('../images/tiles/button_plus.png') no-repeat 7px 7px; margin-right: 10px; }
	.bigdoc { float: left; width: 25px; height: 25px; background: #d5d5d5 url('../images/tiles/button_doc.png') no-repeat 7px 7px; margin-right: 10px; }
	.bigcomment { float: left; width: 25px; height: 25px; background: #d5d5d5 url('../images/tiles/button_bubble.png') no-repeat 7px 7px; margin-right: 10px; }
	.pluswrap .bigplus, .pluswrap .bigdoc, .pluswrap .bigcomment { float: right; margin-left: 10px; margin-right: 0px; }
	.pluswrap { float: left; padding-top: 10px; padding-bottom: 8px; padding-left: 10px; padding-right: 10px; border: 1px solid #ddd; border-top: 0; margin-top: 0px; background: #eee; text-align: left; }
	.pluswrap.half { width: 438px; }
	a .overlay { background-color:<?php echo $highlightcolor ?>; }
	a .overlaytext{ color: #fff; background-color:<?php echo $highlightcolor ?>; padding: 2px 10px; font-size: 11px; font-weight: normal; text-decoration: none; line-height: 21px; }
	.newsteaser img { float: left; border: 5px solid #ddd; }
	.newsteaser .topline { margin-top: 4px;	}			
	.newsteaser .topline, .newsteaser .subline { float: left; width: 365px;	margin-left: 10px; }		
	.newsexcerpt { float: left;	margin-top: 13px; width: 365px; margin-left: 10px; }
	
/* Boxed Content */

	.boxed { padding: 10px;  border: 1px dotted #ccc; background: #f5f5f5; }
	
/* From Blog */

	.fromblog img { float: left; }
	.topline { float: left; font-size: 12px; font-weight: bold; color: #333; line-height: 12px; width: 100%; margin-top: -1px; }
	.subline { float: left; font-size: 11px; line-height: 11px; margin-top: 5px; color: #777; width: 100%; }
	.subline a { color: #777; }
	
/* Sidebar */

	.sidebar .widget { float: left; margin-bottom: 60px; width: 100%; font-size: 85%; line-height: 1.5; }
	.sidebar .widget h5 { width: 100%; color: #666; font-size: <?php echo $widgetheadlinefontsize ?>; line-height: <?php echo $widgetheadlinefontsize ?>; padding-left: 20px; background: url('../images/tiles/headlinefront_sidebar.png') no-repeat left 2px; margin-bottom: 23px; }
	.sidebar .widget ul li { margin-bottom: 2px; }
	.sidebar .widget ul { margin-bottom: 0; }
	
/* Footer */

	.footerwrap { width: 1080px; left: 50%; margin-left: -540px; background: #222; border-top: 3px solid #422142; padding: 0; padding-top: 50px; padding-bottom: 50px; margin-bottom: 0; }
	.footerwrap.full { width: 100%; left: 0; background: #222; border-top: 3px solid #422142; margin: 0; padding: 0; padding-top: 50px; padding-bottom: 50px; margin-bottom: 0; }
	.subfooterwrap { width: 1080px; left: 50%; margin-left: -540px; background: #422142; padding: 0; padding-top: 15px; padding-bottom: 15px; margin-bottom: 0; }
	.subfooterwrap.full { width: 100%; left: 0; background: #422142; margin: 0; padding: 0; padding-top: 15px; padding-bottom: 15px; margin-bottom: 0; }
	.footer { width: 960px; margin: 0 auto; color: #999; }
    .footerhide { display: none; }
	.subfooter { width: 960px; margin: 0 auto; color: #999; font-size: 11px; line-height: 30px; }
	.subfooter .socialtext { float: right; color: #999; margin-right: 20px; }
	.subfooter .socialicons { float: right; margin: 0; padding: 0; }
	.subfooter .socialicons li { float: left; display: inline; margin: 0; padding: 0; margin-right: 1px; }
	.subfooter .socialicons li:last-child { margin-right: 0; }
    .socialholder { width:100%; text-align:center; }
	.social_facebook { float: left; width: 30px; height: 30px; background: #222 url('../images/social/social_facebook.png') no-repeat 5px 5px; }
	.social_twitter { float: left; width: 30px; height: 30px; background: #222 url('../images/social/social_twitter.png') no-repeat 5px 5px; }
	.social_rss { float: left; width: 30px; height: 30px; background: #222 url('../images/social/social_rss.png') no-repeat 3px 3px; }
	.social_vimeo { float: left; width: 30px; height: 30px; background: #222 url('../images/social/social_vimeo.png') no-repeat 3px 3px; }
    .social_youtube { float: left; width: 30px; height: 30px; background: #222 url('../images/social/social_youtube.png') no-repeat 3px 3px; }
    .social_linkedin { float: left; width: 30px; height: 30px; background: #222 url('../images/social/social_linkedin.png') no-repeat 3px 3px; }
    .social_flickr { float: left; width: 30px; height: 30px; background: #222 url('../images/social/social_flickr.png') no-repeat 3px 3px; }
	.social_googleplus { float: left; width: 30px; height: 30px; background: #222 url('../images/social/social_googleplus.png') no-repeat 4px 3px; }
	.footer	.subline { float: left; font-size: 11px; line-height: 11px; margin-top: 5px; color: #555; }
	.footer .widget h5 { color: #fff; font-size: <?php echo $widgetheadlinefontsize ?>; line-height: <?php echo $widgetheadlinefontsize ?>; padding-left: 20px; background: url('../images/tiles/headlinefront_footer.png') no-repeat left 2px; margin-bottom: 23px; }
	.footer strong { color: #ccc; }
	.footer .widget ul li { margin-bottom: 2px; }
	.footer a, .footer a:visited { color: #ccc }
	
/* Widgets */	
	
	.widget_tweets ul { float: left; margin-bottom: 0px; }
	.widget_tweets ul li { float: left; vertical-align:top; list-style: none; margin-top: 20px; }
	.widget_tweets ul li:first-child { margin-top: 0px; }
	.widget_tweets .quot { float: left; font-size: 25px; font-weight: bold; margin-right: 5px; color: #333; margin-top: 4px; margin-bottom: -4px; }
	.sidebar .widget_tweets .quot { color: #ddd; }
	
	.footer .widget_blogposts img { float: left; border: 5px solid #222; margin-right: 10px; }
	.sidebar .widget_blogposts img { float: left; border: 5px solid #ddd; margin-right: 10px; }
	.widget_blogposts .postlink { float: left; width: 160px; }
	.widget_blogposts .subline { width: 160px; }
	.widget_blogposts ul { float: left; list-style: none; }
	.widget_blogposts ul li { float: left; margin-top: 8px; }
	.widget_blogposts ul li:first-child { margin-top: 0px; }
	.footer .widget_blogposts ul{ margin-bottom: -2px; }

	.sidebar .widget_portfolio ul { margin-bottom: -8px; }
	.footer .widget_portfolio img { float: left; border: 5px solid #222; width: 50px; height: 50px; }
	.sidebar .widget_portfolio img { float: left; border: 5px solid #ddd; width: 50px; height: 50px; }
	.widget_portfolio ul { float: left; list-style: none; }
	.widget_portfolio ul li { float: left; padding-bottom: 8px; padding-right: 10px; }
	.widget_portfolio ul li.last { padding-right: 0; }
	.footer .widget_portfolio ul { margin-bottom: -10px; }
    
	#search .searchform input { margin-bottom: 0;}

/* Mainmenu */	
	
	.ddsmoothmenu{ position: relative; float: right; font-family: "PT Sans", "Helvetica Neue", Arial, sans-serif;  font-size: <?php echo $fontsizemenu ?>; line-height: <?php echo $fontsizemenu ?>; margin: 0; z-index: 99; }
	.ddsmoothmenu ul{ z-index: 100; margin: 0; padding: 0; list-style-type: none; }
	.ddsmoothmenu ul ul{ padding-top: 0px; padding-bottom: 0px; border: 1px solid #ccc; margin-left: 13px; box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.10); -moz-box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.10); -webkit-box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.10); }
	/*Top level list items*/
	.ddsmoothmenu ul li{ position: relative; display: inline; float: left; line-height: 12px; background: transparent; }
	.ddsmoothmenu ul li ul li{ padding: 0; margin: 0; }
	.ddsmoothmenu ul ul ul{ border-bottom: 0; }
	/*Top level menu link items style*/
	.ddsmoothmenu ul li a{ display: block; padding-top: 0px; padding-bottom: 28px; color: #999; text-decoration: none; }
	* html .ddsmoothmenu ul li a{ /*IE6 hack to get sub menu links to behave correctly*/ display: inline-block; }
	.ddsmoothmenu ul li a:link, .ddsmoothmenu ul li a:visited{ color: #999; padding-left: 35px; padding-right: 0px; font-weight: bold; }
	.ddsmoothmenu ul li a:hover{ color: #422142; }
	.ddsmoothmenu ul li a.selected{ /*CSS class that's dynamically added to the currently active menu items' LI A element*/ color: #422142; }
	.ddsmoothmenu ul li ul li a:link, .ddsmoothmenu ul li ul li a:visited{ background: #fff; color: #777; border: 0; padding-left: 20px;  font-weight: normal; font-size: <?php echo $fontsizesubmenu ?>; }
	.ddsmoothmenu ul li ul li a:hover{ /*color: #422142; background: #eee;*/ }
	/*1st sub level menu*/
	.ddsmoothmenu ul li ul{ position: absolute; left: 0; display: none; /*collapse all sub menus to begin with*/ visibility: hidden; }
	/*Sub level menu list items (undo style from Top level List Items)*/
	.ddsmoothmenu ul li ul li{ display: list-item; float: none; padding-bottom: 0px; margin-left: 0px;border-bottom: 1px solid #ddd; }
    .ddsmoothmenu ul li:last-child { border-bottom: 0; }
	/*All subsequent sub menu levels vertical offset after 1st level sub menu */
	.ddsmoothmenu ul li ul li ul{ top: 0; margin-left: 0px; margin-top: -10px; }
	/* Sub level menu links style */
	.ddsmoothmenu ul li ul li a{ width: 170px; /*width of sub menus*/ padding: 15px; margin: 0; border-top-width: 0; margin-right: -2px; }
	.ddsmoothmenu li li ul,
	.ddsmoothmenu li li li ul { margin: 0 0 0 0; }
	/* Holly Hack for IE \*/
	* html .ddsmoothmenu{height: 1%;} /*Holly Hack for IE7 and below*/
	/* CSS classes applied to down and right arrow images */
	.downarrowclass{ position: absolute; top: 2px; right: 0px; }
	.rightarrowclass{ position: absolute; top: 11px; right: 10px; visibility: hidden;}

/* Blog */

	.blogpost { float: left; padding-bottom: 8px; margin-bottom: 30px; border-bottom: 1px solid #e5e5e5; }
    .blogpost.noborderbottom { padding-bottom: 0; margin-bottom: 0; border-bottom: 0; }
	.blogimage { float: left; margin-bottom: 14px; }
	.blogimage .flexslider { margin-bottom: 18px;}
	.blogimage .scalevid { margin-bottom: 6px;}
	.blogdate { float: left; color: #fff; background: #422142; font-size: 48px; line-height: 48px; font-weight: bold; padding: 10px; padding-top: 4px; padding-bottom: 0px; width: 53px; box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.3); -moz-box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.3); -webkit-box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.3); }
	.blogdate .day { text-align: center; }
	.blogdate span { float: left; font-size: 12px; line-height: 12px; font-weight: bold; color: #C3C3CF; margin-top: -3px; padding-bottom: 8px; white-space: nowrap; }
	.blogtitle { float: left; width: 100%; }
	.blogtitle h4 { margin-top: -7px; margin-bottom: -3px; }
	.postinfo { float: left; font-size: 11px; line-height: 20px; margin-bottom: 16px; color: #777; width: 100%; }
    .postinfo .divide { font-size:12px; color:#999; }
	.postinfo a { color: #777; }
	.dateinfo { display: none; }
	.postcontent { float: left; width: 100%; }
	.postnav { float: left; width: 100%; border-top: 1px solid #ddd; padding-top: 28px; margin-top: -7px; margin-bottom: 30px; }

/* Comments */

	.timestamp { float: left; font-size: 11px; line-height: 11px; margin-top: 5px; color: #777; }
	#comments { width: 100%; float: left; margin-bottom: 32px; margin-top: 2px; padding-top: 30px; border-top: 1px solid #e5e5e5; }
	#comments ol, #comments ul { position: relative; list-style: none; margin:0; padding:0; zoom: 1.0; }
	#comments .bypostauthor .commentwrap {}
	#comments .bypostauthor .commentwrap .posterpic{}
	#comments .commentwrap { float: left; width: 100%; background: #f9f9f9; margin-bottom: 20px; margin-left: 0; border: 1px solid #e7e7e7; box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.07); -moz-box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.07); -webkit-box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.07); padding: 30px; padding-left: 0; }
	#comments .commentwrap .posterpic{ float: left; width: 40px; height: 40px; border: 5px solid #ddd; margin-right: 10px; margin-left: 30px; }
	#comments .commentwrap .author { font-size: 15px; color: #333; font-family: <?php echo $headlinefontfamily ?>;}
	#comments .commentwrap .postertext{ font-size: 12px; display: inline-block; margin-left: 30px; margin-top: 12px; }
	#comments .depth-1 { padding-left: 0px; }
	#comments .depth-2 { padding-left: 20px; }
	#comments .depth-3 { padding-left: 40px; }
	#comments .depth-4 { padding-left: 60px; }
	#comments .depth-5 { padding-left: 80px; }
    #comments .depth-1 .commentwrap { width: 608px; }
	#comments .depth-2 .commentwrap { width: 588px; }
	#comments .depth-3 .commentwrap { width: 568px; }
	#comments .depth-4 .commentwrap { width: 548px; }
	#comments .depth-5 .commentwrap { width: 528px; }
	#comments .replylink{ float: left; margin-left: 30px; }

/* Comments Reply */
	
    #respond { float: left; padding-top: 30px; border-top: 1px solid #e5e5e5; }
	#respond textarea { width: 618px; max-width: 618px; float: left; }	
	#respond input { float: left; width: 184px; margin-right: 10px; }
	#respond input.last { margin-right: 0px; width: 186px; }
	
/* Pagination */
	
	.blogpages { float:left; }
	.blogpages ul{ float: left; }
	.blogpages li { display: inline; float: left; padding-right: 5px; }
	.blogpages li a{ background: #222; border: 0; padding: 2px 10px; color: #fff; display: inline-block; font-size: 11px; font-weight: normal; text-decoration: none; cursor: pointer; line-height: 21px; font-family: Helvetica, Arial, sans-serif; }
	.blogpages li .selected{ color: #fff; background: <?php echo $highlightcolor ?>; cursor: default; }
	
/* Contact */

	#googlemap { width: 100%; height: 250px; float: left; }
	#contactform input { float: left; width: 293px; margin-right: 10px; }
	#contactform input.last { margin-right: 0px; }		
	#contactform textarea { float: left; width: 618px; max-width: 618px; height: 200px; }
	.errormessage, .sendingmessage, .successmessage { float: left; color: #777; font-size: 12px; line-height: 30px; text-decoration: none; display: none; width: 100%; }
	.errormessage { color: <?php echo $highlightcolor ?>; }
	input[type="text"].formerror, textarea.formerror { border: 1px solid <?php echo $highlightcolor ?>; }
	
/* Content Shortcodes */
	
	.contentdivider { width: 100%; height: 0; border-bottom: 1px solid #ddd; margin-bottom: 20px; }
	.one_half { width: 48%; }
	.one_third { width: 30.66%; }
	.two_third { width: 65.33%; }
	.one_fourth { width: 22%; }
	.one_fifth { width: 16.8%; }
	.one_sixth { width: 13.33%; }
	.one_half, .one_third, .two_third, .one_fourth, .one_fifth, .one_sixth { margin-right: 4%; margin-bottom: 10px; float: left; }
	.lastcolumn { margin-right: 0!important; clear: right; }


/* #Page Styles
================================================== */

	.content { padding-top: 20px; }
	.content.right { float: right; }

/* #Media Queries
================================================== */



	/* Smaller than standard 960 (devices and browsers) */
	@media only screen and (max-width: 959px) {
		
	}

	/* Tablet Portrait size to standard 960 (devices and browsers) */
	@media only screen and (min-width: 768px) and (max-width: 959px) {
		.dividerline { width: 748px; }
		.dividerlinehalf { width: 364px; }
		.footer, .subfooter { width: 768px; }
		.teasers .topline, .teasers .subline { width: 115px; }
		.teasers_large .topline, .teasers_large .subline { width: 307px; }
		.widget_blogposts .postlink { width: 110px; }
		.widget_blogposts .subline { width: 110px; }
		.widget input[type="text"], .widget input[type="password"], .widget input[type="email"], .widget textarea, .widget select {width: 150px;}
		.whitebackground, .headerline, .footerwrap, .subfooterwrap { width: 888px; margin-left: -444px;}
		.pluswrap.half { width: 342px; }
		.slidertext { height: auto; }
		.ddsmoothmenu ul li a:link, .ddsmoothmenu ul li a:visited{ padding-left: 20px; }
		.ddsmoothmenu ul ul{ margin-left: -2px; }
		#respond input { width: 140px; max-width: 140px; }
		#respond input.last { width: 142px; max-width: 142px; } 
		#respond textarea { width: 486px; max-width: 486px; }
		#contactform input { width: 227px; }	
		#contactform textarea { width: 486px; max-width: 486px; }	
		.newsteaser .topline, .newsteaser .subline, .newsexcerpt { width: 269px; }
        .blogdate { margin-right: 0; }
        #comments .depth-1 .commentwrap { width: 476px; }
        #comments .depth-2 .commentwrap { width: 456px; }
        #comments .depth-3 .commentwrap { width: 436px; }
        #comments .depth-4 .commentwrap { width: 416px; }
        #comments .depth-5 .commentwrap { width: 396px; }
	}

	/* All Mobile Sizes (devices and browser) */
	@media only screen and (max-width: 767px) {
		.mainmenu { float: left; width: 100%; }
		.slidertext h6, .slidertext h5, .slidertext h4, .slidertext h3, .slidertext h2, .slidertext h1 { margin-top: 20px; } 
		.slidertext { margin-bottom: 20px; margin-top: 10px; height: auto; }
		.teaser { margin-bottom: 20px; text-align: left; }
		.teaser img{ width: 420px; }
		.portfolio_filter { margin-bottom: 20px; text-align: center; }
		.portfolio .teaser { padding-bottom: 0px; }
		.pluswrap {width: 398px; }
		.pluswrap.half { width: 398px; }
		.teasers .topline, .teasers .subline {width: 363px; }
		.teasers_large .topline, .teasers_large .subline { width: 363px; }
		.footer .widget { margin-bottom: 52px; }
		.widget_blogposts .postlink { width: 360px; margin-top: 6px; }
		.widget_blogposts .subline { width: 360px; }
		.footer .widget_blogposts li { background: #131313; }
		.sidebar .widget_blogposts li { background: #eee; }
		.widget input[type="text"], .widget input[type="password"], .widget input[type="email"], .widget textarea, .widget select {width: 398px;}
		.subfooter { text-align: center; }
		.subfooter .socialtext { width: 420px; text-align: center; margin-right: 0; }
		.one_half, .one_third, .two_third, .one_fourth, .one_fifth, .one_sixth { width: 100%; }
        .subfooter .socialicons { float: none; margin-left:auto; margin-right:auto; }
		.blogdate { display: none; }
		.dateinfo { display: inline; }
		.blogpost { padding-bottom: 18px; margin-bottom: 20px; }
		#respond input { width: 398px; max-width: 398px; margin-right: 0; } 
		#respond input.last { width: 398px; max-width: 398px; margin-right: 0; } 
		#respond textarea { width: 398px; max-width: 398px; }
		#contactform input { width: 398px; max-width: 398px; margin-right: 0; }	
		#contactform textarea { width: 398px; max-width: 398px; }	
		.sidebar { margin-top: 10px; padding-top: 38px; border-top: 1px solid #ddd; }
		.postnav { padding-bottom: 18px; }
		.newsteaser { margin-bottom: 20px; }
		.newsteaser .topline, .newsteaser .subline, .newsexcerpt { width: 325px; }
		.divide .rightlink { display: none; }
        #comments .depth-1 .commentwrap { width: 388px; }
        #comments .depth-2 .commentwrap { width: 368px; }
        #comments .depth-3 .commentwrap { width: 348px; }
        #comments .depth-4 .commentwrap { width: 328px; }
        #comments .depth-5 .commentwrap { width: 308px; }
        h3.info { margin-bottom: 5px; margin-top: 20px; }
        .postnav { margin-bottom: 12px; }
        #optionswrap { display: none; }
	}

	/* Mobile Landscape Size to Tablet Portrait (devices and browsers) */
	@media only screen and (min-width: 480px) and (max-width: 767px) {
		.dividerline, .dividerlinehalf { width: 420px; }
		.footer, .subfooter { width: 420px; }
		.whitebackground, .headerline, .footerwrap, .subfooterwrap { width: 560px; margin-left: -280px;}
	}

	/* Mobile Portrait Size to Mobile Landscape Size (devices and browsers) */
	@media only screen and (max-width: 479px) {
		.dividerline, .dividerlinehalf { width: 300px; }
		.footer, .subfooter { width: 300px; }
		.teasers img, .teasers_large img { width: 300px; }
		.pluswrap {width: 278px; }
		.pluswrap.half { width: 278px; }
		.pluswrap .topline, .pluswrap .subline {width: 243px; }
		.widget_blogposts .postlink { width: 240px; margin-top: 6px; }
		.widget_blogposts .subline { width: 240px; }
		.widget_blogposts li { background: #131313; }
		.widget input[type="text"], .widget input[type="password"], .widget input[type="email"], .widget textarea, .widget select {width: 278px;}
		.subfooter { text-align: center; }
		.subfooter .socialtext { width: 320px; text-align: center; margin-right: 0; }
		#respond textarea { width: 278px; max-width: 278px; }
		#respond input { width: 278px; max-width: 278px; margin-right: 0; }	
		#respond input.last { width: 278px; max-width: 278px; margin-right: 0; } 
		#contactform input { width: 278px; max-width: 278px; margin-right: 0; }	
		#contactform textarea { width: 278px; max-width: 278px; }	
		.newsteaser { margin-bottom: 20px; }
		.newsteaser .topline, .newsteaser .subline, .newsexcerpt { width: 205px; }
        #comments .depth-1 .commentwrap { width: 268px; }
        #comments .depth-2 .commentwrap { width: 248px; }
        #comments .depth-3 .commentwrap { width: 228px; }
        #comments .depth-4 .commentwrap { width: 208px; }
        #comments .depth-5 .commentwrap { width: 188px; }
	}


/* Responsive Menu
================================================== */
	
	#mainmenu { visibility: visible; } 
	#responsive-menu{ display: none; float: left; }

	@media only screen and (max-width: 767px) {
		#mainmenu { visibility: hidden; height: 0;} 
		#responsive-menu { display: inline-block; width: 100%; margin-top: 13px; }			  
	}



/* ------------------------------------------------------------------------
	Class: prettyPhoto
	Use: Lightbox clone for jQuery
	Author: Stephane Caron (http://www.no-margin-for-errors.com)
	Version: 3.1.3
------------------------------------------------------------------------- */
    
div.pp_default .pp_top,div.pp_default .pp_top .pp_middle,div.pp_default .pp_top .pp_left,div.pp_default .pp_top .pp_right,div.pp_default .pp_bottom,div.pp_default .pp_bottom .pp_left,div.pp_default .pp_bottom .pp_middle,div.pp_default .pp_bottom .pp_right{height:13px}
div.pp_default .pp_top .pp_left{background:url(../images/prettyPhoto/default/sprite.png) -78px -93px no-repeat}
div.pp_default .pp_top .pp_middle{background:url(../images/prettyPhoto/default/sprite_x.png) top left repeat-x}
div.pp_default .pp_top .pp_right{background:url(../images/prettyPhoto/default/sprite.png) -112px -93px no-repeat}
div.pp_default .pp_content .ppt{color:#f8f8f8}
div.pp_default .pp_content_container .pp_left{background:url(../images/prettyPhoto/default/sprite_y.png) -7px 0 repeat-y;padding-left:13px}
div.pp_default .pp_content_container .pp_right{background:url(../images/prettyPhoto/default/sprite_y.png) top right repeat-y;padding-right:13px}
div.pp_default .pp_next:hover{background:url(../images/prettyPhoto/default/sprite_next.png) center right no-repeat;cursor:pointer}
div.pp_default .pp_previous:hover{background:url(../images/prettyPhoto/default/sprite_prev.png) center left no-repeat;cursor:pointer}
div.pp_default .pp_expand{background:url(../images/prettyPhoto/default/sprite.png) 0 -29px no-repeat;cursor:pointer;height:28px;width:28px}
div.pp_default .pp_expand:hover{background:url(../images/prettyPhoto/default/sprite.png) 0 -56px no-repeat;cursor:pointer}
div.pp_default .pp_contract{background:url(../images/prettyPhoto/default/sprite.png) 0 -84px no-repeat;cursor:pointer;height:28px;width:28px}
div.pp_default .pp_contract:hover{background:url(../images/prettyPhoto/default/sprite.png) 0 -113px no-repeat;cursor:pointer}
div.pp_default .pp_close{background:url(../images/prettyPhoto/default/sprite.png) 2px 1px no-repeat;cursor:pointer;height:30px;width:30px}
div.pp_default .pp_gallery ul li a{background:url(../images/prettyPhoto/default/default_thumb.png) center center #f8f8f8;border:1px solid #aaa}
div.pp_default .pp_social{margin-top:7px}
div.pp_default .pp_gallery a.pp_arrow_previous,div.pp_default .pp_gallery a.pp_arrow_next{left:auto;position:static}
div.pp_default .pp_nav .pp_play,div.pp_default .pp_nav .pp_pause{background:url(../images/prettyPhoto/default/sprite.png) -51px 1px no-repeat;height:30px;width:30px}
div.pp_default .pp_nav .pp_pause{background-position:-51px -29px}
div.pp_default a.pp_arrow_previous,div.pp_default a.pp_arrow_next{background:url(../images/prettyPhoto/default/sprite.png) -31px -3px no-repeat;height:20px;margin:4px 0 0;width:20px}
div.pp_default a.pp_arrow_next{background-position:-82px -3px;left:52px}
div.pp_default .pp_content_container .pp_details{margin-top:5px}
div.pp_default .pp_nav{clear:none;height:30px;position:relative;width:110px}
div.pp_default .pp_nav .currentTextHolder{color:#999;font-family:Georgia;font-size:11px;font-style:italic;left:75px;line-height:25px;margin:0;padding:0 0 0 10px;position:absolute;top:2px}
div.pp_default .pp_close:hover,div.pp_default .pp_nav .pp_play:hover,div.pp_default .pp_nav .pp_pause:hover,div.pp_default .pp_arrow_next:hover,div.pp_default .pp_arrow_previous:hover{opacity:0.7}
div.pp_default .pp_description{font-size:11px;font-weight:700;line-height:14px;margin:5px 50px 5px 0}
div.pp_default .pp_bottom .pp_left{background:url(../images/prettyPhoto/default/sprite.png) -78px -127px no-repeat}
div.pp_default .pp_bottom .pp_middle{background:url(../images/prettyPhoto/default/sprite_x.png) bottom left repeat-x}
div.pp_default .pp_bottom .pp_right{background:url(../images/prettyPhoto/default/sprite.png) -112px -127px no-repeat}
div.pp_default .pp_loaderIcon{background:url(../images/prettyPhoto/default/loader.gif) center center no-repeat}
div.light_rounded .pp_top .pp_left{background:url(../images/prettyPhoto/light_rounded/sprite.png) -88px -53px no-repeat}
div.light_rounded .pp_top .pp_right{background:url(../images/prettyPhoto/light_rounded/sprite.png) -110px -53px no-repeat}
div.light_rounded .pp_next:hover{background:url(../images/prettyPhoto/light_rounded/btnNext.png) center right no-repeat;cursor:pointer}
div.light_rounded .pp_previous:hover{background:url(../images/prettyPhoto/light_rounded/btnPrevious.png) center left no-repeat;cursor:pointer}
div.light_rounded .pp_expand{background:url(../images/prettyPhoto/light_rounded/sprite.png) -31px -26px no-repeat;cursor:pointer}
div.light_rounded .pp_expand:hover{background:url(../images/prettyPhoto/light_rounded/sprite.png) -31px -47px no-repeat;cursor:pointer}
div.light_rounded .pp_contract{background:url(../images/prettyPhoto/light_rounded/sprite.png) 0 -26px no-repeat;cursor:pointer}
div.light_rounded .pp_contract:hover{background:url(../images/prettyPhoto/light_rounded/sprite.png) 0 -47px no-repeat;cursor:pointer}
div.light_rounded .pp_close{background:url(../images/prettyPhoto/light_rounded/sprite.png) -1px -1px no-repeat;cursor:pointer;height:22px;width:75px}
div.light_rounded .pp_nav .pp_play{background:url(../images/prettyPhoto/light_rounded/sprite.png) -1px -100px no-repeat;height:15px;width:14px}
div.light_rounded .pp_nav .pp_pause{background:url(../images/prettyPhoto/light_rounded/sprite.png) -24px -100px no-repeat;height:15px;width:14px}
div.light_rounded .pp_arrow_previous{background:url(../images/prettyPhoto/light_rounded/sprite.png) 0 -71px no-repeat}
div.light_rounded .pp_arrow_next{background:url(../images/prettyPhoto/light_rounded/sprite.png) -22px -71px no-repeat}
div.light_rounded .pp_bottom .pp_left{background:url(../images/prettyPhoto/light_rounded/sprite.png) -88px -80px no-repeat}
div.light_rounded .pp_bottom .pp_right{background:url(../images/prettyPhoto/light_rounded/sprite.png) -110px -80px no-repeat}
div.dark_rounded .pp_top .pp_left{background:url(../images/prettyPhoto/dark_rounded/sprite.png) -88px -53px no-repeat}
div.dark_rounded .pp_top .pp_right{background:url(../images/prettyPhoto/dark_rounded/sprite.png) -110px -53px no-repeat}
div.dark_rounded .pp_content_container .pp_left{background:url(../images/prettyPhoto/dark_rounded/contentPattern.png) top left repeat-y}
div.dark_rounded .pp_content_container .pp_right{background:url(../images/prettyPhoto/dark_rounded/contentPattern.png) top right repeat-y}
div.dark_rounded .pp_next:hover{background:url(../images/prettyPhoto/dark_rounded/btnNext.png) center right no-repeat;cursor:pointer}
div.dark_rounded .pp_previous:hover{background:url(../images/prettyPhoto/dark_rounded/btnPrevious.png) center left no-repeat;cursor:pointer}
div.dark_rounded .pp_expand{background:url(../images/prettyPhoto/dark_rounded/sprite.png) -31px -26px no-repeat;cursor:pointer}
div.dark_rounded .pp_expand:hover{background:url(../images/prettyPhoto/dark_rounded/sprite.png) -31px -47px no-repeat;cursor:pointer}
div.dark_rounded .pp_contract{background:url(../images/prettyPhoto/dark_rounded/sprite.png) 0 -26px no-repeat;cursor:pointer}
div.dark_rounded .pp_contract:hover{background:url(../images/prettyPhoto/dark_rounded/sprite.png) 0 -47px no-repeat;cursor:pointer}
div.dark_rounded .pp_close{background:url(../images/prettyPhoto/dark_rounded/sprite.png) -1px -1px no-repeat;cursor:pointer;height:22px;width:75px}
div.dark_rounded .pp_description{color:#fff;margin-right:85px}
div.dark_rounded .pp_nav .pp_play{background:url(../images/prettyPhoto/dark_rounded/sprite.png) -1px -100px no-repeat;height:15px;width:14px}
div.dark_rounded .pp_nav .pp_pause{background:url(../images/prettyPhoto/dark_rounded/sprite.png) -24px -100px no-repeat;height:15px;width:14px}
div.dark_rounded .pp_arrow_previous{background:url(../images/prettyPhoto/dark_rounded/sprite.png) 0 -71px no-repeat}
div.dark_rounded .pp_arrow_next{background:url(../images/prettyPhoto/dark_rounded/sprite.png) -22px -71px no-repeat}
div.dark_rounded .pp_bottom .pp_left{background:url(../images/prettyPhoto/dark_rounded/sprite.png) -88px -80px no-repeat}
div.dark_rounded .pp_bottom .pp_right{background:url(../images/prettyPhoto/dark_rounded/sprite.png) -110px -80px no-repeat}
div.dark_rounded .pp_loaderIcon{background:url(../images/prettyPhoto/dark_rounded/loader.gif) center center no-repeat}
div.dark_square .pp_left,div.dark_square .pp_middle,div.dark_square .pp_right,div.dark_square .pp_content{background:#000}
div.dark_square .pp_description{color:#fff;margin:0 85px 0 0}
div.dark_square .pp_loaderIcon{background:url(../images/prettyPhoto/dark_square/loader.gif) center center no-repeat}
div.dark_square .pp_expand{background:url(../images/prettyPhoto/dark_square/sprite.png) -31px -26px no-repeat;cursor:pointer}
div.dark_square .pp_expand:hover{background:url(../images/prettyPhoto/dark_square/sprite.png) -31px -47px no-repeat;cursor:pointer}
div.dark_square .pp_contract{background:url(../images/prettyPhoto/dark_square/sprite.png) 0 -26px no-repeat;cursor:pointer}
div.dark_square .pp_contract:hover{background:url(../images/prettyPhoto/dark_square/sprite.png) 0 -47px no-repeat;cursor:pointer}
div.dark_square .pp_close{background:url(../images/prettyPhoto/dark_square/sprite.png) -1px -1px no-repeat;cursor:pointer;height:22px;width:75px}
div.dark_square .pp_nav{clear:none}
div.dark_square .pp_nav .pp_play{background:url(../images/prettyPhoto/dark_square/sprite.png) -1px -100px no-repeat;height:15px;width:14px}
div.dark_square .pp_nav .pp_pause{background:url(../images/prettyPhoto/dark_square/sprite.png) -24px -100px no-repeat;height:15px;width:14px}
div.dark_square .pp_arrow_previous{background:url(../images/prettyPhoto/dark_square/sprite.png) 0 -71px no-repeat}
div.dark_square .pp_arrow_next{background:url(../images/prettyPhoto/dark_square/sprite.png) -22px -71px no-repeat}
div.dark_square .pp_next:hover{background:url(../images/prettyPhoto/dark_square/btnNext.png) center right no-repeat;cursor:pointer}
div.dark_square .pp_previous:hover{background:url(../images/prettyPhoto/dark_square/btnPrevious.png) center left no-repeat;cursor:pointer}
div.light_square .pp_expand{background:url(../images/prettyPhoto/light_square/sprite.png) -31px -26px no-repeat;cursor:pointer}
div.light_square .pp_expand:hover{background:url(../images/prettyPhoto/light_square/sprite.png) -31px -47px no-repeat;cursor:pointer}
div.light_square .pp_contract{background:url(../images/prettyPhoto/light_square/sprite.png) 0 -26px no-repeat;cursor:pointer}
div.light_square .pp_contract:hover{background:url(../images/prettyPhoto/light_square/sprite.png) 0 -47px no-repeat;cursor:pointer}
div.light_square .pp_close{background:url(../images/prettyPhoto/light_square/sprite.png) -1px -1px no-repeat;cursor:pointer;height:22px;width:75px}
div.light_square .pp_nav .pp_play{background:url(../images/prettyPhoto/light_square/sprite.png) -1px -100px no-repeat;height:15px;width:14px}
div.light_square .pp_nav .pp_pause{background:url(../images/prettyPhoto/light_square/sprite.png) -24px -100px no-repeat;height:15px;width:14px}
div.light_square .pp_arrow_previous{background:url(../images/prettyPhoto/light_square/sprite.png) 0 -71px no-repeat}
div.light_square .pp_arrow_next{background:url(../images/prettyPhoto/light_square/sprite.png) -22px -71px no-repeat}
div.light_square .pp_next:hover{background:url(../images/prettyPhoto/light_square/btnNext.png) center right no-repeat;cursor:pointer}
div.light_square .pp_previous:hover{background:url(../images/prettyPhoto/light_square/btnPrevious.png) center left no-repeat;cursor:pointer}
div.facebook .pp_top .pp_left{background:url(../images/prettyPhoto/facebook/sprite.png) -88px -53px no-repeat}
div.facebook .pp_top .pp_middle{background:url(../images/prettyPhoto/facebook/contentPatternTop.png) top left repeat-x}
div.facebook .pp_top .pp_right{background:url(../images/prettyPhoto/facebook/sprite.png) -110px -53px no-repeat}
div.facebook .pp_content_container .pp_left{background:url(../images/prettyPhoto/facebook/contentPatternLeft.png) top left repeat-y}
div.facebook .pp_content_container .pp_right{background:url(../images/prettyPhoto/facebook/contentPatternRight.png) top right repeat-y}
div.facebook .pp_expand{background:url(../images/prettyPhoto/facebook/sprite.png) -31px -26px no-repeat;cursor:pointer}
div.facebook .pp_expand:hover{background:url(../images/prettyPhoto/facebook/sprite.png) -31px -47px no-repeat;cursor:pointer}
div.facebook .pp_contract{background:url(../images/prettyPhoto/facebook/sprite.png) 0 -26px no-repeat;cursor:pointer}
div.facebook .pp_contract:hover{background:url(../images/prettyPhoto/facebook/sprite.png) 0 -47px no-repeat;cursor:pointer}
div.facebook .pp_close{background:url(../images/prettyPhoto/facebook/sprite.png) -1px -1px no-repeat;cursor:pointer;height:22px;width:22px}
div.facebook .pp_description{margin:0 37px 0 0}
div.facebook .pp_loaderIcon{background:url(../images/prettyPhoto/facebook/loader.gif) center center no-repeat}
div.facebook .pp_arrow_previous{background:url(../images/prettyPhoto/facebook/sprite.png) 0 -71px no-repeat;height:22px;margin-top:0;width:22px}
div.facebook .pp_arrow_previous.disabled{background-position:0 -96px;cursor:default}
div.facebook .pp_arrow_next{background:url(../images/prettyPhoto/facebook/sprite.png) -32px -71px no-repeat;height:22px;margin-top:0;width:22px}
div.facebook .pp_arrow_next.disabled{background-position:-32px -96px;cursor:default}
div.facebook .pp_nav{margin-top:0}
div.facebook .pp_nav p{font-size:15px;padding:0 3px 0 4px}
div.facebook .pp_nav .pp_play{background:url(../images/prettyPhoto/facebook/sprite.png) -1px -123px no-repeat;height:22px;width:22px}
div.facebook .pp_nav .pp_pause{background:url(../images/prettyPhoto/facebook/sprite.png) -32px -123px no-repeat;height:22px;width:22px}
div.facebook .pp_next:hover{background:url(../images/prettyPhoto/facebook/btnNext.png) center right no-repeat;cursor:pointer}
div.facebook .pp_previous:hover{background:url(../images/prettyPhoto/facebook/btnPrevious.png) center left no-repeat;cursor:pointer}
div.facebook .pp_bottom .pp_left{background:url(../images/prettyPhoto/facebook/sprite.png) -88px -80px no-repeat}
div.facebook .pp_bottom .pp_middle{background:url(../images/prettyPhoto/facebook/contentPatternBottom.png) top left repeat-x}
div.facebook .pp_bottom .pp_right{background:url(../images/prettyPhoto/facebook/sprite.png) -110px -80px no-repeat}
div.pp_pic_holder a:focus{outline:none}
div.pp_overlay{background:#000;display:none;left:0;position:absolute;top:0;width:100%;z-index:9500}
div.pp_pic_holder{display:none;position:absolute;width:100px;z-index:10000}
.pp_content{height:40px;min-width:40px}
* html .pp_content{width:40px}
.pp_content_container{position:relative;text-align:left;width:100%}
.pp_content_container .pp_left{padding-left:20px}
.pp_content_container .pp_right{padding-right:20px}
.pp_content_container .pp_details{float:left;margin:10px 0 2px}
.pp_description{display:none;margin:0}
.pp_social{float:left;margin:0}
.pp_social .facebook{float:left;margin-left:5px;overflow:hidden;width:55px}
.pp_social .twitter{float:left}
.pp_nav{clear:right;float:left;margin:3px 10px 0 0}
.pp_nav p{float:left;margin:2px 4px;white-space:nowrap}
.pp_nav .pp_play,.pp_nav .pp_pause{float:left;margin-right:4px;text-indent:-10000px}
a.pp_arrow_previous,a.pp_arrow_next{display:block;float:left;height:15px;margin-top:3px;overflow:hidden;text-indent:-10000px;width:14px}
.pp_hoverContainer{position:absolute;top:0;width:100%;z-index:2000}
.pp_gallery{display:none;left:50%;margin-top:-50px;position:absolute;z-index:10000}
.pp_gallery div{float:left;overflow:hidden;position:relative}
.pp_gallery ul{float:left;height:35px;margin:0 0 0 5px;padding:0;position:relative;white-space:nowrap}
.pp_gallery ul a{border:1px rgba(0,0,0,0.5) solid;display:block;float:left;height:33px;overflow:hidden}
.pp_gallery ul a img{border:0}
.pp_gallery li{display:block;float:left;margin:0 5px 0 0;padding:0}
.pp_gallery li.default a{background:url(../images/prettyPhoto/facebook/default_thumbnail.gif) 0 0 no-repeat;display:block;height:33px;width:50px}
.pp_gallery .pp_arrow_previous,.pp_gallery .pp_arrow_next{margin-top:7px!important}
a.pp_next{background:url(../images/prettyPhoto/light_rounded/btnNext.png) 10000px 10000px no-repeat;display:block;float:right;height:100%;text-indent:-10000px;width:49%}
a.pp_previous{background:url(../images/prettyPhoto/light_rounded/btnNext.png) 10000px 10000px no-repeat;display:block;float:left;height:100%;text-indent:-10000px;width:49%}
a.pp_expand,a.pp_contract{cursor:pointer;display:none;height:20px;position:absolute;right:30px;text-indent:-10000px;top:10px;width:20px;z-index:20000}
a.pp_close{display:block;line-height:22px;position:absolute;right:0;text-indent:-10000px;top:0}
.pp_loaderIcon{display:block;height:24px;left:50%;margin:-12px 0 0 -12px;position:absolute;top:50%;width:24px}
#pp_full_res{line-height:1!important}
#pp_full_res .pp_inline{text-align:left}
#pp_full_res .pp_inline p{margin:0 0 15px}
div.ppt{color:#fff;display:none;font-size:17px;margin:0 0 5px 15px;z-index:9999}
div.pp_default .pp_content,div.light_rounded .pp_content{background-color:#fff}
div.pp_default #pp_full_res .pp_inline,div.light_rounded .pp_content .ppt,div.light_rounded #pp_full_res .pp_inline,div.light_square .pp_content .ppt,div.light_square #pp_full_res .pp_inline,div.facebook .pp_content .ppt,div.facebook #pp_full_res .pp_inline{color:#000}
div.pp_default .pp_gallery ul li a:hover,div.pp_default .pp_gallery ul li.selected a,.pp_gallery ul a:hover,.pp_gallery li.selected a{border-color:#fff}
div.pp_default .pp_details,div.light_rounded .pp_details,div.dark_rounded .pp_details,div.dark_square .pp_details,div.light_square .pp_details,div.facebook .pp_details{position:relative}
div.light_rounded .pp_top .pp_middle,div.light_rounded .pp_content_container .pp_left,div.light_rounded .pp_content_container .pp_right,div.light_rounded .pp_bottom .pp_middle,div.light_square .pp_left,div.light_square .pp_middle,div.light_square .pp_right,div.light_square .pp_content,div.facebook .pp_content{background:#fff}
div.light_rounded .pp_description,div.light_square .pp_description{margin-right:85px}
div.light_rounded .pp_gallery a.pp_arrow_previous,div.light_rounded .pp_gallery a.pp_arrow_next,div.dark_rounded .pp_gallery a.pp_arrow_previous,div.dark_rounded .pp_gallery a.pp_arrow_next,div.dark_square .pp_gallery a.pp_arrow_previous,div.dark_square .pp_gallery a.pp_arrow_next,div.light_square .pp_gallery a.pp_arrow_previous,div.light_square .pp_gallery a.pp_arrow_next{margin-top:12px!important}
div.light_rounded .pp_arrow_previous.disabled,div.dark_rounded .pp_arrow_previous.disabled,div.dark_square .pp_arrow_previous.disabled,div.light_square .pp_arrow_previous.disabled{background-position:0 -87px;cursor:default}
div.light_rounded .pp_arrow_next.disabled,div.dark_rounded .pp_arrow_next.disabled,div.dark_square .pp_arrow_next.disabled,div.light_square .pp_arrow_next.disabled{background-position:-22px -87px;cursor:default}
div.light_rounded .pp_loaderIcon,div.light_square .pp_loaderIcon{background:url(../images/prettyPhoto/light_rounded/loader.gif) center center no-repeat}
div.dark_rounded .pp_top .pp_middle,div.dark_rounded .pp_content,div.dark_rounded .pp_bottom .pp_middle{background:url(../images/prettyPhoto/dark_rounded/contentPattern.png) top left repeat}
div.dark_rounded .currentTextHolder,div.dark_square .currentTextHolder{color:#c4c4c4}
div.dark_rounded #pp_full_res .pp_inline,div.dark_square #pp_full_res .pp_inline{color:#fff}
.pp_top,.pp_bottom{height:20px;position:relative}
* html .pp_top,* html .pp_bottom{padding:0 20px}
.pp_top .pp_left,.pp_bottom .pp_left{height:20px;left:0;position:absolute;width:20px}
.pp_top .pp_middle,.pp_bottom .pp_middle{height:20px;left:20px;position:absolute;right:20px}
* html .pp_top .pp_middle,* html .pp_bottom .pp_middle{left:0;position:static}
.pp_top .pp_right,.pp_bottom .pp_right{height:20px;left:auto;position:absolute;right:0;top:0;width:20px}
.pp_fade,.pp_gallery li.default a img{display:none}

/* WP CORE STYLES */

.alignnone {
    margin: 5px 20px 20px 0;
}

.aligncenter, div.aligncenter {
    display:block;
    margin: 5px auto 5px auto;
}

.wp-caption {
    background: #fff;
    border: 1px solid #f0f0f0;
    max-width: 96%; /* Image does not overflow the content area */
    padding: 5px 3px 10px;
    text-align: center;
}

.wp-caption.alignnone {
    margin: 5px 20px 20px 0;
}

.wp-caption.alignleft {
    margin: 5px 20px 20px 0;
}

.wp-caption.alignright {
    margin: 5px 0 20px 20px;
}

.wp-caption img {
    border: 0 none;
    height: auto;
    margin:0;
    max-width: 98.5%;
    padding:0;
    width: auto;
}

.wp-caption p.wp-caption-text {
    font-size:11px;
    line-height:17px;
    margin:0;
    padding:0 4px 5px;
}

img.size-auto,
img.size-large,
img.size-full,
img.size-medium {
	max-width: 100%;
	height: auto;
}

.alignleft,
img.alignleft {
	display: inline;
	float: left;
	margin-right: 20px;
	margin-top: 0px;
}
.alignright,
img.alignright {
	display: inline;
	float: right;
	margin-left: 20px;
	margin-top: 0px;
}
.aligncenter,
img.aligncenter {
	clear: both;
	display: block;
	margin-left: auto;
	margin-right: auto;
}
img.alignleft,
img.alignright,
img.aligncenter {
	margin-bottom: 20px;
}

.bypostauthor {}
.sticky{}
.gallery-caption{}