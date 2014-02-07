<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php global $page, $paged; wp_title( '|', true, 'right' ); bloginfo( 'name' ); $site_description = get_bloginfo( 'description', 'display' ); if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description"; if ( $paged >= 2 || $page >= 2 ) echo ' - ' . sprintf( __( 'Part %s', 'NiceDroid' ), max( $paged, $page ) ); ?></title>
<?php wp_head(); ?>
<?php if(is_404()) { ?>
<?php
    $kata = urlencode(CleanFileNameTitle($title));
    $kata .= "";
	$googlerss  = simplexml_load_file('http://www.bing.com/search?q='.$kata.'&go=&form=QBLH&filt=all&format=rss&count=1');
	foreach ($googlerss->channel->item as $itemrss) {
	$title = ''.htmlspecialchars(BannedKeyword(hilangkan_karakter($itemrss->title))).'';
	$title_arr = explode( " ", $title );
	echo '<meta name="description" content="'.CleanFileNameTitle($title).' '.ucwords(strtolower(BannedKeyword(hilangkan_karakter($itemrss->title)))).' '.strtolower(BannedKeyword(hilangkan_karakter($itemrss->description))).' '.ucwords(strtolower(BannedKeyword(hilangkan_karakter($itemrss->title)))).'">' . "\n";
	}
?>
<meta name="keywords" content="<?php echo CleanFileNameTitle($title); ?>">
<?php } ?>
<?php if(is_home() || is_archive()) {?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/default.css" type="text/css" media="all" />
<?php } else { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/default.css" type="text/css" media="all" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
<?php } ?>
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
</head>
<body>
<div id="wrapper">
<div id="menu">
<div class="first">
<!--INFOLINKS_OFF-->
<a title="<?php bloginfo('name'); ?>" href="<?php bloginfo('siteurl'); ?>/">Home</a>
</div>
<ul>
<?php wp_list_pages('title_li=&orderby=name&depth=-1&exclude='); ?>
</ul>
<div class="description">
			<?php if(is_404()) { ?>
			<?php echo CleanFileNameTitle($title); ?>
			<?php } else { ?>
			<span><?php global $page, $paged; wp_title( 'Pdf eBook', true, 'right' ); bloginfo( 'name' ); $site_description = ''.get_bloginfo('description').''; if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description"; if ( $paged >= 2 || $page >= 2 ) echo ' - ' . sprintf( __( 'Part %s', 'NiceDroid' ), max( $paged, $page ) ); ?></span>
			<?php } ?>
		</div>
</div><!-- end #menu -->
<div id="header">
</div><!-- end #header -->