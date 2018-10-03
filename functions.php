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

// Customize Appearance Options 
function learningWordpress_customize_register( $wp_customize) {


	$wp_customize->add_setting('lwp_link_color', array(

		'default' => '#006ec3',
		'transport' => 'refresh',

	));



	$wp_customize->add_setting('lwp_btn_color', array(

		'default' => '#006ec3',
		'transport' => 'refresh',

	));

	$wp_customize->add_setting('lwp_see_all_btn_color', array(

		'default' => '#006ec3',
		'transport' => 'refresh',

	));

	$wp_customize->add_setting('lwp_see_all_btn_text_color', array(

		'default' => '#FFF',
		'transport' => 'refresh',

	));

	$wp_customize->add_section('lwp_standard_colors',array(
		'title' => __('Standard Colors','LearningWordPress'),
		'priority' => 30,
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_link_color_control', array(
		'label' => __('Link Color', 'LearningWordPress'),
		'section' => 'lwp_standard_colors',
		'settings' => 'lwp_link_color',
	)));


		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_btn_color_control', array(
		'label' => __('Button Color', 'LearningWordPress'),
		'section' => 'lwp_standard_colors',
		'settings' => 'lwp_btn_color',
	)));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_see_all_btn_color', array(
		'label' => __('See All Button Color', 'LearningWordPress'),
		'section' => 'lwp_standard_colors',
		'settings' => 'lwp_see_all_btn_color',
	)));

				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'lwp_see_all_btn_text_color', array(
		'label' => __('See All Button Color', 'LearningWordPress'),
		'section' => 'lwp_standard_colors',
		'settings' => 'lwp_see_all_btn_text_color',
	)));
}

add_action('customize_register', 'learningWordpress_customize_register');

// OUtput Customize CSS 
function learningWordpress_customize_css() { ?>


	<style type="text/css">
		
		a:link,
		a:visited {
			color: <?php echo get_theme_mod('lwp_link_color'); ?>;
		}

		.site-header nav ul li.current-menu-item a:link,
		.site-header nav ul li.current-menu-item a:visited,
		.site-header nav ul li.current-page-ancestor a:link,
		.site-header nav ul li.current-page-ancestor a:visited {

			background-color: <?php echo get_theme_mod('lwp_btn_color'); ?>;
			border-color: <?php echo get_theme_mod('lwp_btn_color'); ?>;
		}

		div.hd-search #searchsubmit {
			background-color: <?php echo get_theme_mod('lwp_btn_color'); ?>;
		}

		.button {
			background: <?php echo get_theme_mod('lwp_see_all_btn_color'); ?>;
		}

		a.see-all-btn:link,
		a.see-all-btn:visited {
			color:<?php echo get_theme_mod('lwp_see_all_btn_text_color'); ?>!important;

		}

		.movie-card-link { 
			background: <?php echo get_theme_mod('lwp_see_all_btn_color'); ?>;

		}

		.movie-card-link a:link, 
		.movie-card-link a:visited {
			color:<?php echo get_theme_mod('lwp_see_all_btn_text_color'); ?>!important; 
		}


	</style>

<?php }

add_action('wp_head','learningWordpress_customize_css');



// Add footer callout section to admin appearance customize screen

function lwp_footer_callout($wp_customize) {

	$wp_customize->add_section('lwp-footer-callout-section', array(
		'title' => 'Footer Callout'
	));


	$wp_customize->add_setting('lwp-footer-callout-display', array(
		'default' => 'No'

	));


	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'wp-footer-callout-display-control', array(

		'label' => 'Display this section?',
		'section' => 'lwp-footer-callout-section',
		'settings' => 'lwp-footer-callout-display',
		'type' => 'select',
		'choices' => array('No' => 'No', 'Yes' => 'Yes')



	)));



	$wp_customize->add_setting('lwp-footer-callout-headline', array(
		'default' => 'Example Headline Text'

	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'wp-footer-callout-headline-control', array(

		'label' => 'Headline',
		'section' => 'lwp-footer-callout-section',
		'settings' => 'lwp-footer-callout-headline'


	)));

	$wp_customize->add_setting('lwp-footer-callout-text', array(
		'default' => 'Example Paragraph Text'

	));

	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'wp-footer-callout-text-control', array(

		'label' => 'Text',
		'section' => 'lwp-footer-callout-section',
		'settings' => 'lwp-footer-callout-text',
		'type' => 'textarea'


	)));


	$wp_customize->add_setting('lwp-footer-callout-link');


	$wp_customize->add_control( new WP_Customize_Control($wp_customize, 'wp-footer-callout-link-control', array(

		'label' => 'Link',
		'section' => 'lwp-footer-callout-section',
		'settings' => 'lwp-footer-callout-link',
		'type' => 'dropdown-pages'


	)));

	$wp_customize->add_setting('lwp-footer-callout-image');


	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'wp-footer-callout-image-control', array(

		'label' => 'Image',
		'section' => 'lwp-footer-callout-section',
		'settings' => 'lwp-footer-callout-image',
		'width' => 750,
		'height' => 500



	)));


}

add_action('customize_register', 'lwp_footer_callout');


