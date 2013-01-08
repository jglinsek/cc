<?php
/* ------------------------------------- */
/* LOADING GOOGLE FONTS */
/* ------------------------------------- */

add_action('wp_head', 'load_fonts');

function load_fonts() {
if ( function_exists( 'get_option_tree') ) {
	$headlinefonturl = get_option_tree( 'font_headlineurl' );
}
?>
<link href='<?php echo $headlinefonturl ?>' rel='stylesheet' type='text/css'>
<?php
}
?>