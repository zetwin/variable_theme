<?php get_header(); ?>

		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a tag archive */ if( is_tag() ) { ?>
		<h2 class="cattitle">Записи по тегу &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="cattitle">Записи за <?php the_time('F jS, Y'); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="cattitle">Записи за <?php the_time('F, Y'); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="cattitle">Записи за <?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="cattitle">Author Archive</h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="cattitle">Blog Archives</h2>
 	  <?php } ?>
	  
<div class="yuzo_related_post style-2">
	<div class="yuzo_wraps">
		<?php while (have_posts()) : the_post(); ?>
			 
			 
			 
			 
			 <div class="relatedthumb yuzo-list  " >
				<a href="<?php the_permalink() ?>" class="image-list">
				<?php get_the_post_thumbnail( $post_id, 'thumbnail' );?>
				<div class="yuzo-img-wrap " style="width: 97.75px;height:68px;">
				<div class="yuzo-img" style="background:url('<?php
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail', true);
echo $thumb_url[0];
?>') 50% 50% no-repeat;width: 97.75px;height:68px;margin-bottom: 5px;background-size:  cover;  "></div>
				</div>
				</a>
				<a class="link-list yuzo__text--title titlewrap" style="font-size:16px;line-height:24px;" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
				<span class="yuzo_text" style="font-size:12px;"><?php $excerpt = strip_tags(get_the_excerpt()); echo $excerpt; ?></span>
			</div>
			

			 <?php endwhile; ?>
</div></div> <!-- end wrap -->

		
	<?php else : ?>
	
		<?php

		if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>Никакой статьи для %s я пока не написал. Ждите...</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>No posts found.</h2>");
		}

		?>

		<?php endif; ?>
		

<div class="arrows"> 
<span  style="float:right"><?php previous_posts_link( 'Новые &rarr;' ); ?></span>
<span><?php next_posts_link( '&larr; Старые' ); ?></span>
</div>
	
<?php get_footer(); ?>
