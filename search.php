<?php get_header(); ?>


<?php get_search_form(); ?>
  <h2 class="pagetitle">
    Результаты поиска для &quot;
    <?php the_search_query(); ?>
    &quot;
  </h2>
  <ul class="archive">
    
	<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
  <li >
	
          <a href="
<?php the_permalink() ?>
" rel="bookmark" title="Permanent Link to 
<?php the_title(); ?>
">
  <?php the_title(); ?>
          </a>
          <span class="date">
            <?php echo get_the_date(); ?>
          </span>
  </li>
  
  <?php endwhile; ?>
  <?php else : ?>
  
  <h2 class="center">
    Упс! Не могу найти 
    <?php the_search_query(); ?>
    .
    <br>
    Может что нибудь еще?
  </h2>
  
  <?php endif; ?>
  
  
  
  <!-- then the pagination links -->
  
  
  </ul>
  <div class="arrows">
    
    <span  style="float:right">
      <?php previous_posts_link( 'Новые &rarr;' ); ?>
    </span>
    <span>
      <?php next_posts_link( '&larr; Старые' ); ?>
    </span>
  </div>


<?php get_footer(); ?>