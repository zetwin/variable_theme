<?php get_header(); ?>

	<?php get_search_form(); ?>
	
	<ul>
	<li>Портфолио</li>
	<li>Проекты</li>
	<li>Идеи
		<ul>
		<li>Система доставки воды (еды для ресторанов)</li>
		<li>Доставка еды</li>
		<li>Организация офисов</li>
		<li>Батарея для велосипедов</li>
		<li>Интернет магазин лендингов</li>
		</ul>
</li>
	<li>Избранные статьи</li>
	<li>Избранный софт</li>
	</ul>

		<section class="widget">
    <div class="widget-heading">
      <h3 class="widget-title">Последние записи</h3>
          </div>
    <ul class="downloads">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<li class="download">
         <span class="count"><?php echo get_the_date(); ?></span>
		 <a class="download-info" href="<?php echo get_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_the_title(); ?></a>
		 
            </li>

<?php endwhile; else: ?> 
Нету постов
<?php endif; ?>

    </ul>
  </section>
  
  <section class="widget">
    <div class="widget-heading">
      <h3 class="widget-title">Топ просмотров</h3>
          </div>
         <ul class="downloads">
	<?php $list = get_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC&posts_per_page=10'); 
	foreach( $list as $post ) : ?>
		<li class="download" >
		<span class="count"><?php echo getPostViews(get_the_ID()); ?></span>
		<a class="view" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</li>
	<?php endforeach; ?>
	</ul>
  </section>
		<div class="allrec"><a href="http://variable.pp.ua/category/archive/">Все записи</a></div>
		<span class="aligncenter">Личный блог с заметками и опытом в использовании разных технологий, проверка безопасности компьютерных сетей.</span>
<?php get_footer(); ?>