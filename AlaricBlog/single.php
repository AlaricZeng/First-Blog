<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" cibtent="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<title><?php wp_title('&laquo;',true,'right'); ?><?php bloginfo('name'); ?></title>
<?php 
	if (judge_device($_SERVER['HTTP_USER_AGENT'])=="mobile"): ?>
    	<link href="<?php bloginfo('template_url') ?>/css/android.css" rel="stylesheet" type="text/css" media="screen" />
<?php
	else: 
		if (judge_device($_SERVER['HTTP_USER_AGENT'])=="pad"): ?>
    		<link href="<?php bloginfo('template_url') ?>/css/pad.css" rel="stylesheet" type="text/css" media="screen" />
<?php	else: ?>
			<link href="<?php bloginfo('template_url') ?>/css/editor-style.css" rel="stylesheet" type="text/css" media="screen" />
<?php	endif; ?>
<?php
 	endif; ?>
<?php if (is_singular()) wp_enqueue_script('comment-reply'); ?>
<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
<?php wp_head(); ?>
</head>
<body style="background:#fff;">
	<div id="single-side">
        <ul>
        	<div id="single-cancel-show-list" onClick="unShowSingleList()"></div>
            <li><a href="<?php echo get_option('home'); ?>">主页</a></li>
           	<li><span onClick="showChildUl()" onMouseOver="childUlOver()" onMouseOut="childUlOut()">导航</span> <img id="ul-img" src='<?php bloginfo("template_url")?>/images/child_categories.png' onClick="showChildUl()" onMouseOver="childUlOver()" onMouseOut="childUlOut()"/></li>
          	<ul id="child-ul">
      	      	<li><span onClick="showChildChildUl(0)" onMouseOver="childChildUlOver(0)" onMouseOut="childChildUlOut(0)">文艺范</span> <img id="child-ul-img1" src='<?php bloginfo("template_url")?>/images/child_categories.png' onClick="showChildChildUl(0)" onMouseOver="childChildUlOver(0)" onMouseOut="childChildUlOut(0)"/></li>
               	<ul class="child-child-ul">
               		<li><a href="<?php echo get_category_link(get_cat_ID('随笔')); ?>">随笔</a></li>
         			<li><a href="<?php echo get_category_link(get_cat_ID('相册')); ?>">相册</a></li>
               	</ul>
                <li><span onClick="showChildChildUl(1)" onMouseOver="childChildUlOver(1)" onMouseOut="childChildUlOut(1)">技术宅</span> <img id="child-ul-img2" src='<?php bloginfo("template_url")?>/images/child_categories.png' onClick="showChildChildUl(1)" onMouseOver="childChildUlOver(1)" onMouseOut="childChildUlOut(1)"/></li>
                <ul class="child-child-ul">
                    <li><a href="<?php echo get_category_link(get_cat_ID('资讯')); ?>">新闻</a></li>
                    <li><a href="<?php echo get_category_link(get_cat_ID('技术')); ?>">Coding</a></li>
               	</ul>
            </ul>
            <li><a href="<?php echo get_option('home'); ?>/?p=53">关于</a></li>
            <li><a href="<?php echo get_option('home'); ?>/wp-admin/">登录</a></li>
  		</ul>
        <form id="search" method="get" action="<?php get_option('home') ?>">
        	<input type="text" class="search-bar" name="s" id="s" value="搜索..." onfocus="inputSearch()" onblur="finishSearch()"/>
            <input type="submit" id="submit-button" value="搜索">
    	</form>
	</div>
	<div id="single-header">
		<div id="header-single-content">
    		<a href="<?php echo get_option('home'); ?>"></a> 
    	</div>	
    	<div id="single-categories" src="<?php bloginfo('template_url')?>/images/single-list.png"  onClick=showSingleList(this,'<?php bloginfo("template_url") ?>')>
        	<div id="single-categories-up"></div>
            <div id="single-categories-middle"></div>
            <div id="single-categories-bottom"></div>
        </div>
	</div>
<div id="single">
	<?php if (have_posts()): ?>
		<?php while (have_posts()) : the_post(); ?>
        	<?php if (get_the_ID()==53): ?>
            	<div id="about-alaric"></div>
            <?php else: ?>
				<div <?php post_class(); ?>>
        			<div id="single-title"><?php the_title(); ?></div>
           			<div id="single-content"><?php the_content(''); ?></div>
                	<div id="single-content-ending"></div>
                	<div id="single-date">
             			<?php the_date('M月d, Y'); ?>
            		</div>
                	<div id="single-comment-line"></div>
				</div>
       			<?php comments_template(); ?>
          	<?php endif; ?>
		<?php endwhile; ?>
	<?php else: ?>
		<div class="post">
        	<h2>Nothing Found</h2>
            <p>Sorry, but you are looking for somthing that isn't here.</p>
            <p><a href="<?php echo get_option('home'); ?>">Return to the homepage</a></p>
         </div>
    <?php endif; ?>
<?php get_footer(); ?>