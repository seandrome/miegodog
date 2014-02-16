<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php if(is_home()) bloginfo('name'); else wp_title(''); ?></title>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css" media="screen" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<?php wp_get_archives('type=monthly&format=link'); ?>
<?php if ( is_search()) : ?>
<link rel="canonical" href="<?php bloginfo('url');?>/search/<?php $ab=strtolower($s); echo str_replace(' ', '-',$ab); ?>.html" />
<meta name='keywords' content='<?php the_search_query(); ?> '/>
<?php endif ?> 
<?php wp_head(); ?>
<script type="text/javascript">
<!--
if (parent.frames.length > 0) { parent.location.href = location.href; }
-->
</script>
</head>
<body id="body">
<div id="wrap">
<div id="header">
<div class="row">
	<div class="headertitle">
	<?php $footer_act = get_theme_option('only_logo_logo_act'); if(($footer_act == '') || ($footer_act == 'No')) { ?>
	<a href="<?php bloginfo('url') ?>" title="<?php bloginfo('name') ?>: <?php bloginfo('description') ?>"><img src="<?php echo get_theme_option('logo'); ?>" height="40" width="180"/></a>
<?php } ?>
	</div>
	<div class="headerkiwo">
	<?php include(TEMPLATEPATH."/searchform.php");?>
	</div>	
</div>
<div class="iee-header">
	<div class="meta-header">
		<div class="row">
			<ul>
			<li><a href="<?php echo get_option('home'); ?>/">Home</a></li>
			<?php wp_list_pages('title_li=&depth=1'); ?>
		</ul>
		</div>
	</div>
</div>		
<div style="clear: both"></div>	
</div>
  <div id="hot-cat">
	<div class="row">
		<ul>
      <li class="hot-cat-label"><span>Hot Categories</span></li>
			<?php wp_list_cats('title_li=&depth=1'); ?>
		</ul>
	</div>	
  </div>
<div id="top-banner-wrapper">
	<div class="row">
		<div id="top-banner">
<?php $footer_act = get_theme_option('atas_tampil_act'); if(($footer_act == '') || ($footer_act == 'No')) { ?>
<?php } else { ?>
<?php echo get_theme_option('atas_tengah'); ?><?php } ?>
		</div>
	</div>
</div>