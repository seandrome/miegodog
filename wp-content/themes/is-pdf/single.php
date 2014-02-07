<?php get_header(); ?>
			        
        
<p><div style="display:block;height:4px;border-bottom:1px solid #DDD;"></div></p>			           

				
					<h1><?php the_title(); ?></h1>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          
  	<?php the_content(); ?>			
          
<?php endwhile; else : ?>
<?php endif; ?>
<!--						
<?php //echo spp(single_post_title( '', false ), 'pdf1.html', ' filetype:pdf');?>

<br />

<?php //echo spp(single_post_title( '', false ), 'pdf.html', ' filetype:pdf');?>

<h2> Article Summary <?php the_title(); ?></h2>

<?php //echo spp(single_post_title( '', false ), 'isi-pdf.html', ' ');?>
-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>