<?php get_header(); ?>
<div class="shadow-sep"></div><!-- end of shadow-sep -->
     
<div id="main-content">
	<div id="left-content">                        
		<?php the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>                            
		 <div class="entry">
			<?php /* an h2 title */ ?>                                                      
			<h2 class="entry-title"><?php the_title(); ?></h2>		
			<div class="hline"></div>
			<?php /* Microformatted, translatable post meta */ ?>
			<div class="postmetainfo">
		      <span class="categorylist">
			   Posted by <a class="post-author" href="<?php echo get_author_link( false, $authordata->ID, $authordata->user_nicename ); ?>" title="<?php printf( __( 'View all posts by %s', 'your-theme' ), $authordata->display_name ); ?>"><?php the_author(); ?></a> in: 
			   <?php the_category(', '); ?>
			   <?php edit_post_link( __( 'Edit', 'your-theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>							
			</span>						
			</div><!--END postmetainfo-->

			<?php /* The Post Thumbnail*/?>
			<?php if (has_post_thumbnail()) { ?>
			<img class="entry_image" src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo thumb_url(); ?>&w=640&h=265&q=95&zc=1" alt="<?php the_title_attribute(); ?>"/>
			
			<?php } elseif (catch_that_image()) { ?>
			<img class="entry_image" src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo catch_that_image() ?>&w=640&h=265&q=95&zc=1" alt="<?php the_title_attribute(); ?>"/>
				
			<?php } else { ?>
				<br />
			<?php } ?>
			
			<?php /* The entry content */ ?>
			 
			 <div class="entry_content">
			    <?php the_content(); ?>
				<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>
			 </div><!--END entry_content-->					   
			
			    <div class="postdate">
					<span class="day"><?php the_time('j') ?></span>
					<span class="month"><?php the_time('M') ?></span>
					<span class="year"><?php the_time('Y') ?></span>
				</div><!--END postdate-->
				

			<?php if(function_exists('selfserv_sexy')) { selfserv_sexy(); } ?>
				
				<?php if (function_exists('related_posts')): ?>
					<?php related_posts()?>
				<?php endif ?>
				
			   </div><!--END entry-->	
			 </div><!-- #post-<?php the_ID(); ?> -->

			

			<?php comments_template( '', true ); ?>                        
   		</div><!-- end of left-content -->
			<?php get_sidebar(); ?> 
	</div><!-- end of main-content -->
	<?php get_footer(); ?>