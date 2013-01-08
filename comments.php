<?php
/**
 * @package WordPress
 * @subpackage Apex_Theme
 */
?>

<?php
	if ( function_exists( 'get_option_tree') ) {
		/* OPTIONS HERE */
	}
	
	$namelabel = __( 'Name *', 'apex' );
	$emaillabel = __( 'Email *', 'apex' );
	$websitelabel = __( 'Website', 'apex' );
	$messagelabel = __( 'Message *', 'apex' );
	$addreply = __( 'Submit Comment', 'apex' );
	$loggedinas = __( 'You are logged in as', 'apex' ); 
	$clickhereto = __( 'Click here to', 'apex' );
	$logout = __( 'Log out', 'apex' );
?>

<?php if ( post_password_required() ) : ?>
	<p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'apex' ); ?></p>		
<?php return; endif; ?>

<?php if ( have_comments() ) : ?>
    <div id="comments" class="eleven columns row alpha">
		<h3><?php _e( 'Comments', 'apex' ); ?></h3>
        <ul><?php wp_list_comments( array( 'callback' => 'apex_comment' ) ); ?></ul>
    </div>
<?php endif;  ?>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
	<div>
		<div class="left marginbottom10"><?php previous_comments_link( __( 'Older Comments ', 'apex' ) ); ?></div>
		<div class="right marginbottom10"><?php next_comments_link( __( 'Newer Comments', 'apex' ) ); ?> </div>
	</div> 
<?php endif;  ?>

<?php if ( comments_open() ) : ?>
    <!-- Comment Form -->
    <div id="respond">
        <h3><?php comment_form_title(__( 'Leave A Reply', 'apex' ), __( 'Reply To ', 'apex' ).' %s'); ?></h3>
        <form id="commentform" method="post" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php">
            <?php if ($user_ID) : ?>
            <p><?php echo $loggedinas ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <?php echo $clickhereto ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php echo $logout ?></a>.</p>
            <?php else : ?>
            <input type="text" name="author" id="author" class="requiredfield" onFocus="if(this.value == '<?php echo $namelabel ?>') { this.value = ''; }" onBlur="if(this.value == '') { this.value = '<?php echo $namelabel ?>'; }" value="<?php echo $namelabel ?>"/>           
            <input type="text" name="email" id="email" class="requiredfield" onFocus="if(this.value == '<?php echo $emaillabel ?>') { this.value = ''; }" onBlur="if(this.value == '') { this.value = '<?php echo $emaillabel ?>'; }" value="<?php echo $emaillabel ?>"/>
            <input type="text" name="url" id="url" class="last" onFocus="if(this.value == '<?php echo $websitelabel ?>') { this.value = ''; }" onBlur="if(this.value == '') { this.value = '<?php echo $websitelabel ?>'; }" value="<?php echo $websitelabel ?>"/>
            <?php endif; ?>
            <textarea name="comment" id="comment" class="requiredfield" onFocus="if(this.value == '<?php echo $messagelabel ?>') { this.value = ''; }" onBlur="if(this.value == '') { this.value = '<?php echo $messagelabel ?>'; }"><?php echo $messagelabel ?></textarea>
			<button type="submit" name="send"><?php echo $addreply ?></button><?php comment_id_fields(); ?><?php do_action('comment_form', $post->ID); ?>
        </form>
    </div><div class="sixteen columns bottomadjust"></div><div class="clear"></div>
<?php endif; ?>