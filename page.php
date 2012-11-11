<?php
/*
Template Name: Page With Sidebar
*/
get_header(); ?>

 <div id="main-content">
 	<div id="left-content">
 		
		<?php the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<?php the_content(); ?>                                     
		<?php edit_post_link( __( 'Edit', 'your-theme' ), '<span class="edit-link">', '</span>' ) ?>
		</div><!-- #post-<?php the_ID(); ?> -->                 

		<?php if ( get_post_custom_values('comments') ) comments_template() // Add a custom field with Name and Value of "comments" to enable comments on this page ?>
 	</div><!-- end of left-content -->
	<?php get_sidebar(); ?> 
 </div><!-- end of main-content -->
<?php get_footer(); ?>