<?php get_header(); ?>
<div class="shadow-sep"></div><!-- end of shadow-sep -->
	<div id="main-content">
		<div id="left-content">
			<?php the_post(); ?>
		       <?php
				$file = get_post_meta($post->ID, 'dbt_file', true);
				$title = get_post_meta($post->ID, 'dbt_title', true);
				$url = get_post_meta($post->ID, 'dbt_url', true);
				$size = get_post_meta($post->ID, 'dbt_size', true);
		      ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				 <div class="entry">
				 	<h3><?php the_title(); ?></h3>
					<div class="hline"></div>

					<?php /* The Post Thumbnail*/?>
					<?php if (has_post_thumbnail()) { ?>
					<a href="<?php the_permalink() ?>"><img class="entry_image" src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo thumb_url(); ?>&w=640&h=265&q=95&zc=1" alt="<?php the_title_attribute(); ?>"/></a>

					<?php } elseif (catch_that_image()) { ?>
						<a href="<?php the_permalink() ?>"><img class="entry_image" src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo catch_that_image() ?>&w=640&h=265&q=95&zc=1" alt="<?php the_title_attribute(); ?>"/></a>
					<?php } else { ?>
						<br />
					<?php } ?>

					<br />
					<?php the_content(); ?>
				 </div><!-- end of entry -->
				
			</div><!-- end of post -->
			
			
		</div><!-- end of left-content -->
		<?php get_sidebar(); ?>
	</div><!-- end of main-content -->
<?php get_footer(); ?>