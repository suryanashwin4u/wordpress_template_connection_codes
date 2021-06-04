<h2>this is search.php file</h2>

<!-- it returns search form from searchform.php file -->
<?php get_search_form(); ?>

<!-- return query value -->
<p>search for:<?php echo get_search_query(); ?></p>

<?php 
if(has_post()){
	the_post();
}
?>
<!-- will list all searched item in search.php page -->