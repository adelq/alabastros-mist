<?php
/*
Template Name: Page With Sidebar
*/
get_header(); ?>
 <div class="shadow-sep"></div><!-- end of shadow-sep -->

 <div id="main-content">
 	<div id="left-content">
 		

		<?php the_post(); ?>

		<div class="entry">
		<h2 class="entry-title"><?php the_title(); ?></h2>		
		<div class="hline"></div>
		<?php the_content(); ?>                                     
		<?php edit_post_link( __( 'Edit', 'your-theme' ), '<span class="edit-link">', '</span>' ) ?>
	               

		<?php if ( get_post_custom_values('comments') ) comments_template() // Add a custom field with Name and Value of "comments" to enable comments on this page ?>
		</div><!-- end of entry -->
 	</div><!-- end of left-content -->
	<?php get_sidebar(); ?> 
 </div><!-- end of main-content -->
<?php get_footer(); ?>