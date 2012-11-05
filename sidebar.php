<div id="sidebar">
	<?php
	 	/* When we call the dynamic_sidebar() function, it'll spit out
		 * the widgets for that widget area. If it instead returns false,
		 * then the sidebar simply doesn't exist, so i hard-code in
		 * some default sidebar stuff just in case.
		 */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("sidebar") ) : ?>
		
		
		
		
		<div class="sidebar-block">
			<h4>Pages</h4>
			<div class="hline"></div>
			<ul>
				<?php wp_list_pages('title_li='); ?>
			</ul>
		</div><!-- end of sidebar-blok -->
		

		
		<div class="sidebar-block">
			<h4>Categories</h4>
			<div class="hline"></div>
			<ul>
				<?php wp_list_cats(); ?>
			</ul>
		</div><!-- end of sidebar-blok -->
		
			<div class="sidebar-block">
				<?php get_search_form(); ?>
			</div><!-- end of sidebar-block-->
	<?php endif; ?>
</div><!-- end of sidebar -->