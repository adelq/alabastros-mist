<?php get_header(); ?>
  <div class="shadow-sep"></div><!-- end of shadow-sep -->
  
<div id="main-content">
	<div id="left-content"> 

  
                        
<?php the_post(); ?>                    
                        
    <h4 class="page-title"><?php _e( 'Category:') ?> <span><?php single_cat_title() ?></span></span></h4><br />
    <?php $categorydesc = category_description(); if ( !empty($categorydesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
     <?php rewind_posts(); ?>
                        
 
           <?php while ( have_posts() ) : the_post(); ?>
			
           	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>                               

				<div class="entry">
			      	<?php /* an h2 title */ ?>                                                      
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>		
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
						<a href="<?php the_permalink() ?>"><img class="entry_image" src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo thumb_url(); ?>&w=640&h=265&q=95&zc=1" alt="<?php the_title_attribute(); ?>"/></a>

						<?php } elseif (catch_that_image()) { ?>
							<a href="<?php the_permalink() ?>"><img class="entry_image" src="<?php bloginfo('template_directory'); ?>/js/timthumb.php?src=<?php echo catch_that_image() ?>&w=640&h=265&q=95&zc=1" alt="<?php the_title_attribute(); ?>"/></a>

						<?php } else { ?>
							<br />
						<?php } ?>

					  <?php /* The entry content */ ?>
			          <div class="entry_content">
			            <?php wpe_excerpt('wpe_excerptlength_blog', 'wpe_excerptmore'); ?>
						<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>
					   </div><!--END entry_content-->					   

					   <div class="postdate">
							<span class="day"><?php the_time('j') ?></span>
							<span class="month"><?php the_time('M') ?></span>
							<span class="year"><?php the_time('Y') ?></span>
						</div><!--END postdate-->				   
			      </div><!--END entry-->
			 </div><!-- #post-<?php the_ID(); ?> -->

        <?php endwhile; ?>                      

        <?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
			<?php if(function_exists('wp_pagenavi')) { // if PageNavi is activated ?>
			<?php wp_pagenavi(); // Use PageNavi ?>
			<?php } else { // Otherwise, use traditional Navigation ?>

			<div id="nav-below" class="navigation">
		    <div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'your-theme' )) ?></div>
			<div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'your-theme' )) ?></div>
			</div><!-- #nav-below -->

			<?php } // End if-else statement ?>
         <?php } ?>                                              
	</div><!-- end of left-content -->

		<?php get_sidebar(); ?> 
</div><!-- end of main-content -->
<?php get_footer(); ?>