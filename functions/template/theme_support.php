<?php
/* ------------------------------------- */
/* ENABLING FUNCTION SUPPORT */
/* ------------------------------------- */

if (function_exists('add_theme_support')){
	add_theme_support( 'post-thumbnails');
}
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}
if ( function_exists('add_theme_support')) {
	add_theme_support( 'automatic-feed-links');
}
/*if ( function_exists('add_theme_support')) {
	add_theme_support( 'post-formats', array( 'image ', 'gallery', 'video' ) );
	add_post_type_support( 'page', 'post-formats' );
	add_post_type_support( 'post', 'post-formats' );
}*/

remove_action ('wp_head', 'rsd_link');
remove_action ('wp_head', 'wlwmanifest_link');
remove_action ('wp_head', 'wp_generator');
?>