<?php get_header(); ?>
   <div id="content-container">
	<div id="main">
    <?php if (have_posts()): ?>
		<?php while (have_posts()) : the_post(); ?>
		<div <?php post_class(); ?>>
        	<div id="category-image">
            	<?php $category=get_the_category();
            		  switch($category[0]->cat_name):
					  case "资讯": 
						$category_id=get_cat_ID('资讯');?>
                		<a href="<?php echo get_category_link($category_id); ?>">
                			<img id="news-img" src="<?php bloginfo('template_url'); ?>/images/news.png">
                    		<span id="news-span">资讯</span>
                    	</a>
                <?php break; ?>
                <?php case "技术":
						$category_id=get_cat_ID('技术');?>
                        <a href="<?php echo get_category_link($category_id); ?>">
                			<img id="tech-img" src="<?php bloginfo('template_url'); ?>/images/tech.png">
                    		<span id="tech-span">技术</span>
                    	</a>
                <?php break; ?>
                <?php case "相册":
						$category_id=get_cat_ID('相册');?>
                        <a href="<?php echo get_category_link($category_id); ?>">
                			<img id="photo-img" src="<?php bloginfo('template_url'); ?>/images/photo.png">
                    		<span id="photo-span">相册</span>
                    	</a>
                <?php break; ?>
                 <?php case "随笔":
						$category_id=get_cat_ID('随笔');?>
                        <a href="<?php echo get_category_link($category_id); ?>">
                			<img id="moment-img" src="<?php bloginfo('template_url'); ?>/images/moment.png">
                    		<span id="moment-span">随笔</span>
                    	</a>
                <?php break; ?>
                <?php endswitch?>
            </div>
            <div class="post-content">
            	<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
             	<div id="each-post-content"><?php echo wp_trim_words( get_the_content(),114); ?><a href="<?php the_permalink(); ?>">【阅读全文】</a></div>
            </div>
            <div class="date">
             	<span>发布于：</span> <?php the_date('Y年m月d'); ?>
            </div>
			<ul class="post-meta">
                <li><img src="<?php bloginfo('template_url'); ?>/images/small_comment.png"><a href="<?php the_permalink(); ?>#comments"><?php comments_number('没有评论','1 条评论','% 条评论'); ?></a></li>
                    <!-- <li class="read-more"><a href="<?php the_permalink(); ?>">Read more</a></li> -->
                </ul>
            <div class="bottom_line"></div>
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
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>