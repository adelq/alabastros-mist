
<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<div class="shadow-sep"></div>
<div id="main-content">
	<div id="left-content">       
	 	<?php the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<?php the_content(); ?>                                     
		
		<!-- Contact Form -->
			<div id="contact">
		            <div id="message"></div>
		            <form method="post" action="<?php bloginfo("template_url"); ?>/js/contact.php" name="contactform" id="contactform">
		            <fieldset>
		            <label for=name accesskey=U><span class="required"></span> Name:</label>
		            <input name="name" type="text" id="name" size="30" value="" /> 
		            <br />
		            <label for=email accesskey=E><span class="required"></span> Email:</label>
		            <input name="email" type="text" id="email" size="30" value="" />
		            <br />
		            <label for=subject accesskey=S><span class="required"></span> Subject:</label>
		            <input name="subject" type="text" id="subject" size="30" value="" />
		            <br />
		            <label for=comments accesskey=C><span class="required"></span> Message:</label>
		            <textarea name="comments" cols="40" rows="12"  id="comments" style="overflow: hidden;"></textarea>
		            <br />
					<input type="submit" class="submit" id="submit" value="Submit Message" />
		            </fieldset>
		            </form>
			</div><!--  End of contact form  -->
			
		
			
		</div><!-- #post-<?php the_ID(); ?> -->                 
	</div><!-- end of left-content -->
	<?php get_sidebar(); ?> 
</div><!-- end of main-content -->
<?php get_footer(); ?>