<?php
function advanced_comment($comment, $args, $depth) 
{
   $GLOBALS['comment'] = $comment; ?>
        <div class="gravatar"> <?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 48); } ?>
  </div>
        <div id="comment-author">
                    <?php printf(__('<cite class="author_name">%s</cite>'), get_comment_author_link()); ?>
        </div>
        <div id="comment-time">发表于：<?php echo get_comment_time('Y-m-d H:i'); ?></div><?php edit_comment_link('修改'); ?>
        </div>
        <div id"comment-content">
                <?php if ($comment->comment_approved == '0') : ?>
                    <em>你的评论正在审核，稍后会显示出来！</em><br />
        <?php endif; ?>
        <?php comment_text(); ?>
            </div>
		<div id="comment-reply">
        	<?php comment_reply_link(array_merge( $args, array('reply_text' => '回复','depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </div>
<?php } ?>