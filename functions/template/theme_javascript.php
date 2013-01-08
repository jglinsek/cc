<?php
/* ------------------------------------- */
/* LOAD JAVASCRIPTS */
/* ------------------------------------- */

function loadJS() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', APEX_JAVASCRIPT .'/jquery-1.7.min.js', false, '1.7');
		wp_enqueue_script('jquery');
		
		wp_enqueue_script( 'jqueryeasing', APEX_JAVASCRIPT .'/jquery.easing.1.3.js', false);
		wp_enqueue_script( 'jqueryanimatecolors', APEX_JAVASCRIPT .'/jquery.animate-colors-min.js', false);
		wp_enqueue_script( 'jqueryddsmoothmenu', APEX_JAVASCRIPT .'/ddsmoothmenu.php', false);
		wp_enqueue_script( 'jquerycssanimate', APEX_JAVASCRIPT .'/jquery.cssAnimate.mini.js', false);
		wp_enqueue_script( 'jqueryfitvids', APEX_JAVASCRIPT .'/jquery.fitvids.js', false);
		wp_enqueue_script( 'jqueryflexslider', APEX_JAVASCRIPT .'/jquery.flexslider-min.js', false);
		wp_enqueue_script( 'prettyphoto', APEX_JAVASCRIPT .'/jquery.prettyPhoto.js', false);
		wp_enqueue_script( 'templatejs', APEX_JAVASCRIPT .'/templatejs.php', false);
	}
}
add_action('init', 'loadJS');
?>