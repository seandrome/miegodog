<?php
/**
 * @package WordPress
 * @subpackage Neat WordPress Theme
 * The template for displaying widget areas.
 */
?>
<div id="sidebar" class="clearfix">

	<div class="sidebar-inner">
		<ul>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar') ) : ?>
			<?php endif; ?>
			<li id="text-2" class="widget widget_text">		<div class="title-content"><div class="widget-title"><h1>Popular Search</h1></div></div>		<ul>
  <?php
	echo do_shortcode('[spp_random_terms count=15]');
  ?>
				</ul>
		</li>
		</ul>
	</div>

</div><!-- end #sidebar -->