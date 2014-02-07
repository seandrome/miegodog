<div class="post">
<?php
	$keywords = get_search_query();
	$source = 'http://www.bing.com/search?q='.$keywords.'+filetype%3Apdf&count=5&format=rss';
	$ch = curl_init($source);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	$data = curl_exec($ch);
	curl_close($ch);
	$doc = simplexml_load_file($data);
	$jadi = $doc->channel->item;
	if(!empty($jadi)) {
		foreach ($jadi as $item){
			$judul = htmlspecialchars(BannedKeyword(hilangkan_karakter($item->title)));
			$konten = htmlspecialchars(BannedKeyword(hilangkan_karakter($item->description)));
			echo '<p>'.$judul.' '.$keywords.' '.$konten.'</p>';
		}
	} else {
	}
?>
<input type="hidden" name="IL_IN_TAG" value="1"/>
<?php
	$keywords = get_search_query();
	$source = 'http://www.bing.com/search?q='.$keywords.'+filetype%3Apdf&count=5&format=rss';
	$ch = curl_init($source);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	$data = curl_exec($ch);
	curl_close($ch);
	$doc = simplexml_load_file($data);
	$jadi = $doc->channel->item;
	if(!empty($jadi)) {
		foreach ($jadi as $item){
			$judul = htmlspecialchars(BannedKeyword(hilangkan_karakter($item->title)));
			$konten = htmlspecialchars(BannedKeyword(hilangkan_karakter($item->description)));
			$link = $item->link;
			echo '<h3>'.$judul.'</h3>';
			echo '<p>'.$judul.' '.$keywords.' '.$konten.'</p>';
			echo '<div class="postmeta"><a title="Download this pdf file" href="'.$link.'">Download this pdf file</a></div>';
		}
	} else {
	}
?>
</div><!-- end of .post -->