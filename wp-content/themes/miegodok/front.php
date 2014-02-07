<?php get_header(); ?>
<div id="content">
<?php $cats = get_categories(); foreach ( $cats as $cat ) { query_posts( array ( 'cat' => $cat->cat_ID, 'posts_per_page' => 5 ) ); ?>
<div class="latest_news">
<h4 class="boxTitle"><?php echo $cat->cat_name; ?></h4>
<ul>
<?php while ( have_posts() ) { the_post(); ?>
<li><span class="time"><?php the_time('H:i'); ?></span> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php }  ?>
</ul>
<?php
    // Get the ID of a given category
    $category_id = get_cat_ID($cat->cat_name);

    // Get the URL of this category
    $category_link = get_category_link( $category_id );
?>
<div class="home_nav">
<a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo $cat->cat_name; ?>">More Post For <?php echo $cat->cat_name; ?></a>
</div><!-- end .home_nav -->
</div><!-- end .latest_news -->
<?php } ?>
<div class="clear"></div>
<div class="homenav">
<?php
  $permalink_structure = get_option('permalink_structure');
  if($permalink_structure == '') {
    echo  '<a href="'.get_bloginfo('url').'/?paged=2">Next Page</a>';
  } else {
    echo '<a href="'.get_bloginfo('url').'/page/2/">Next Page</a>';
  }
?>

</div><!-- end .home_nav -->
</div><!-- end #main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>