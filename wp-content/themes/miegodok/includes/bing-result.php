<div class="post">
<p>
<?php // Get RSS Feed(s)
include_once(ABSPATH . WPINC . '/feed.php');
$termstring =  $s;
$dilarang = array("+-amazon");
$rss = fetch_feed('http://www.bing.com/search?q='.urlencode($termstring).'&go=&form=QBLH&filt=all&format=rss');
if (!is_wp_error( $rss ) ) : // Checks that the object is created correctly
$maxitems = $rss->get_item_quantity(3);
$rss_items = $rss->get_items(0, $maxitems);
endif;
?>
<?php if ($maxitems == 0) echo '';
else
// Loop through each feed item and display each item as a hyperlink.
foreach ( $rss_items as $item ) : ?>
<?php
$title = ''.htmlspecialchars(BannedKeyword(hilangkan_karakter($item->get_title()))).'';
$title_arr = explode( " ", $title );
$first_word = $title_arr[0];
$post_slug = create_slug( $title );
$permalinks = get_bloginfo( "url" )."/".strtolower( $first_word )."/".$post_slug.".pdf";
?>
<?php echo strtolower(hilangkan_karakter($termstring)); ?> <?php echo htmlspecialchars(BannedKeyword(hilangkan_karakter($item->get_title()))); ?> <?php echo strtolower(htmlspecialchars(BannedKeyword(hilangkan_karakter($item->get_content())))); ?>. 
<?php endforeach; ?>
</p>
<input type="hidden" name="IL_IN_TAG" value="1"/>
<p>
<?php // Get RSS Feed(s)
include_once(ABSPATH . WPINC . '/feed.php');
$termstring =  $s;
$dilarang = array("+-amazon");
$rss = fetch_feed('http://www.bing.com/search?q='.urlencode($termstring).'+filetype:pdf+-amazon&go=&form=QBLH&filt=all&format=rss');
if (!is_wp_error( $rss ) ) : // Checks that the object is created correctly
$maxitems = $rss->get_item_quantity(5);
$rss_items = $rss->get_items(0, $maxitems);
endif;
?>
<?php if ($maxitems == 0) echo '';
else
// Loop through each feed item and display each item as a hyperlink.
foreach ( $rss_items as $item ) : ?>
<?php
$title = ''.htmlspecialchars(BannedKeyword(hilangkan_karakter($item->get_title()))).'';
$title_arr = explode( " ", $title );
$first_word = $title_arr[0];
$post_slug = create_slug( $title );
$permalinks = get_bloginfo( "url" )."/".strtolower( $first_word )."/".$post_slug.".pdf";
?>
<h3><?php echo htmlspecialchars(BannedKeyword(hilangkan_karakter($item->get_title()))); ?></h3>
<p><strong><?php echo strtolower(hilangkan_karakter($termstring)); ?></strong> <?php echo strtolower(htmlspecialchars(BannedKeyword(hilangkan_karakter($item->get_content())))); ?> <em><strong><?php echo strtolower(htmlspecialchars(BannedKeyword(hilangkan_karakter($item->get_title())))); ?></strong></em></p>
<div class="postmeta"><a href="<?php echo $item->get_permalink(); ?>" title="Download this pdf file">Download this pdf file</a></div>
<?php endforeach; ?>
</p>
<input type="hidden" name="IL_IN_TAG" value="1"/>
<p>
<?php // Get RSS Feed(s)
include_once(ABSPATH . WPINC . '/feed.php');
$termstring =  $s;
$dilarang = array("+-amazon");
$rss = fetch_feed('http://www.bing.com/search?q='.urlencode($termstring).'+"html"&go=&form=QBLH&filt=all&format=rss');
if (!is_wp_error( $rss ) ) : // Checks that the object is created correctly
$maxitems = $rss->get_item_quantity(3);
$rss_items = $rss->get_items(0, $maxitems);
endif;
?>
<?php if ($maxitems == 0) echo '';
else
// Loop through each feed item and display each item as a hyperlink.
foreach ( $rss_items as $item ) : ?>
<?php
$title = ''.htmlspecialchars(BannedKeyword(hilangkan_karakter($item->get_title()))).'';
$title_arr = explode( " ", $title );
$first_word = $title_arr[0];
$post_slug = create_slug( $title );
$permalinks = get_bloginfo( "url" )."/".strtolower( $first_word )."/".$post_slug.".pdf";
?>
<?php echo htmlspecialchars(BannedKeyword(hilangkan_karakter($item->get_title()))); ?> <?php echo strtolower(htmlspecialchars(BannedKeyword(hilangkan_karakter($item->get_content())))); ?>. 
<?php endforeach; ?>
</p>
<p>
<?php // Get RSS Feed(s)
include_once(ABSPATH . WPINC . '/feed.php');
$termstring =  $s;
$dilarang = array("+-amazon");
$rss = fetch_feed('http://www.bing.com/search?q='.urlencode($termstring).'+"php"&go=&form=QBLH&filt=all&format=rss');
if (!is_wp_error( $rss ) ) : // Checks that the object is created correctly
$maxitems = $rss->get_item_quantity(3);
$rss_items = $rss->get_items(0, $maxitems);
endif;
?>
<?php if ($maxitems == 0) echo '';
else
// Loop through each feed item and display each item as a hyperlink.
foreach ( $rss_items as $item ) : ?>
<?php
$title = ''.htmlspecialchars(BannedKeyword(hilangkan_karakter($item->get_title()))).'';
$title_arr = explode( " ", $title );
$first_word = $title_arr[0];
$post_slug = create_slug( $title );
$permalinks = get_bloginfo( "url" )."/".strtolower( $first_word )."/".$post_slug.".pdf";
?>
<?php echo htmlspecialchars(BannedKeyword(hilangkan_karakter($item->get_title()))); ?> <?php echo strtolower(htmlspecialchars(BannedKeyword(hilangkan_karakter($item->get_content())))); ?>. 
<?php endforeach; ?>
</p>
</div> 