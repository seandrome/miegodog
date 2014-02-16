<?php get_header(); ?>
<div id="content">
<div class="row">
<div id="content-wrapper">
		<div id="contentleft-wrap">
		<div class="title-content">
			<h1>Live Posting / All Posts</h1>
			</div>
				<div id="contentleft">	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h2 class="article-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>	
  
<?php $post_thumb_act = get_theme_option('post_thumb_act1'); if(($post_thumb_act == '') || ($post_thumb_act == 'No')) { ?>
<?php } else { ?><?php include (TEMPLATEPATH . '/thumb.php'); ?><?php } ?>
		<?php echo excerpt(50); ?>
		<div class="entry-meta">
			<?php //entry_meta(); ?>
			<span class="author vcard">Posted by <a class="url fn n" href="<?php if (get_the_author_url()) { ?><?php the_author_url(); ?><?php } else {  ?><?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?><?php } ?>" title="<?php the_author_meta('display_name'); ?>" rel="author me"><?php the_author_meta('display_name'); ?></a></span> - <span class="published entry-date"><?php the_time('F j, Y') ?></span> - <span class="entry-utility-prep entry-utility-prep-cat-links category">Posted in: <?php the_category(', '); ?></span>
		<div style="clear: both"></div>
	</div><!-- end #postmeta -->
<div style="border-bottom:dotted 1px #DDD;margin-bottom:5px;">
</div>
	
	<?php endwhile; ?>
			<div class="navigation">
<?php include (TEMPLATEPATH . '/navigasi.php'); ?>
		</div>
<?php else : ?>
	<p>No post</p><?php endif; ?>

	<div style="margin:0px 0px 15px 0px;"><?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?></div>
	</div>
	</div>
	<?php include(TEMPLATEPATH."/sidebar.php");?>
</div>
</div>
</div>


<?php get_footer(); ?>