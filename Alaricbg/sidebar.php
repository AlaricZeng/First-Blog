<div id="side">
	<form id="search" method="get" action="<?php get_option('home') ?>">
        <input type="text" class="search-bar" name="s" id="s" value="点些喜欢的东西吧" onfocus="inputSearch()" onblur="finishSearch()"/>
    </form>
    <img src="<?php bloginfo('template_url');?>/images/small_news.png">
    <span>近期文章</span>
    <div id="recent-page">
    	<?php if (have_posts()): ?>
			<?php while (have_posts()) : the_post(); ?>
				<div <?php post_class(); ?>>
    				<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
                </div>
     		<?php endwhile; ?>
     	<?php else : ?>
			<div class="post">
        		<h2>Nothing Found</h2>
            	<p>Sorry, but you are looking for somthing that isn't here. </p>
            	<p><a href="<?php echo get_option('home'); ?>"> Return to the homepage</a></p>
        	</div>
    	<?php endif; ?>
    </div>
    <img src="<?php bloginfo('template_url');?>/images/big_comment.png">
    <span>近期评论</span>
    <div id="recent-comment">
			<?php $comments=get_comments(array('number'=>5,'status'=>'approve','type'=>'comment'));
			foreach($comments as $comment) { 
				$comment_content = strip_tags($comment->comment_content); ?>
            	<a id="author-link" href="<?php echo $comment->comment_author_url ?>"><?php echo $comment->comment_author; ?></a>
            	<span>发表在</span>
				<a id="page-link" href="<?php the_permalink(); ?>">《<?php echo get_the_title(); ?>》</a></span>
                <div style="height:28px;"></div>
			<?php }?>
    </div>
</div>