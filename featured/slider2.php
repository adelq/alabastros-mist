<div id="featured">
	<div class="featured-holder">
		<div class="slider">
          	<div class="wrapper">
	            <ul>
					<?php query_posts( array( 'post_type' => 'homepage', 'slider' => 'anything', 'showposts' => 10 ) );
					if ( have_posts() ) : while ( have_posts() ) : the_post();?>
					<?php
					$preview = get_post_meta($post->ID, "preview", $single = true);
					$position = get_post_meta($post->ID, 'dbt_position', true);
					$videourl = get_post_meta($post->ID, 'dbt_sliderurl', true);
					?>

					<li>
							<?php if($videourl !== '') { 
								echo $videourl;
							 } elseif (has_post_thumbnail()) { ?>
							<img src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo thumb_url(); ?>&w=939&h=391&q=96&zc=1" alt="<?php the_title_attribute(); ?>" />
							<?php } else { ?>
								<img src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo $preview; ?>&w=939&h=391&q=96&zc=1" alt="<?php the_title_attribute(); ?>" />
							<?php } ?>
							
							<? if($content = $post->post_content ) { ?>
							       <div class="caption-<?php echo $position; ?>">
								 	 <?php the_content(); ?>
								   </div><!-- end of caption -->
							<?php } else { ?>	
							<?php } ?>	
								
						</li> <!-- end slide -->

					<?php endwhile; endif; ?>
	             </ul>        
	          </div><!-- end of wrapper -->
        </div> <!-- end of slider -->
	</div><!-- end of featured-holder -->
</div><!-- end of featured -->