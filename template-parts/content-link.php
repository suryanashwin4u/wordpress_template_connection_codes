<!--it works only when editor clicked on link option-->
<div class="link">
<h1><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h1>

<!--include thumbnail if available otherwise include no image-->
<?php if(has_post_thumbnail()){
	the_post_thumbnail('small_thumbnail');
}
else{
	?>
	<img src="<?php echo get_template_directory_uri().'/images/no-image.jpg' ?>" style="height: 120px;width:120px;"/>
<?php
}
?>
<!-- or -->


<p><?php the_post_thumbnail('small-thumbnail'); ?></p>
<p><?php the_post_thumbnail('banner-image'); ?></p>
<p><?php the_time('F j,Y g:i a'); ?></p>
<p><?php the_content(); ?></p>
<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
$categories=get_the_category();
$separator=", ";
$catoptions='';
foreach($categories as $category)
{
$catoptions.="<a href='".get_category_link($category->term_id)."'/>".$category->cat_name."</a>".$separator;
}
echo trim($catoptions,$separator);
</div>