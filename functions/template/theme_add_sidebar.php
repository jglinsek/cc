<?php
if (isset($_POST)){	
	foreach($_POST as $key => $value) { 
	       if (is_array($value)) {  
	            foreach ($value as $value_array){
	              	$field_values[] = $value_array; 
	            }
	            update_option($key, $field_values);
	            $field_values=empty($field_values);
	       } 
	       else{
	        	update_option($key, $value); 
	       }
	}
	if($_POST['action']=='add'){	
		echo '<li><a href="#">-</a> <span>'.$_POST['new_sidebar'].'</span></li>';
	}
}
?>