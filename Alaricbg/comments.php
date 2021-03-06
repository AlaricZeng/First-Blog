<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php'==basename($_SERVER['SCRIPT_FILENAME']));
	if (post_password_required()) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
    <?php
		return;
	}
?>
			<div id="comments">
            	<div id="comments-number"><?php comments_number('没有评论','1 条评论','% 条评论' );?></div>
            	<?php if (have_comments()): ?>
            		<div class="commentlist">
                    	<?php wp_list_comments('type=comment&callback=advanced_comment'); ?>
                    </div>
            		<?php if ($wp_query->max_num_pages > 1) : ?>
						<div class="pagination">
            				<ul>
                				<li class="older"><?php previous_comments_link('Older') ?></li>
                    			<li class="newer"><?php next_comments_link('Newer') ?></li>
                			</ul>
            			</div>
           			<?php endif; ?>
				<?php endif; ?>
				<?php if (comments_open()): ?>
					<div id="respond">
            	 		<div id="respond-title">发表评论</div>
                 		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" onsubmit="return submitComment();">
                 			<div class="input-content">
                    			<label for="author">用户名*:</label>
                        		<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" onfocus="inputComment('author')" 
                        	 	onblur="finishCommentItem('author')" />
                        		<span id="warning-author">请输入用户名</span>
                    		</div>
                    		<div class="input-content">
                        		<label for="email">电子邮件*:</label>
                        		<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" onfocus="inputComment('email')" onblur="finishCommentItem('email')"/>
                        		<span id="warning-email">请输入电子邮件</span>
                    		</div>
                    		<div class="input-content">
                        		<label for="url">站点:</label>
                       		 	<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" onfocus="inputComment('url')" onblur="finishCommentItem('url')"/>
                    		</div>
                    		<div class="input-content">
                        		<label for="comment">评论:</label>
                        		<textarea name="comment" id="comment" rows="" cols="" onfocus="inputComment('comment')" onblur="finishCommentItem('comment')"></textarea>
                    		</div>
                        	<input  class="submit" type="submit" class="commentsubmit" value="" />
                            <?php comment_id_fields(); ?>
                        	<?php do_action('comment_form',$post->ID); ?>
      	 				</form>
                		<p class="cancel"><?php cancel_comment_reply_link('Cancel Reply'); ?></p>
					</div>
           		<?php else: ?>
            		<h3>Comments are now closed.</h3>
            	<?php endif; ?>
        	</div>
            