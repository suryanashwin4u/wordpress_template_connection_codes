<!-- to define language attribute dynamically -->
<html <?php echo language_attributes();?>	>
<head>



	<!-- dynamically assigned charset -->
	<meta charset="<?php echo get_bloginfo('charset')?>" >



	<!--provide wordpress site title and tagline -->
	<title><?php echo get_bloginfo('name');?>|<?php echo get_bloginfo('description');?></title>
	


	<!--provide wordpress default file path to our custom theme for adding js and css files from root folders to our theme-->
	<link href="<?php echo get_bloginfo('template_url');?>/bootstrap.css">
	<script src="<?php echo get_bloginfo('template_url');?>/jquery.js"></script>



<!-- it includes all scripts from functions.php -->
	<?php wp_head(); ?>

</head>
<body>

<!-- it returns search items -->
<form action="<?php echo home('/')?>" method="get">
<input type="field" placeholder="enter keyword" name="search">
<input type="button" placeholder="click" >
</form>


<!-- to change button color from customizer -->
<button style="background-color: <?php echo get_option('owt_color_picker_id'); ?>">click here</button>

<!-- add custom logo from wp customization area otherwise remain default logo image-->
<?php
$img=get_bloginfo('template_url').'/logo.png';	//for default logo
$custom_logo_id=get_theme_mod('custom_logo');
$logo=wp_get_attachment_image_src($custom_logo_id,'full');
if(has_custom_logo()){
	$img=esc_url($logo[0]);
}
?>
<img src="<?php echo $img;?>">



<!-- this will add pages in the primary menu -->
<?php
wp_nav_menu(array(
'menu'=>'primary-menu',
'container'=>'',
'items_wrap'=>'<ul class="nav navbar-nav navbar-right headerMenu">%3$s</ul>'
));
?>


<?php
// add navigation in the page and give properties to the code
if(has_nav_menu("header"){
wp_nav_menu(array(
"theme_location"=>"header",
"menu"=>"primary",
"menu_class"=>"write class_name",
"menu_id"=>"write id_name",
"container"=>"div",
"container_class"=>"write container class name here",
"container_id"=>"write container id",
"before"=>"write text to show before anchor tag",
"after"=>"write text to show after achcor tag",
"link_before"=>"write text to show before link",
"link_after"=>"write text to show after link"
));
}



// print location and number of menu items
$locationdetails=get_nav_menu_location();
print_r($locationdetails);


// get items of navbar menu
$menuID=$locationdetails['header'];
$primaryMenuItems=wp_get_nav_menu_items($menuID);


print_r($primaryMenuItems);
?>
<ul>
<?php
foreach($primaryMenuItems as $key=>$value){
?>
<li><a href="<?php echo $value->url; ?>"><?php echo $value->title;?></a></li>
<?php
}
?>

<?php

// assigning css class name to each li tag in a menu
add_filter("nav_menu_css_class","each_li_class",10,4);
function each_li_class($classes,$item,$args,$dept){
$classes[]='write class name';
return $classes;
}



// assigning class names to each anchor tag in nav bar menu
add_filter("nav_menu_link_attributes","each_anchor_class");
function each_anchor_class($attr){
$attr['class']='write class name';
return $attr;
}
?>


