<?php get_header(); ?>
	<div id="main">
    <?php if (have_posts()): ?>
		<?php while (have_posts()) : the_post(); ?>
		<div <?php post_class(); ?>>
        	<div id="single-title"><?php the_title(); ?></div>
            <div id="single-content"><?php the_content(''); ?></div>
		</div>
        <?php comments_template(); ?>
		<?php endwhile; ?>
	<?php else: ?>
		<div class="post">
        	<h2>Nothing Found</h2>
            <p>Sorry, but you are looking for somthing that isn't here.</p>
            <p><a href="<?php echo get_option('home'); ?>">Return to the homepage</a></p>
         </div>
    <?php endif; ?>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>