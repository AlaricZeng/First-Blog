<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php wp_title('&laquo;',true,'right'); ?><?php bloginfo('name'); ?></title>
<link href="<?php bloginfo('template_url'); ?>/css/editor-style.css" rel="stylesheet" type="text/css" media="screen">
<?php if (is_singular()) wp_enqueue_script('comment-reply'); ?>
<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
<?php wp_head(); ?>
</head>
<body>
	<div id="container">
    	<div id="header">
        	<div id="header-content">
       			<a href="<?php echo get_option('home'); ?>">Alaric的咖啡屋</a> 
            </div>	
            <div id="categories" onClick=showList(this,'<?php bloginfo("template_url") ?>') onMouseOver=chooseList(this,'<?php bloginfo("template_url") ?>/images/list-choose.png')
            onMouseOut=unChooseList(this,'<?php bloginfo("template_url") ?>/images/list.png')></div>
        </div>
        <div id="side">
        	<ul>
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
                <li><a href="<?php echo get_option('home'); ?>/?p=21">关于</a></li>
                <li><a href="<?php echo get_option('home'); ?>/wp-admin/">登录</a></li>
            </ul>
            <form id="search" method="get" action="<?php get_option('home') ?>">
        		<input type="text" class="search-bar" name="s" id="s" value="搜索..." onfocus="inputSearch()" onblur="finishSearch()"/>
                <input type="submit" id="submit-button" value="搜索">
    		</form>
        </div>
        <div id="decoration1"></div>
        <div id="decoration2"></div>
        <div id="content">
                