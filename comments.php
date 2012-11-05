<div id="comments">
	<?php if (!empty($post->post_password) && $_COOKIE['wp-postpass_'.COOKIEHASH]!=$post->post_password) : ?> 
	    <p id="comments-locked">Enter your password to view comments.</p> 
	<?php return; endif; ?> 



	<?php if ($comments) : ?> 

	<?php  
	    /* Count the totals */ 
	    $numPingBacks = 0; 
	    $numComments  = 0; 

	    /* Loop throught comments to count these totals */ 
	    foreach ($comments as $comment) { 
	        if (get_comment_type() != "comment") { $numPingBacks++;} 
	        else { $numComments++; } 
	    } 

	    /* Used to stripe comments */ 
	    $thiscomment = 'odd';  
	?> 

	<?php 

	    /* This is a loop for printing pingbacks/trackbacks if there are any */ 
	    if ($numPingBacks != 0) : ?> 

	    <h3 class="comments-header"><?php _e($numPingBacks); ?> Trackbacks/Pingbacks</h3> 
	    <ol id="trackbacks"> 

	<?php foreach ($comments as $comment) : ?> 
	<?php if (get_comment_type()!="comment") : ?> 

	    <li id="comment-<?php comment_ID() ?>" class="<?php _e($thiscomment); ?>"> 
	    <?php comment_type(__('Comment'), __('Trackback'), __('Pingback')); ?>:  
	    <?php comment_author_link(); ?> on <?php comment_date(); ?> 
	    </li> 

	    <?php if('odd'==$thiscomment) { $thiscomment = 'even'; } else { $thiscomment = 'odd'; } ?> 

	<?php endif; endforeach; ?> 

	    </ol> 

	<?php endif; ?> 

	<?php  

	    /* This is a loop for printing comments */ 
	    if ($numComments != 0) : ?> 

	    <h3 class="comments-header"><?php _e($numComments); ?> Comments for "<?php the_title(); ?>"</h3> 

	    <ol id="commentlist"> 

		    <?php foreach ($comments as $comment) : ?> 
		    <?php if (get_comment_type()=="comment") : ?> 

		        <li class="<?php echo $oddcomment; ?>
				<?php if ($comment->user_id === $post->post_author) { echo 'author_comment'; } ?>"
				id="comment-<?php comment_ID() ?>">
		
		
		            <div class="author"> 
						<?php /* If you want to use gravatars, they go somewhere around here */ ?> 
					    <?php echo get_avatar( $comment, 80 ); ?>
		                <span class="comment-author">
						<?php comment_author_link( $comment_ID ); ?>
						</span>    
		            </div> <!-- end of author -->
		
		            <div class="comment"> 
						
						<p class="time"><?php comment_date('F jS, Y') ?> at <?php comment_date('g:i a') ?> <?php delete_comment_link(get_comment_ID()); edit_comment_link(' | Edit'); ?> <?php if ($comment->comment_approved == '0') : ?>
							<?php _e('- Your comment is awaiting moderation.') ?>
						<?php endif; ?></p>
					
		<?php /* Or maybe put gravatars here. The typical thing is to float them in the CSS */  
		    /* Typical gravatar call:  
		        <img src="<?php gravatar("R", 80, "YOUR DEFAULT GRAVATAR URL"); ?>"  
		        alt="" class="gravatar" width="80" height="80"> 
		    */ ?> 
		                <?php comment_text(); ?>		
		            </div> 
		        </li> 

		    <?php if('odd'==$thiscomment) { $thiscomment = 'even'; } else { $thiscomment = 'odd'; } ?> 

		    <?php endif; endforeach; ?> 

		    </ol>

	    <?php endif; ?> 



<!-- end of ol commentlist -->
	<?php else :  

	    /* No comments at all means a simple message instead */  
	?> 

	    <h3 class="comments-header">No Comments Yet You can be the first to comment!</h3> 
 

	<?php endif; ?> 

	<?php if (comments_open()) : ?> 

	<?php /* This would be a good place for live preview...  
	    <div id="live-preview"> 
	        <h2 class="comments-header">Live Preview</h2> 
	        <?php live_preview(); ?> 
	    </div> 
	 */ ?> 
	
</div><!-- end of comments -->


    <div id="comments-form">      
    <h3 id="comments-header">Leave a comment</h3> 
     
    <?php if (get_option('comment_registration') && !$user_ID ) : ?> 
        <p id="comments-blocked">You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to= 
        <?php the_permalink(); ?>">logged in</a> to post a comment.</p> 
    <?php else : ?> 

    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform"> 

    <?php if ($user_ID) : ?> 
     
    <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"> 
        <?php echo $user_identity; ?></a>.  
        <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout"  
        title="Log out of this account">Logout</a> 
    </p> 
     
    <?php else : ?> 
     
		<div class="holder">
        <label for="author">Name:<?php if ($req) _e(' (Required)'); ?></label>
		<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" class="required" />
        
		<label for="email">E-mail:<?php if ($req) _e(' (Required)'); ?></label>
		<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" class="required email" />
        
		<label for="url">URL:</label>
		<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" class="url" />
		</div><!-- end of holder -->
     
    <?php endif; ?> 

<!-- Comments form Start -->

    <?php /* You might want to display this:  
        <p>XHTML: You can use these tags: <?php echo allowed_tags(); ?></p> */ ?> 

		<div class="holder">
        <label for="url">Comment:</label>
		<textarea name="comment" id="comment" cols="20" rows="50" style="overflow: hidden;" tabindex="4" class="required"></textarea>
         
        <?php /* Buttons are easier to style than input[type=submit],  
                but you can replace:  
                <button type="submit" name="submit" id="sub">Submit</button> 
                with:  
                <input type="submit" name="submit" id="sub" value="Submit" /> 
                if you like */  
        ?> 

		<div class="submit-bitton">
			<input value="Post Comment" type="submit" class="submit" />
		</div><!-- end of submit-button -->
        <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
     	</div><!-- end of holder -->
    <?php do_action('comment_form', $post->ID); ?> 

    </form>  
    </div> 

<?php endif; // If registration required and not logged in ?> 

<?php else : // Comments are closed ?> 
    <p id="comments-closed">Sorry, comments for this entry are closed at this time.</p>
</div><!-- end of comments -->
<?php endif; ?>