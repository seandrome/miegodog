<?php get_header(); ?>
<div class="row">
<div id="breadcrumbs-wrap">
<div class="breadcrumbs">
<?php breadcrumbs(); ?>
</div>
</div>
</div>
<div id="content">
<div class="row">
<div id="content-wrapper">
<div class="row">
<div class="entry-head">
<div class="entry-dates">
<span class="published entry-date"><?php the_time('l, F jS, Y \a\t G:i') ?> </span> &nbsp  
<fb:like href="<?php echo get_permalink(); ?>" send="false" layout="button_count" width="110" show_faces="false" margin-top:2px;></fb:like>
&nbsp &nbsp 
<!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone" data-size="small" data-annotation="inline" data-width="150"></div>
&nbsp &nbsp 
<a href="https://twitter.com/share" class="twitter-share-button" data-via="kamarbaca" data-lang="id" data-related="widyanfakhrul" data-hashtags="kamarbaca">Tweet</a>
</div>
</div>
</div>
		<div id="contentleft-wrap">
		<div class="title-content">
			<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php bloginfo('description'); ?>"><?php the_title(); ?></a></h1>
			</div>
<div id="contentleft">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php //iki agcne
function right($string, $n)
{
      $balik = strrev($string);
      $hasil = strrev(substr($balik, 0, $n));
      return $hasil;
}
$keyword = str_replace('/','',$_SERVER['REQUEST_URI']);
/*
$keyword = str_replace(' ','+',$keyword);
if(right($keyword,4)>1800){
$key01 = str_replace(right($keyword,5),'',$keyword);
}
*/
$pre = simplexml_load_file('http://www.omdbapi.com/?s='.$keyword.'&r=xml&plot=full');
$cek = $pre->attributes()->response;
if($cek=='True'){
foreach($pre->Movie as $prep){
if($prep->attributes()->Year>$maks){
  $maks = substr($prep->attributes()->Year,0,4);
  $imdbID = $prep->attributes()->imdbID;
}
}
$ulbuka = '<ul>';
$ultutup = '</ul>';
foreach( $pre->Movie as $sim){
$similar = $similar.'<br /><a href="/watch/'.str_replace(' ','+',$sim->attributes()->Title).'+'.substr($sim->attributes()->Year,0,4).'">'.$sim->attributes()->Title.' ['.$sim->attributes()->Year.']</a>';
}
$similar= '<h2><u>Similar Movies</u> :</h2>'.$similar;
$data = simplexml_load_file('http://www.omdbapi.com/?i='.$imdbID.'&r=xml&plot=full');
$cek2 = $data->attributes()->response;
if($cek2=='True'){
//echo $data->movie->attributes()->title;
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
	
	<?php the_content(); ?>
<?php $footer_act = get_theme_option('tengah_tampil_act'); if(($footer_act == '') || ($footer_act == 'No')) { ?>
<?php } else { ?>
  <center><div style="width:336px;height:280px;margin: 2px 2px 2px 0;"><?php echo get_theme_option('iklan_tengah'); ?></div></center>
<?php } ?>
	<div class="entry-meta">
			<?php //entry_meta(); ?>
			<span class="author vcard">Posted by <a class="url fn n" href="<?php if (get_the_author_url()) { ?><?php the_author_url(); ?><?php } else {  ?><?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?><?php } ?>" title="<?php the_author_meta('display_name'); ?>" rel="author me"><?php the_author_meta('display_name'); ?></a></span> - <span class="published entry-date"><?php the_time('F j, Y') ?></span> - <span class="entry-utility-prep entry-utility-prep-cat-links category">Posted in: <?php the_category(', '); ?></span>
		<div style="clear: both"></div>
	</div><!-- end #postmeta -->
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
</div>
</div>
<?php include(TEMPLATEPATH."/sidebar.php");?>
<div id="contentleft-wrap">
		<div class="title-content">
			<h2>Related Article</h2>
			</div>
<div id="contentleft">
	<?php related_post_category(); ?>
</div></div>
<?php $agc_thumb_act1 = get_theme_option('agc_thumb_act1'); if(($agc_thumb_act1 == '') || ($agc_thumb_act1 == 'No')) { ?><?php } else { ?>
<div id="contentleft-wrap">
		<div class="title-content">
			<h2>Related Sites</h2>
			</div>
<div id="contentleft">
	<?php include(TEMPLATEPATH."/agc.php");?>
</div></div><?php } ?>
<?php $semua_bacot_act = get_theme_option('semua_bacot_act1'); if(($semua_bacot_act == '') || ($semua_bacot_act == 'No')) { ?><?php } else { ?>
<!--COMMENTS-->
	<div id="contentleft-wrap">
		<div class="title-content">
			<h2><?php the_title(); ?> Responses</h2>
			</div>
<div id="contentleft">
<?php $post_komen_act = get_theme_option('post_komen_act1'); if(($post_komen_act == '') || ($post_komen_act == 'No')) { ?><?php } else { ?><?php comments_template(); ?><?php } ?>
<?php $post_fb_act = get_theme_option('post_fb_act1'); if(($post_fb_act == '') || ($post_fb_act == 'No')) { ?><?php } else { ?><div class="fb-comments" data-href="<?php the_permalink() ?>" data-num-posts="10" data-width="600"></div><?php } ?>
</div>
</div>
<!--COMMENTS END--><?php } ?>
</div>
</div>
</div>
<?php get_footer(); ?>