<?php
/*
Template Name: Fullwidth Page
*/
get_header(); ?>
 <div class="shadow-sep"></div><!-- end of shadow-sep -->

 <div id="main-content">
	<div id="fullwidth">
		<?php the_post(); ?>
		<?php $tagline = get_post_meta($post->ID, "tagline", $single = true); ?>
		
		<?php if($tagline) : ?>
			<div class="intro-text">
				<h3><?php echo $tagline;?></h3>
			</div><!-- end of intro-text -->
		<?php endif; ?>
		
		<div class="main-text">	
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php the_content(); ?>                                     
			<?php edit_post_link( __( 'Edit', 'your-theme' ), '<span class="edit-link">', '</span>' ) ?>
			</div><!-- #post-<?php the_ID(); ?> -->
			
			<?php if ( get_post_custom_values('comments') ) comments_template() // Add a custom field with Name and Value of "comments" to enable comments on this page ?>
		</div><!-- end of main-text -->
		
	</div><!-- end of fullwidth -->
 </div><!-- end of main-content -->
<?php get_footer(); ?>