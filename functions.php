<?php 




// it is used to create wp style sheet links and scripts
function mini_ecommerce(){
		wp_enqueue_style('style',get_stylesheet_uri());
		wp_enqueue_style('bootstrap_min_framework.css',get_template_directory_uri().'bootstrap_min_framework.css','',"1.0");
		

		wp_enqueue_script('name1',get_template_directory_uri().'path1',array(),'1.1',true);
		wp_enqueue_script('name2',get_template_directory_uri().'path2',array(),'1.1',true);
		wp_enqueue_script('name3',get_template_directory_uri().'path3',array(),'1.1',true);
}
add_action("wp_enqueue_script","mini_ecommerce");




// it is used to create menus 
function register_mini_ecommerce_theme()
{
	register_nav_menus(array('primary-menu'=>__('Primary Menu'),'footer-menu'=>__('Footer Menu')));
}
add_action('init','register_mini_ecommerce_theme');




// to set custom logo site title|description
function themename_custom_logo_setup(){
	$defaults=array(
		'height'=>50,
		'width'=>177,
		'flex-height'=>true,
		'flex-width'=>true,
		'header-text'=>array('site-title','site-description')
	);
	add_theme_support('custom-logo',$defaults);
}
add_action('after_setup_theme','themename_custom_logo_setup');




// this is used to add our own projects at sidebar
function register_my_projects()
{
register_post_type('custom_projects',
array(
'labels'=>array('name'=>__('Our Projects'),'singular_name'=>__('custom_projects')),
'public'=>true,
"show_in_nav_menus"=>true,
'has_arhive'=>false,
'supports'=>array('title','editor','excerpt','author','comments','revisions','custom-fields')));
}
add_action("init","register_my_projects");





// create custom widgets in the sidebar
function register_custom_widget_sidebar(){
	register_sidebar(array(
		'name'=>__('Primary Sidebar1','theme_name'),
		'id'=>'sidebar-1',
		'before_widget'=>'<aside id="%1$s" class="widget %2$s">',
		'after_widget'=>'</aside>',
		'before_title'=>'<h1 class="widget-title">',
		'after_title'=>'</h1>',
	));
	register_sidebar(array(
		'name'=>__('Primary Sidebar3','theme_name'),
		'id'=>'sidebar-3',
		'before_widget'=>'<aside id="%1$s" class="widget %2$s">',
		'after_widget'=>'</aside>',
		'before_title'=>'<h1 class="widget-title">',
		'after_title'=>'</h1>',
	));
	register_sidebar(array(
		'name'=>__('Primary Sidebar2','theme_name'),
		'id'=>'sidebar-2',
		'before_widget'=>'<aside id="%1$s" class="widget %2$s">',
		'after_widget'=>'</aside>',
		'before_title'=>'<h1 class="widget-title">',
		'after_title'=>'</h1>',
	));
}
add_action("widgets_init","register_custom_widget_sidebar")




// add manually featured image widget in the post page
add_theme_support("post-thumbnails");





// add featured image widget into post page using function
function theme_supports(){
	add_theme_support("post-thumbnails");
	add_image_size("small-thumbnail",120,90,true);
	add_image_size("banner-image",700,350,true);
	add_theme_support("post-formats",array("aside","gallery","link"));
}
add_action("after_setup_theme","theme_supports");





// to add menus bar at sidebar
add_theme_support("menu");

// or

// add menus at sidebar using function
function theme_menus(){
	register_nav_menu(array(
		"header"=>"Primary Menu",
		"footer"=>"Footer Menu"
	));
}
add_action("init","theme_menus");



// for adding custom sidebars in the theme
function wpdocs_theme_slug_widgets_init(){

// adding custom right sidebar
	register_sidebar(array(
		'name'=>"Right Sidebar",
		'id'=>'right-sidebar',
		'description'=>"this is my right sidebar",
		'before_widget'=>'<li id="%1$s" class="widget %2$s">',
		'after_widget'=>'</li>',
		'before_title'=>'<h2 class="widgettitle">',
		'after_title'=>'</h2>'));


// adding left custom sidebar
	register_sidebar(array(
		'name'=>"Left Sidebar",
		'id'=>'left-sidebar',
		'description'=>"this is my left sidebar",
		'before_widget'=>'<li id="%1$s" class="widget %2$s">',
		'after_widget'=>'</li>',
		'before_title'=>'<h2 class="widgettitle">',
		'after_title'=>'</h2>'));
}
add_action('widgets_init','wpdocs_theme_slug_widgets_init');



// it will create a sidebar option in customizer
function custom_theme_customize_register($wp_customize){
// add section in the sidbar customizer
	$wp_customize->add_section('owt_main_section',array(
		'title'=>"online web tutor section",
		'description'=>'this is my description sample',
		'priority'=>120,
	));
// add fields in the sidebar for adding footer in footer.php
	$wp_customize->add_setting('owt_first_footer_setting',array(
		'default'=>'Designed and developed by ashwani',
		'capability'=>'edit_theme_options',
		'type'=>'option',
	));

	$wp_customize->add_control('owt_first_control',array(
		'label'=>"Footer text",
		'section'=>'owt_main_section',
		'settings'=>'owt_first_txtbox_setting'
	));

// to add footer field in the sidebar customizer menu
	$wp_customize->add_setting('owt_first_txtbox_setting',array(
		'default'=>'this is my sample textbox text',
		'capability'=>'edit_theme_options',
		'type'=>'option',
	));

	$wp_customize->add_control('owt_first_control',array(
		'label'=>"enter your text",
		'section'=>'owt_main_section',
		'settings'=>'owt_first_txtbox_setting'));


// to add footer sidebar in the sidebar customizer menu for adding link in the footer copyright
	$wp_customize->add_setting('footer_copyright_link',array(
		'default'=>'this is my sample textbox text',
		'capability'=>'edit_theme_options',
		'type'=>'option',
	));

	$wp_customize->add_control('owt_first_control',array(
		'label'=>"enter your text",
		'section'=>'owt_main_section',
		'settings'=>'footer_copyright_link'));


	// add page drop down in the sidebar customizer
	$wp_customize->add_setting('owt_setting_footer_link',array(
		'capability'=>'edit_theme_options',
		'type'=>'option',
	));
	
	$wp_customize->add_control('owt_footer_pages_control',array(
		'label'=>'Footer Link',
		'section'=>'owt_main_section',
		'type'=>'dropdown-pages',
		'settings'=>'owt_setting_footer_link'
	));
//image upload menu from customizer sidebar
	$wp_customize->add_setting('owt_image_uploader',array(
		'default'=>get_bloginfo("template_url").'/images.jpg',
		'capability'=>'edit_theme_options',
		'type'=>'option',
	));
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'image_upload_test',array(
		'label'=>'Choose Image',
		'section'=>'owt_main_section',
		'settings'=>'owt_image_uploader',
		));
// adding color picker to the customizer sidebar
	$wp_customize->add_setting('owt_color_picker_id',array(
		'default'=>'#000',
		'sanitize_callback'=>'sanitize_hex_color'
		'capability'=>'sanitize_hex_color',
		'type'=>'option',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'link_color',array(
		'label'=>'Book Now Background',
		'section'=>'owt_main_section',
		'settings'=>'owt_color_picker_id',
		));


}
add_action('customize_register','custom_theme_customize_register');

