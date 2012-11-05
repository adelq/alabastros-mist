<?php get_header(); ?>
  <div class="shadow-sep"></div><!-- end of shadow-sep -->      
    <div id="main-content">
		<div id="left-content">
			<?php
		    if(isset($_GET['author_name'])) :
		        $curauth = get_userdatabylogin($author_name);
		    else :
		        $curauth = get_userdata(intval($author));
		    endif;
		    ?>
			<div class="user-author">
				<div class="user-image">
					<?php echo get_avatar($curauth->user_email, '96', $avatar); ?>
				</div><!-- end of user-image -->
				
				<div class="user-profile">
					<h4>About: <?php echo $curauth->nickname; ?></h4>
					<ul>
						<li><strong>Website:</strong><a href="<?php echo $curauth->user_url; ?>"> <?php echo $curauth->user_url; ?></a></li>
					</ul>
					<p><?php echo $curauth->user_description; ?></p>
				</div><!-- end of user-profile -->
			</div><!-- end of user-author -->
			
			
			
			<div class="hline"></div>
			
			
			<br />
		    <h3>Posts by <?php echo $curauth->nickname; ?>:</h3>
			<br />
		    <ul>

		    <!-- The Loop -->

		    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
				<div class="entry">
					<h4><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
					<p class="dateandtags"><?php the_time('d M Y'); ?> in <?php the_category(' &amp; ');?></p>		
					<div class="hline"></div>
					
					<div class="entry_content">
			            <?php wpe_excerpt('wpe_excerptlength_blog', 'wpe_excerptmore'); ?>
						<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>
					   </div><!--END entry_content-->
					
				</div><!-- end of entry -->
			</div><!-- #post-<?php the_ID(); ?> -->
			

		    <?php endwhile; else: ?>
		        <p><?php _e('No posts by this author.'); ?></p>

		    <?php endif; ?>
		    <!-- End Loop -->

		    </ul>

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