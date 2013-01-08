<?php
/* ------------------------------------- */
/* BLOG POST COMMENTS */
/* ------------------------------------- */

function apex_comment( $comment, $args, $depth ) {

	if ( function_exists( 'get_option_tree') ) {
		$commentmoderation = __( 'Your Comment Is Awaiting Moderation.', 'apex' );
	}

	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
    <!-- Reply Start -->
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        
    	<div class="commentwrap">
        	<div class="posterpic"><?php echo get_avatar( $comment, 40 ); ?></div>
            <div class="author"><?php comment_author_link(); ?></div>
            <div class="timestamp"><?php printf( __( '%1$s', 'apex' ), get_comment_date() ); ?><?php edit_comment_link( __( '(Edit)', 'apex' ), ' ' ); ?></div><div class="clear"></div>
            <div class="postertext"><?php if ( $comment->comment_approved == '0' ) : ?><p><em><?php _e( $commentmoderation, 'apex' ); ?></em></p><?php endif; ?><?php comment_text(); ?></div><div class="clear"></div>
            <div class="replylink"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div><div class="clear"></div>
        </div>
        
	</li>
    <!-- Reply End -->
	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'apex' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'apex'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
?>