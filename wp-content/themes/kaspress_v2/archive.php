<?php get_header(); ?>
<div class="row">
<div id="breadcrumbs-wrap">
<div class="breadcrumbs">
<a href="/">Home</a><strong><em><?php single_cat_title(); ?></em></strong>
</div>
</div>
</div>
<div id="content">
<div class="row">
<div id="content-wrapper">
		<div id="contentleft-wrap">
		<div class="title-content">
			<h1>
			<?php if (is_category()) { ?>
		<h1>Category &nbsp: &nbsp <?php single_cat_title(); ?></h1>
	<?php } elseif (is_day()) { ?>
		<h1>Category &nbsp: &nbsp<?php the_time('F jS, Y'); ?></h1>
	<?php } elseif (is_month()) { ?>
		<h1>Category &nbsp: &nbsp<?php the_time('F, Y'); ?></h1>
	<?php } elseif (is_year()) { ?>
		<h1>Category &nbsp: &nbsp<?php the_time('Y'); ?></h1>
	<?php } ?>
			</h1>
			</div>
				<div id="contentleft">	
				
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
	</div>
	</div>
	<?php include(TEMPLATEPATH."/sidebar.php");?>
</div>
</div>
</div>


<?php get_footer(); ?>