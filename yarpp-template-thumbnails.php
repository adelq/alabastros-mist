<?php /*
Related Posts
*/
?>
<br />
<div class="hline"></div>

<?php if(is_page_template('single-portfolio.php')) {
} elseif (is_page_template('single-services.php')) {
} else { ?>
	<div id="related-posts">
		<h3>Related Posts</h3>
		<?php if ($related_query->have_posts()):?>
		 <ul class="related-posts-list">
		 <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>	
		 <?php
		   //Set Default Thumbnail Image URL's
		  ?>

			<li>
				<a class="tip" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
					
					<?php if (has_post_thumbnail()) { ?>
					<img src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo thumb_url(); ?>&w=80&h=83&q=80&zc=1" alt="<?php the_title_attribute(); ?>"/>
					<?php } elseif (catch_that_image()) { ?>
					<img src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo catch_that_image() ?>&w=80&h=83&q=80&zc=1" alt="<?php the_title_attribute(); ?>"/>
					<?php } else { ?>
					<img src="<?php bloginfo("template_url"); ?>/images/defaultrelated.jpg" alt=""/>
					<?php } ?>
				</a>	
			</li>
	    <?php endwhile; ?>
	   </ul>
	<?php else: ?>
		<br />
	  <h4>No related posts found</h4>
	<?php endif; ?>
	</div><!-- end of related-posts -->
	
<?php }?>
<div class="hline"></div>