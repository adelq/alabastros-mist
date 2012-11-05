<div id="featured">
	<div class="featured-holder">
		<div id="slider">
			<?php query_posts( array( 'post_type' => 'homepage', 'slider' => 'nivo', 'showposts' => 10 ) );
			if ( have_posts() ) : while ( have_posts() ) : the_post();?>
			
			<?php if($content = $post->post_content ) { /*If the slide has a caption*/ ?>
				<?php if (has_post_thumbnail()) { ?>
					<img src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo thumb_url(); ?>&w=939&h=391&q=96&zc=1" alt="<?php the_title_attribute(); ?>" title="<?php the_content(); ?>"/>
				<?php } elseif (catch_that_image()) { ?>
					<img src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo catch_that_image() ?>&w=939&h=391&q=95&zc=1" alt="<?php the_title_attribute(); ?>" title="<?php the_content(); ?>"/>
				<?php } else { ?>
					<img src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo $preview; ?>&w=939&h=391&q=95&zc=1" alt="<?php the_title_attribute(); ?>" title="<?php the_content(); ?>"/>
				<?php } ?>
				

			 <?php	} else { ?>
				<?php if (has_post_thumbnail()) { ?>
					<img src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo thumb_url(); ?>&w=939&h=391&q=96&zc=1" alt="<?php the_title_attribute(); ?>"/>
				<?php } elseif (catch_that_image()) { ?>
					<img src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo catch_that_image() ?>&w=939&h=391&q=95&zc=1" alt="<?php the_title_attribute(); ?>"/>
				<?php } else { ?>
					<img src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo $preview; ?>&w=939&h=391&q=95&zc=1" alt="<?php the_title_attribute(); ?>"/>
				<?php } ?>

			 <?php  } /*end of if content*/?>


			<?php endwhile; endif; ?>			
		</div> <!-- end of slider -->
	</div><!-- end of featured-holder -->
</div><!-- end of featured -->