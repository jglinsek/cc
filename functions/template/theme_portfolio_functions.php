<?php
/* ------------------------------------- */
/* portfolio REGISTRATION */
/* ------------------------------------- */

add_action('admin_menu', 'tp_portfolio_management_menu');

if (isset($_POST['portfolio_save']) && isset($_POST["dm_portfolio_name"])){	
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
}
elseif (isset($_POST['portfolio_save']) && !isset($_POST["dm_portfolio_name"])){
	update_option('dm_portfolio_name','');
	update_option('dm_portfolio_slug','');
}


function tp_portfolio_management_menu() {
	add_submenu_page('themes.php','Portfolio Management', 'Portfolio Management', 'manage_options', 'tp-portfolio-management', 'tp_portfolio_management_options');
}

function tp_portfolio_management_options() {
	global $homeLink;
	
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	echo '<div class="wrap">';
		screen_icon('themes'); ?> <h2>Custom Portfolio Management</h2>
			<form id="portfolioform" method="post">
				<input type="hidden" name="portfolio_save" value="yes">
				<div style="margin-top:20px; margin-bottom:20px;">
                	<p style="margin-bottom:20px;">You will see a list of the current portfolios below.<br/>In order to add a new portfolio input its desired name and slug (no spaces or special characters) into the blank fields and press "Save".<br/><strong>IMPORTANT: Changing an existing portfolios values will result in all items getting lost.</strong></p>
					<ul id="portfolio_list">
						<?php portfolio_list(); ?>
						<li>Name<input name="dm_portfolio_name[]" value="">Slug<input type="text" name="dm_portfolio_slug[]" value=""></li>
					</ul>
				</div>
				<input type="button" value="Save" class="button-primary" id="submitbutton"/>
			</form>
		</div>
		<script>
			jQuery("document").ready(function(){
				jQuery("#submitbutton").click(function(){
					if(jQuery("#portfolioform li:last input:first").val()=="" && jQuery("#portfolioform li:last input:last").val()=="")
						jQuery("#portfolioform li:last input").attr("disabled", true); 
					
					message="";
					pslug = 0;
					pname = 0;


					if(jQuery("#portfolioform li:last input:first").val()!="" && jQuery("#portfolioform li:last input:last").val()==""){
						message+="You need an Portfolio Slug to add a new Portfolio!\n";
					}

					if(jQuery("#portfolioform li:last input:first").val()=="" && jQuery("#portfolioform li:last input:last").val()!=""){
						message+="You need an Portfolio Name to add a new Portfolio!\n";
					}
					
					jQuery(".portfolio_name").each(function(){
						if(jQuery(this).val()=="")
							pname=1;
					});

					jQuery(".portfolio_slug").each(function(){
						if(jQuery(this).val()=="")
							pslug=1;
					});

					if(pname==1)
						message+="You need an Portfolio Name to change a Portfolio!\n";
					if(pslug==1)
						message+="You need an Portfolio Slug to change a Portfolio!\n";

					if(message=="")
						jQuery("#portfolioform").submit();
					else
						alert(message);


				});
				jQuery(".submitdelete").click(function(){
					jQuery(this).closest("li").remove();
				});
			});
		</script>
<?php
}

function portfolio_list() {
	$portfolios = get_option("dm_portfolio_name");
	$portfolio_count = 0;
	$portfolio_slug_nr = get_option("dm_portfolio_slug");
	if(is_array($portfolios)){
		foreach ( $portfolios as $portfolio ){ 
		   echo '<li><span class="portfolio-name">Name<input class="portfolio_name" name="dm_portfolio_name[]" value="'.$portfolio.'">Slug<input class="portfolio_slug" name="dm_portfolio_slug[]" type="text" value="'.$portfolio_slug_nr[$portfolio_count++].'"></span><a style="margin-left:20px;" class="submitdelete" href="#">Delete</a></li>';
		}
	}
}?>
