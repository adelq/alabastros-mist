<div class="clear"></div>
</div><!-- end of wrapper -->
<div id="footer">
<div class="footer-content">
	<div class="footer-left">
		<?php $copyright = stripslashes(get_option('al_footer_text')); ?>
		<?php
		if($copyright !== ''){ ?>
		<p><?php echo stripslashes(get_option('al_footer_text')); ?></p> 
		<?php } else { ?>
		<p>© <?php bloginfo('name'); ?>, inc&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;all rights reserved</p>
		<?php } ?>
    	<a class="rss" href="<?php bloginfo('rss2_url'); ?>">subscribe to our rss feed</a>
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
<script type="text/javascript"> Cufon.now(); </script>
<?php echo stripslashes(get_option('al_ga_code')); ?>

</body>
</html>