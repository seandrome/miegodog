<?php
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Sidebar Widget',
'before_widget' => '<div class="widget">', // Removes <li>
'after_widget' => '
</div>
', // Removes </li>
'before_title' => '
<h3 class="sidebread">', // Replaces <h3>
'after_title' => '</h3>
', // Replaces </h3>
));
function get_post_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ 
  	$img_dir = get_bloginfo('template_url');
    $first_img = $img_dir . '/images/thumb.jpg';
  }
  return $first_img;
}
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
function breadcrumb() {
  $delimiter = '';
  $name = ''.get_bloginfo('name').''; //text for the 'Home' link
  $currentBefore = '<span class="title">';
  $currentAfter = '</span>';
  $current = '';
	echo '';
    global $post;
    $home = get_bloginfo('url');
	if(is_home() && get_query_var('paged') == 0) 
	echo '<span class="home">' . $name . ' - '.get_bloginfo('description').'</span>';
	else
	echo '<span typeof="v:Breadcrumb" class="home"><a title="' . $name . '" href="' . $home . '/" rel="v:url" property="v:title">' . $name . '</a></span> '. $delimiter . ' ';

    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $currentBefore;
      single_cat_title();
      echo $currentAfter;

    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('d') . $currentAfter;

    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('F') . $currentAfter;

    } elseif ( is_year() ) {
      echo $currentBefore . get_the_time('Y') . $currentAfter;

    } elseif ( is_single() && !is_attachment() ) {
      $cat = get_the_category(); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<span typeof="v:Breadcrumb" ><a class="title" title="' . get_the_title() . '" href="' . get_permalink() . '" rel="v:url" property="v:title">' . get_the_title() . '</a></span>';
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<span typeof="v:Breadcrumb"><a href="' . get_permalink($parent) . '" rel="v:url" property="v:title">' . $parent->post_title . '</a></span> <span typeof="v:Breadcrumb"><a style="background:none;" href="' . get_permalink() . '" rel="v:url" property="v:title">' . get_the_title() . '</a></span>';

    } elseif ( is_page() && !$post->post_parent ) {
      echo $currentBefore;
      the_title();
      echo $currentAfter;

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;

    } elseif ( is_search() ) {
      echo $current . '<span class="titles">Download Manual eBook</span>'.$currentAfter . ' '.$currentBefore . '' . ucwords(get_search_query()) . $currentAfter;

    } elseif ( is_tag() ) {
      echo $currentBefore;
      single_tag_title();
      echo $currentAfter;

    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $currentBefore. $userdata->display_name . $currentAfter;
    } elseif ( is_404() ) {
      echo $currentBefore. '404 PAGE NOT FOUND !!!' . $currentAfter;
    }
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' ';
      echo $currentBefore . __('Page') . ' ' . get_query_var('paged') . $currentAfter;
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
    }
}
function pagenavi($before = '', $after = '', $prelabel = '', $nxtlabel = '', $pages_to_show = 10, $always_show = false) {
	global $request, $posts_per_page, $wpdb, $paged;
	if(empty($prelabel)) {
		$prelabel  = '<strong>Prev</strong>';
	}
	if(empty($nxtlabel)) {
		$nxtlabel = '<strong>Next</strong>';
	}
	$half_pages_to_show = round($pages_to_show/2);
	if (!is_single()) {
		if(!is_category()) {
			preg_match('#FROM\s(.*)\sORDER BY#siU', $request, $matches);
		} else {
			preg_match('#FROM\s(.*)\sGROUP BY#siU', $request, $matches);
		}
		$fromwhere = $matches[1];
		$numposts = $wpdb->get_var("SELECT COUNT(DISTINCT ID) FROM $fromwhere");
		$max_page = ceil($numposts /$posts_per_page);
		if(empty($paged)) {
			$paged = 1;
		}
		if($max_page > 1 || $always_show) {
			echo "$before <div class=\"pagenavi\"><span class=\"pages\">Page $paged of $max_page:</span>";
			if ($paged >= ($pages_to_show-1)) {
				echo '<a href="'.get_pagenum_link().'">First</a>&nbsp;';
			}
			previous_posts_link($prelabel);
			for($i = $paged - $half_pages_to_show; $i  <= $paged + $half_pages_to_show; $i++) {
				if ($i >= 1 && $i <= $max_page) {
					if($i == $paged) {
						echo "<strong class='current'>$i</strong>";
					} else {
						echo ' <a href="'.get_pagenum_link($i).'">'.$i.'</a> ';
					}
				}
			}
			next_posts_link($nxtlabel, $max_page);
			if (($paged+$half_pages_to_show) < ($max_page)) {
				echo '&nbsp;<a href="'.get_pagenum_link($max_page).'">Last</a>';
			}
			echo "</div> $after";
		}
	}
}
define( "SEARCH_SEPARATOR", "-" );
define( "SEARCH_BEFORE", "(.*)/" );
define( "SEARCH_AFTER", ".php" );
include(TEMPLATEPATH. '/filter.php');
function flush_rules()
{
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
}
add_action( "init", "flush_rules" );

function add_rewrite_rules( $wp_rewrite )
{
    if ( SEARCH_BEFORE || SEARCH_AFTER )
    {
        $preg_index = strpos( SEARCH_BEFORE, "(.*)" ) !== false ? 2 : 1;
        $rule = SEARCH_BEFORE."(.*)".SEARCH_AFTER;
        $new_rules = array( $rule => "index.php?s=".$wp_rewrite->preg_index( $preg_index ), "goto/(.*)" => "index.php?redirect=".$wp_rewrite->preg_index( 1 ) );
        $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
    }
}
add_action( "generate_rewrite_rules", "add_rewrite_rules" );

function query_vars( $public_query_vars )
{
    $public_query_vars[] = "redirect";
    return $public_query_vars;
}
add_filter( "query_vars", "query_vars" );

function create_slug( $postname )
{
    $str = strtolower( trim( $postname ) );
    $str = preg_replace( "/[^a-z0-9-]/", "-", $str );
    $str = preg_replace( "/-+/", "-", $str );
    $str = rtrim( $str, "-" );
    return $str;
}
function ambiljudul($title){
	$title = get_the_title();
	$title = strtolower($title);
	$title = trim($title);
	return ($title);
}
function do_not_cache_feeds(&$feed) {
   $feed->enable_cache(false);
 }
add_action( 'wp_feed_options', 'do_not_cache_feeds' );
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action('wp_head', 'wp_print_scripts');
remove_action('wp_head', 'wp_print_head_scripts', 9);
remove_action('wp_head', 'wp_enqueue_scripts', 1);
function my_remove_thematic_scripts() {
remove_action('wp_head','thematic_head_scripts'); }
add_action('init', 'my_remove_thematic_scripts');
function plc_comment_display( $comment_to_display ) { $comment_to_display = str_replace( '&apos;', "'", $comment_to_display ); return $comment_to_display; }
function fb_disable_feed() { wp_die( __('ERROR..!!!') ); }
add_action('wp_footer', 'wp_print_scripts', 5);
add_action('wp_footer', 'wp_enqueue_scripts', 5);
add_action('wp_footer', 'wp_print_head_scripts', 5);
add_filter( 'comment_text', 'plc_comment_display', '', 1);
add_filter( 'comment_text_rss', 'plc_comment_display', '', 1);
add_filter( 'comment_excerpt', 'plc_comment_display', '', 1);
add_filter('comment_text', 'wp_filter_nohtml_kses');
add_filter('comment_text_rss', 'wp_filter_nohtml_kses');
add_filter('comment_excerpt', 'wp_filter_nohtml_kses');
add_filter('comment_text', 'wp_filter_nohtml_kses');
?>