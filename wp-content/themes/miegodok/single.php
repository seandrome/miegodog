<?php get_header(); ?>
<div id="content">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="post">
<h1><span itemprop="itemreviewed"><?php the_title(); ?></span></h1>
<div class="postmeta">Posted by <span itemprop="reviewer"><?php the_author(); ?></span> on <time itemprop="dtreviewed" datetime="<?php the_time('F jS, Y') ?>"><?php the_time('F jS, Y') ?></time> Filed in <?php $category = get_the_category(); echo $category[0]->cat_name; ?> <?php edit_post_link('Edit', '', ''); ?></div>
<?php the_content(); ?>
<img style="display:none;" itemprop="photo" src="<?php echo get_post_image(); ?>" />
</div>
<?php endwhile; ?>
<?php next_posts_link('&laquo; Older Entries') ?>
<?php else : ?>
      <h2 class="center">Not Found</h2>
      <p class="center">Sorry, but you are looking for something that isn't here.</p>
<?php endif; ?>
</div><!-- end #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>