<div class="kotak">
<?php if( get_post_meta($post->ID, "videothumb", true) ): ?>
<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
<img src="<?php $values = get_post_custom_values("videothumb"); echo $values[0]; ?>" height="80" width="110" alt="<?php the_title(); ?>" /></a>
<?php elseif( get_post_meta($post->ID, "thumb", true) ): ?>
<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
<img src="<?php $values = get_post_custom_values("thumb"); echo $values[0]; ?>" height="80" width="110" alt="<?php the_title(); ?>" /></a>
<?php else: ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
<img src="<?php echo get_freestyle_image(); ?>" alt="<?php the_title(); ?>" width="110" height="80" /></a>
<?php endif; ?>			
<div class="clear"></div>
</div>