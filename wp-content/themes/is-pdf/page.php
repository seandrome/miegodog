<?php get_header(); ?>      


          
<p><div style="display:block;height:4px;border-bottom:1px solid #DDD;"></div></p>			           

				
					<h1><?php the_title(); ?></h1>




<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

             <?php the_content(); ?>

<?php endwhile; ?>
<?php endif; ?>



<?php get_footer(); ?>
