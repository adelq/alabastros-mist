<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />		
	<title><?php wp_title('-', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<link rel="icon" type="image/ico" href="<?php echo stripslashes(get_option('al_favicon')); ?>"/>
	
	<!-- WP and RSS stuff -->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?>Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	
	<!-- CSS -->
	<?php 
	$al_color = get_option('al_color_scheme');
	$custom_css = stripslashes(get_option('al_custom_css'));
	$lg_color = stripslashes(get_option('al_lightbox_color'));
	$slider = stripslashes(get_option('al_slider')); 
	$slidetype = get_post_meta($post->ID, "slider", $single = true);
	?>
	<?php if($custom_css !== '') { ?>
		<style type="text/css" media="screen">
			<?php echo $custom_css; ?>
		</style>
	<?php }?>
	
	<!-- general style -->
	<link type="text/css" rel="stylesheet" href="<?php bloginfo("template_url"); ?>/css/<?php if($al_color) : echo($al_color); else : ?>light<?php endif; ?>/global.css" />	
	<!-- lightbox style -->
	<?php if (is_page_template('portfolio.php') || is_archive()): ?>
	<link type="text/css" rel="stylesheet" href="<?php bloginfo("template_url"); ?>/js/mediabox/mediaboxAdv<?php if($lg_color) : echo $lg_color; else : ?>White<?php endif; ?>.css" />
	<?php endif ?>
	
	<!-- Google Web fonts -->
	<link href='http://fonts.googleapis.com/css?family=Arvo:400,700|PT+Sans' rel='stylesheet' type='text/css'>
	
	<!-- slider style -->
	<?php if ( is_home()) { ?>
	<link type="text/css" rel="stylesheet" href="<?php bloginfo("template_url"); ?>/css/<?php if($al_color) : echo($al_color); else : ?>light<?php endif; ?>/<?php if($slider) : echo($slider); else : ?>slider1<?php endif; ?>.css" />
	<?php } ?>
	
	<!--[if gte IE 7]>
	<link type="text/css" rel="stylesheet" href="<?php bloginfo("template_url"); ?>/css/ie.css" />
	<![endif]-->
	
	<!-- SCRIPTS -->
	<?php wp_enqueue_script('login.top', '/wp-content/themes/alabastroswp/js/login.js'); ?>
	<?php wp_enqueue_script('jquery.tipsy', '/wp-content/themes/alabastroswp/js/jquery.tipsy.js'); ?>
	
	<?php if ( is_home()) { ?>
		<?php if ($slider == 'slider1') {
			wp_enqueue_script('nivo.slider', '/wp-content/themes/alabastroswp/js/nivo.js');
			wp_enqueue_script('nivo.start', '/wp-content/themes/alabastroswp/js/nivo.start.js');
			
		} elseif ($slider == 'slider2') {
			wp_enqueue_script('jquery.easing', '/wp-content/themes/alabastroswp/js/jquery.easing.1.3.js');
			wp_enqueue_script('anything.slider', '/wp-content/themes/alabastroswp/js/slider.js');
			wp_enqueue_script('anything.start', '/wp-content/themes/alabastroswp/js/anything.start.js');
		} elseif ($slider == 'slider3') {
			wp_enqueue_script('bx.slider', '/wp-content/themes/alabastroswp/js/bxslider.js');
			wp_enqueue_script('custom.js', '/wp-content/themes/alabastroswp/js/custom.js');
		} else {}?><?php } ?>
		
	<?php if(is_page_template('contact.php')) {
		wp_enqueue_script('jquery.contact', '/wp-content/themes/alabastroswp/js/contact.js');
	}?>

	<?php wp_enqueue_script('custom.scripts', '/wp-content/themes/alabastroswp/js/scripts.js'); ?>
		
	<?php if (is_page_template('portfolio.php') || is_archive()): 
		wp_enqueue_script('mootools.core', '/wp-content/themes/alabastroswp/js/mediabox/mootools-1.2.4-core.js');
		wp_enqueue_script('mediabox.advanced', '/wp-content/themes/alabastroswp/js/mediabox/mediaboxAdv-1.2.4.js');
	endif ?>
	
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
	
	
</head>	
<body>
  	<div id="bg-light">
	<div id="wrapper">
		<div id="top-info">
			<?php include( TEMPLATEPATH . '/login.php' ); ?>
		</div><!-- end of top-info -->
		
		<div id="header">
			<?php $logo = stripslashes(get_option('al_logo')); ?>
			<?php if($logo !== ''){ ?>
				<a href="<?php bloginfo('url'); ?>"><img id="logo" src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>"/></a>
			<?php } else {?> 
				<a id="theme_logo" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
			<?php } ?>
			
			<div id="navigation">
				<?php 
				// you can use this type too to call wp_menu_nav
				// wp_nav_menu( 'sort_column=menu_order&container_class=menu-header&theme_location=top-menu' );
				if ( has_nav_menu( 'top-menu' ) ) {
				    wp_nav_menu( array( 'theme_location' => 'top-menu', 'fallback_cb' => '' ) );
				} else { ?>
				    <ul>
				       	<li <?php if (is_home()) { ?>class="current_page_item"<?php } ?>><a href="<?php echo get_option('home'); ?>">Home</a></li>
						<?php
						$pages = wp_list_pages('echo=0&title_li=&sort_column=post_date, menu_order');
						$pages = preg_replace('/title=\"(.*?)\"/','',$pages);
						echo $pages;
						?>
				    </ul>
				<?php }?>
            </div>
</div><!-- end of header -->
<div class="shadow-sep"></div><!-- end of shadow-sep -->