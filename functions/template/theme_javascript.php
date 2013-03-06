<?php
/* ------------------------------------- */
/* LOAD JAVASCRIPTS */
/* ------------------------------------- */

function loadJS() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', APEX_JAVASCRIPT .'/jquery-1.7.min.js', false, '1.7', true);
		wp_enqueue_script('jquery');
		
		wp_enqueue_script( 'jqueryeasing', APEX_JAVASCRIPT .'/jquery.easing.1.3.js', array('jquery'), true, true);
		wp_enqueue_script( 'jqueryanimatecolors', APEX_JAVASCRIPT .'/jquery.animate-colors-min.js', array('jquery'), true, true);
		wp_enqueue_script( 'jqueryddsmoothmenu', APEX_JAVASCRIPT .'/ddsmoothmenu.php', array('jquery'), true, true);
		wp_enqueue_script( 'jquerycssanimate', APEX_JAVASCRIPT .'/jquery.cssAnimate.mini.js', array('jquery'), true, true);
		wp_enqueue_script( 'jqueryfitvids', APEX_JAVASCRIPT .'/jquery.fitvids.js', array('jquery'), true, true);
		wp_enqueue_script( 'jqueryflexslider', APEX_JAVASCRIPT .'/jquery.flexslider-min.js', array('jquery'), true, true);
		wp_enqueue_script( 'prettyphoto', APEX_JAVASCRIPT .'/jquery.prettyPhoto.js', array('jquery'), true, true);
        wp_enqueue_script( 'smoothscroll', APEX_JAVASCRIPT .'/jquery.smooth-scroll.js', array('jquery'), true, true);
		wp_enqueue_script( 'templatejs', APEX_JAVASCRIPT .'/templatejs.php', array('jquery'), true, true);
	}
}
add_action('wp_enqueue_scripts', 'loadJS');
?>