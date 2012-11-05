<div id="featured-bx">
	<ul id="slides1">
		<?php query_posts( array( 'post_type' => 'homepage', 'slider' => 'bxslider', 'showposts' => 10 ) );
		if ( have_posts() ) : while ( have_posts() ) : the_post();?>
		<?php
		$textposition = get_post_meta($post->ID, 'dbt_textposition', true);
		$preview = get_post_meta($post->ID, "preview", $single = true);
		?>
		
		<li>
			<div class="<?php echo $textposition; ?>-description">
			<h2><?php the_title();?></h2>	
			
			<p><?php the_content(); ?></p>
			</div><!-- end of description -->
			<?php if($textposition == 'left') { ?>
				
				<img class="right-image" src="<?php if (has_post_thumbnail()) { echo thumb_url(); } else { echo $preview; } ?>" alt="<?php the_title_attribute(); ?>"/>
				
			<?php } else { ?>
				<img class="left-image" src="<?php if (has_post_thumbnail()) { echo thumb_url(); } else { echo $preview; } ?>" alt=""/>	
			<?php }?>
			<div class="clear"></div>
		</li>
				<?php endwhile; endif; ?>
	</ul>
</div><!-- end of featured -->