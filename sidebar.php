

<!-- it returns search form from searchform.php file -->
<?php get_search_form(); ?>


<!-- to show right sidebar else show exception if sidebar not available -->
<?php if(is_active_sidebar('right-sidebar')):?>
	<ul id="sidebar">
		<?php dynamic_sidebar('right-sidebar');?>
	</ul>
<?php endif;?>
<?php if(is_active_sidebar('left-sidebar')):?>
	<ul id="sidebar">
		<?php dynamic_sidebar('left-sidebar');?>
	</ul>
<?php endif;?>


<h4>sample images</h4>
<!-- set image using sidebar customizer -->
<img src="<?php echo get_option("owt_image_uploader"); ?>">



