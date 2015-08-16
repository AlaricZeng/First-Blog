<?php
function advanced_comment($comment, $args, $depth) 
{
   $GLOBALS['comment'] = $comment;?>
   <div class="comment-container" id="comment-<?php comment_ID();?>">
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
        <script type="text/javascript">
			//var postURL=<?php echo get_option('siteurl'); ?>
			alert("aaa");
        </script>
		<div class="comment-reply" onclick="replyComment(<?php echo $comment->comment_post_ID;?>,<?php comment_ID();?>,postURL)">
        	回复
      	</div>
   </div>
<?php } ?>