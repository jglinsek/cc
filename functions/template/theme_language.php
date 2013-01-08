<?php
/* ------------------------------------- */
/* THEME LOCALIZATION */
/* ------------------------------------- */

load_theme_textdomain( 'apex', TEMPLATEPATH.'/lang' );
$locale = get_locale();
$locale_file = TEMPLATEPATH."/lang/$locale.php";
if ( is_readable($locale_file) ) 
require_once($locale_file);
?>