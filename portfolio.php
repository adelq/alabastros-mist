<?php
/*
Template Name: Portfolio
*/
?>
<?php get_header(); ?>
<div class="shadow-sep"></div>
<div id="main-content">
<?php $hf_filter = stripslashes(get_option('al_remove_filter')); ?>

	<?php if($hf_filter == 'true') { ?>
		<div id="filter">
			<ul>
			<li>Filter by:</li>	
			<li><a class="current" href="<?php echo stripslashes(get_option('al_portfolio_url')); ?>">All</a></li>
			<?php wp_list_categories('taxonomy=categories&orderby=ID&title_li='); ?> 
			</ul>
		</div><!-- end of filter -->
		
	<?php }?>
	
	
	
	<div id="portfolio">
	<ul class="fade">
		<?php query_posts( array( 'post_type' => 'myportfoliotype', 'paged' => $paged, 'posts_per_page' => 9));
		if ( have_posts() ) : while ( have_posts() ) : the_post();?>
		<?php
		$file = get_post_meta($post->ID, 'dbt_file', true);
		$title = get_post_meta($post->ID, 'dbt_title', true);
		$url = get_post_meta($post->ID, 'dbt_url', true);
		$size = get_post_meta($post->ID, 'dbt_size', true);
		?>
		
		<li>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if($url !== '') { ?>
					<a href="<?php echo $url; ?>" rel="lightbox[set1 <?php echo $size; ?>]" title="<?php echo $title; ?>">
				<?php } else { ?>
					<a href="<?php echo thumb_url(); ?>" rel="lightbox[set1 <?php echo $size; ?>]" title="<?php echo $title; ?>">
				<?php }?>
				
				<?php if($file == 'video') { ?>
					<span class="hovervideo"></span>
				<?php } else { ?>
					<span class="hoverimage"></span>
				<?php }?>
				
				
				<?php /* The Portfolio Image*/?>
				<?php if (has_post_thumbnail()) { ?>
				<img src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo thumb_url(); ?>&w=277&h=156&q=95&zc=1" alt="<?php the_title_attribute(); ?>"/>
				<?php } elseif (catch_that_image()) { ?>
					<img src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo catch_that_image() ?>&w=277&h=156&q=95&zc=1" alt="<?php the_title_attribute(); ?>"/>
				<?php } else { ?>
					<br />
				<?php } ?></a>
				
				<div class="description">
				  <a href="<?php the_permalink(); ?>"><span class="item-title"><?php the_title(); ?></span></a><!-- This is the item title -->            
				  <?php wpe_excerpt('wpe_excerptlength_portfolio', 'wpe_excerptmore2'); ?>
				 </div><!-- end of description -->	
			</div><!-- #post-<?php the_ID(); ?> -->
		</li>
		<?php endwhile; endif; ?> 
	</ul>	
 </div><!-- end of portfolio -->	
	<div class="clear"></div>
		<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
			<?php if(function_exists('wp_pagenavi')) { // if PageNavi is activated ?>
			<div class="portfolio-nav">
			<?php wp_pagenavi(); // Use PageNavi ?>
			</div><!-- end of portfolio-nav -->
			<?php } else { // Otherwise, use traditional Navigation ?>
			<div id="nav-below" class="navigation">
		    <div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older projects', 'your-theme' )) ?></div>
			<div class="nav-next"><?php previous_posts_link(__( 'Newer projects <span class="meta-nav">&raquo;</span>', 'your-theme' )) ?></div>
			</div><!-- #nav-below -->
			<?php } // End if-else statement ?>	
		<?php } ?>
	<?php wp_reset_query(); ?>
</div><!-- end of main-content -->
<?php get_footer(); ?>