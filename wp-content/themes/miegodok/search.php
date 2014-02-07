<?php get_header(); ?>
<div id="content">
<div id="breadcrumb">
<div xmlns:v="http://rdf.data-vocabulary.org/#">
<?php breadcrumb(); ?>
</div>
</div><!-- end #breadcrumb -->
<input type="hidden" name="IL_IN_TAG" value="1"/>
<?php require_once(TEMPLATEPATH . '/includes/cse-result.php'); ?>
</div><!-- end #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>