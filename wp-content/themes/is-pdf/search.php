<?php get_header(); ?>

<p><div style="display:block;height:4px;border-bottom:1px solid #DDD;"></div></p>
		
<?php echo spp(get_search_query( '', false ), 'pdf1.html', ' filetype:pdf');?>

<br />

<?php echo spp(get_search_query( '', false ), 'pdf.html', ' filetype:pdf');?>

<h2> Summary for <?php echo wp_specialchars($s, 1);; ?></a></h2>

<?php echo spp(get_search_query( '', false ), 'isi-pdf.html');?>  

<?php get_sidebar(); ?>
 <?php get_footer(); ?>