<?php 

function learningWordpress_resources() {

	wp_enqueue_style('style', get_stylesheet_uri());

}

add_action('wp_enqueue_scripts', 'learningWordpress_resources');





// get top ancestor 

function get_top_ancestor_id() {

	global $post;

	if ($post->post_parent) {

		$ancestors = array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];
	}

	return $post->ID;

}

// Does Page have children 

function has_children() {

	global $post;

	$pages = get_pages('child_of=' . $post->ID);
	return count($pages);
}


// Customize excerpt word count length 
function customize_excerpt_length() {

	return 25;
}




add_filter('excerpt_length', 'customize_excerpt_length');


function learningWordpress_setup() {

		// Nav Menu 
	register_nav_menus(array(
		'primary' => __('Primary Menu'),	
		'footer' => __('Footer Menu'),

	));

	// Add featured image support

	add_theme_support('post-thumbnails');
	add_image_size('small-thumbnail', 180, 120, true);
	add_image_size('banner-image', 920, 210, true);


	// Add Post Formats
	add_theme_support('post-formats', array('aside','gallery','link'));

}

add_action('after_setup_theme', 'learningWordpress_setup');


// Add our widget locations  

function ourWidgetsInit() {

	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar1',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="my-special-class">',
		'after_title' => '</h4>'
	));

	register_sidebar(array(
		'name' => 'Footer Area 1',
		'id' => 'footer1',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="my-special-class">',
		'after_title' => '</h4>'
	));

	register_sidebar(array(
		'name' => 'Footer Area 2',
		'id' => 'footer2',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="my-special-class">',
		'after_title' => '</h4>'
	));

	register_sidebar(array(
		'name' => 'Footer Area 3',
		'id' => 'footer3',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="my-special-class">',
		'after_title' => '</h4>'
	));

	register_sidebar(array(
		'name' => 'Footer Area 4',
		'id' => 'footer4',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="my-special-class">',
		'after_title' => '</h4>'
	));


}

add_action('widgets_init', 'ourWidgetsInit');

