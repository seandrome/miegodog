<?php get_header(); ?>
<?php
$a=$_SERVER['REQUEST_URI'];
$b=str_replace(array('.html',' '),array('','+'),$a);
$b=trim($b,'/');
?>
<div class="row">
<div id="breadcrumbs-wrap">
<div class="breadcrumbs">
<a href="/">Home</a><strong><em><?php echo $b;?></em></strong>
</div>
</div>
</div>
<div id="content">
<div class="row">
<div id="content-wrapper">
		<div id="contentleft-wrap">
		<div class="title-content">
			<h1><?php echo $b;?></h1>
			</div>
				<div id="contentleft">	
				
<?php //iki agcne
function right($string, $n)
{
      $balik = strrev($string);
      $hasil = strrev(substr($balik, 0, $n));
      return $hasil;
}
$keyword = $b;
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
	</div>
	</div>
	<?php include(TEMPLATEPATH."/sidebar.php");?>
</div>
</div>
</div>


<?php get_footer(); ?>