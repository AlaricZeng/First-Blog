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
                <span>悠闲的下午进来喝杯咖啡</span>
            	<ul id="categories">
            		<?php wp_list_categories('show_count=0&title_li=&hide_empty=0&exclude=1'); ?>
            	</ul>
            </div>	
        </div>
        <div id="content">

                