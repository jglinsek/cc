<?php



/* ------------------------------------- */
/* Apex CUSTOM CATEGORIES WIDGET */
/* ------------------------------------- */



class ApexCategories extends WP_Widget
{
  function ApexCategories()
  {
    $widget_ops = array('classname' => 'ApexCategories', 'description' => 'Displays a list of Blog Categories' );
    $this->WP_Widget('ApexCategories', 'Apex Categories', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php if( isset($instance['title']) ) echo $instance['title']; ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
	echo '<div><ul>';
	$cats = get_categories();
	foreach ($cats as $cat) {
		$my_query = new WP_Query('category_name='.$cat->name.'&posts_per_page=1'); 
 		while ($my_query->have_posts()) : $my_query->the_post();
      		 $blogimageurl = wp_get_attachment_url( get_post_thumbnail_id() ); 
        endwhile; 
		echo '<li><a href="'.get_category_link( $cat->term_id ).'">'.$cat->name.' ('.$cat->count.')</a></li>';
	}
    echo '</ul></div>';
 
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("ApexCategories");') );



/* ------------------------------------- */
/* Apex CUSTOM ARCHIVES WIDGET */
/* ------------------------------------- */



class ApexArchives extends WP_Widget
{
  function ApexArchives()
  {
    $widget_ops = array('classname' => 'ApexArchives', 'description' => 'Displays the Blog Archives' );
    $this->WP_Widget('ApexArchives', 'Apex Archives', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php if( isset($instance['title']) ) echo $instance['title']; ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
    echo $before_title . $title . $after_title;;

	echo '<div><ul>';
	wp_get_archives(apply_filters('widget_archives_dropdown_args', array('type' => 'monthly', 'format' => 'html', 'before' => '')));
    echo '</ul></div>';
 
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("ApexArchives");') );



/* ------------------------------------- */
/* Apex LATEST PROJECTS WIDGET */
/* ------------------------------------- */



class ApexLatestProjects extends WP_Widget {

	function ApexLatestProjects() {
		$widget_ops = array('classname' => 'ApexLatestProjects', 'description' => 'A widget to display links to the latest projects.');
    	$this->WP_Widget('ApexLatestProjects', 'Apex Latest Projects', $widget_ops);
	}
	
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance ); 
		$portfolio_category = "";
		?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if( isset($instance['title']) ) echo $instance['title']; ?>" /></p>
        
        <p><label for="<?php echo $this->get_field_id( 'projectcount' ); ?>">Number of Projects to show:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'projectcount' ); ?>" name="<?php echo $this->get_field_name( 'projectcount' ); ?>" value="<?php if( isset($instance['projectcount']) ) echo $instance['projectcount']; ?>" /></p> 
		
        <p>
		<?php 
                $portfolio_slugs = get_option("dm_portfolio_slug");
                $portfolio_counter = 0;
                $portfolio_name = get_option("dm_portfolio_name");
                $portfolio_list = "";
                foreach ( $portfolio_slugs as $slug ){
                    $checked="";
                    if($slug==$instance['portfolio_category']) $checked="selected";
                    $portfolio_list .= "<option value='$slug' $checked >".$portfolio_name[$portfolio_counter++]."</option>";
                }
        
        echo '<select name="'.$this->get_field_name( 'portfolio_category' ).'" class="widefat" im >'.$portfolio_list.'
        </select></p>';
    }

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		if ( isset($instance['id']) ) $id = $instance['id'];
		$projectcount = $instance['projectcount'];
		$portfolio_category = $instance['portfolio_category'];

		echo $before_widget;
		
	   	if ( $title ) echo $before_title . $title . $after_title;
		
		$pcat = "category_".$portfolio_category;
		$args=array(
			'post_type' => $portfolio_category,
			'posts_per_page' => $projectcount
		);
		global $wp_query;
		$temp = $wp_query; 
		$wp_query = null;
		$wp_query = new WP_Query();
		$wp_query->query($args);
		$terms = get_terms($pcat);
		
		echo '<div class="widget_portfolio"><ul>';
		if ($wp_query->have_posts()) :
		while ( $wp_query->have_posts() ) : $wp_query->the_post();
			global $post;
			$imagelink = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
			$itemlink = get_permalink($post->ID);
			echo '<li class="clearfix"><a href="'.$itemlink.'" class="borderhover"><img src="'.get_template_directory_uri().'/functions/thumb.php?src='.$imagelink.'&amp;h=50&amp;w=50&amp;zc=1" alt="" /></a></li>';
		endwhile; 
		endif;
		$wp_query = null; 
		$wp_query = $temp;
		wp_reset_query();
		echo '</ul></div>';
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['projectcount'] = $new_instance['projectcount'];
		$instance['portfolio_category'] = $new_instance['portfolio_category'];
		return $instance;
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("ApexLatestProjects");') );



/* ------------------------------------- */
/* Apex TWITTER FEED WIDGET */
/* ------------------------------------- */



class ApexTwitterfeed extends WP_Widget {

	function ApexTwitterfeed() {
		$widget_ops = array('classname' => 'ApexTwitterfeed', 'description' => 'Twitter Feed Widget (Please configure under appearance -> theme options)');
    	$this->WP_Widget('ApexTwitterfeed', 'Apex Twitter Feed', $widget_ops);
	}
	
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance ); ?>
        
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if( isset($instance['title']) ) echo $instance['title']; ?>" /></p>
        
	<?php
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		if ( isset($instance['id']) ) $id = $instance['id'];

		echo $before_widget;
		
	   	if ( $title ) echo $before_title . $title . $after_title;
		echo '<div class="widget_tweets"><ul></ul></div>';
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		return $instance;
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("ApexTwitterfeed");') );



/* ------------------------------------- */
/* Apex Quickcontact WIDGET */
/* ------------------------------------- */



class ApexQuickcontact extends WP_Widget {

	function ApexQuickcontact() {
		$widget_ops = array('classname' => 'ApexQuickcontact', 'description' => 'Quickcontact Widget (Please configure under appearance -> theme options)');
    	$this->WP_Widget('ApexQuickcontact', 'Apex Quickcontact Form', $widget_ops);
	}
	
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance ); ?>
        
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if( isset($instance['title']) ) echo $instance['title']; ?>" /></p>
  
	<?php
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		if ( isset($instance['id']) ) $id = $instance['id'];
		$labelname = __('Name *', 'apex');
		$labelemail = __('Email *', 'apex');
		$labelmessage = __('Message *', 'apex');
		$buttonsubmit = __('Send', 'apex');
		$messageerror = __('Error! Please correct marked fields.', 'apex');
		$messagesuccess = __('Message send successfully!', 'apex');
		$messagesending = __('Sending...', 'apex');

		echo $before_widget;
		
	   	if ( $title ) echo $before_title . $title . $after_title;
		echo '<div><form id="quickcontact" method="post" action="#">
				<input type="text" name="name" id="quickcontact_name" class="requiredfield" onFocus="if(this.value == \''.$labelname.'\') { this.value = \'\'; }" onBlur="if(this.value == \'\') { this.value = \''.$labelname.'\'; }" value=\''.$labelname.'\'/>
				<input type="text" name="email" id="quickcontact_email" class="requiredfield" onFocus="if(this.value == \''.$labelemail.'\') { this.value = \'\'; }" onBlur="if(this.value == \'\') { this.value = \''.$labelemail.'\'; }" value=\''.$labelemail.'\'/>
				<textarea name="message" id="quickcontact_message" class="requiredfield" onFocus="if(this.value == \''.$labelmessage.'\') { this.value = \'\'; }" onBlur="if(this.value == \'\') { this.value = \''.$labelmessage.'\'; }">'.$labelmessage.'</textarea>
				<button type="submit" name="send">'.$buttonsubmit.'</button>
				<span class="errormessage">'.$messageerror.'</span>
				<span class="successmessage">'.$messagesuccess.'</span>
				<span class="sendingmessage">'.$messagesending.'</span>      
			</form></div>';
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		return $instance;
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("ApexQuickcontact");') );



/* ------------------------------------- */
/* Apex POSTS WIDGET */
/* ------------------------------------- */



class ApexPosts extends WP_Widget {

	function ApexPosts() {
		$widget_ops = array('classname' => 'ApexPosts', 'description' => 'A popular/latest posts widget.');
    	$this->WP_Widget('ApexPosts', 'Apex Popular/Latest Posts', $widget_ops);
	}
	
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance ); ?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if( isset($instance['title']) ) echo $instance['title']; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id( 'postcount' ); ?>">Post Count:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php if( isset($instance['postcount']) ) echo $instance['postcount']; ?>" /></p>
        
        <p><label for="<?php echo $this->get_field_id( 'poplatest' ); ?>">1 for Latest Posts, or 2 Popular Posts:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'poplatest' ); ?>" name="<?php echo $this->get_field_name( 'poplatest' ); ?>" value="<?php if( isset($instance['poplatest']) ) echo $instance['poplatest']; ?>" /></p>
        
        <p><label for="<?php echo $this->get_field_id( 'posttype' ); ?>">Show this Post Type:</label><br /><input class="widefat" id="<?php echo $this->get_field_id( 'posttype' ); ?>" name="<?php echo $this->get_field_name( 'posttype' ); ?>" value="<?php if( isset($instance['posttype']) ) echo $instance['posttype']; ?>" /></p>
        
	<?php
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		if ( isset($instance['id']) ) $id = $instance['id'];
		$pcount = $instance['postcount'];
		$platest = $instance['poplatest'];
		$ptype = $instance['posttype'];
		
		echo $before_widget;
		
	   	if ( $title ) echo $before_title . $title . $after_title;
		
		if($ptype==""){
			$ptype = 'post';
		}
		if($platest==1){
			$popargs = array( 'numberposts' => $pcount, 'orderby' => 'post_date', 'post_type' => $ptype );
		}else{
			$popargs = array( 'numberposts' => $pcount, 'orderby' => 'comment_count', 'post_type' => $ptype );
		}
		$poplist = get_posts( $popargs );
		
		echo '<div class="widget_blogposts"><ul>';
			foreach ($poplist as $poppost) :  setup_postdata($poppost);
            echo '<li>';
				$category = get_the_category($poppost->ID);
				$first_category = $category[0]->cat_name;
				$repl = strtolower((preg_replace('/\s+/', '-', $first_category)));
				$base = home_url();
                
                $blogimageurl = wp_get_attachment_url( get_post_thumbnail_id($poppost->ID) ); 
                if ($blogimageurl != "") {
					echo '<a href="'.$base.'/'.$repl.'/'.$poppost->post_name.'" data-rel="fadeimg" title="'.$poppost->post_title.'" class="borderhover">';
                	echo '<img src="'.get_template_directory_uri().'/functions/thumb.php?src='.$blogimageurl.'&amp;h=40&amp;w=40&amp;zc=1" alt=""/></a>';
				}
				echo '<div class="postlink"><a href="'.$base.'/'.$repl.'/'.$poppost->post_name.'" data-rel="fadeimg" title="'.$poppost->post_title.'" class="borderhover">'.$poppost->post_title.'</a></div><div class="subline">'.date_i18n(get_option('date_format'), strtotime($poppost->post_date_gmt)).'</div></li>'; 
            endforeach;

		echo '</ul></div>';
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['postcount'] = $new_instance['postcount'];
		$instance['poplatest'] = $new_instance['poplatest'];
		$instance['posttype'] = $new_instance['posttype'];
		return $instance;
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("ApexPosts");') );

?>