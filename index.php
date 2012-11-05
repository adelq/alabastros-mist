<?php get_header(); ?>
 
<?php $slider = get_option('al_slider'); ?>
<?php if($slider == 'slider1')  {
	include( TEMPLATEPATH . '/featured/slider1.php' );
}elseif($slider == 'slider2'){
	include( TEMPLATEPATH . '/featured/slider2.php' );
	
} elseif($slider == 'slider3') {
	include( TEMPLATEPATH . '/featured/slider3.php' );
} else {
	include( TEMPLATEPATH . '/featured/slider1.php' );
}?>

<div class="shadow-sep"></div><!-- end of shadow-sep -->
  
<div id="main-content">
	<div class="four-columns">
		<?php query_posts( array( 'post_type' => 'homepage', 'tags' => 'minipost', 'showposts' => 4 ) ); 
		if ( have_posts() ) : while ( have_posts() ) : the_post();?>
		<?php $minilink = get_post_meta($post->ID, 'dbt_minilink', true);
		$al_color = get_option('al_color_scheme');
		?>

		<div class="col">
			
			<?php if($minilink !== '') { ?>
				<a href="<?php echo $minilink; ?>">
				<?php if (has_post_thumbnail()) { ?>
				<img class="col-icon" src="<?php echo thumb_url(); ?>" alt="<?php the_title(); ?>"/>
				<?php } else {} ?>
				
				</a>
				<h3><a href="<?php echo $minilink; ?>"><?php the_title(); ?></a></h3>
			<?php } else { ?>
				
				<?php if (has_post_thumbnail()) { ?>
				<img class="col-icon" src="<?php echo thumb_url(); ?>" alt="<?php the_title(); ?>"/>
				<?php } else {} ?>
				
				
				<h3><?php the_title(); ?></h3>
			<?php }?>
			<div class="hline"></div>
			<?php the_content(); ?>
		</div><!-- end of col -->
		<?php endwhile; endif; ?>
	</div><!-- end of four-columns -->	
	
	<div class="shadow-sep margin0"></div><!-- end of shadow-sep -->
	
		<div class="aboutus">
			<?php query_posts( array( 'post_type' => 'homepage', 'post_type' => 'homepage', 'tags' => 'intro', 'showposts' => 1));
			if ( have_posts() ) : while ( have_posts() ) : the_post();?>
			<h3><?php the_title(); ?></h3>
			<?php if($al_color == 'light') { ?>
				<div class="hline"></div>
			<?php } ?>
			
			<?php the_content(); ?>
			<?php endwhile; endif; ?> 
			
		</div><!-- end of aboutus -->
		
		<div class="fromtheblog">
			<?php 
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Homepage") ) : ?>
		
			<h3>From the Blog</h3>
			<?php if($al_color == 'light') { ?>
				<div class="hline"></div>
			<?php } ?>
			<ul>
				<?php query_posts('showposts=3'); ?>
				<?php while (have_posts()) : the_post(); 
				$preview = get_post_meta($post->ID, "preview", $single = true);?>
				        
				<li>
					<a href="<?php the_permalink(); ?>">
						<?php if (has_post_thumbnail()) { ?>
						<img src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo thumb_url(); ?>&w=75&h=71&q=95&zc=1" alt="<?php the_title_attribute(); ?>"/>

						<?php } elseif (catch_that_image()) { ?>
						<img src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo catch_that_image() ?>&w=75&h=71&q=95&zc=1" alt="<?php the_title_attribute(); ?>"/>
						<?php } else { ?><?php } ?>
						<?php the_title(); ?>
					</a>
					<?php wpe_excerpt('wpe_excerptlength_homelatest', 'wpe_excerptmore2'); ?> 
				</li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
		</div><!-- end of fromtheblog -->
</div><!-- end of main-content -->
<?php get_footer(); ?>