<?php get_header(); ?>
<?php
	$mobileDisplay=false;
	if (judge_device($_SERVER['HTTP_USER_AGENT'])=="mobile")
	{
		$mobileDisplay=true;
	}
?>
	<div id="main">
    <?php
		if ($mobileDisplay==false)
		{  
			$posts = query_posts($query_string . '&orderby=date&showposts=6'); 
		}
		else
		{
			$posts = query_posts($query_string . '&orderby=date&showposts=100'); 
		}
	?>
    <?php if (have_posts()): 
			$post_position=0;
			$post_position_first=true;?>
		<?php while (have_posts()) : the_post(); ?>
        	<?php if (get_the_ID()==53)
				  {
					  continue;
				  }
			?>
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
						case "资讯":
							if ($mobileDisplay==false): ?>
               		 			<a href="<?php the_permalink(); ?>"><div class="<?php echo $post_style ?>" style="background:url(<?php bloginfo('template_url');?>/images/newsbg.png)" onmouseover="moveIcon(this)" onmouseout="cancelMoveIcon(this)">
            						<span><?php the_title();?></span>
             						<div class="each-post-content">
										<?php echo wp_trim_words( get_the_content(),46); ?>
                        			</div>
                    	  	 		<div class="date">
             							<?php the_date('Y年m月d'); ?>
            						</div>
            					</div></a>
                           	<?php else: ?>
                            	<a href="<?php the_permalink(); ?>"><div class="<?php echo $post_style ?>">
            						<span><?php the_title();?></span>
             						<div class="each-post-content">
										<?php echo wp_trim_words( get_the_content(),76); ?>
                        			</div>
                    	  	 		<div class="date">
             							<?php the_date('Y年m月d'); ?>
            						</div>
            					</div></a>
                            <?php endif; ?>
                		<?php break; ?>
                        <?php case "随笔": 	
							if ($mobileDisplay==false): ?>
                        		<a href="<?php the_permalink(); ?>"><div class="<?php echo $post_style ?>" style="background:url(<?php bloginfo('template_url');?>/images/momentbg.png)" onmouseover="moveIcon(this)" onmouseout="cancelMoveIcon(this)">
            						<span><?php the_title();?></span>
             						<div class="each-post-content">
										<?php echo wp_trim_words( get_the_content(),46); ?>
                        			</div>
                    	 	  		<div class="date">
             							<?php the_date('Y年m月d'); ?>
            						</div>
            					</div></a>
                            <?php else: ?>
                            	<a href="<?php the_permalink(); ?>"><div class="<?php echo $post_style ?>">
            						<span><?php the_title();?></span>
             						<div class="each-post-content">
										<?php echo wp_trim_words( get_the_content(),76); ?>
                        			</div>
                    	 	  		<div class="date">
             							<?php the_date('Y年m月d'); ?>
            						</div>
            					</div></a>
                            <?php endif; ?>
                		<?php break; ?>
                         <?php case "技术": 
						 	if ($mobileDisplay==false):?>
                        		<a href="<?php the_permalink(); ?>"><div class="<?php echo $post_style ?>" style="background:url(<?php bloginfo('template_url');?>/images/techbg.png)" onmouseover="moveIcon(this)" onmouseout="cancelMoveIcon(this)">
            						<span><?php the_title();?></span>
             						<div class="each-post-content">
										<?php echo wp_trim_words( get_the_content(),46); ?>
                        			</div>
                    	   			<div class="date">
             							<?php the_date('Y年m月d'); ?>
            						</div>
            					</div></a>
                        	 <?php else: ?>
                             	<a href="<?php the_permalink(); ?>"><div class="<?php echo $post_style ?>">
            						<span><?php the_title();?></span>
             						<div class="each-post-content">
										<?php echo wp_trim_words( get_the_content(),76); ?>
                        			</div>
                    	   			<div class="date">
             							<?php the_date('Y年m月d'); ?>
            						</div>
            					</div></a>
                        	 <?php endif; ?>
                		<?php break; ?>
                        <?php case "相册": 
							if ($mobileDisplay==false):?>
	                        	<div class="<?php echo $post_style ?>" style="background:url(<?php bloginfo('template_url');?>/images/photobg.png)" onmouseover="moveIcon(this)" onmouseout="cancelMoveIcon(this)">
    	                        	<div class="photo-tie"></div>
        	                	 	<a class="photo-link" href="<?php the_permalink(); ?>"><img src="<?php echo catch_that_image() ?>" alt="<?php the_title(); ?>"/></a>
            	               	</div>
                        	<?php else: ?>
                            	<a href="<?php the_permalink(); ?>"><div class="<?php echo $post_style ?>">
            						<span><?php the_title();?></span>
             						<div class="each-post-content">
										<?php echo wp_trim_words( get_the_content(),76); ?>
                        			</div>
                    	   			<div class="date">
             							<?php the_date('Y年m月d'); ?>
            						</div>
            					</div></a>
                            <?php endif; ?>
                        <?php break; ?>
                		<?php endswitch?>
        	<?php if ($post_position==2): ?>
            	</div>
       		<?php endif; ?>
        	<?php $post_position=($post_position+1)%3; ?>
        <?php endwhile; ?>
        <?php else : ?>
		<div class="post">
        	<h2>Nothing Found</h2>
            <p>Sorry, but you are looking for somthing that isn't here. </p>
            <p><a href="<?php echo get_option('home'); ?>"> Return to the homepage</a></p>
        </div>
        <?php endif; ?>
	<?php if ($post_position!=0): ?>
        </div>
    <?php endif; ?>
	</div>
    <?php if ($mobileDisplay==false): ?>
    	<div class="page-navi"><?php par_pagenavi(3); ?></div>
    <?php endif; ?>
<?php get_footer(); ?>