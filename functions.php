<?php
wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css', array(), filemtime(get_theme_file_path('/style.css')));
/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	
	// Remove from TinyMCE
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter out the tinymce emoji plugin.
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}


// // add_action( 'after_setup_theme', 'woocommerce_support' );
// // function woocommerce_support() {
// //     add_theme_support( 'woocommerce' );
// // }



// // remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10); // Убрали
// // remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
// // add_action('woocommerce_before_main_content', create_function('', 'echo "<div id=\"contentwrapper\"><div id=
// // \"content\">";'), 10);
// // function divandsidebar_function(){
// // echo "</div></div>";
// // dynamic_sidebar('woo_side'); // после обертки вызвали sidebar-left.php
// // }
// // add_action('woocommerce_after_main_content', 'divandsidebar_function', 10);  // Свои поставили





// add_custom_background();

// remove_action('wp_head', 'wp_generator');
// remove_action('wp_head', 'wlwmanifest_link');
// remove_action('wp_head', 'rsd_link');


// function meks_disable_srcset( $sources ) {
//     return false;
// }
 
// add_filter( 'wp_calculate_image_srcset', 'meks_disable_srcset' );
	
	
// //===========LIKES COUNTER============начало===========

// $timebeforerevote = 1200;

// add_action('wp_ajax_nopriv_post-like', 'post_like');
// add_action('wp_ajax_post-like', 'post_like');
// wp_enqueue_script('like_post', get_template_directory_uri().'/js/post-like.js', array('jquery'), '1.0', 1 );
// wp_localize_script('like_post', 'ajax_var', array(
// 	'url' => admin_url('admin-ajax.php'),
// 	'nonce' => wp_create_nonce('ajax-nonce')
// ));
// function post_like()
// {
// 	$nonce = $_POST['nonce'];
 
//     if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
//         die ( 'Busted!');
		
// 	if(isset($_POST['post_like']))
// 	{
// 		$ip = $_SERVER['REMOTE_ADDR'];
// 		$post_id = $_POST['post_id'];
		
// 		$meta_IP = get_post_meta($post_id, "voted_IP");

// 		$voted_IP = $meta_IP[0];
// 		if(!is_array($voted_IP))
// 			$voted_IP = array();
		
// 		$meta_count = get_post_meta($post_id, "votes_count", true);

// 		if(!hasAlreadyVoted($post_id))
// 		{
// 			$voted_IP[$ip] = time();

// 			update_post_meta($post_id, "voted_IP", $voted_IP);
// 			update_post_meta($post_id, "votes_count", ++$meta_count);
			
// 			echo $meta_count;
// 		}
// 		else
// 			echo "готово";
// 	}
// 	exit;
// }
// function hasAlreadyVoted($post_id)
// {
// 	global $timebeforerevote;
// 	$meta_IP = get_post_meta($post_id, "voted_IP");
// 	$voted_IP = $meta_IP[0];
// 	if(!is_array($voted_IP))
// 		$voted_IP = array();
// 	$ip = $_SERVER['REMOTE_ADDR'];
	
// 	if(in_array($ip, array_keys($voted_IP)))
// 	{
// 		$time = $voted_IP[$ip];
// 		$now = time();
		
// 		if(round(($now - $time) / 60) > $timebeforerevote)
// 			return false;
			
// 		return true;
// 	}
// 	return false;
// }
// function getPostLikeLink($post_id)
// {
// 	$themename = "twentyeleven";
// 	$vote_count = get_post_meta($post_id, "votes_count", true);
// 	$output = '<span class="post-like">';  
//     if(hasAlreadyVoted($post_id))  
//         $output .= ' <span title="'.__('I like this article', $themename).'" class="like alreadyvoted"></span>';  
//     else  
//         $output .= '<u data-post_id="'.$post_id.'"> 
//                     <span  title="'.__('I like this article', $themename).'" class="qtip like"></span> 
//                 </u>';  
//     $output .= '<span class="count">'.$vote_count.'</span></span>';  
      
//     return $output; 
// }
// //===========LIKES COUNTER============конец===========

// Счетчик посещений============начало================
//Запись===
function setPostViews($postID) {
	$user_ip = $_SERVER['REMOTE_ADDR'];
    $key = $user_ip . 'x' . $postID;
    $value = array($user_ip, $postID);
    $visited = get_transient($key);

	 if ( false === ( $visited ) ) {

        //store the unique key, Post ID & IP address for 12 hours if it does not exist
        set_transient( $key, $value, 60*60*12 );

    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
}

//Вывод===
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
        if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}

// Счетчик посещений===========конец=============

// // Счетчик комментариев===========начало=========
// // function disqus_count() {
//     // wp_enqueue_script('disqus_count','http://zetwin.disqus.com/count.js');
//     // echo '<a href="'. get_permalink() .'#disqus_thread"></a>';
// // };
// // Счетчик комментариев===========конец==========


// add_theme_support( 'post-thumbnails' ); 
// if (function_exists('add_theme_support')) {
//     add_theme_support('menus');
// }

// /**
//  * Register our sidebars and widgetized areas.
//  *
//  */
// function true_register_wp_sidebars() {
 
// 	/* В боковой колонке - первый сайдбар */
// 	register_sidebar(
// 		array(
// 			'id' => 'right_side', // уникальный id
// 			'name' => 'Правая колонка', // название сайдбара
// 			'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
// 			'before_widget' => '<div id="%1$s" class="side  %2$s">', // по умолчанию виджеты выводятся <li>-списком
// 			'after_widget' => '</div>',
// 			'before_title' => '<h3>', // по умолчанию заголовки виджетов в <h2>
// 			'after_title' => '</h3>'
// 		)
// 	);
// 		/* В боковой колонке - первый сайдбар */
// 	register_sidebar(
// 		array(
// 			'id' => 'woo_side', // уникальный id
// 			'name' => 'Правая woo колонка', // название сайдбара
// 			'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
// 			'before_widget' => '<div id="%1$s" class="side  %2$s">', // по умолчанию виджеты выводятся <li>-списком
// 			'after_widget' => '</div>',
// 			'before_title' => '<h3>', // по умолчанию заголовки виджетов в <h2>
// 			'after_title' => '</h3>'
// 		)
// 	);
// }
 
// add_action( 'widgets_init', 'true_register_wp_sidebars' );

// //add_image_size( 'yarpp-thumbnail', 160, 100, false );

// // function new_excerpt_length($length) {
// // 	return 30;
// // }
// // add_filter('excerpt_length', 'new_excerpt_length');
// // add_filter('excerpt_more', function($more) {
// // 	return '...';
// // });



// //RANDOMPOST BUTTON

// add_action('init','random_add_rewrite');
// function random_add_rewrite() {
//        global $wp;
//        $wp->add_query_var('random');
//        add_rewrite_rule('random/?$', 'index.php?random=1', 'top');
// }
 
// add_action('template_redirect','random_template');
// function random_template() {
//        if (get_query_var('random') == 1) {
//                $posts = get_posts('post_type=post&orderby=rand&numberposts=1');
//                foreach($posts as $post) {
//                        $link = get_permalink($post);
//                }
//                wp_redirect($link,307);
//                exit;
//        }
// }