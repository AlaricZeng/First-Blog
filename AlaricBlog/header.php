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
<body>
	<div id="container">
    	<div id="header">
        	<div id="header-content">
       			<a href="<?php echo get_option('home'); ?>">Alaric的咖啡屋</a> 
            </div>	
            <div id="categories" onClick=showList(this,'<?php bloginfo("template_url") ?>') onMouseOver=chooseList(this,'<?php bloginfo("template_url") ?>/images/list-choose.png')
            onMouseOut=unChooseList(this,'<?php bloginfo("template_url") ?>/images/list.png')>
            	<div id="categories-up"></div>
                <div id="categories-middle"></div>
                <div id="categories-bottom"></div>
            </div>
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
                <li><a href="<?php echo get_option('home'); ?>/?p=53">关于</a></li>
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
                