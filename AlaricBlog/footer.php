</div>
<div id="footer">
		<div style="height:22px;"></div>
    	<div class="footer-text"><a href="<?php bloginfo('rss2_url'); ?>" class="wordpress">订阅本站</a><span class="seperation">|</span><span>&copy;2015<a href="http://alaricbg.sinaapp.com">Alaric Zeng</a></span></div>
   		<div class="footer-text"><span>本站使用<a href="http://wordpress.org" class="wordpress">wordpress</a>技术构建</span><span class="seperation">|</span><a href="#header">Back to top</a></div>
</div>
</div>
<?php wp_footer(); ?>
<?php 
	if (judge_device($_SERVER['HTTP_USER_AGENT'])=="mobile"): ?>
    	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/scriptMobile.js"></script>
<?php
	else: 
		if (judge_device($_SERVER['HTTP_USER_AGENT'])=="pad"): ?>
    		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/scriptPad.js"></script>
<?php	else: ?>
			<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
<?php	endif; ?>
<?php
 	endif; ?>
</body>
</html>