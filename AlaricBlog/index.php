<?php get_header(); ?>
	<div id="main">
    <?php if (have_posts()): 
			$post_position=0;
			$post_position_first=true?>
		<?php while (have_posts()) : the_post(); ?>
        	<?php if ($post_position==0):?>
                   <div class="post-content">
           	<?php endif; ?>
            		<?php $category=get_the_category();
						if ($post_position==0)
						{
							$post_style="post-content-left";
						}
						else if ($post_position==1)
						{
							$post_style="post-content-center";
						}
						else
						{
							$post_style="post-content-right";
						}
            			switch($category[0]->cat_name):
						case "资讯":?>
               		 		<div class="<?php echo $post_style ?>" style="background:url(<?php bloginfo('template_url');?>/images/newsbg.png)">
            					<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
             					<div class="each-post-content">
									<?php echo wp_trim_words( get_the_content(),30); ?><a href="<?php the_permalink(); ?>">【阅读全文】</a>
                        		</div>
                    	   		<div class="date">
             						<?php the_date('Y年m月d'); ?>
            					</div>
                                <ul class="post-meta">
                					<li><img src="<?php bloginfo('template_url'); ?>/images/small_comment.png"><a href="<?php the_permalink(); ?>#comments"><?php comments_number('没有评论','1 条评论','% 条评论'); ?></a>
               	 					</li>
          						</ul>
            				</div>
                		<?php break; ?>
                        <?php case "随笔": ?>
                        	<div class="<?php echo $post_style ?>" style="background:url(<?php bloginfo('template_url');?>/images/momentbg.png)">
            					<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
             					<div class="each-post-content">
									<?php echo wp_trim_words( get_the_content(),30); ?><a href="<?php the_permalink(); ?>">【阅读全文】</a>
                        		</div>
                    	   		<div class="date">
             						<?php the_date('Y年m月d'); ?>
            					</div>
                                <ul class="post-meta">
                					<li><img src="<?php bloginfo('template_url'); ?>/images/small_comment.png"><a href="<?php the_permalink(); ?>#comments"><?php comments_number('没有评论','1 条评论','% 条评论'); ?></a>
               	 					</li>
          						</ul>
            				</div>
                		<?php break; ?>
                         <?php case "技术": ?>
                        	<div class="<?php echo $post_style ?>" style="background:url(<?php bloginfo('template_url');?>/images/techbg.png)">
            					<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
             					<div class="each-post-content">
									<?php echo wp_trim_words( get_the_content(),30); ?><a href="<?php the_permalink(); ?>">【阅读全文】</a>
                        		</div>
                    	   		<div class="date">
             						<?php the_date('Y年m月d'); ?>
            					</div>
                                <ul class="post-meta">
                					<li><img src="<?php bloginfo('template_url'); ?>/images/small_comment.png"><a href="<?php the_permalink(); ?>#comments"><?php comments_number('没有评论','1 条评论','% 条评论'); ?></a>
               	 					</li>
          						</ul>
            				</div>
                		<?php break; ?>
                		<?php endswitch?>
        	<?php if ($post_position==2): ?>
            	</div>
       		<?php endif; ?>
        	<?php $post_position=($post_position+1)%3; ?>
        <?php endwhile; ?>
		<div class="pagination">
        	<p class="older"><?php next_posts_link('Older posts'); ?></p>
            <p class="newer"><?php previous_posts_link('Newer posts'); ?></p>
        </div>
        <?php else : ?>
		<div class="post">
        	<h2>Nothing Found</h2>
            <p>Sorry, but you are looking for somthing that isn't here. </p>
            <p><a href="<?php echo get_option('home'); ?>"> Return to the homepage</a></p>
        </div>
        <?php endif; ?>
	</div>
<?php get_footer(); ?>