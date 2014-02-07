<div class="clear"></div>
</div><!-- end #wrapper -->
<div id="footer">
<div class="copyright">
Copyright &copy; <?php echo date('Y'); ?> <a title="<?php bloginfo('name'); ?>" href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a> All Right Reserved<br/>
<?php if (get_option('nicezone_footer_credit') == "Yes" ) {
echo '<a href="http://www.nicewpthemes.com/" target="_blank">'.get_current_theme().' WP Themes</a>';
}
?>
</div><!-- end copyright -->
</div><!-- end #footer -->
<?php wp_footer(); ?>
</body>
</html>