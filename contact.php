<?php
/* 
Template Name: Contact
*/ 
?>
    
<?php get_header(); ?>

<?php
	if ( function_exists( 'get_option_tree') ) {
		/* GOOGLE MAPS */
		$gmapsactive = get_option_tree( 'value_gmapsactive'); 
		$gmapslat = get_option_tree( 'value_gmapslat');
		if($gmapslat=="" || $gmapslat=="0"){$gmapslat = "0.0";}
		$gmapslong = get_option_tree( 'value_gmapslong');
		if($gmapslong=="" || $gmapslong=="0"){$gmapslong = "0.0";}
		$gmapszoomdefault = get_option_tree( 'value_gmapsdefaultzoom');
		if($gmapszoomdefault==""){$gmapszoomdefault = "14";}
		$gmapszoomclick = get_option_tree( 'value_gmapsclickzoom');
		if($gmapszoomclick==""){$gmapszoomclick = "17";}
		$gmapstitle = get_option_tree( 'value_gmapslocation');
		if($gmapstitle==""){$gmapstitle = "Our Office Location";}
	}
	
	$pagecustoms = getOptions();
	
	if (isset($pagecustoms["header_title"])){$apex_htitle = $pagecustoms['header_title'];}else{$apex_htitle = "";}
	if (isset($pagecustoms["sidebar_orientation"])){$apex_sideo = $pagecustoms['sidebar_orientation'];}else{$apex_sideo = 1;}
	if ($apex_sideo == 0){$conorient = "right"; $sideoffset = ""; $conoffset = "offset-by-one";}else{$conorient = "left"; $sideoffset = "offset-by-one"; $conoffset = "";}
	if (isset($pagecustoms["sidebar"])){$apex_sidebar = $pagecustoms["sidebar"];}else{$apex_sidebar = "Page Sidebar";}
	
	$contact_labelname = __('Name *', 'apex');
	$contact_labelemail = __('Email *', 'apex');
	$contact_labeladdress = __('Address', 'apex');
	$contact_labelphone = __('Phone', 'apex');
	$contact_labelmessage = __('Message *', 'apex');
	$contact_buttonsubmit = __('Send Message', 'apex');
	$contact_messageerror = __('Error! Please correct marked fields.', 'apex');
	$contact_messagesuccess = __('Message send successfully!', 'apex');
	$contact_messagesending = __('Sending...', 'apex');
?>

<!-- Page Title
================================================== -->

<div class="sixteen columns row divide notop">
    <h3 class="titledivider"><?php echo $apex_htitle ?></h3>
    <div class="dividerline"></div>
</div>

<!-- Content Holder -->
<div class="eleven columns <?php echo $conoffset ?> row content <?php echo $conorient ?>">

	<?php if ($gmapsactive=="Yes"){ ?><div class="eleven columns row alpha"><div id="googlemap"></div></div><?php } ?>
    
    <div class="eleven columns row content alpha">
	<?php if(have_posts()) : while(have_posts()) : the_post(); the_content(); endwhile; endif; ?><div class="clear"></div>
    </div>
    
    <!-- Comment Form -->  
    <div id="contactus">
        <form id="contactform" method="post" action="#">
            <input type="text" name="name" id="reply_name" class="requiredfield" onFocus="if(this.value == '<?php echo $contact_labelname ?>') { this.value = ''; }" onBlur="if(this.value == '') { this.value = '<?php echo $contact_labelname ?>'; }" value="<?php echo $contact_labelname ?>"/>
            <input type="text" name="email" id="reply_email" class="requiredfield last" onFocus="if(this.value == '<?php echo $contact_labelemail ?>') { this.value = ''; }" onBlur="if(this.value == '') { this.value = '<?php echo $contact_labelemail ?>'; }" value="<?php echo $contact_labelemail ?>"/>
            <input type="text" name="address" id="reply_address" class="" onFocus="if(this.value == '<?php echo $contact_labeladdress ?>') { this.value = ''; }" onBlur="if(this.value == '') { this.value = '<?php echo $contact_labeladdress ?>'; }" value="<?php echo $contact_labeladdress ?>"/>
            <input type="text" name="phone" id="reply_phone" class="last" onFocus="if(this.value == '<?php echo $contact_labelphone ?>') { this.value = ''; }" onBlur="if(this.value == '') { this.value = '<?php echo $contact_labelphone ?>'; }" value="<?php echo $contact_labelphone ?>"/>
            <textarea name="message" id="reply_message" class="requiredfield" onFocus="if(this.value == '<?php echo $contact_labelmessage ?>') { this.value = ''; }" onBlur="if(this.value == '') { this.value = '<?php echo $contact_labelmessage ?>'; }"><?php echo $contact_labelmessage ?></textarea>
            <button type="submit" name="send"><?php echo $contact_buttonsubmit ?></button>
            <span class="errormessage"><?php echo $contact_messageerror ?></span>
            <span class="successmessage"><?php echo $contact_messagesuccess ?></span>
            <span class="sendingmessage"><?php echo $contact_messagesending ?></span>  
        </form>
    </div>

    <div class="clear"></div>
</div>

<!-- Sidebar
================================================== -->

<div class="four columns sidebar <?php echo $sideoffset ?> content">

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($apex_sidebar) ) : ?>
    
        <div class="widget">
            <h5>Sidebar Widget Area</h5>
            <div>
            Please configure this Widget Area in the Admin Panel under Appearance -> Widgets
            </div>
            <div class="clear"></div>
        </div>
    
    <?php endif; ?>

<div class="clear"></div>
</div>

<!-- Space Adjuster
================================================== -->

<div class="sixteen columns bottomadjust"></div>

<?php if ($gmapsactive=="Yes"){ ?>
    <script type="text/javascript">		
		function initGoogleMaps() {
			/* Google Maps Init */
			var myLatlng = new google.maps.LatLng(<?php echo $gmapslat ?>, <?php echo $gmapslong ?>);
			var myOptions = {
				zoom: <?php echo $gmapszoomdefault ?>,
				center: myLatlng,
				popup: true,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			var map = new google.maps.Map(document.getElementById("googlemap"), myOptions);
			
			var marker = new google.maps.Marker({
				position: myLatlng, 
				map: map,
				title: "<?php echo $gmapstitle ?>"
			});
			google.maps.event.addListener(marker, 'click', function() {
				map.setZoom(<?php echo $gmapszoomclick ?>);
			});
		}
    </script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&callback=initGoogleMaps"></script>
<?php } ?>

<?php get_footer(); ?>