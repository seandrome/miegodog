<?php
if($_GET['s']!=''){
$ganti = array('+',' ');  
$urlredirect = get_settings('home') . '/watch/' . str_replace($ganti, '+' ,$_GET['s']);  
header("HTTP/1.1 301 Moved Permanently");
header( "Location: $urlredirect" );
}
?> <?php get_header(); ?>
<div class="row">
<div id="breadcrumbs-wrap">
<div class="breadcrumbs">
<a href="/">Home</a><strong><em><?php the_search_query(); ?></em></strong>
</div>
</div>
</div>
<div id="content">
<div class="row">
<div id="content-wrapper">
		<div id="contentleft-wrap">
		<div class="title-content">
			<h1><?php the_search_query(); ?>
			</h1>
			</div>
				<div id="contentleft">	
				
<?php //iki agcne
function right($string, $n)
{
      $balik = strrev($string);
      $hasil = strrev(substr($balik, 0, $n));
      return $hasil;
}
$keyword = $_SERVER['REQUEST_URI'];
$keyword = str_replace('/watch/','',$keyword);
$keyword = str_replace('/tag/','',$keyword);
$keyword = str_replace(' ','+',$keyword);
if(right($keyword,4)>1800){
$key01 = str_replace(right($keyword,5),'',$keyword);
}else{
$key01 = $keyword;
}
$pre = simplexml_load_file('http://www.omdbapi.com/?s='.$key01.'&r=xml&plot=full');
$cek = $pre->attributes()->response;
if($cek=='True'){
foreach($pre->Movie as $prep){
if($prep->attributes()->Year>$maks){
  $maks = substr($prep->attributes()->Year,0,4);
  $imdbID = $prep->attributes()->imdbID;
}
}
foreach( $pre->Movie as $sim){
$similar = $similar.'<br /><a href="/watch/'.str_replace(' ','+',$sim->attributes()->Title).'+'.substr($sim->attributes()->Year,0,4).'">'.$sim->attributes()->Title.' ['.$sim->attributes()->Year.']</a>';
}
$similar= '<h2><u>Similar Movies</u> :</h2>'.$similar;

if(right($keyword,4)>1800){
$key1 = str_replace(right($keyword,5),'',$keyword);
$key2 = right($keyword,4);
$data = simplexml_load_file('http://www.omdbapi.com/?t='.$key1.'&y='.$key2.'&r=xml&plot=full');
} else {
$data = simplexml_load_file('http://www.omdbapi.com/?i='.$imdbID.'&r=xml&plot=full');
}
$cek2 = $data->attributes()->response;
if($cek2=='True'){
$mov_id = '';
if(isset($data->movie->attributes()->imdbID))
$mov_id = str_replace('tt','',$data->movie->attributes()->imdbID);
$mov_title = '';
if(isset($data->movie->attributes()->title))
$mov_title = $data->movie->attributes()->title;
$mov_plot = '';
if(isset($data->movie->attributes()->plot))
$mov_plot = $data->movie->attributes()->plot;
$mov_year = '';
if(isset($data->movie->attributes()->year))
$mov_year = $data->movie->attributes()->year;
$mov_url = '';
if(isset($data->item->imdb_url))
$mov_url = $data->item->imdb_url;
$mov_type = '';
if(isset($data->movie->attributes()->type))
$mov_type = $data->movie->attributes()->type;
$mov_date = '';
if(isset($data->movie->attributes()->released))
$mov_date = $data->movie->attributes()->released;

$mov_poster = '';
if(isset($data->movie->attributes()->poster))
$mov_poster = $data->movie->attributes()->poster;
if($mov_poster == ''){
$mov_poster = 'http://www.imdb.com/images/nopicture/medium/film.png';
}
$mov_genres = '';
if(isset($data->movie->attributes()->genre))
$mov_genres = $data->movie->attributes()->genre;

$mov_dir = '';
if(isset($data->movie->attributes()->director))
$mov_dir = $data->movie->attributes()->director;
$mov_writers = '';
if(isset($data->movie->attributes()->writer))
$mov_writers = $data->movie->attributes()->writer;
$mov_actors = '';
if(isset($data->movie->attributes()->actors))
$mov_actors = $data->movie->attributes()->actors;
$mov_lang = '';
if(isset($data->movie->attributes()->language))
$mov_lang = $data->movie->attributes()->language;
$jdl=str_replace(' ','+',$mov_title);
$data20=simplexml_load_file('http://www.bing.com/search?q='.$jdl.'+trailer+site:youtube.com&format=rss');
$linge = $data20->channel->item[0]->link;
$video_kode = str_replace('http://www.youtube.com/watch?v=','',$linge);
$konten = '';
$konten .= '<p><table width="530" border="0">
  <tr>
    <td width="184" rowspan="8" valign="top"><img src="'.$mov_poster.'" alt="'.$mov_title.'" width="180" height="266" align="left" title="'.$mov_title.'"/></td>
    <td width="77" valign="top"><strong>Title</strong></td>
    <td width="8" valign="top"><strong>:</strong></td>
    <td width="236" valign="top">'.$mov_title.'</td>
  </tr>
  <tr>
    <td valign="top"><strong>Year</strong></td>
    <td valign="top"><strong>:</strong></td>
    <td valign="top">'.$mov_year.'</td>
  </tr>
  <tr>
    <td valign="top"><strong>Genres</strong></td>
    <td valign="top"><strong>:</strong></td>
    <td valign="top">'.$mov_genres.'</td>
  </tr>
  <tr>
    <td valign="top"><strong>Language</strong></td>
    <td valign="top"><strong>:</strong></td>
    <td valign="top">'.$mov_lang.'</td>
  </tr>
  <tr>
    <td valign="top"><strong>Release</strong></td>
    <td valign="top"><strong>:</strong></td>
    <td valign="top">'.$mov_date.'</td>
  </tr>
  <tr>
    <td valign="top"><strong>Directors</strong></td>
    <td valign="top"><strong>:</strong></td>
    <td valign="top">'.$mov_dir.'</td>
  </tr>
  <tr>
    <td valign="top"><strong>Written By</strong></td>
    <td valign="top"><strong>:</strong></td>
    <td valign="top">'.$mov_writers.'</td>
  </tr>
  <tr>
    <td valign="top"><strong>Actors</strong></td>
    <td valign="top"><strong>:</strong></td>
    <td valign="top">'.$mov_actors.'</td>
  </tr>
</table></p><br /><br />';
$konten .= '<p align="center">
  <iframe width="468" height="300" src="http://www.youtube.com/embed/'.$video_kode.'" frameborder="0" allowfullscreen></iframe>
</p>';
$konten .= '<p align="center"><font color="red"><strong>.......Watch Full Movie Here.......</strong></font></p><p align="center" class="style1"><img src="http://i1154.photobucket.com/albums/p536/azonpid/hands8.gif" alt="Under This" /></p><p align="center"><a href="http://playmovie.3owl.com/play.php?movie='.$mov_id.'" rel="nofollow" target="_blank"><img src="http://1.bp.blogspot.com/-hVCNLWuIm2w/Ubb8FPfLa0I/AAAAAAAAADk/MIYjxi2qDmo/s1600/NIIK.png" alt="Watch Full Movie" title="Watch Full Movie"/></a></p>';
$konten .= '<p>'.$mov_plot.'</p><p>'.$similar.'</p>';
echo $konten;
}}
?>

<?php echo spp(get_search_query(), 'default.html', '');?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>	
  
<?php $post_thumb_act = get_theme_option('post_thumb_act1'); if(($post_thumb_act == '') || ($post_thumb_act == 'No')) { ?>
<?php } else { ?><?php include (TEMPLATEPATH . '/thumb.php'); ?><?php } ?>
		<?php echo excerpt(50); ?>
		<div class="entry-meta">
			<?php //entry_meta(); ?>
			<span class="author vcard">Posted by <a class="url fn n" href="<?php if (get_the_author_url()) { ?><?php the_author_url(); ?><?php } else {  ?><?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?><?php } ?>" title="<?php the_author_meta('display_name'); ?>" rel="author me"><?php the_author_meta('display_name'); ?></a></span> - <span class="published entry-date" datetime="<?php the_time('c') ?>"><?php the_time('F j, Y') ?></span> - <span class="entry-utility-prep entry-utility-prep-cat-links category">Posted in: <?php the_category(', '); ?></span>
		<div style="clear: both"></div>
	</div><!-- end #postmeta -->
<div style="border-bottom:dotted 1px #DDD;margin-bottom:5px;">
</div>
	
	<?php endwhile; ?>
			<div class="navigation">
<?php include (TEMPLATEPATH . '/navigasi.php'); ?>
		</div>
<?php else : ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
	<div style="margin:0px 0px 15px 0px;"><?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?></div>
	</div></div>
	<?php include(TEMPLATEPATH."/sidebar.php");?>
<?php $agc_thumb_act1 = get_theme_option('agc_thumb_act1'); if(($agc_thumb_act1 == '') || ($agc_thumb_act1 == 'No')) { ?><?php } else { ?>

<div id="contentleft-wrap">
		<div class="title-content">
			<h2>Related Sites</h2>
			</div>
<div id="contentleft">
	<?php include(TEMPLATEPATH."/agc.php");?>
</div></div><?php } ?>
</div>
</div>
</div>


<?php get_footer(); ?>
