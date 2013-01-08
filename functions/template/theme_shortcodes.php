<?php

/* ------------------------------------- */
/* SHORTCODES */
/* ------------------------------------- */

/* COLUMN 1/2 */

function onehalf_colum( $atts, $content = null ) {
   return '<div class="one_half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'onehalf_colum');

function onehalf_colum_last( $atts, $content = null ) {
   return '<div class="one_half lastcolumn">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_half_last', 'onehalf_colum_last');

/* COLUMN 1/3 */

function onethird_colum( $atts, $content = null ) {
   return '<div class="one_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'onethird_colum');

function onethird_colum_last( $atts, $content = null ) {
   return '<div class="one_third lastcolumn">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_third_last', 'onethird_colum_last');

/* COLUMN 2/3 */

function twothird_colum( $atts, $content = null ) {
   return '<div class="two_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'twothird_colum');

function twothird_colum_last( $atts, $content = null ) {
   return '<div class="two_third lastcolumn">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('two_third_last', 'twothird_colum_last');

/* COLUMN 1/4 */

function onefourth_colum( $atts, $content = null ) {
   return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'onefourth_colum');

function onefourth_colum_last( $atts, $content = null ) {
   return '<div class="one_fourth lastcolumn">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_fourth_last', 'onefourth_colum_last');

/* COLUMN 1/5 */

function onefifth_colum( $atts, $content = null ) {
   return '<div class="one_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth', 'onefifth_colum');

function onefifth_colum_last( $atts, $content = null ) {
   return '<div class="one_fifth lastcolumn">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_fifth_last', 'onefifth_colum_last');

/* COLUMN 1/6 */

function onesixth_colum( $atts, $content = null ) {
   return '<div class="one_sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_sixth', 'onesixth_colum');

function onesixth_colum_last( $atts, $content = null ) {
   return '<div class="one_sixth lastcolumn">' . do_shortcode($content) . '</div><div class="clear"></div>';
}
add_shortcode('one_sixth_last', 'onesixth_colum_last');

/* YOUTUBE VIDEO */

function vid_youtube( $atts ) {
	extract(shortcode_atts(array(
		'video_id' => '',
	), $atts));
   return '<p><div class="scalevid"><iframe src="http://www.youtube.com/embed/'.$video_id.'?hd=1&amp;wmode=opaque&amp;controls=1&amp;showinfo=0" width="460" height="259"></iframe></div></p>';
}
add_shortcode('video_youtube', 'vid_youtube');

/* VIMEO VIDEO */

function vid_vimeo( $atts ) {
	extract(shortcode_atts(array(
		'video_id' => '',
	), $atts));
   return '<p><div class="scalevid"><iframe src="http://player.vimeo.com/video/'.$video_id.'?title=0&amp;byline=0&amp;portrait=0" width="460" height="259"></iframe></div></p>';
}
add_shortcode('video_vimeo', 'vid_vimeo');



/* ------------------------------------- */
/* SHORTCODE EDITOR DROPDOWN LIST */
/* ------------------------------------- */

function add_sc_select(){
	echo '&nbsp;<select id="sc_select"><option value="0">Select Shortcode from List</option>';
	/* LAYOUTS */
	$shortcodes_list .= "<option value='0' style='font-weight:bold;'>Layouts</option>";
	/* 1/2 Text + 1/2 Text */
	$shortcodes_list .= "<option value='[one_half]<br />...Your text here...<br />[/one_half]<br /><br />[one_half_last]<br />...Your text here...<br />[/one_half_last]<br/>'>1/2 + 1/2 Layout</option>";
	/* 1/3 Text + 1/3 Text + 1/3 Text */
	$shortcodes_list .= "<option value='[one_third]<br />...Your text here...<br />[/one_third]<br /><br />[one_third]<br />...Your text here...<br />[/one_third]<br /><br />[one_third_last]<br />...Your text here...<br />[/one_third_last]<br/>'>1/3 + 1/3 + 1/3 Layout</option>";
	/* 2/3 Text + 1/3 Text */
	$shortcodes_list .= "<option value='[two_third]<br />...Your text here...<br />[/two_third]<br /><br />[one_third_last]<br />...Your text here...<br />[/one_third_last]<br/>'>2/3 + 1/3 Layout</option>";
	/* 1/3 Text + 2/3 Text */
	$shortcodes_list .= "<option value='[one_third]<br />...Your text here...<br />[/one_third]<br /><br />[two_third_last]<br />...Your text here...<br />[/two_third_last]<br/>'>1/3 + 2/3 Layout</option>";
	/* 1/4 Text + 1/4 Text + 1/4 Text + 1/4 Text */
	$shortcodes_list .= "<option value='[one_fourth]<br />...Your text here...<br />[/one_fourth]<br /><br />[one_fourth]<br />...Your text here...<br />[/one_fourth]<br /><br />[one_fourth]<br />...Your text here...<br />[/one_fourth]<br /><br />[one_fourth_last]<br />...Your text here...<br />[/one_fourth_last]<br/>'>1/4 + 1/4 + 1/4 + 1/4 Layout</option>";
	/* 1/5 Text + 1/5 Text + 1/5 Text + 1/5 Text + 1/5 Text */
	$shortcodes_list .= "<option value='[one_fifth]<br />...Your text here...<br />[/one_fifth]<br /><br />[one_fifth]<br />...Your text here...<br />[/one_fifth]<br /><br />[one_fifth]<br />...Your text here...<br />[/one_fifth]<br /><br />[one_fifth]<br />...Your text here...<br />[/one_fifth]<br /><br />[one_fifth_last]<br />...Your text here...<br />[/one_fifth_last]<br/>'>1/5 + 1/5 + 1/5 + 1/5 + 1/5 Layout</option>";
	/* 1/6 Text + 1/6 Text + 1/6 Text + 1/6 Text + 1/6 Text */
	$shortcodes_list .= "<option value='[one_sixth]<br />...Your text here...<br />[/one_sixth]<br /><br />[one_sixth]<br />...Your text here...<br />[/one_sixth]<br /><br />[one_sixth]<br />...Your text here...<br />[/one_sixth]<br /><br />[one_sixth]<br />...Your text here...<br />[/one_sixth]<br /><br />[one_sixth]<br />...Your text here...<br />[/one_sixth]<br /><br />[one_sixth_last]<br />...Your text here...<br />[/one_sixth_last]<br/>'>1/6 + 1/6 + 1/6 + 1/6 + 1/6 + 1/6 Layout</option>";
	/* MISC */
	$shortcodes_list .= "<option value='0' style='font-weight:bold;'>Miscellaneous</option>";
	/* Quote */
	$shortcodes_list .= "<option value='<blockquote><br />...Your text here...<br /></blockquote><br/>'>Blockquote Example</option>";
	/* List */
	$shortcodes_list .= "<option value='<ul class=\"square\">
                            <li>Lorem ipsum dolor sit amet, consetetur sadipscing.</li>
                            <li>Lorem ipsum dolor sit amet, consetetur sadipscing.</li>
                            <li>Lorem ipsum dolor sit amet, consetetur sadipscing.</li>
                            <li>Lorem ipsum dolor sit amet, consetetur sadipscing.</li>
                        </ul>'>List Example</option>";
	/* Tabs */
	$shortcodes_list .= "<option value='<ul class=\"tabs\">
                <li><a class=\"active\" href=\"#concept\">Concept</a></li>
                <li><a href=\"#design\">Design</a></li>
                <li><a href=\"#support\">Support</a></li>
            </ul>
            <ul class=\"tabs-content clearfix\">
                <li class=\"active clearfix\" id=\"concept\">
                    <div class=\"two_third\"><h6>2/3</h6><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr.</p></div>
                    <div class=\"one_third lastcolumn\"><h6>1/3</h6><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p></div>
                </li>
                <li id=\"design\" class=\"clearfix\">
                    <div class=\"one_third\"><h6>1/3</h6><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p></div>
                    <div class=\"two_third lastcolumn\"><h6>2/3</h6><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr.</p></div>
                </li>
                <li id=\"support\" class=\"clearfix\">
                    <div class=\"one_third\">
                        <h6>1/3</h6>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p> 
                    </div>
                    <div class=\"one_third\">
                        <h6>1/3</h6>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p> 
                    </div>
                    <div class=\"one_third lastcolumn\">
                        <h6>1/3</h6>
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p> 
                    </div>
                </li>
            </ul>'>Tabs Example</option>";
	/* VIDEOS */
	$shortcodes_list .= "<option value='0' style='font-weight:bold;'>Videos</option>";
	/* Youtube Video */
	$shortcodes_list .= "<option value='[video_youtube video_id=\"Your Video ID goes here\"]'>Youtube Video</option>";
	/* Vimeo Video */
	$shortcodes_list .= "<option value='[video_vimeo video_id=\"Your Video ID goes here\"]'>Vimeo Video</option>";
	/* LIGHTBOX */
	$shortcodes_list .= "<option value='0' style='font-weight:bold;'>Lightbox</option>";
	/* prettyPhoto Image */
	$shortcodes_list .= "<option value='<a href=\"LINK TO LARGE IMAGE GOES HERE\" data-rel=\"prettyPhoto[folio]\" title=\"ENTRY DESCRIPTION TEXT GOES HERE\" data-text=\"&raquo; Enlarge\" class=\"hovering\"><img class=\"scale-with-grid alignleft\" src=\"LINK TO THUMB IMAGE GOES HERE\" alt=\"\" /></a>'>Lightbox Image with Gallery Style</option>";
	/* prettyPhoto Youtube */
	$shortcodes_list .= "<option value='<a href=\"http://www.youtube.com/watch?v=YOUTUBE VIDEO ID GOES HERE&width=720&height=435\" data-rel=\"prettyPhoto[folio]\" title=\"ENTRY DESCRIPTION TEXT GOES HERE\" data-text=\"&raquo; Enlarge\" class=\"hovering\"><img class=\scale-with-grid alignleft\" src=\"LINK TO THUMB IMAGE GOES HERE\" alt=\"\" /></a>'>Lightbox Youtube Video with Gallery Style</option>";
	/* prettyPhoto Vimeo */
	$shortcodes_list .= "<option value='<a href=\"http://vimeo.com/VIMEO VIDEO ID GOES HERE&width=720&height=405\" data-rel=\"prettyPhoto[folio]\" title=\"ENTRY DESCRIPTION TEXT GOES HERE\" data-text=\"&raquo; Enlarge\" class=\"hovering\"><img class=\"scale-with-grid alignleft\" src=\"LINK TO THUMB IMAGE GOES HERE\" alt=\"\" /></a>'>Lightbox Vimeo Video with Gallery Style</option>";
	echo $shortcodes_list;
	echo '</select>';
}

add_action('admin_head', 'shortcodeselector');

function shortcodeselector() {
	echo '<script type="text/javascript">
	jQuery(document).ready(function(){
	   jQuery("#sc_select").change(function() {
	   		var selectedval = jQuery("#sc_select :selected").val();
	   		if(selectedval != 0){
				send_to_editor(selectedval);
			}
			return false;
		});
	});
	</script>';
}

add_action('media_buttons','add_sc_select',11);
?>