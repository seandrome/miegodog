<?php ob_start(); ?>
<?php header("HTTP/1.1 200 OK "); ?>
<?php header("Status: 200 OK "); ?>
<?php get_header(); ?>
<style>
b, strong{font-weight:normal;}
em{font-style:none;}
u{text-decoration:none;}
</style>
<div id="content">
<?php
  $kata = urlencode(CleanFileNameTitle($title));
  $kata .= "";
  $googlerss  = simplexml_load_file('http://www.bing.com/search?q='.$kata.'&go=&form=QBLH&filt=all&format=rss');
  foreach ($googlerss->channel->item as $itemrss) {
  $title = ''.htmlspecialchars(BannedKeyword(hilangkan_karakter($itemrss->title))).'';
  $title_arr = explode( " ", $title );
  $first_word = "ebook";
  $post_slug = ubah_tanda( $title );
  $permalinks = get_bloginfo( "url" )."/".$post_slug.".pdf";
		echo '<p itemprop="summary">'.CleanFileNameTitle($title).' '.ucwords(strtolower(BannedKeyword(hilangkan_karakter($itemrss->title)))).' '.strtolower(BannedKeyword(hilangkan_karakter($itemrss->description))).' '.ucwords(strtolower(BannedKeyword(hilangkan_karakter($itemrss->title)))).'.</p>' . "\n";
		}
		if (empty($itemrss)) {
  echo '';
}
?>
<?php
	$kata = urlencode(CleanFileNameTitle($title));
	$kata = str_replace('2008+taurus+x', '2008', $kata);
	$kata .= "+filetype%3Apdf";
	$googlerss  = simplexml_load_file('http://www.bing.com/search?q='.$kata.'+filetype:html&go=&form=QBLH&filt=all&format=rss');
	foreach ($googlerss->channel->item as $itemrss) {
	$title = ''.htmlspecialchars(BannedKeyword(hilangkan_karakter($itemrss->title))).'';
	$title_arr = explode( " ", $title );
	$first_word = "ebook";
	$post_slug = ubah_tanda( $title );
	$permalinks = get_bloginfo( "url" )."/".$post_slug.".pdf";
	$coba = rand(1, 999);
		echo '<div id="title">'.ucwords(strtolower(BannedKeyword(hilangkan_karakter($itemrss->title)))).'</div>' . "\n";
		echo '<p>'.strtolower(BannedKeyword(hilangkan_karakter($itemrss->title))).' '.strtolower(BannedKeyword(hilangkan_karakter($itemrss->description))).' '.strtolower(BannedKeyword(hilangkan_karakter(get_search_query()))).' '.ucwords(strtolower(BannedKeyword(hilangkan_karakter($itemrss->title)))).'.</p><div class="clear"></div>' . "\n";
		echo '<div class="GoogleView" id="gv'.$coba.'"></div>' . "\n";
		echo '<div class="download"><a href="javascript:void(null);" onclick="if ($(&apos;#gv'.$coba.'&apos;).html()==&apos;&apos;) $(&apos;#gv'.$coba.'&apos;).html(&apos;<iframe rel=&quot;nofollow&quot; style=&quot;width:100%; height:480px;&quot; src=&quot;http://docs.google.com/gview?url='.$itemrss->link.'&amp;embedded=true&quot;></iframe>&apos;); $(&apos;#gv'.$coba.'&apos;).slideToggle(&apos;fast&apos;); return false;" title="Read '.strtolower(ucwords(htmlspecialchars(BannedKeyword(hilangkan_karakter($itemrss->title))))).'"><img src="http://www.cizwin.com/wp-content/uploads/2013/01/ok.jpg" title="title">Read '.strtolower(ucwords(htmlspecialchars(BannedKeyword(hilangkan_karakter($itemrss->title))))).'</a></div><div class="clear"></div>';
		}
		if (empty($itemrss)) {
		echo '<p>Find <b>'.htmlspecialchars(BannedKeyword(hilangkan_karakter(get_search_query()))).'.</b> from the list below. Read and download the <b><u>'.htmlspecialchars(BannedKeyword(hilangkan_karakter(get_search_query()))).'</u></b> for free.</p>';
	}
?>
<?php
	$kata = urlencode(CleanFileNameTitle($title));
	$kata = str_replace('2008+taurus+x', '2008', $kata);
	$kata .= "+filetype%3Apdf";
	$googlerss  = simplexml_load_file('http://www.bing.com/search?q='.$kata.'+filetype:pdf&go=&form=QBLH&filt=all&format=rss');
	foreach ($googlerss->channel->item as $itemrss) {
	$title = ''.htmlspecialchars(BannedKeyword(hilangkan_karakter($itemrss->title))).'';
	$title_arr = explode( " ", $title );
	$first_word = "ebook";
	$post_slug = ubah_tanda( $title );
	$permalinks = get_bloginfo( "url" )."/".$post_slug.".pdf";
	$coba = rand(1, 999);
		echo '<div id="title">'.ucwords(strtolower(BannedKeyword(hilangkan_karakter($itemrss->title)))).'</div>' . "\n";
		echo '<p>'.CleanFileNameTitle($title).' '.strtolower(BannedKeyword(hilangkan_karakter($itemrss->title))).' '.strtolower(BannedKeyword(hilangkan_karakter($itemrss->description))).' '.strtolower(BannedKeyword(hilangkan_karakter(get_search_query()))).' '.ucwords(strtolower(BannedKeyword(hilangkan_karakter($itemrss->title)))).'.</p><div class="clear"></div>' . "\n";
		echo '<div class="GoogleView" id="gv'.$coba.'"></div>' . "\n";
		echo '<div class="download"><a href="javascript:void(null);" onclick="if ($(&apos;#gv'.$coba.'&apos;).html()==&apos;&apos;) $(&apos;#gv'.$coba.'&apos;).html(&apos;<iframe rel=&quot;nofollow&quot; style=&quot;width:100%; height:480px;&quot; src=&quot;http://docs.google.com/gview?url='.$itemrss->link.'&amp;embedded=true&quot;></iframe>&apos;); $(&apos;#gv'.$coba.'&apos;).slideToggle(&apos;fast&apos;); return false;" title="Read '.strtolower(ucwords(htmlspecialchars(BannedKeyword(hilangkan_karakter($itemrss->title))))).'"><img src="http://www.cizwin.com/wp-content/uploads/2013/01/ok.jpg" title="title">Read '.strtolower(ucwords(htmlspecialchars(BannedKeyword(hilangkan_karakter($itemrss->title))))).'</a></div><div class="clear"></div>';
		}
		if (empty($itemrss)) {
		echo '<p>Find <b>'.htmlspecialchars(BannedKeyword(hilangkan_karakter(get_search_query()))).'.</b> from the list below. Read and download the <b><u>'.htmlspecialchars(BannedKeyword(hilangkan_karakter(get_search_query()))).'</u></b> for free.</p>';
	}
?>
<?php
	$kata = urlencode(CleanFileNameTitle($title));
	$kata = str_replace('2008+taurus+x', '2008', $kata);
	$kata .= "+filetype%3Apdf";
	$googlerss  = simplexml_load_file('http://www.bing.com/search?q='.$kata.'+filetype:php&go=&form=QBLH&filt=all&format=rss');
	foreach ($googlerss->channel->item as $itemrss) {
	$title = ''.htmlspecialchars(BannedKeyword(hilangkan_karakter($itemrss->title))).'';
	$title_arr = explode( " ", $title );
	$first_word = "ebook";
	$post_slug = ubah_tanda( $title );
	$permalinks = get_bloginfo( "url" )."/".$post_slug.".pdf";
	$coba = rand(1, 999);
		echo '<div id="title">'.ucwords(strtolower(BannedKeyword(hilangkan_karakter($itemrss->title)))).'</div>' . "\n";
		echo '<p>'.strtolower(BannedKeyword(hilangkan_karakter($itemrss->title))).' '.strtolower(BannedKeyword(hilangkan_karakter($itemrss->description))).' '.strtolower(BannedKeyword(hilangkan_karakter(get_search_query()))).' '.ucwords(strtolower(BannedKeyword(hilangkan_karakter($itemrss->title)))).'.</p><div class="clear"></div>' . "\n";
		echo '<div class="GoogleView" id="gv'.$coba.'"></div>' . "\n";
		echo '<div class="download"><a href="javascript:void(null);" onclick="if ($(&apos;#gv'.$coba.'&apos;).html()==&apos;&apos;) $(&apos;#gv'.$coba.'&apos;).html(&apos;<iframe rel=&quot;nofollow&quot; style=&quot;width:100%; height:480px;&quot; src=&quot;http://docs.google.com/gview?url='.$itemrss->link.'&amp;embedded=true&quot;></iframe>&apos;); $(&apos;#gv'.$coba.'&apos;).slideToggle(&apos;fast&apos;); return false;" title="Read '.strtolower(ucwords(htmlspecialchars(BannedKeyword(hilangkan_karakter($itemrss->title))))).'"><img src="http://www.cizwin.com/wp-content/uploads/2013/01/ok.jpg" title="title">Read '.strtolower(ucwords(htmlspecialchars(BannedKeyword(hilangkan_karakter($itemrss->title))))).'</a></div><div class="clear"></div>';
		}
		if (empty($itemrss)) {
		echo '<p>Find <b>'.htmlspecialchars(BannedKeyword(hilangkan_karakter(get_search_query()))).'.</b> from the list below. Read and download the <b><u>'.htmlspecialchars(BannedKeyword(hilangkan_karakter(get_search_query()))).'</u></b> for free.</p>';
	}
?>
<br>
<?php if(function_exists('stt_random_terms')) echo stt_random_terms(20) ;?>, <?php if(function_exists('stt_recent_terms')) echo stt_recent_terms(7) ;?>
</div><!-- end #main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>