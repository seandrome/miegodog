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
<span class="published entry-date" datetime="<?php the_time('c') ?>" pubdate><?php the_time('l, F jS, Y \a\t G:i') ?> </span> &nbsp  
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
<fb:like href="<?php echo get_permalink(); ?>" send="false" layout="button_count" width="110" show_faces="false"></fb:like>
&nbsp &nbsp <!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone" data-size="small" data-annotation="inline" data-width="150"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type="text/javascript">
  window.___gcfg = {lang: 'id'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

</div>
</div>
</div>
		<div id="contentleft-wrap">
		<div class="title-content">
			<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php bloginfo('description'); ?>"><?php the_title(); ?></a></h1>
			</div>
<div id="contentleft">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php the_content(__('Read more'));?><div style="clear:both;"></div>
	
	<?php endwhile; else: ?>
	
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
	<?php posts_nav_link(' &#8212; ', __('&laquo; go back'), __('keep looking &raquo;')); ?>
</div>
</div>
<?php include(TEMPLATEPATH."/sidebar.php");?>
<!--COMMENTS-->
	<div id="contentleft-wrap">
		<div class="title-content">
			<h1><?php the_title(); ?> Responses</h1>
			</div>
<div id="contentleft">
	<div class="fb-comments" data-href="<?php the_permalink() ?>" data-num-posts="10" data-width="600"></div>	
</div>
</div>
<!--COMMENTS END-->
</div>
</div>
</div>
<?php get_footer(); ?>