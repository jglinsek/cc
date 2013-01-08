<?php
define('APEX_FUNCTIONS', TEMPLATEPATH . '/functions/template');
define('APEX_JAVASCRIPT', get_template_directory_uri() . '/js');

require TEMPLATEPATH . '/option-tree/index.php';

/* Core Theme Functionality */
require_once(APEX_FUNCTIONS . '/theme_fonts.php');
require_once(APEX_FUNCTIONS . '/theme_support.php');
require_once(APEX_FUNCTIONS . '/theme_functions.php');
require_once(APEX_FUNCTIONS . '/theme_pagination.php');

/* JavaScripts, Widgets, Sidebars, Shortcodes */
require_once(APEX_FUNCTIONS . '/theme_javascript.php');
require_once(APEX_FUNCTIONS . '/theme_widgets.php');
require_once(APEX_FUNCTIONS . '/theme_sidebars.php');
require_once(APEX_FUNCTIONS . '/theme_sidebars_functions.php');
require_once(APEX_FUNCTIONS . '/theme_shortcodes.php');

/* Post Comments, Custom Post Types */
require_once(APEX_FUNCTIONS . '/theme_post_comments.php');
require_once(APEX_FUNCTIONS . '/theme_post_customtypes.php');
require_once(APEX_FUNCTIONS . '/theme_portfolio_functions.php');

/* Page Options */
require_once(APEX_FUNCTIONS . '/theme_page_options.php');

/* Theme Language */
require_once(APEX_FUNCTIONS . '/theme_language.php');
?>