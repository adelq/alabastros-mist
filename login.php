<?php if ( ! is_user_logged_in() ){ ?>
<div class="tab_container">
	<div id="tab1" class="tab_content">
		<div class="top-buttons">
			
			<ul class="tabs">
					<?php query_posts( array( 'post_type' => 'mytopbuttons', 'showposts' => 10 ) );
					if ( have_posts() ) : while ( have_posts() ) : the_post();?>
					
					<?php $tplink = get_post_meta($post->ID, 'dbt_tplink', true); ?>
					<a class="topbtn" href="<?php echo $tplink; ?>"><span><?php the_title(); ?></span></a>
					<?php endwhile; endif; wp_reset_query(); ?>
					
					
				<?php $login_button = stripslashes(get_option('al_login_button')); ?>
				<?php $login_text = stripslashes(get_option('al_login_text')); ?>
				<?php if($login_button == 'true') { ?>
					<?php if($login_text !== '') { ?>
						<li><a class="topbtn" href="#tab2"><span><?php echo $login_text; ?></span></a></li>
					<?php } else { ?>
						<li><a class="topbtn" href="#tab2"><span>Client Login</span></a></li>
					<?php }?>
				<?php }?>
		    </ul>
		</div><!-- end of top-buttons -->
	</div><!-- end of tab1 -->
	
	<div id="tab2" class="tab_content">
		<div class="loginform">
			<div class="formdetails">
				<form action="<?php bloginfo('url') ?>/wp-login.php" method="post">
					<div>
						<span class="input_wrapper">
					    <input type="text" class="default-value"  name="log" id="log" value="Username" />
						</span>
					</div>
					
					<div>
						<span class="input_wrapper margin0">
					    <input id="password-clear" type="text" value="Password" autocomplete="off" />
					    <input id="password-password" id="pwd" type="password" name="pwd" value="" autocomplete="off" />
						</span>
					</div>
					
					<label class="submit"><input name="submit" value="Login" type="submit" /><span>Login</span></label>
					
					<div class="hide">
					<label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> Remember me</label><input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
					</div>
				</form>
			</div><!-- end of formdetails -->
			
			<div class="loginregister">
				<a href="<?php echo get_option('home'); ?>/wp-register.php">Register</a> 
				<a href="<?php echo get_option('home'); ?>/wp-login.php?action=lostpassword">Recover password</a>
			</div><!-- end of loginregister -->
		</div><!-- end of loginform -->
	</div><!-- end of tab2 -->
</div><!-- end of tab_container -->


	
<?php } else { ?>
	<div class="top-buttons">
		<?php global $user_ID, $user_identity, $user_level ?>
		<?php if ( $user_ID ) : ?>
			
			<!-- <p>Identified as <strong><?php echo $user_identity ?></strong></p> -->	
			
			<a class="topbtn" href="<?php bloginfo('url') ?>/wp-admin/"><span>Dashboard</span></a>
			
			<?php if ( $user_level >= 1 ) : ?>
			<a class="topbtn" href="<?php bloginfo('url') ?>/wp-admin/post-new.php"><span>add new article</span></a>
			<a class="topbtn" href="<?php bloginfo('url') ?>/wp-admin/post-new.php?post_type=page"><span>add new page</span></a>
			<?php endif // $user_level >= 1 ?>
			
			<a class="topbtn" href="<?php bloginfo('url') ?>/wp-admin/profile.php"><span>Profile and personal options</span></a>
			<a class="topbtn" href="<?php echo wp_logout_url( get_bloginfo('url') ); ?>"><span>Logout</span></a>
			
		<?php endif // get_option('users_can_register') ?>	
	</div><!-- end of top-buttons -->
	
<?php }?>