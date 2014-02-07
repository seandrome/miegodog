<?php

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'sidebar',
		'before_widget' => '<div class="footer">', // Removes <li>
		'after_widget' => '</div>', // Removes </li>
		'before_title' => '<br/><b>',
		'after_title' => '</b>',
	));

?>