<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	
<h1 class="archive-title"><?php printf( __( '%s', 'twentyfourteen' ), single_cat_title( '', false ) ); ?></h1>
	  

<?php
	$args = array('child_of' => $cat);
	$categories = get_categories( $args );
	if($categories){
	
	
	
	echo '<h2 style="
    color: rgba(110, 179, 206, 0.69);
    font-weight: 700;
    font-size: 17px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.12);
    margin-bottom: 20px;
">Категории</h2><ul class="subcats">';
	foreach($categories as $cat) {
		echo '<li><a href="' . get_category_link($cat->term_id) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>';
			 if(z_taxonomy_image_url($cat->term_id)): echo '<img src="' . z_taxonomy_image_url($cat->term_id, 'thumbnail'). '"/>';
			else : echo '<img src="http://images.variable.pp.ua/cat/no_image.png"/>';
			endif;
		echo '<div class="post-details-wrapper">';
		echo '<span>' . $cat->cat_name.'</span> ';
		echo '</div>';
		echo '</a></li>';
	}
	echo '</ul>';
	}
?>

<h2 style="
    color: rgba(110, 179, 206, 0.69);
    font-weight: 700;
    font-size: 17px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.12);
    margin-bottom: 20px;
">Статьи</h2>
<ul class="posts">
		<?php while (have_posts()) : the_post(); ?>

			 <li >
		
			 <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
			<?php if ( has_post_thumbnail() ) {the_post_thumbnail('thumbnail');} else  echo "<img src=\"http://variable.pp.ua/wp-content/plugins/yuzo-related-post/assets/images/default.png\">";?>
			 <?php the_title(); ?></a><span class="date"><?php echo get_the_date(); ?></span></li>

			 <?php endwhile; ?>
</ul>

		
<?php else : printf("<h2 class='center'>Никакой статьи для %s я пока не написал. Ждите...</h2>", single_cat_title('',false)); endif;?>
		



<div class="arrows"> 
<span  style="float:right"><?php previous_posts_link( 'Новые &rarr;' ); ?></span>
<span><?php next_posts_link( '&larr; Старые' ); ?></span>
</div>

<?php
    echo '<p>'. $cat->description . '</p>';
?>
	
<?php get_footer(); 

// global $_wp_additional_image_sizes; 
// print '<pre>'; 
// print_r( $_wp_additional_image_sizes ); 
// print '</pre>';
?>
