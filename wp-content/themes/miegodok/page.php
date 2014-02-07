<?php get_header(); ?>
<div id="content">
<div id="breadcrumb">
<div xmlns:v="http://rdf.data-vocabulary.org/#">
<?php breadcrumb(); ?>

</div>
</div><!-- end #breadcrumb -->
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="post">
<h1><?php the_title(); ?></h1>
<div class="postmeta">
Posted by <?php the_author(); ?> on <?php the_time('F jS, Y') ?> <?php edit_post_link('Edit', '', ''); ?>
</div>
<?php the_content(); ?>
</div><!-- end .post -->
<?php endwhile; ?>
<?php else : ?>
<?php endif; ?>
</div><!-- end #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>