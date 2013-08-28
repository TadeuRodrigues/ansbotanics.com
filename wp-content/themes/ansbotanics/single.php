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
          <h3>
            <?php
            $category = get_the_category();
            $currentcat = $category[0]->name;
            echo $currentcat;
            ?>
          </h3>
          <p><?php echo category_description($category[0]->cat_ID);?></p>
        </div>
      </div>
      <!-- Page Heading End -->
      <div class="clear"></div>
      
      <div class="center">
        <!-- Main Content Wrapper -->
        <div class="maincontent">
          <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post();?>
          <h3><?php the_title();?></h3>
          <div class="metapost">
            <span class="first"><?php echo __('Posted at ','ecobiz');?><?php the_time( get_option('date_format') ); ?></span> | 
            <span><?php echo __('By ','ecobiz');?>: <?php the_author_posts_link();?></span>  |                         
            <span><?php echo __('Categories ','ecobiz');?>: <?php the_category(',');?></span>  | 
            <span><?php comments_popup_link(__('0 Comment','ecobiz'),__('1 Comment','ecobiz'),__('% Comments','ecobiz'));?></span>
          </div>           
          <div class="clear"></div>
          <?php the_content();?>
          
          <div class="navigation">
    				<div class="alignleft"><?php previous_post_link( '%link', '' . __( '&larr;', 'Previous post link', 'ecoboz' ) . ' %title' ); ?></div>
    				<div class="alignright"><?php next_post_link( '%link', '%title ' . __( '&rarr;', 'Next post link', 'ecobiz' ) ); ?></div>
				  </div><!-- #nav-below -->
          <?php endwhile;?>
          <?php endif;?>
          
          <div class="clear"></div>

          <!-- Author Box Start //-->
          <?php $author_box = get_option('ecobiz_author_box');?>
          <?php if ($author_box != "true") { ?>
          <div id="authorbox">
            <div class="blockavatar">
              <?php if (function_exists('get_avatar')) { echo get_avatar(get_the_author_meta('user_email'), '48'); }?>
            </div>
             <div class="detail">
                <h4><?php echo __('About ','ebiz');?><a href="<?php the_author_meta('url') ?>"><?php the_author_meta('display_name'); ?></a></h4>
                <p><?php the_author_meta('description'); ?></p>
             </div>
             <div class="clear"></div>
          </div> 
          <?php } ?>
          <!-- Author Box End //-->
          
          <div class="clear"></div>
          <?php $disable_comment = get_option('ecobiz_disable_comment'); ?>
          <?php 
          if ($disable_comment !="true") {
            comments_template('', true);  
          }
          ?>
        </div>
        <!-- Main Content Wrapper End -->
        
        <?php wp_reset_query();?>
        <?php get_sidebar();?>
    
  <?php get_footer();?>