<?php
/*
Template Name: Portfolio 2
*/
?>
<?php get_header(); ?>
<div class="shadow-sep"></div>
<div id="main-content">

<div id="portfolio-2">
	<?php query_posts( array( 'post_type' => 'myportfoliotype', 'paged' => $paged, 'posts_per_page' => 5));
	if ( have_posts() ) : while ( have_posts() ) : the_post();?>
	<?php
	$btn_color = get_post_meta($post->ID, 'dbt_btn_color', true);
	$visit_text = get_post_meta($post->ID, 'dbt_visit_button_text', true);
	$project_url = get_post_meta($post->ID, 'dbt_project_url_portfolio', true);
	?>
	
	<div class="project">
		
		
		<div class="project-preview">
		
		
		<?php /* The Portfolio Image*/?>
		<?php if (has_post_thumbnail()) { ?>
		<img src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo thumb_url(); ?>&w=615&h=301&q=95&zc=1" alt="<?php the_title_attribute(); ?>"/>
		<?php } elseif (catch_that_image()) { ?>
		<img src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo catch_that_image() ?>&w=615&h=301&q=95&zc=1" alt="<?php the_title_attribute(); ?>"/>
		<?php } else { ?>
		<?php } ?>
		
		</div><!-- end of project-preview -->
		
		
		<div class="project-description">
			<h3><?php the_title(); ?></h3>
			<div class="hline"></div>
			
			<div class="specifications-portfolio2">
				<?php
				echo '<ul>';
				$terms_of_post = get_the_term_list( $post->ID, 'specifics', '<li>','<li>', '</li>', '' );
				echo $terms_of_post;
				echo '</ul>';
				?>
			</div><!-- end of specifications -->
			<div class="clear"></div>
			
			<?php the_content(); ?>
			
			<?php if($project_url) : ?>
				<a class="btnlink <?php echo $btn_color; ?>" href="<?php echo $project_url; ?>"><?php if ($visit_text !== '') { echo $visit_text; } else { echo "Visit Website"; } ?> </a>
			<?php endif; ?>
			
		</div><!-- end of project-description -->
		
		<div class="hline"></div>
	</div><!-- end of project -->
		
  <?php endwhile; endif; ?> 	
</div><!-- end of portfolio-2 -->

<div class="portfolio-nav">
	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
</div><!-- end of portfolio-nav -->
<?php wp_reset_query(); ?>
</div><!-- end of main-content -->
<?php get_footer(); ?>