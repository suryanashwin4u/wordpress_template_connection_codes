<!-- to show permalink using pageid -->
<?php $page_id=get_option("owt_setting_footer_link");
echo get_the_permalink($page_id);
?>

<!-- adding a copyright at the footer -->
<p><?php echo get_option('owt_first_footer_setting');?>
<!-- for adding link in the footer copyright area -->
<a href="<?php echo get_option("owt_setting_footer_link");?> 
or echo get_the_permalink($page_id);?>">
<?php echo get_option('footer_copyright_link');?></p>


<!-- it includes all scripts from functions.php -->
<?php wp_footer(); ?>