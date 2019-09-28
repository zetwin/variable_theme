<?php get_header(); ?>
<?php edit_post_link(" "); ?>
<?php setPostViews(get_the_ID()); ?>


<div class="articleinfo">
  <div class="viewsdate"><i class="icon views"></i><span><?php echo getPostViews(get_the_ID()); ?></span> <i class="icon postdate"></i><span itemprop="datePublished"><?php the_time('Y-m-d') ?></span></div>
  <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
    <?php if (function_exists('bcn_display')) {
      bcn_display();
    } ?>
  </div>
</div>


<article itemscope itemtype="http://schema.org/Article">
  <h1 itemprop="name"><?php the_title(); ?></h1>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php the_content('Read the rest of this entry &raquo;'); ?>
    <?php endwhile;
    else : ?>
    <p>Sorry, no posts matched your criteria.</p>
  <?php endif; ?>

  <div class="tags"><?php the_tags('', ''); ?></div>

  <?php if(0){?>
    <div id="relatedNotes" class="bottom" style="">
        <h3 class="related">Похожие записи</h3>
        <ul>
          <?php $args = array('numberposts' => 5, 'orderby' => 'rand', 'post_status' => 'publish', 'offset' => 1);
      $rand_posts = get_posts($args);
      foreach ($rand_posts as $post) : ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
    
  <?php }?>

  <div class="articleinfo">
    <span itemprop="author">zetwin</span>
    <span itemprop="datePublished"><?php the_time('Y-m-d') ?></span>
    <span itemprop="dateModified"><?php the_modified_date('Y-m-d'); ?></span>
    <span itemprop="cancelpublisher">zetwin</span>
  </div>
</article>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle" style="display:block" data-ad-format="autorelaxed" data-ad-client="ca-pub-3470633537191816" data-ad-slot="3017622453"></ins>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({});
</script>

<script type="text/javascript">
  var disqus_shortname = 'zetwin'; // required: replace example with your forum shortname
  (function() {
    var dsq = document.createElement('script');
    dsq.type = 'text/javascript';
    dsq.async = true;
    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
  })();
</script>
<div id="disqus_thread">
  <a></a>
</div>

<!-- <div class="tiser">

<script type="text/javascript">
teasernet_blockid = 490948;
teasernet_padid = 231672;
</script>
<script type="text/javascript" src="http://kistured.com/67/2/291f0c093d5e61/23.js"></script>

</div> -->




<?php get_footer();
// global $_wp_additional_image_sizes;
// print '<pre>';
// print_r( $_wp_additional_image_sizes );
// print '</pre>';
?>