<?php
function jQuery_Google_init() {
	if ( !is_admin() ) { // actually not necessary, because the Hook only get used in the Theme
		wp_deregister_script( 'jquery' ); // unregistered key jQuery
		wp_register_script( 'jquery', 
		get_bloginfo('template_directory') . '/js/jquery.min.js',array(),'1.4.2' );
		wp_enqueue_script( 'jquery' ); // include jQuery
	}
}
// For Themes since WordPress 3.0
add_action( 'after_setup_theme', 'jQuery_Google_init' ); // Theme active, include function
/*-----------------------------------------------------------------------------------*/
/* Include Admin Panel for Alabastros Theme */
/*-----------------------------------------------------------------------------------*/
$functions_path = TEMPLATEPATH . '/admin/';
require_once ($functions_path . 'admin.php');

//Custom menu support
if ( function_exists( 'add_theme_support' ) )
add_theme_support ('nav-menus');

add_action( 'init', 'register_my_menus' );
function register_my_menus() {
    register_nav_menus(
        array(
            'top-menu' => __( 'Top Menu' ),
            'sidebar-menu' => __( 'Sidebar Menu' )
        )
    );
}

// Register widgetized areas
	register_sidebar(array(
		'name' => 'sidebar',
		'description' => __( 'Drop Widgets Here'),
		'before_widget' => '<div class="sidebar-block">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4><div class="hline"></div>',
	));
	register_sidebar(array(
		'name' => 'Homepage',
		'id' => 'homepage',
		'description' => __( 'Hompage Widget'),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3><div class="hline"></div>',
	));

// Post thumbnail support
if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(640, 265, true); // Normal post thumbnails
	add_image_size('loopThumb', 640, 265, true);
}

function thumb_url(){
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 2100,2100 ));
return $src[0];
}

//First Image
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];
  return $first_img;
}


//Control Excerpt Length using Filters
function wpe_excerptlength_homelatest($length) {
    return 13;
}
function wpe_excerptlength_portfolio($length) {
    return 20;
}
function wpe_excerptlength_blog($length) {
    return 80;
}
function wpe_excerptmore($more) {
    return '...';
}
function wpe_excerptmore2($more) {
    return '';
}

function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}


function home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );


// Excerpt Lenght
function new_excerpt_length($length) {
		return 27; // change this to your liking
	}
	add_filter('excerpt_length', 'new_excerpt_length');
	function new_excerpt_more($post) {
		return '<a href="'. get_permalink($post->ID) . '">' . ' Read More...' . '</a>';
	}
	add_filter('excerpt_more', 'new_excerpt_more');




//Custom Post Types
add_action('init', 'create_myportfoliotype');
function create_myportfoliotype() {
    $myportfoliotype_args = array(
        'label' => __('Portfolio'),
        'singular_label' => __('Portfolio'),
        'public' => true,
        'show_ui' => true,
		'menu_position' => 5,
        'capability_type' => 'post',
        'hierarchical' => false,
		'publicly_queryable' => true,
		'query_var' => true,
        'rewrite' => array( 'slug' => 'portfolio', 'with_front' => false ),
		'can_export' => true,
        'supports' => array(
			'title', 
			'editor', 
			'post-thumbnails',
			'custom-fields',
			'page-attributes',
			'author',
			'thumbnail'
		  )
       );
  register_post_type('myportfoliotype',$myportfoliotype_args);
}
	
add_action('init', 'create_myserviceslist');
function create_myserviceslist() {
    $myserviceslist_args = array(
        'label' => __('Services'),
        'singular_label' => __('Services'),
        'public' => true,
        'show_ui' => true,
		'menu_position' => 5,
        'capability_type' => 'post',
        'hierarchical' => false,
        'publicly_queryable' => true,
		'query_var' => true,
        'rewrite' => array( 'slug' => 'service', 'with_front' => false ),
		'can_export' => true,
        'supports' => array(
			'title', 
			'editor', 
			'post-thumbnails',
			'custom-fields',
			'page-attributes',
			'author',
			'thumbnail'
		  )
      );
  register_post_type('myserviceslist',$myserviceslist_args);
}
	
add_action('init', 'create_homepage');
function create_homepage() {
    $homepage_args = array(
        'label' => __('Homepage'),
        'singular_label' => __('Homepage'),
        'public' => true,
        'show_ui' => true,
		'menu_position' => 5,
        'capability_type' => 'post',
        'hierarchical' => false,
		'publicly_queryable' => true,
		'query_var' => true,
		'can_export' => true,
        'rewrite' => true,
        'supports' => array(
			'title', 
			'editor', 
			'post-thumbnails',
			'custom-fields',
			'page-attributes',
			'author',
			'thumbnail'
		  )
       );
  register_post_type('homepage',$homepage_args);
}

add_action('init', 'create_mytopbuttons');
function create_mytopbuttons() {
    $mytopbuttons_args = array(
        'label' => __('Top Buttons'),
        'singular_label' => __('Top Buttons'),
        'public' => true,
        'show_ui' => true,
		'menu_position' => 5,
        'capability_type' => 'post',
        'hierarchical' => false,
		'publicly_queryable' => true,
		'query_var' => true,
		'can_export' => true,
        'rewrite' => true,
        'supports' => array(
			'title'
		  )
       );
  register_post_type('mytopbuttons',$mytopbuttons_args);
}
	
//Taxonomias
register_taxonomy("categories", array("myportfoliotype"), array("hierarchical" => true, "label" => "Category", "singular_label" => "Category", "rewrite" => true));
register_taxonomy("slider", array("homepage"), array("hierarchical" => true, "label" => "Choose your slider", "singular_label" => "Choose your slider", "rewrite" => true));
register_taxonomy( 'tags', array("homepage"), array( 'hierarchical' => false, 'label' => 'Tags', 'query_var' => true, 'rewrite' => true ) );
register_taxonomy( 'specifics', array("myportfoliotype"), array( 'hierarchical' => false, 'label' => 'Specifics', 'query_var' => true, 'rewrite' => true ) );


// Custom meta boxes
$prefix = 'dbt_';
$meta_boxes = array();
// first meta box
$meta_boxes[] = array(
	'id' => 'my-meta-box-1',
	'title' => 'Lightbox Options',
	'pages' => array('myportfoliotype'), // multiple post types
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
            'name' => 'File type',
            'desc' => 'Enter the file type, this is only for the hover effect the (options are: image or video) if you leave this field empty the image type will be added automatically)',
            'id' => $prefix . 'file',
            'type' => 'select',
            'options' => array('image', 'video')
        ),
        array(
            'name' => 'Lightbox URL',
            'desc' => 'Enter the url of the image or video, youtube url, vimeo, etc or if you are using JW Player put the url of your own video (mp4, flv, swf)',
            'id' => $prefix . 'url',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Lightbox Title',
            'desc' => 'This is the title that will be displayed in the lightbox',
            'id' => $prefix . 'title',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Lightbox video size',
            'desc' => 'You can specify the size of the video only use this with videos (example: 800 600) 800 is the width and 600 the height',
            'id' => $prefix . 'size',
            'type' => 'text',
            'std' => ''
		)
	)
);


$meta_boxes[] = array(
	'id' => 'my-meta-box-5',
	'title' => 'Portfolio 2 Options',
	'pages' => array('myportfoliotype'), // multiple post types
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		
        
		array(
            'name' => 'Website URL',
            'desc' => 'This is the link for the project for example if you create a Web site then put the link here, you can leave this field empty if you want.',
            'id' => $prefix . 'project_url_portfolio',
            'type' => 'text',
            'std' => ''
        ),

		array(
            'name' => 'Visit Website button color',
            'desc' => 'Choose the color of the button for the visit Web site in the portfolio style 2, default is white.',
            'id' => $prefix . 'btn_color',
            'type' => 'select',
            'options' => array('white', 'blue', 'black')
        ),

		array(
            'name' => 'Change The text of the vist Web site button',
            'desc' => 'If you want you can change the text of the button, for example: (see project, Live preview, etc.) if you leave this field empty the text visit Web site will be displayed.',
            'id' => $prefix . 'visit_button_text',
            'type' => 'text',
            'std' => ''
        ),
	)
);



// second meta box
$meta_boxes[] = array(
	'id' => 'my-meta-box-2',
	'title' => 'Slider 2 Options (Anything Slider)',
	'pages' => array('homepage'), // custom post types, since WordPress 3.0
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
            'name' => 'Caption Position',
            'desc' => 'The position where you want to display your caption, the options are: (left, right, bottom)',
            'id' => $prefix . 'position',
            'type' => 'text',
            'std' => ''
        ),
		array(
        	'name' => 'video embed code',
        	'desc' => 'Use this if you want to include a video in the slider 2 using the object and embed code',
        	'id' => $prefix . 'sliderurl',
        	'type' => 'textarea',
        	'std' => ''
    	),
	)
);


// second meta box
$meta_boxes[] = array(
	'id' => 'my-meta-box-7',
	'title' => 'Top Button URL',
	'pages' => array('mytopbuttons'), // custom post types, since WordPress 3.0
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
            'name' => 'Button URL',
            'desc' => 'Just enter the link for this button example (http://yoursite.com/portfolio)',
            'id' => $prefix . 'tplink',
            'type' => 'text',
            'std' => ''
        ),
	)
);


// second meta box
$meta_boxes[] = array(
	'id' => 'my-meta-box-3',
	'title' => 'Slider 3 Options (BX-Slider)',
	'pages' => array('homepage'), // custom post types, since WordPress 3.0
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
            'name' => 'Text Position',
            'desc' => 'The position where you want to display your caption, the options are: (left, right, bottom)',
            'id' => $prefix . 'textposition',
            'type' => 'select',
			'options' => array('left', 'right')
        ),
	)
);

$meta_boxes[] = array(
	'id' => 'my-meta-box-4',
	'title' => 'Minipost Homepage',
	'pages' => array('homepage'), // custom post types, since WordPress 3.0
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
            'name' => 'Minipost link',
            'desc' => 'When someone click on the title or icon this is the link to be redirected to.',
            'id' => $prefix . 'minilink',
            'type' => 'text',
			'std' => ''
        ),
	)
);



/*********************************

You should not edit the code below

*********************************/

foreach ($meta_boxes as $meta_box) {
	$my_box = new My_meta_box($meta_box);
}

class My_meta_box {

	protected $_meta_box;

	// create meta box based on given data
	function __construct($meta_box) {
		if (!is_admin()) return;
	
		$this->_meta_box = $meta_box;

		// fix upload bug: http://www.hashbangcode.com/blog/add-enctype-wordpress-post-and-page-forms-471.html
		$current_page = substr(strrchr($_SERVER['PHP_SELF'], '/'), 1, -4);
		if ($current_page == 'page' || $current_page == 'page-new' || $current_page == 'post' || $current_page == 'post-new') {
			add_action('admin_head', array(&$this, 'add_post_enctype'));
		}
		
		add_action('admin_menu', array(&$this, 'add'));

		add_action('save_post', array(&$this, 'save'));
	}
	
	function add_post_enctype() {
		echo '
		<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery("#post").attr("enctype", "multipart/form-data");
			jQuery("#post").attr("encoding", "multipart/form-data");
		});
		</script>';
	}

	/// Add meta box for multiple post types
	function add() {
		foreach ($this->_meta_box['pages'] as $page) {
			add_meta_box($this->_meta_box['id'], $this->_meta_box['title'], array(&$this, 'show'), $page, $this->_meta_box['context'], $this->_meta_box['priority']);
		}
	}

	// Callback function to show fields in meta box
	function show() {
		global $post;

		// Use nonce for verification
		echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	
		echo '<table class="form-table">';

		foreach ($this->_meta_box['fields'] as $field) {
			// get current post meta data
			$meta = get_post_meta($post->ID, $field['id'], true);
		
			echo '<tr>',
					'<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
					'<td>';
			switch ($field['type']) {
				case 'text':
					echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />',
						'<br />', $field['desc'];
					break;
				case 'textarea':
					echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>',
						'<br />', $field['desc'];
					break;
				case 'select':
					echo '<select name="', $field['id'], '" id="', $field['id'], '">';
					foreach ($field['options'] as $option) {
						echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
					}
					echo '</select>';
					break;
				case 'radio':
					foreach ($field['options'] as $option) {
						echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
					}
					break;
				case 'checkbox':
					echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
					break;
				case 'file':
					echo $meta ? "$meta<br />" : '', '<input type="file" name="', $field['id'], '" id="', $field['id'], '" />',
						'<br />', $field['desc'];
					break;
				case 'image':
					echo $meta ? "<img src=\"$meta\" width=\"150\" height=\"150\" /><br />$meta<br />" : '', '<input type="file" name="', $field['id'], '" id="', $field['id'], '" />',
						'<br />', $field['desc'];
					break;
			}
			echo 	'<td>',
				'</tr>';
		}
	
		echo '</table>';
	}

	// Save data from meta box
	function save($post_id) {
		// verify nonce
		if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
			return $post_id;
		}

		// check autosave
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post_id;
		}

		// check permissions
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) {
				return $post_id;
			}
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
		}

		foreach ($this->_meta_box['fields'] as $field) {
			$name = $field['id'];
			
			$old = get_post_meta($post_id, $name, true);
			$new = $_POST[$field['id']];
			
			if ($field['type'] == 'file' || $field['type'] == 'image') {
				$file = wp_handle_upload($_FILES[$name], array('test_form' => false));
				$new = $file['url'];
			}
			
			if ($new && $new != $old) {
				update_post_meta($post_id, $name, $new);
			} elseif ('' == $new && $old && $field['type'] != 'file' && $field['type'] != 'image') {
				delete_post_meta($post_id, $name, $old);
			}
		}
	}
}

//Alabastros Shortcuts
function white($atts, $content = null) {
	extract(shortcode_atts(array(
		"href" => 'http://'
	), $atts));
	return '<a class="btnlink white" href="'.$href.'">'.$content.'</a>';
}
add_shortcode("white", "white");

function blue($atts, $content = null) {
	extract(shortcode_atts(array(
		"href" => 'http://'
	), $atts));
	return '<a class="btnlink blue" href="'.$href.'">'.$content.'</a>';
}
add_shortcode("blue", "blue");

function black($atts, $content = null) {
	extract(shortcode_atts(array(
		"href" => 'http://'
	), $atts));
	return '<a class="btnlink black" href="'.$href.'">'.$content.'</a>';
}
add_shortcode("black", "black");


function three_cols($atts, $content = null) {
	return '<div class="one_third">'.$content.' </div>';
}
add_shortcode("one_third", "three_cols");

function four_cols($atts, $content = null) {
	return '<div class="one_fourth">'.$content.' </div>';
}
add_shortcode("one_fourth", "four_cols");

function two_cols($atts, $content = null) {
	return '<div class="one_half">'.$content.' </div>';
}
add_shortcode("one_half", "two_cols");

//
function delete_comment_link($id) {
  if (current_user_can('edit_post')) {
    echo '| <a href="'.admin_url("comment.php?action=cdc&c=$id").'">Delete</a> ';
    echo '| <a href="'.admin_url("comment.php?action=cdc&dt=spam&c=$id").'">Spam</a>';
  }
}

// Only Show Blog Post's on search
function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

add_filter('pre_get_posts','SearchFilter');

// Get the page number
function get_page_number() {
    if (get_query_var('paged')) {
        print ' | ' . __( 'Page ' , 'your-theme') . get_query_var('paged');
    }
} // end get_page_number



// Social bookmarks
class my_subscribe_widget extends WP_Widget {
function my_subscribe_widget() {
$widget_ops = array('classname' => 'widget_bu_subscribe', 'description' => 'Add an RSS and twitter link' );
$this->WP_Widget('my_subscribe_widget', 'Social Bookmark Links', $widget_ops);
}

function widget($args, $instance) {
extract($args, EXTR_SKIP);
echo $before_widget;
$title = empty($instance['title']) ? '&nbsp;' : apply_filters('widget_title', $instance['title']);
$rss_link = empty($instance['rss_link']) ? '&nbsp;' : apply_filters('widget_rss_link', $instance['rss_link']);
$twitter_link = empty($instance['twitter_link']) ? '&nbsp;' : apply_filters('widget_twitter_link', $instance['twitter_link']);
$youtube_link = empty($instance['youtube_link']) ? '&nbsp;' : apply_filters('widget_youtube_link', $instance['youtube_link']);
$digg_link = empty($instance['digg_link']) ? '&nbsp;' : apply_filters('widget_digg_link', $instance['digg_link']);
if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }; ?>
<ul>


<?php if(! empty($rss_link)) { ?>
	<li><a title="Subscribe to the RSS Feed" href="<?php echo $rss_link; ?>" <img src="http://fourblogger.com/wp-content/uploads/2009/12/Feed1.png"
	    border="0" alt="" />Subscribe to the RSS Feed</a></li>
<?php } else {
	echo "no rss";
}?>

<?php if (! empty($digg_link)): ?>
	<li><a title="Submit on Digg" href="<?php echo $digg_link; ?>" <img src="http://fourblogger.com/wp-content/uploads/2009/12/digg1.png"
	    border="0" alt="" />Submit on Digg</a></li>
<?php endif ?>


<?php if (! empty($twitter_link)): ?>
	<li><a title="Follow on Twitter" href="http://www.twitter.com/<?php echo $twitter_link; ?>" <img src="http://fourblogger.com/wp-content/uploads/2009/12/Twitter1.png"
	    border="0" alt="" />Follow us on Twitter</a></li>
<?php endif ?>

<?php if (! empty($youtube_link)): ?>
	<li><a title="Subscribe to the Youtube channel" href="<?php echo $youtube_link; ?>" <img src="http://fourblogger.com/wp-content/uploads/2009/12/Youtube-icon1.png"
	    border="0" alt="" />Subscribe to the Youtube channel</a></li>
<?php endif ?>

</ul>




<?php echo $after_widget;
}
function update($new_instance, $old_instance) {
$instance = $old_instance;
$instance['title'] = strip_tags($new_instance['title']);
$instance['rss_link'] = strip_tags($new_instance['rss_link']);
$instance['twitter_link'] = strip_tags($new_instance['twitter_link']);
$instance['youtube_link'] = strip_tags($new_instance['youtube_link']);
$instance['digg_link'] = strip_tags($new_instance['digg_link']);
return $instance;
}

function form($instance) {
$rss_default = get_bloginfo('rss2_url');
$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'rss_link' => $rss_default, 'twitter_link' => '','youtube_link' => '','facebook_link' => '') );
$title = strip_tags($instance['title']);
$rss_link = strip_tags($instance['rss_link']);
$twitter_link = strip_tags($instance['twitter_link']);
$youtube_link = strip_tags($instance['youtube_link']);
$digg_link = strip_tags($instance['digg_link']);
?>
<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<p><label for="<?php echo $this->get_field_id('rss_link'); ?>">RSS Feed Link: <input id="<?php echo $this->get_field_id('rss_link'); ?>" name="<?php echo $this->get_field_name('rss_link'); ?>" type="text" value="<?php echo attribute_escape($rss_link); ?>" /></label></p>
<p><label for="<?php echo $this->get_field_id('twitter_link'); ?>">Twitter Username: <input id="<?php echo $this->get_field_id('twitter_link'); ?>" name="<?php echo $this->get_field_name('twitter_link'); ?>" type="text" value="<?php echo attribute_escape($twitter_link); ?>" /></label></p>
<p><label for="<?php echo $this->get_field_id('youtube_link'); ?>">Youtube Link: <input id="<?php echo $this->get_field_id('youtube_link'); ?>" name="<?php echo $this->get_field_name('youtube_link'); ?>" type="text" value="<?php echo attribute_escape($youtube_link); ?>" /></label></p>
<p><label for="<?php echo $this->get_field_id('digg_link'); ?>">Digg Link: <input id="<?php echo $this->get_field_id('digg_link'); ?>" name="<?php echo $this->get_field_name('digg_link'); ?>" type="text" value="<?php echo attribute_escape($digg_link); ?>" /></label></p>

<?php
}
}

register_widget('my_subscribe_widget');


// Custom callback to list pings
function custom_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
        ?>
                <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
                        <div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'your-theme'),
                                        get_comment_author_link(),
                                        get_comment_date(),
                                        get_comment_time() );
                                        edit_comment_link(__('Edit', 'your-theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
    <?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'your-theme') ?>
            <div class="comment-content">
                        <?php comment_text() ?>
                        </div>
<?php } // end custom_pings