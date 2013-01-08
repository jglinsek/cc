<?php
/* ------------------------------------- */
/* SIDEBAR REGISTRATION */
/* ------------------------------------- */

add_action('admin_menu', 'tp_sidebar_management_menu');

if (isset($_POST['sidebar_save'])){	
	foreach($_POST as $key => $value) { 
	       if (is_array($value)) {  
	            foreach ($value as $value_array){
	              	$field_values[] = $value_array; 
	            }
	            update_option($key, $field_values);
	            $field_values=empty($field_values);
	       } 
	       else{
	       		update_option($key,$value);
	       }
	}
	if($_POST["dm_sidebar_name"]==""){
		update_option('dm_sidebar_name','');
		update_option('dm_sidebar_slug_nr','');
	}
}


function tp_sidebar_management_menu() {
	add_submenu_page('themes.php','Sidebar Management', 'Sidebar Management', 'manage_options', 'tp-sidebar-management', 'tp_sidebar_management_options');
}

function tp_sidebar_management_options() {
	global $homeLink;
	
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	echo '<div class="wrap">';
		screen_icon('themes'); ?> <h2>Custom Sidebar Management</h2>
			<form id="sidebarform" method="post">
				<input type="hidden" name="sidebar_save" value="yes">
				<div style="margin-top:20px; margin-bottom:20px;">
                	<p style="margin-bottom:20px;">You will see a list of the current non-standard custom sidebars below.<br/>In order to add a new sidebar input its desired name into the blank field and press "Save".</p>
					<ul id="sidebar_list">
						<?php sidebar_list(); ?>
						<li><input name="dm_sidebar_name[]" value=""><input type="hidden" name="dm_sidebar_slug_nr[]" value="<?php echo uniqid("dm_"); ?>"></li>
					</ul>
				</div>
				<input type="submit" value="Save" class="button-primary" id="submitbutton"/>
			</form>
		</div>
		<script>
			jQuery("document").ready(function(){
				jQuery("#sidebarform").submit(function(){
					if(jQuery("#sidebarform li:last input:first").val()=="")
						jQuery("#sidebarform li:last input").attr("disabled", true); 
				});
				jQuery(".submitdelete").click(function(){
					jQuery(this).closest("li").remove();
				});
			});
		</script>
<?php
}

function sidebar_list() {
	$sidebars = get_option("dm_sidebar_name");
	$sidebar_count = 0;
	$sidebar_slug_nr = get_option("dm_sidebar_slug_nr");
	if(is_array($sidebars)){
		foreach ( $sidebars as $sidebar ){ 
		   echo '<li><span class="sidebar-name"><input name="dm_sidebar_name[]" value="'.$sidebar.'"><input name="dm_sidebar_slug_nr[]" type="hidden" value="'.$sidebar_slug_nr[$sidebar_count++].'"></span><a style="margin-left:20px;" class="submitdelete" href="#">Delete</a></li>';
		}
	}
}?>
