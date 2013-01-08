<?php
/* ------------------------------------- */
/* SIDEBAR REGISTRATION */
/* ------------------------------------- */

if ( function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Blog Sidebar',
        'id' => 'sidebar-1',
		'before_widget' => '<div class="widget" id="%1$s">',
        'after_widget' => '<div class="clear"></div></div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>'
    ));
	register_sidebar(array(
        'name' => 'Portfolio Sidebar',
        'id' => 'sidebar-2',
		'before_widget' => '<div class="widget" id="%1$s">',
        'after_widget' => '<div class="clear"></div></div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>'
    ));
	register_sidebar(array(
        'name' => 'Contact Sidebar',
        'id' => 'sidebar-3',
		'before_widget' => '<div class="widget" id="%1$s">',
        'after_widget' => '<div class="clear"></div></div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>'
    ));
	register_sidebar(array(
        'name' => 'Page Sidebar',
        'id' => 'sidebar-4',
		'before_widget' => '<div class="widget" id="%1$s">',
        'after_widget' => '<div class="clear"></div></div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>'
    ));
	register_sidebar(array(
        'name' => 'Footer Widget Slot 1',
        'id' => 'sidebar-5',
        'before_widget' => '<div class="four columns widget alpha" id="%1$s">',
        'after_widget' => '<div class="clear"></div></div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>'
    ));
	register_sidebar(array(
        'name' => 'Footer Widget Slot 2',
        'id' => 'sidebar-6',
        'before_widget' => '<div class="four columns widget" id="%1$s">',
        'after_widget' => '<div class="clear"></div></div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>'
    ));
	register_sidebar(array(
        'name' => 'Footer Widget Slot 3',
        'id' => 'sidebar-7',
        'before_widget' => '<div class="four columns widget" id="%1$s">',
        'after_widget' => '<div class="clear"></div></div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>'
    ));
	register_sidebar(array(
        'name' => 'Footer Widget Slot 4',
        'id' => 'sidebar-8',
        'before_widget' => '<div class="four columns widget omega" id="%1$s">',
        'after_widget' => '<div class="clear"></div></div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>'
    ));
	register_sidebar(array(
        'name' => 'Home Sidebar',
        'id' => 'sidebar-9',
		'before_widget' => '<div class="widget" id="%1$s">',
        'after_widget' => '<div class="clear"></div></div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>'
    ));

	$sidebars = get_option("dm_sidebar_name");
	$sidebar_count = 0;
	$sidebar_slug_nr = get_option("dm_sidebar_slug_nr");
	if(is_array($sidebars))
		foreach ( $sidebars as $sidebar ){
		   register_sidebar(array(
				'name' => $sidebar,
				'id' => 'sidebar-'.$sidebar_slug_nr[$sidebar_count++],
				'before_widget' => '<div class="widget" id="%1$s">',
				'after_widget' => '<div class="clear"></div></div>',
				'before_title' => '<h5>',
				'after_title' => '</h5>'
		   ));	   
		}
}?>