<div class="clear"></div>
</div><!-- end of wrapper -->
<div id="footer">
<div class="footer-content">
	<div class="footer-left">
			<a href="https://twitter.com/mistdetroit"><img src="/detroit/wp-content/uploads/2012/11/twitter_alt.png" alt="MIST Twitter feed"></a>
			<a href="http://www.youtube.com/user/mistdetroit"><img src="/detroit/wp-content/uploads/2012/11/youtube.png" alt="MIST Youtube Channel"></a>
			<a href="https://www.facebook.com/detroit.mist"><img src="/detroit/wp-content/uploads/2012/11/facebook_alt.png"alt="MIST Facebook Page"></a>
	</div><!-- end of footer-left -->
	
	<div class="footer-right">
		
		<!-- Footer logo -->
		<?php $footer_logo = stripslashes(get_option('al_footer_logo')); ?>
		<?php
		if($footer_logo !== ''){ ?>
			<a href="<?php bloginfo('url'); ?>"><img class="logo-footer" src="<?php echo $footer_logo; ?>" alt="<?php bloginfo('name'); ?>"/></a>
		<?php } else {?> 
			
			<a id="theme_logo_footer" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
		<?php } ?>
		
	</div><!-- end of footer-right -->
</div><!-- end of footer-content -->
</div><!-- end of footer -->
</div><!-- end of bg-light -->
<script type="text/javascript" charset="utf-8">
$('.tip').tipsy({fade: true});
</script>
<?php echo stripslashes(get_option('al_ga_code')); ?>

</body>
</html>