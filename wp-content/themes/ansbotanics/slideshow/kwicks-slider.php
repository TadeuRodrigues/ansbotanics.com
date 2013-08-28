  <?php get_header();?>
  
  <?php $kwicks_speed = get_option('ecobiz_kwicks_speed');?>
  <script type="text/javascript">
  jQuery(document).ready(function($) {
  
    $('#kwicks1').kwicks({
  		event : 'mouseenter',
  		max : 800,
      spacing: 0,
      duration : <?php echo $kwicks_speed ? $kwicks_speed : 200;?>
  	});
    
    $(".heading-text").hide();
  
  	$('#kwicks1 li').mouseover(function() {
  	  $("#kwicks1 li.active .caption").stop().fadeTo("fase",0);
      $("#kwicks1 li.active .heading-text").stop().fadeTo("slow", 0.8);	
  		$("#kwicks1 li.active .heading-text p").stop().fadeTo("slow",0.8);
      if ($.browser.msie && $.browser.version.substr(0,1) == 8){
          $("#kwicks1 li.active .caption").hide();  
          $("#kwicks1 li.active .heading-text h3").show();	
        }
  	}).mouseout(function(){
  	   $(".caption").stop().fadeTo("fast",0.8);	 
        $("#kwicks1 li .heading-text").stop().fadeTo("slow", 0);
    		$("#kwicks1 li .heading-text p").stop().fadeTo("slow",0);
        if ($.browser.msie && $.browser.version.substr(0,1) == 8){
          $("#kwicks1 li .heading-text h3").hide();  
        }
  	});    
  });
  </script>  
  
       <!-- Slideshow Wrapper -->
      <div id="slide-wrapper">
        <!-- Slideshow Start -->
        <?php if (post_type_exists('slideshow')) { ?>
        <ul id="kwicks1">
       <?php
        global $post;
        $slideshow_order = get_option('ecobiz_slideshow_order') ? get_option('ecobiz_slideshow_order') : "date";
        $enable_caption = get_option('ecobiz_nivo_caption'); 
          
          query_posts(array( 'post_type' => 'slideshow', 'showposts' => 5,'orderby'=>$slideshow_order));
          ?>
          <?php
          if (have_posts()) {
          while (have_posts() ) : the_post();
            $slideshow_url = (get_post_meta($post->ID, '_slideshow_url', true )) ? get_post_meta($post->ID, '_slideshow_url', true ) : get_permalink();
            $slide_permalink = "<a href=".get_permalink($post->ID).'>'.get_the_title()."</a>";
            ?>
          
          <li>
            <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
              <a href="<?php echo $slideshow_url;?>"><img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=344&amp;w=960&amp;zc=1" alt="" /></a>                
            <?php } ?>            
            <div class="caption">
              <h4><?php the_title();?></h4>
            </div>
            <div class="heading-text">
              <h3><a href="<?php echo $slideshow_url;?>"><?php the_title();?></a></h3>
              <?php the_content();?>  
            </div>
            <div class="shadow"></div>
          </li>
          <?php endwhile;?>
          <?php wp_reset_query();?>
          <?php } ?>                   
        </ul>
        <?php } ?>
        <!-- Slideshow End -->
      </div>
      <!-- Slideshow Wrapper End -->