<?php
function advanced_comment($comment, $args, $depth) 
{
   $GLOBALS['comment'] = $comment;?>
   <div class="comment-container" id="comment-<?php comment_ID();?>">
        <div class="gravatar"> 
			<?php echo get_avatar($comment);?>
        </div>
        <span class="comment-author">
            <?php echo get_comment_author_link(); ?>
        </span>
        <div class="comment-content">
			<?php echo comment_text(); ?>
        </div>
        <div class="comment-time">
			<?php echo get_comment_date("m月d日"); ?>
            <span class="edit-comment"><?php edit_comment_link('修改'); ?></span>
        </div>
        <div class="comment-reply" onclick="replyComment(<?php echo $comment->comment_post_ID;?>,<?php echo $comment->comment_ID; ?>,'<?php echo get_option('siteurl')?>'+'/wp-comments-post.php','<?php echo comment_author(); ?>','<?php echo comment_author_email(); ?>','<?php echo comment_author_url(); ?>')">
        	<img src="<?php bloginfo('template_url') ?>/images/reply.png"/>
        	<span>回复</span>
      	</div>
   </div>
<?php } ?>
<?php
 function catch_that_image() { 
    global $post, $posts; 
    $first_img = ''; 
    ob_start(); 
    ob_end_clean(); 
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches); 
    $first_img = $matches [1] [0]; 
    if(empty($first_img)){  
        $first_img = bloginfo('template_url'). '/images/default-thumb.jpg'; 
    } 
    return $first_img; 
 } 
?>
<?php
function par_pagenavi($range = 3)
{   
	if (is_singular()) 
	{
		return;
	}  
	global $wp_query, $paged;  
	$max_page = $wp_query->max_num_pages;  
	if ($max_page == 1)
	{
		return;
	}  
	if (empty($paged)) 
	{
		$paged = 1;
	}  
    global $paged, $wp_query;    
    if (!$max_page)
	{
		$max_page = $wp_query->max_num_pages;
	}    
    if ($max_page > 1)
	{
		if (!$paged)
		{
			$paged = 1;
		}    
    	if ($paged != 1)
		{
			previous_posts_link('<span id="prev-page"></span>');
			echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'> 1 </a>";
		} 
		else
		{
			echo "<span class='current' title='跳转到首页'> 1 </span>";
		}
    	if ($max_page > $range)
		{
			if ($paged == 1)
			{
				echo "<a href='" . get_pagenum_link($paged+1) . "'>" .($paged+1) . "</a>";
				echo "<span class='dot'>...</span>";
			}
			else if ($paged == 2 )
			{
				echo "<span class='current' >" . $paged . "</span>";
			  	echo "<a href='" . get_pagenum_link($paged+1) . "'>" .($paged+1) . "</a>";
				echo "<span class='dot'>...</span>";
			}
			else if ($paged==$max_page)
			{
				echo "<span class='dot'>...</span>";
				echo "<a href='" . get_pagenum_link($paged-1) . "'>" .($paged-1) . "</a>";
			}
			else if ($paged > 2)
			{
				if (($paged-1)!=2)
				{
					echo "<span class='dot'>...</span>";
				}
				echo "<a href='" . get_pagenum_link($paged-1) ."'>" . ($paged-1) . "</a>";
				echo "<span class='current' >" . $paged . "</span>";
				if (($paged+1)!=$max_page)
				{
					echo "<a href='" . get_pagenum_link($paged+1) . "'>" .($paged+1) . "</a>";
					if (($paged+2)!=$max_page)
					{
						echo "<span class='dot'>...</span>";
					}
				}
			}
        	/*if ($paged < $range)
			{
				for($i = 2; $i < $range; $i++)
				{
					echo "<a href='" . get_pagenum_link($i) ."'";    
        			if ($i==$paged)
					{
						echo " class='current'";echo ">$i</a>";
					}
					else
					{
						echo ">$i</a>";
					}
				}
			}    
    		elseif ($paged >= ($max_page - ceil(($range/2))))
			{    
        		for($i = $max_page - $range; $i <= $max_page; $i++)
				{
					echo "<a href='" . get_pagenum_link($i) ."'";    
        			if($i==$paged)
					{
						echo " class='current'";echo ">$i</a>";
					}
				}
			}    
    		elseif ($paged >= $range && $paged < ($max_page - ceil(($range/2))))
			{    
       	 	for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++)
				{
					echo "<a href='" . get_pagenum_link($i) ."'";
					if($i==$paged) 
					{
						echo " class='current'";echo ">$i</a>";
					}
				}
			}*/
		}    
    	else
		{
			for($i = 2; $i < $max_page; $i++)
			{
				if($i==$paged)
				{
					echo "<span class='current'>$i</span>";
				}
				else
				{
					echo "<a href='" . get_pagenum_link($i) ."'";    
					echo ">$i</a>";
				}
			}
		}        
    	if($paged != $max_page)
		{
			echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'>" . $max_page . "</a>";
		}
		else
		{
			echo "<span class='current' >" . $paged . "</span>";
		}
		next_posts_link('<span id="next-page"></span>');
	}    
}
?>
<?php
function judge_device($ul)
{
	$clientkeywords = array ('nokia',
            'sony',
            'ericsson',
            'mot',
            'samsung',
            'htc',
            'sgh',
            'lg',
            'sharp',
            'sie-',
            'philips',
            'panasonic',
            'alcatel',
            'lenovo',
            'iphone',
            'ipod',
            'blackberry',
            'meizu',
            'android',
            'netfront',
            'symbian',
            'ucweb',
            'windowsce',
            'palm',
            'operamini',
            'operamobi',
            'openwave',
            'nexusone',
            'cldc',
            'midp',
            'wap',
            'mobile'); 
	if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($ul)))
    {
		if (strstr(strtolower($ul),'ipad')==true)
		{
			return "pad";
		}
		else if (strstr(strtolower($ul),'android')==true)
		{
			if (strstr(strtolower($ul),'mobile')==true)
			{
				return "mobile";
			}
			else
			{
				return "pad";
			}
		}
	}
	else
	{
		return "desktop";
	}
}
?>