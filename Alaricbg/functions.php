<?php
function advanced_comment($comment, $args, $depth) 
{
   $GLOBALS['comment'] = $comment; ?>
   <div class="comment-container">
        <div class="gravatar"> 
			<?php echo get_avatar($comment);?>
        </div>
        <span class="comment-author">
            <?php echo get_comment_author_link(); ?>说道：
        </span>
        <div class="comment-time">
			<?php echo get_comment_date(); ?><?php echo get_comment_time(); ?>
            <span class="edit-comment"><?php edit_comment_link('修改'); ?></span>
        </div>
        <div class="comment-content">
			<?php echo comment_text(); ?>
        </div>
		<div class="comment-reply">
        	<?php comment_reply_link(array_merge( $args, array('reply_text' => '回复','depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </div>
   </div>
<?php } ?>