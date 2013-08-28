<?php get_header();?>
    
      <?php
        global $post;
        
        $heading_image = get_post_meta($post->ID,"_heading_image",true);
        $bgtext_heading_position = get_post_meta($post->ID,"_bgtext_heading_position",true);
        $page_short_desc = get_post_meta($post->ID,"_page_short_desc",true);
      ?>      
      <!-- Page Heading --> 
      <div id="page-heading">
        <img src="<?php echo $heading_image ? $heading_image : get_template_directory_uri().'/images/page-heading1.jpg';?>" alt="" />
        <div class="heading-text<?php if ($bgtext_heading_position =="right") echo '-right';?>">
          <h3><?php the_title();?></h3>
          <p><?php echo $page_short_desc;?></p>
        </div>
      </div>
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