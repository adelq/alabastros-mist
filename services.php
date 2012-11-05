<?php
/*
Template Name: Services Page
*/
?>
<?php get_header(); ?>
<div class="shadow-sep"></div>
<div id="main-content">
	<div id="fullwidth">
		<div class="intro-text">
			<?php $services_tagline = stripslashes(get_option('al_services_tagline')); ?>
			
			<?php if($services_tagline !== '') { ?>
				<h3><?php echo stripslashes(get_option('al_services_tagline')); ?></h3>
			<?php } else { ?>
				<h3>Use the alabastros admin panel to create a nice tagline about the services you provide, the tagline will be placed right here.</h3>
			<?php } ?>
			
			
		</div><!-- end of intro-text -->
		
		<div class="services">
			<?php query_posts( array( 'post_type' => 'myserviceslist', 'paged' => $paged));
			if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			<div class="service-box">
				<h3><?php the_title(); ?></h3>
				<div class="hline"></div>
				
				<a href="<?php the_permalink() ?>">	
				
				<?php if (has_post_thumbnail()) { ?>
				<img src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo thumb_url(); ?>&w=283&h=113&q=95&zc=1" alt="<?php the_title_attribute(); ?>"/>
				<?php } else { ?>
					<img src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo catch_that_image() ?>&w=283&h=113&q=95&zc=1" alt="<?php the_title_attribute(); ?>"/>
				<?php } ?>
				</a>	
				<?php the_excerpt(); ?>
			</div><!-- end of service-box -->
			
			<?php endwhile; endif; ?> 
		</div><!-- end of services -->
		
		<div class="clear"></div>
		<div class="portfolio-nav">
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
		</div><!-- end of portfolio-nav -->
		<?php wp_reset_query(); ?>
		
	</div><!-- end of fullwidth -->	
</div><!-- end of main-content -->
<?php get_footer(); ?>