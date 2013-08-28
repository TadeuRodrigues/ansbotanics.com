<?php
/*
Template Name: Homepage Full Width
*/
?>  
<?php get_header();?>

    <?php if (function_exists('switch_slideshow_type')) switch_slideshow_type();?>
    
    <div class="clear"></div>
      <?php 
        $disable_features_box = get_option('ecobiz_disable_features_box');
        $sitefeatures_cols = get_option('ecobiz_sitefeatures_cols');
        if ($disable_features_box == "false") {  
          if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Site Features Box')) { 
            get_template_part( 'featureslist','4 columns site features' );
          } 
        } 
      ?>
      <div class="clear"></div>
      <div class="center">
        <!-- Main Content Wrapper -->
        <div class="maincontent-full">
          <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post();?>
          <?php the_content();?>
          <?php endwhile;?>
          <?php endif;?>
        </div>
        <!-- Main Content Wrapper End -->
        
<?php get_footer();?>