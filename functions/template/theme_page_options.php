<?php

if ( defined( "OT_PLUGIN_DIR" ) && file_exists( OT_PLUGIN_DIR . '/functions/get-option-tree.php' )  ) {
  require_once( OT_PLUGIN_DIR . '/functions/get-option-tree.php' );
}

if ( function_exists( 'get_option_tree') ) {}



/* ------------------------------------- */
/* PRINT SIDEBARS IN SELECTBOX
/* ------------------------------------- */

function sidebar_selectbox( $name = '', $current_value = false ) {
    global $wp_registered_sidebars;

    if( empty( $wp_registered_sidebars ) )
        return;

    $name = ( empty( $name ) ) ? false : ' name="' . esc_attr( $name ) . '"';
    $current = ( $current_value ) ? esc_attr( $current_value ) : false;     
    $selected = '';
    ?>
    <select<?php echo $name; ?>>
    <?php foreach( $wp_registered_sidebars as $sidebar ) : ?>
        <?php 
        if( $current ) 
            $selected = selected( $sidebar['name'] == $current, true, false ); ?> 
        <option value="<?php echo $sidebar['name']; ?>"<?php echo $selected; ?>><?php echo $sidebar['name']; ?></option>
    <?php endforeach; ?>
    </select>
    <?php
}



/* ------------------------------------- */
/* POST OPTIONS */
/* ------------------------------------- */

add_action('admin_init', 'init_post_options');

function init_post_options() {
	add_meta_box("postformat-options", "Post Options", "postformat_options", "post", "normal", "high");
	add_action('save_post','update_post_data');
}

function update_post_data(){
	global $post;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
	if($post){
		if( isset($_POST["postformat_type"]) ) {
			update_post_meta($post->ID, "postformat_type", $_POST["postformat_type"]);
		}else{
			update_post_meta($post->ID, "postformat_type", 0);
		}
		if( isset($_POST["postformat_slider"]) ) {
			update_post_meta($post->ID, "postformat_slider", $_POST["postformat_slider"]);
		}
		if( isset($_POST["postformat_video"]) ) {
			update_post_meta($post->ID, "postformat_video", $_POST["postformat_video"]);
		}
	}
}

function postformat_options(){
	global $post;
	$custom = get_post_custom($post->ID);
	
	if (isset($custom["postformat_type"][0])){
		$postformat_type = $custom["postformat_type"][0];
	}else{
		$postformat_type = 0;
		$custom["postformat_type"][0] = 0;
	}
	
	if (isset($custom["postformat_slider"][0])){
		$postformat_slider = $custom["postformat_slider"][0];
	}else{
		$postformat_slider = "";
	}
	
	if (isset($custom["postformat_video"][0])){
		$postformat_video = $custom["postformat_video"][0];
	}else{
		$postformat_video = "";
	}
?>

    <div id="postformat-options">
        <table cellpadding="15" cellspacing="15">
        	<tr>
                <td colspan="2"><h1 style="color:#33759b">Post Format</h1></td>
            </tr>
            <tr>
                <td style="width:150px;"><label>Post Format Type: <i style="color: #999999;"><br/>(Note: The thumbnail image for the post is always specified via "Set featured image" on the right)</i></label></td>
                <td>
                No Image <input name="postformat_type" type="radio" value="0" <?php if( isset($postformat_type)){checked( '0', $custom[ 'postformat_type' ][0] ); } ?> />&nbsp; &nbsp;
                Single Image <input name="postformat_type" type="radio" value="1" <?php if( isset($postformat_type)){checked( '1', $custom[ 'postformat_type' ][0] ); } ?> />&nbsp; &nbsp;
                Slideshow <input name="postformat_type" type="radio" value="2" <?php if( isset($postformat_type)){checked( '2', $custom[ 'postformat_type' ][0] ); } ?> />&nbsp; &nbsp;
                Youtube Video <input name="postformat_type" type="radio" value="3" <?php if( isset($postformat_type)){checked( '3', $custom[ 'postformat_type' ][0] ); } ?> />&nbsp; &nbsp;
                Vimeo Video <input name="postformat_type" type="radio" value="4" <?php if( isset($postformat_type)){checked( '4', $custom[ 'postformat_type' ][0] ); } ?> />
                </td>	
            </tr>
            <tr>
                <td style="width:150px;"><label>Slideshow Image URL's: <i style="color: #999999;"><br/>(Separate with line breaks / press return after each url)</i></label></td><td><textarea name="postformat_slider" style="width:300px;height:100px;"/><?php echo $postformat_slider; ?></textarea></td>	
            </tr>
            <tr>
                <td style="width:150px;"><label>Youtube / Vimeo Video ID: <i style="color: #999999;"><br/>(Example for a youtube video id: I_ClNxSST4M<br/>Example for a vimeo video id: 24243147)</i></label></td><td><input name="postformat_video" style="width:300px" value="<?php echo $postformat_video; ?>" /></td>	
            </tr>
            <tr>
                <td><h4 style="color:#ff0000">Make sure to click Publish/Update after making changes!</h4></td><td></td>	
            </tr>
        </table>
    </div>
      
<?php
}



/* ------------------------------------- */
/* PORTFOLIO ENTRY OPTIONS */
/* ------------------------------------- */

add_action("admin_init", "add_portfolio_entry");
add_action('save_post', 'update_portfolio_entry_data');

function add_portfolio_entry(){
	$portfolio_slugs = get_option("dm_portfolio_slug");
	if(is_array($portfolio_slugs))
		foreach ( $portfolio_slugs as $slug ){
			add_meta_box("portfolio-details", "Portfolio Entry Options", "portfolio_entry_options", $slug, "normal", "high");
		}
}

function update_portfolio_entry_data(){
	global $post;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
	if($post){
		if( isset($_POST["postformat_type"]) ) {
			update_post_meta($post->ID, "postformat_type", $_POST["postformat_type"]);
		}else{
			update_post_meta($post->ID, "postformat_type", 0);
		}
		if( isset($_POST["postformat_slider"]) ) {
			update_post_meta($post->ID, "postformat_slider", $_POST["postformat_slider"]);
		}
		if( isset($_POST["postformat_video"]) ) {
			update_post_meta($post->ID, "postformat_video", $_POST["postformat_video"]);
		}
	}
}

function portfolio_entry_options(){
	global $post;
	$custom = get_post_custom($post->ID);
	if (isset($custom["postformat_type"][0])){
		$postformat_type = $custom["postformat_type"][0];
	}else{
		$postformat_type = 0;
		$custom["postformat_type"][0] = 0;
	}
	
	if (isset($custom["postformat_slider"][0])){
		$postformat_slider = $custom["postformat_slider"][0];
	}else{
		$postformat_slider = "";
	}
	
	if (isset($custom["postformat_video"][0])){
		$postformat_video = $custom["postformat_video"][0];
	}else{
		$postformat_video = "";
	}
?>

    <div id="portfolio-details">
        <table cellpadding="15" cellspacing="15">
        	<tr>
                <td colspan="2"><h1 style="color:#33759b">Portfolio Entry Format</h1></td>
            </tr>
            <tr>
                <td style="width:150px;"><label>Portfolio Entry Format Type: <i style="color: #999999;"><br/>(Note: The thumbnail image for the portfolio entry is always specified via "Set featured image" on the right. The optimal size is <strong>460 x 272 px</strong>)</i></label></td>
                <td>
                No Image <input name="postformat_type" type="radio" value="0" <?php if( isset($postformat_type)){checked( '0', $custom[ 'postformat_type' ][0] ); } ?> />&nbsp; &nbsp;
                Single Image <input name="postformat_type" type="radio" value="1" <?php if( isset($postformat_type)){checked( '1', $custom[ 'postformat_type' ][0] ); } ?> />&nbsp; &nbsp;
                Slideshow <input name="postformat_type" type="radio" value="2" <?php if( isset($postformat_type)){checked( '2', $custom[ 'postformat_type' ][0] ); } ?> />&nbsp; &nbsp;
                Youtube Video <input name="postformat_type" type="radio" value="3" <?php if( isset($postformat_type)){checked( '3', $custom[ 'postformat_type' ][0] ); } ?> />&nbsp; &nbsp;
                Vimeo Video <input name="postformat_type" type="radio" value="4" <?php if( isset($postformat_type)){checked( '4', $custom[ 'postformat_type' ][0] ); } ?> />
                </td>	
            </tr>
            <tr>
                <td style="width:150px;"><label>Slideshow Image URL's: <i style="color: #999999;"><br/>(Separate with line breaks / press return after each url)</i></label></td><td><textarea name="postformat_slider" style="width:300px;height:100px;"/><?php echo $postformat_slider; ?></textarea></td>	
            </tr>
            <tr>
                <td style="width:150px;"><label>Youtube / Vimeo Video ID: <i style="color: #999999;"><br/>(Example for a youtube video id: I_ClNxSST4M<br/>Example for a vimeo video id: 24243147)</i></label></td><td><input name="postformat_video" style="width:300px" value="<?php echo $postformat_video; ?>" /></td>	
            </tr>
            <tr>
                <td><h4 style="color:#ff0000">Make sure to click Publish/Update after making changes!</h4></td><td></td>	
            </tr>
        </table>
    </div>
      
<?php
}


/* ------------------------------------- */
/* PAGE OPTIONS */
/* ------------------------------------- */

add_action('admin_init', 'init_page_options');

function init_page_options() {
	add_meta_box("page-options", "Page Options", "page_options", "page", "normal", "high");
	add_meta_box("page-options", "Page Options", "page_options", "post", "normal", "high");
	$portfolio_slugs = get_option("dm_portfolio_slug");
	if(is_array($portfolio_slugs))
		foreach ( $portfolio_slugs as $slug ){
			add_meta_box("page-options", "Page Options", "page_options", $slug, "normal", "high");
		}
	add_action('save_post','update_page_data');
}

function update_page_data(){
	global $post;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
	if($post){
		if( isset($_POST["header_title"]) ) {
			update_post_meta($post->ID, "header_title", $_POST["header_title"]);
		}
		if( isset($_POST["background_image"]) ) {
			update_post_meta($post->ID, "background_image", $_POST["background_image"]);
		}
		if( isset($_POST["sidebar_orientation"]) ) {
			update_post_meta($post->ID, "sidebar_orientation", $_POST["sidebar_orientation"]);
		}else{
			update_post_meta($post->ID, "sidebar_orientation", 0);
		}
		if( isset($_POST["sidebar"]) ) {
			update_post_meta($post->ID, "sidebar", $_POST["sidebar"]);
		}
	}
}

function page_options(){
	global $post;
	$custom = get_post_custom($post->ID);
	
	if (isset($custom["header_title"][0])){
		$header_title = $custom["header_title"][0];
	}else{
		$header_title = "";
	}
	
	if (isset($custom["background_image"][0])){
		$background_image = $custom["background_image"][0];
	}else{
		$background_image = "";
	}
	
	if (isset($custom["sidebar_orientation"][0])){
		$sidebar_orientation = $custom["sidebar_orientation"][0];
	}else{
		$sidebar_orientation = 0;
		$custom["sidebar_orientation"][0] = 0;
	}
	
	if (isset($custom["sidebar"][0])){
		$sidebar = $custom["sidebar"][0];
	}else{
		$sidebar = false;
	}
?>

    <div id="page-options">
        <table cellpadding="15" cellspacing="15">
        	<tr>
                <td colspan="2"><h1 style="color:#33759b">General</h1></td>
            </tr>
            <tr>
                <td style="width:150px;"><label>Page Title Text: <i style="color: #999999;"><br/>(Leave blank for no title)</i></label></td><td><input name="header_title" style="width:300px" value="<?php echo $header_title; ?>" /></td>	
            </tr>
            <tr>
                <td colspan="2"><h1 style="color:#33759b">Background</h1></td>
            </tr>
            <tr>
                <td style="width:150px;"><label>Background Image Url: <i style="color: #999999;"><br/>(Leave blank for background tile which is configured via theme options)</i></label></td><td><input name="background_image" style="width:300px" value="<?php echo $background_image; ?>" /></td>	
            </tr>
            <tr>
                <td colspan="2"><h1 style="color:#33759b">Sidebar</h1></td>
            </tr>
            <tr>
                <td><label>Choose Sidebar <i style="color: #999999;"><br/>(Select Sidebar)</i></label></td>
                <td>
                <?php sidebar_selectbox("sidebar",$sidebar); ?>
                </td>	
            </tr>
            <tr>
                <td><label>Sidebar Orientation: <i style="color: #999999;"><br/>(Places the sidebar left or right)</i></label></td>
                <td>
                Left <input name="sidebar_orientation" type="radio" value="0" <?php if( isset($sidebar_orientation)){checked( '0', $custom[ 'sidebar_orientation' ][0] ); } ?> />
                Right <input name="sidebar_orientation" type="radio" value="1" <?php if( isset($sidebar_orientation)){checked( '1', $custom[ 'sidebar_orientation' ][0] ); } ?> />
                </td>	
            </tr>
            <tr>
                <td><h4 style="color:#ff0000">Make sure to click Publish/Update after making changes!</h4></td><td></td>	
            </tr>
        </table>
    </div>
      
<?php
}



/* ------------------------------------- */
/* PORTFOLIO OPTIONS */
/* ------------------------------------- */

add_action("admin_init", "add_portfolio");
add_action('save_post', 'update_portfolio_data');

function add_portfolio(){
	add_meta_box("portfolio-options", "Portfolio Options", "portfolio_options", "page", "normal", "high");
}

function update_portfolio_data(){
	global $post;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
	if($post){
		if( isset($_POST["portfolio_category"]) ) {
			update_post_meta($post->ID, "portfolio_category", $_POST["portfolio_category"]);
		}
		if( isset($_POST["portfolio_layout"]) ) {
			update_post_meta($post->ID, "portfolio_layout", $_POST["portfolio_layout"]);
		}else{
			update_post_meta($post->ID, "portfolio_layout", 0);
		}
		if( isset($_POST["portfolio_alpha"]) ) {
			update_post_meta($post->ID, "portfolio_alpha", $_POST["portfolio_alpha"]);
		}
	}
}

function portfolio_options(){
	global $post;
	$custom = get_post_custom($post->ID);
	
	if (isset($custom["portfolio_category"][0])){
		$portfolio_category = $custom["portfolio_category"][0];
	}else{
		$portfolio_category = "";
	}
	
	if (isset($custom["portfolio_layout"][0])){
		$portfolio_layout = $custom["portfolio_layout"][0];
	}else{
		$portfolio_layout = 0;
		$custom["portfolio_layout"][0] = 0;
	}
	
	if (isset($custom["portfolio_alpha"][0])){
		$portfolio_alpha = $custom["portfolio_alpha"][0];
	}else{
		$portfolio_alpha = "";
	}
?>

    <div id="portfolio-options">
        <table cellpadding="15" cellspacing="15">
        	<tr>
                <td colspan="2"><h1 style="color:#33759b">Portfolio Options</h1></td>
            </tr>
            <tr>
                <td style="width:150px;"><label>Select Portfolio:</label></td>
                <td>
                	<select name="portfolio_category" style="width:300px" value="<?php echo $portfolio_category; ?>" />
                    	<?php 
                    		$portfolio_slugs = get_option("dm_portfolio_slug");
                    		$portfolio_counter = 0;
                    		$portfolio_name = get_option("dm_portfolio_name");
                    		foreach ( $portfolio_slugs as $slug ){
                    			$checked="";
                    		 	if($slug==$portfolio_category) $checked="selected";
                    		 	echo "<option value='$slug' $checked>".$portfolio_name[$portfolio_counter++]."</option>";
                    		}
                    	 ?>
                	</select>
                </td>	
            </tr>
            <tr>
                <td><label>Portfolio Columns: <i style="color: #999999;"><br/>(Select desired layout for this portfolio)</i></label></td>
                <td>
                4 Column <input name="portfolio_layout" type="radio" value="0" <?php if( isset($portfolio_layout)){checked( '0', $custom[ 'portfolio_layout' ][0] ); } ?> />
                2 Column <input name="portfolio_layout" type="radio" value="1" <?php if( isset($portfolio_layout)){checked( '1', $custom[ 'portfolio_layout' ][0] ); } ?> />
                </td>	
            </tr>
            <tr>
                <td style="width:150px;"><label>Portfolio Alpha Effect: <i style="color: #999999;"><br/>(<strong>0 - 100</strong> The opacity value of non-selected portfolio items. Set to 0 (zero) to make non-selected items disappear)</i></label></td><td><input name="portfolio_alpha" style="width:300px" value="<?php echo $portfolio_alpha; ?>" /></td>	
            </tr>
        </table>
    </div>
      
<?php
}
?>