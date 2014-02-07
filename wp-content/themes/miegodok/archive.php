<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div id="archive" class="post">
<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><img style="float:left;margin:0px 10px 5px 0px;" src="<?php bloginfo('template_directory'); ?>/includes/sarkem.php?h=100&amp;w=100&amp;zc=2&amp;q=100&amp;src=<?php echo get_post_image(); ?>" alt="<?php the_title(); ?> <?php echo excerpt(15); ?>" width="100" height="100" /></a>
<h2><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
<p><?php echo excerpt(35); ?></p>
<div class="clear"></div>
</div><!-- end .post -->
<?php endwhile; ?>
<div id="navigation">
<?php pagenavi(); ?>
</div><!-- end #navigation -->
<?php else : ?>
<?php endif; ?>
</div><!-- end #main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>