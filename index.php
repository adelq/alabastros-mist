<?php get_header(); ?>
 
<div class="four-columns">
	<div class="col">
		<a href="i-am-a-highschool-student/"><img width="200" height="136" src="/detroit/wp-content/uploads/2012/11/highschool-button11.png" class="attachment-200x200 wp-post-image" alt="I am a highschool student" title="highschool-button" /></a>
	</div><!-- end of col -->
	<div class="col">
		<a href="i-am-a-university-student/"><img width="200" height="136" src="/detroit/wp-content/uploads/2012/11/uni-college_button11.png" class="attachment-200x200 wp-post-image" alt="I am a university student" title="uni-college_button" /></a>
	</div><!-- end of col -->
	<div class="col">
		<a href="i-am-a-young-professional/"><img width="200" height="136" src="/detroit/wp-content/uploads/2012/11/young-pro_button11.png" class="attachment-200x200 wp-post-image" alt="I am a young professional" title="young-pro_button" /></a>
	</div><!-- end of col -->
	<div class="col">
		<a href="i-am-a-curious-parent/"><img width="200" height="136" src="/detroit/wp-content/uploads/2012/11/parent_button1.png" class="attachment-200x200 wp-post-image" alt="I am a curious parent" title="parent_button" /></a>
	</div><!-- end of col -->
</div><!-- end of four-columns -->

<?php $slider = get_option('al_slider'); ?>
<?php if($slider == 'slider1')  {
	include( TEMPLATEPATH . '/featured/slider1.php' );
}elseif($slider == 'slider2'){
	include( TEMPLATEPATH . '/featured/slider2.php' );
	
} elseif($slider == 'slider3') {
	include( TEMPLATEPATH . '/featured/slider3.php' );
} else {
	include( TEMPLATEPATH . '/featured/slider1.php' );
}?>

<div class="shadow-sep"></div><!-- end of shadow-sep -->
  
<div id="main-content">
	<div class="four-columns">
		<div class="col">
			<a href="what-is-mist/the-basics/">
			<img class="col-icon" src="http://getmistified.com/houston/wp-content/uploads/2011/02/info.png" alt="About us"/>

			</a>
			<h3><a href="what-is-mist/the-basics/">About us</a></h3>
			<div class="hline"></div>
			<div>
			<p>Learn more about what MIST is and how it works. You’ll get a rundown of all the ins and outs of everything you need to know!</p>
			</div>
		</div><!-- end of col -->

		<div class="col">
			<a href="competitions/theme/">
			<img class="col-icon" src="http://getmistified.com/detroit/wp-content/uploads/2012/11/theme.jpg" alt="2012 Theme!"/>
			</a>
			<h3><a href="competitions/theme/">2012 Theme!</a></h3>
			<div class="hline"></div>
			<p>At last! The much awaited theme is&#8230;</p>
			<p><strong>Family: Reconnecting Our Hearts to Home</strong></p>
		</div><!-- end of col -->

		<div class="col">
			<a href="what-is-mist/donate/">
			<img class="col-icon" src="http://getmistified.com/houston/wp-content/uploads/2011/02/volunteer.png" alt="Get Involved With Us!"/>
			</a>
			<h3><a href="what-is-mist/donate/">Donate</a></h3>
			<div class="hline"></div>
			<p>Want to help out with MIST Detroit? Please donate in the link above, or become a volunteer!</p>
		</div><!-- end of col -->

		<div class="col">
			<a href="registration/form-a-team/">
			<img class="col-icon" src="http://getmistified.com/houston/wp-content/uploads/2011/02/youtube.png" alt="Compete"/>
			</a>
			<h3><a href="registration/form-a-team/">Compete</a></h3>
			<div class="hline"></div>
			<p>Find out if your high school has a team, if not, let’s start one together! Information on registration, competitions, &amp; team setup.</p>
		</div><!-- end of col -->
	</div><!-- end of four-columns -->
</div>

<?php get_footer(); ?>