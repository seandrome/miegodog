<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php bloginfo( 'name' ) ?></title>

<link rel="shortcut icon" href="<?php bloginfo('template_url') ;?>/images/favicon.ico" /> 
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen, projection" />
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.noisy.min.js"></script>     


    <?php wp_head(); ?>
</head>

<body>
    <div class="logo"><a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ); ?>"><img src="<?php bloginfo('template_url') ;?>/images/logo.png" alt=""  /></a></div>


<?php get_search_form(); ?>

<div id="wrap">    

