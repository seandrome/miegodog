  <?php get_header(); ?>

	<div id="content">

    <?php if (have_posts()) : ?>

      <?php while (have_posts()) : the_post(); ?>

        <div class="post" id="post-<?php the_ID(); ?>">
        
          <h2><span>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
              <?php the_title(); ?>
            </a>
          </span></h2>
        
          <p class="byline">Posted by <?php the_author() ?> on <?php the_time('F jS, Y') ?> </p>

          <div class="entry clearfix">
            <?php the_content(); ?>
<br>
<br>
          </div>
        
        
        </div>

      <?php endwhile; ?>

      <div class="navigation">
        <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
        <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
      </div>

    <?php else : ?>

      <h2 class="center">Not Found</h2>
      <p class="center">Sorry, but you are looking for something that isn't here.</p>
      <?php include (TEMPLATEPATH . "/searchform.php"); ?>

    <?php endif; ?>

    </div>

  <?php get_sidebar(); ?>

  <?php get_footer(); ?>