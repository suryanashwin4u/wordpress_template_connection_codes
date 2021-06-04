<!-- to access header.php -->
<?php get_header() ?>

<!-- to access header-about.php and it has higher priority -->
<?php get_header("about");?>

<?php 
if(if_front_page()){
	echo "this is front-page.php";
}
?>

<!-- show the value that was updated in the sidebar customizer-->
<p><?php echo get_option('owt_first_txtbox_setting');?></p>

<h2>top priority than home.php > index.php</h2>

<!-- it will return sidebar.php file -->
<?php get_sidebar(); ?>

<!-- it will return sidebar-home20.php and has higher priority than sidebar.php but not sidebar-home.php-->
<?php get_sidebar("home20"); ?>

<!-- it will return sidebar-home.php and has higher priority than sidebar.php-->
<?php get_sidebar("home"); ?>

<!-- less priority footer -->
<?php get_footer(); ?>

<!-- high priority footer and it will access footer-about.php -->
<?php get_footer("about"); ?>