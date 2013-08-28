<?php
/*
Template Name: Page with Slideshow
*/
?>  

<?php get_header();?>
      
      <?php if (function_exists('switch_slideshow_type')) switch_slideshow_type();?>
      
      <!-- Page Heading End -->
      <div class="clear"></div>
      
      <div class="center">
        <!-- Main Content Wrapper -->
        <div class="maincontent">
          <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post();?>
          <?php the_content();?>
          <?php endwhile;?>
          <?php endif;?>
          <div class="clear"></div>
          <?php 
          $enable_comment = get_option('ecobiz_enable_comment');
          if ($enable_comment == "false") {
            comments_template('', true);  
          }
          ?>    
        </div>
        <!-- Main Content Wrapper End -->
        
        <?php wp_reset_query();?>
        <?php get_sidebar();?>
    
  <?php get_footer();?>