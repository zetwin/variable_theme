<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php wp_title('&laquo;', true, 'right'); bloginfo( 'name' ); ?></title>
    <meta name="description" content="<?php wp_title('&laquo;', true, 'right'); bloginfo( 'name' ); ?>">
    <meta name="author" content="zetwin">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="//variable.pp.ua/wp-content/themes/variable_new/codecolorer.css" type="text/css" media="screen" />
	<?php wp_head(); ?>
	<link href="//variable.pp.ua/telegramassistant/telegram-site-helper.css" rel="stylesheet">
	<script type="text/javascript" src="//variable.pp.ua/telegramassistant/telegram-site-helper.js"></script>
	  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-3470633537191816",
          enable_page_level_ads: true
     });
</script>
  </head>
  <body>


  <span class="huge_title">

  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php  if ( !is_home() ) { /* If this is a category archive */ if (is_single()) { ?>
		<?php the_title(); ?>
		 <?php /* If this is a category archive */} elseif (is_category()) { ?>
		<?php single_cat_title(); ?>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		Все по тегу &#8216;<?php single_tag_title(); ?>&#8217;
	<?php /* If this is a daily archive */ } elseif (is_page()) { ?>
			<?php the_title(); ?>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		Записи за <?php the_time('F jS, Y'); ?>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		Записи за <?php the_time('F, Y'); ?>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		Записи за <?php the_time('Y'); ?>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		Author Archive
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		Blog Archives
 	  <?php }} ?>

  </span>


<div id="box">
		<aside>
		<a class="randompost" href="/index.php?random=1">Случайный пост</a>

		<div class="profile_card">
			<div class="avatar"></div>
			<div class="text">
				<div class="name">Zetwin</div>
				<div class="desc">Веб разработка, контекст, SEO, парсинг, наполнение интернет магазинов</div>
				<span class="message" id="chat_bot">Сообщение</span>
			</div>
		</div>

		<?php wp_nav_menu('menu=topmenu'); ?>
		<?php dynamic_sidebar( 'right_side' ); ?>


<div id="visitors">

<!--LiveInternet counter <script type="text/javascript">document.write("<a href='http://www.liveinternet.ru/click' target=_blank><img src='//counter.yadro.ru/hit?t25.2;r" + escape(document.referrer) + ((typeof(screen)=="undefined")?"":";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?screen.colorDepth:screen.pixelDepth)) + ";u" + escape(document.URL) + ";" + Math.random() + "' border=0 width=88 height=15 alt='' title='LiveInternet: показано число посетителей за сегодня'><\/a>")</script>
<!--/LiveInternet-->

<!-- Yandex.Metrika counter --> <script type="text/javascript" > (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter19247401 = new Ya.Metrika({ id:19247401, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://cdn.jsdelivr.net/npm/yandex-metrica-watch/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/19247401" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

<!-- Google.Analytic --><script type="text/javascript">var _gaq=_gaq||[];_gaq.push(['_setAccount','UA-30476524-1']);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src=('https:'==document.location.protocol?'https://ssl':'http://www')+'.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga,s)})();</script>

<!--########### banners ################# -->
				 <!--noindex
				<noindex>
				<script language='javascript' charset='UTF-8' type='text/javascript' src='http://lama.variable.pp.ua/8h5rne0rx979edy3d8cmc4146lmhowgl'></script>
				<a href="http://full-house.in.ua" alt="отопление, водоснабжение, сантехника" style="font-size:8px;">full-house отопление, водоснабжение, сантехника</a>
				</noindex>
				<!--/noindex-->
				<!--
				<script rel="nofollow" async type="text/javascript" src="http://tmserver-1.com/0yoqvyms7s0u20kps1l80xxq05xow917raxfmwr6"></script>

				########### banners##################-->


		</div>
		</aside>
	<div class="content">