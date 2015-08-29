<?php get_header(); ?>
	<div id="main">
    <?php if (have_posts()): ?>
		<?php while (have_posts()) : the_post(); ?>
		<div <?php post_class(); ?>>
            <?php $category=get_the_category();
            	switch($category[0]->cat_name):
				case "资讯": ?>
               		 <div class="post-content">
            			<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
             			<div id="each-post-content">
							<?php echo wp_trim_words( get_the_content(),114); ?><a href="<?php the_permalink(); ?>">【阅读全文】</a>
                        </div>
            		</div>
                <?php break; ?>
                <?php endswitch?>
            </div>
            <div class="date">
             	<span>发布于：</span> <?php the_date('Y年m月d'); ?>
            </div>
			<ul class="post-meta">
                <li><img src="<?php bloginfo('template_url'); ?>/images/small_comment.png"><a href="<?php the_permalink(); ?>#comments"><?php comments_number('没有评论','1 条评论','% 条评论'); ?></a></li>
                    <!-- <li class="read-more"><a href="<?php the_permalink(); ?>">Read more</a></li> -->
                </ul>
        </div>
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