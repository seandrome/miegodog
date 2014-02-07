<?php if(is_home()) { ?>
    	<div class="modular">
<div class="textwidget"><div style="display:block;height:2px;border-bottom:1px solid #DDD;"></div>
<div style="display:block;height:2px;"></div>

<?php query_posts('showposts=15'); ?>
<b>Recent Post  :  </b> <?php while (have_posts()) : the_post(); ?>
<span style="color:#FC4D47;margin-right:2px;">
<b>»</b> <a href="<?php the_permalink() ?>"><?php the_title(); ?></a></span>
<?php endwhile;?>  </div></div>


        <div class="modular">
<div class="textwidget"><div style="display:block;height:2px;border-bottom:1px solid #DDD;"></div>
<div style="display:block;height:2px;"></div>
		<b>Latest Search  :  </b>   
<?php echo do_shortcode('[spp_random_terms count= 15]'); ?>
</div></div>
<?php } ?>    

       <div class="modular"><div class="textwidget"><div style="display:block;height:2px;border-bottom:1px solid #DDD;"></div>
<div style="display:block;height:2px;"></div>
<b>Latest Download :</b>  <?php echo do_shortcode('[spp_random_terms count= 105]'); ?> </div></div><div id="footer">


           <div class="disclosures">
        <p>Disclaimer : All contents are copyrighted and is not responsible for third party website content. It is illegal for you to distribute copyrighted files without permission. Downloads must be for time-shifting, personal, private, non-commercial use only. Thanks for visitor,google.com, bing.com, yahoo.com and advertizer.<br/>
All content posted by our users is <a rel="license" href="http://creativecommons.org/publicdomain/zero/1.0/" target="_blank" style="font-weight: normal;">dedicated to the public domain</a>
</div>
</div>


<div class="page">
<strong><a href="<?php bloginfo('url'); ?>">Home</a><?php  $pages = wp_list_pages('depth=1&title_li=&echo=0'); $pages2 = preg_split('/(<li[^>]*>)/' ,$pages); foreach($pages2 as $var){ echo str_replace('</li>', '', "&ensp;".$var);  } ?></strong>
         
</div>

<div class="copy">
<?php wp_footer(); ?><br />

<a href="<?php bloginfo( 'url' ); ?>"><strong><?php bloginfo( 'name' ); ?> 2013</strong>

<center>
<!-- Histats.com Code Here -->
</center>    
    
</div>  </div>

<script type="text/javascript">
    $('body').noisy({
    'intensity' : 1,
    'size' : '300',
    'opacity' : 0.127,
    'fallback' : '',
    'monochrome' : false
}).css('background-color', '#006680');
</script>

</div> <!--wrap-->

</body>

</html>
