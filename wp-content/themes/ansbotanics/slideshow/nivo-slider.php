    <?php
    $nivo_transition = get_option('ecobiz_nivo_transition');
    $nivo_slices = get_option('ecobiz_nivo_slices');
    $nivo_animspeed = get_option('ecobiz_nivo_animspeed');
    $nivo_pausespeed = get_option('ecobiz_nivo_pausespeed');
    $nivo_directionNav = get_option('ecobiz_nivo_directionNav');
    $nivo_directionNavHide = get_option('ecobiz_nivo_directionNavHide');
    $nivo_controlNav = get_option('ecobiz_nivo_controlNav');  
    ?>
    <script type="text/javascript">
      jQuery(window).load(function($) {
        jQuery('#slider').nivoSlider({
          effect:'<?php echo ($nivo_transition) ? $nivo_transition : "random";?>',
          slices:<?php echo ($nivo_slices) ? $nivo_slices : "15";?>,
          animSpeed:<?php echo ($nivo_animspeed) ? $nivo_animspeed : "500";?>, 
          pauseTime:<?php echo ($nivo_pausespeed) ? $nivo_pausespeed : "3000";?>,
          directionNav:<?php echo ($nivo_directionNav) ? $nivo_directionNav : "true";?>,
          directionNavHide:<?php echo ($nivo_directionNavHide) ? $nivo_directionNavHide : "true";?>,
          controlNav:<?php echo ($nivo_controlNav) ? $nivo_controlNav : "true";?>
        });
      });
      </script> 
      
      <!-- Slideshow Wrapper -->
      <div id="slide-wrapper">
        <!-- Slideshow Start -->
        <div id="slider">
        <?php
        global $post;
        $slideshow_order = get_option('ecobiz_slideshow_order') ? get_option('ecobiz_slideshow_order') : "date";
        $enable_caption = get_option('ecobiz_nivo_caption');
      
        if (post_type_exists('slideshow')) { 
          
          query_posts(array( 'post_type' => 'slideshow', 'showposts' => -1,'orderby'=>$slideshow_order));
          ?>
          <?php
          if (have_posts()) {
          while (have_posts() ) : the_post();
            $slideshow_url = (get_post_meta($post->ID, '_slideshow_url', true )) ? get_post_meta($post->ID, '_slideshow_url', true ) : get_permalink();
            $slide_permalink = "<a href=".get_permalink($post->ID).'>'.get_the_title()."</a>";
            ?>
            <a href="<?php echo $slideshow_url;?>" title="<?php the_title();?>">
              <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
              <img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=344&amp;w=960&amp;zc=1" alt="" <?php if ($enable_caption == "true") echo 'title="'.$slide_permalink.'"'?>/>                
            <?php } ?>            
            </a>
          <?php endwhile;?>
          <?php wp_reset_query();?>
          <?php } ?>
          <?php } ?>                              
        </div>
        <!-- Slideshow End  -->
      </div>
      <!-- Slideshow Wrapper End -->