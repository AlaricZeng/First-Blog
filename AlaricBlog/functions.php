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
           <div class="reply-emotion-content" id="reply-emotion-content-<?php comment_ID();?>">
        	<div id="replysmilelink">
				<a onclick="javascript:replyGrin(':?:','<?php comment_ID();?>')"><img src="wp-content/themes/AlaricBlog/images/emotion/icon_question.gif" title="疑问" alt="疑问" /></a>
				<a onclick="javascript:replyGrin(':razz:','<?php comment_ID();?>')"><img src="wp-content/themes/AlaricBlog/images/emotion/icon_razz.gif" title="调皮" alt="调皮" /></a>
				<a onclick="javascript:replyGrin(':sad:','<?php comment_ID();?>')"><img src="wp-content/themes/AlaricBlog/images/emotion/icon_sad.gif" title="不开森" alt="不开森" /></a>
				<a onclick="javascript:replyGrin(':evil:','<?php comment_ID();?>')"><img src="wp-content/themes/AlaricBlog/images/emotion/icon_evil.gif" title="挖鼻" alt="挖鼻" /></a>
				<a onclick="javascript:replyGrin(':!:','<?php comment_ID();?>')"><img src="wp-content/themes/AlaricBlog/images/emotion/icon_exclaim.gif" title="吓" alt="吓" /></a>
				<a onclick="javascript:replyGrin(':smile:','<?php comment_ID();?>')"><img src="wp-content/themes/AlaricBlog/images/emotion/icon_smile.gif" title="微笑" alt="微笑" /></a>
				<a onclick="javascript:replyGrin(':oops:','<?php comment_ID();?>')"><img src="wp-content/themes/AlaricBlog/images/emotion/icon_redface.gif" title="可爱" alt="可爱" /></a>
				<a onclick="javascript:replyGrin(':grin:','<?php comment_ID();?>')"><img src="wp-content/themes/AlaricBlog/images/emotion/icon_biggrin.gif" title="坏笑" alt="坏笑" /></a>
				<a onclick="javascript:replyGrin(':eek:','<?php comment_ID();?>')"><img src="wp-content/themes/AlaricBlog/images/emotion/icon_eek.gif" title="吃惊" alt="吃惊" /></a>
				<a onclick="javascript:replyGrin(':shock:','<?php comment_ID();?>')"><img src="wp-content/themes/AlaricBlog/images/emotion/icon_surprised.gif" title="吃惊" alt="吃惊" /></a>
				<a onclick="javascript:replyGrin(':???:','<?php comment_ID();?>')"><img src="wp-content/themes/AlaricBlog/images/emotion/icon_confused.gif" title="撇嘴" alt="撇嘴" /></a>
				<a onclick="javascript:replyGrin(':cool:','<?php comment_ID();?>')"><img src="wp-content/themes/AlaricBlog/images/emotion/icon_cool.gif" title="酷" alt="酷" /></a>
				<a onclick="javascript:replyGrin(':lol:','<?php comment_ID();?>')"><img src="wp-content/themes/AlaricBlog/images/emotion/icon_lol.gif" title="偷笑" alt="偷笑" /></a>
				<a onclick="javascript:replyGrin(':mad:','<?php comment_ID();?>')"><img src="wp-content/themes/AlaricBlog/images/emotion/icon_mad.gif" title="怒骂" alt="怒骂" /></a>
				<a onclick="javascript:replyGrin(':twisted:','<?php comment_ID();?>')"><img src="wp-content/themes/AlaricBlog/images/emotion/icon_twisted.gif" title="怒" alt="怒" /></a>
				<a onclick="javascript:replyGrin(':roll:','<?php comment_ID();?>')"><img src="wp-content/themes/AlaricBlog/images/emotion/icon_rolleyes.gif" title="白眼" alt="白眼" /></a>
				<a onclick="javascript:replyGrin(':wink:','<?php comment_ID();?>')"><img src="wp-content/themes/AlaricBlog/images/emotion/icon_wink.gif" title="喝彩" alt="喝彩" /></a>
				<a onclick="javascript:replyGrin(':idea:','<?php comment_ID();?>')"><img src="wp-content/themes/AlaricBlog/images/emotion/icon_idea.gif" title="得意" alt="得意" /></a>
				<a onclick="javascript:replyGrin(':arrow:','<?php comment_ID();?>')"><img src="wp-content/themes/AlaricBlog/images/emotion/icon_arrow.gif" title="无语" alt="无语" /></a>
				<a onclick="javascript:replyGrin(':neutral:','<?php comment_ID();?>')"><img src="wp-content/themes/AlaricBlog/images/emotion/icon_neutral.gif" title="亲亲" alt="亲亲" /></a>
<a onclick="javascript:replyGrin(':cry:')"><img src="wp-content/themes/AlaricBlog/images/emotion/icon_cry.gif" title="大哭" alt="大哭" /></a>
				<a onclick="javascript:replyGrin(':mrgreen:','<?php comment_ID();?>')"><img src="wp-content/themes/AlaricBlog/images/emotion/icon_mrgreen.gif" title="咧嘴" alt="咧嘴" /></a>
			</div>
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
	$page_num = $wp_query->found_posts;
	if ($page_num % 6 ==1)
	{
		$max_page = $max_page-1;
	}
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
		if ($page_num % 6 == 1)
		{	
			$max_page = $max_page-1;
		}
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
			next_posts_link('<span id="next-page"></span>');
		}
		else
		{
			echo "<span class='current' >" . $paged . "</span>";
		}
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
<?php
add_filter('smilies_src','my_custom_smilies_src', 1, 10);
function my_custom_smilies_src($img_src, $img, $siteurl){
    return get_bloginfo('template_url').'/images/emotion/'.$img;
}
?>