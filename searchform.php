<?php $search_text = stripslashes(get_option('al_search_message')); ?>
<?php if ($search_text !== '') {
	$search_text = "$search_text";
} else {
	$search_text = "Search our site...";
}?>

<form method="get" id="search" action="<?php bloginfo('home'); ?>/" >
<div>

<input type="text" value="<?php echo $search_text; ?>" name="s" id="s" onblur="if (this.value == '')  {this.value = '<?php echo $search_text; ?>';}"  onfocus="if (this.value == '<?php echo $search_text; ?>')  {this.value = '';}" />
<input type="submit" id="searchsubmit" class="search_button" value="'. esc_attr__('Search') .'" />
</div>
</form>