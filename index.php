<!-- provide header from header.php -->
<?php get_header(); ?>



<!--find path of the image and attach the image-->
<img src="<?php get_bloginfo('template_url');?>/screenshot.png">



<!-- print default path of my custom wordpress template -->
<?php echo get_bloginfo('template_url');?>



<!--add all posts from wp admin panel-->
<?php 
$wp_query=new WP_QUERY(array('post_type'=>'post','post_status'=>'publish'));
?>
<?php 
if($wp_query->have_posts()):
?>
<ul>
	<?php
	while($wp_query->have_posts()):
		$wp_query->the_post();
	?>
	<li>
		<a href="<?php the_permalink(); ?>">
			<?php the_title();?>
		</a>
		<?php the_author(); ?>
		<?php the_time('F j,Y g:i a'); ?>
		<?php the_content(); ?>

	</li>
<?php endwhile; ?>
</ul>
<?php else: ?>
	<p>	
		<?php 
			_e('sorry, no posts matched your criteria.'); 
		?>		
	</p>
<?php endif; ?>





<!--add all custom projects from wp admin panel-->
<?php 
$wp_query=new WP_QUERY(array('post_type'=>'custom_projects','post_status'=>'publish'));
?>
<?php 
if($wp_query->have_posts()):
?>
<ul>
	<?php
	while($wp_query->have_posts()):
		$wp_query->the_post();
	?>
	<li>
		<a href="<?php the_permalink(); ?>">
			<?php the_title();?>
		</a>
		<?php the_author(); ?>
		<?php the_time('F j,Y g:i a'); ?>
		<?php the_content(); ?>
	</li>
<?php endwhile; ?>
</ul>
<?php else: ?>
	<p>	
		<?php 
			_e('sorry, no posts matched your criteria.'); 
		?>		
	</p>
<?php endif; ?>





<!-- add sidebar widgets into custom theme -->
<?php if(is_active_sidebar('sidebar-1')):?>
	<div id="secondary" class="sidebar-container" role="complementary">
		<div class="widget-area">
			<?php dynamic_sidebar('sidebar-1');?>
		</div>
	</div>
<?php endif; ?>

<?php if(is_active_sidebar('sidebar-2')):?>
	<div id="secondary" class="sidebar-container" role="complementary">
		<div class="widget-area">
			<?php dynamic_sidebar('sidebar-2');?>
		</div>
	</div>
<?php endif; ?>

<?php if(is_active_sidebar('sidebar-3')):?>
	<div id="secondary" class="sidebar-container" role="complementary">
		<div class="widget-area">
			<?php dynamic_sidebar('sidebar-3');?>
		</div>
	</div>
<?php endif; ?>




<!--or add manual widgets directly into custom theme-->
<?php get_search_form(); ?>
<?php get_calendar(); ?>
<?php wp_get_archives('type=monthly'); ?>
<?php get_links_list(); ?>
<?php wp_register(); ?>
<?php wp_loginout(); ?>
<?php wp_meta(); ?>





<!-- to print number of posts -->
<?php if(have_posts()):
	while(have_posts()):
		the_post();
	// it returns content.php(if not available then index.php) file by default but returns content-aside,content-link,content-gallery if admin clicks on the buttons naming aside,link,gallery
	get_template_part("template-parts/content",get_post_format());
	 endwhile;
endif;
?>



<!-- provide footer from footer.php -->
<?php get_footer(); ?>
