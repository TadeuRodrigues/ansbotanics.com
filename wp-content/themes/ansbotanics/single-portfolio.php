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
          <h3>Portfolio</h3>
        </div>
      </div>
      <!-- Page Heading End -->
      <div class="clear"></div>
      
      <div class="center">
        <!-- Main Content Wrapper -->
        <div class="maincontent-full">
          <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post();?>

          <?php
            $pf_link = get_post_meta($post->ID, '_portfolio_link', true );
            $pf_url = get_post_meta($post->ID, '_portfolio_url', true );
            $portfolio_type = get_post_meta($post->ID, '_portfolio_type', true );
          ?>

          <!-- Portfolio Detail Content -->
          <div class="portfolio-blockimg">
            <div class="portfolio-imgbox1">
              <div class="zoom">
                <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
                  <a href="<?php echo ($pf_link) ? $pf_link : thumb_url();?>" rel="prettyPhoto"><img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=182&amp;w=424&amp;zc=1" class="boximg-pad2 fade" alt="" /></a>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="portfolio-content1">
            <h3><?php the_title();?></h3>
            <?php the_content();?>
            <?php $portfolio_visitsite = get_option('ecobiz_portfolio_visitsite');?>
            <a href="<?php echo $pf_url;?>" class="button"><span><?php echo $portfolio_visitsite ? $portfolio_visitsite : __('VISIT SITE ','ecobiz');?><img src="<?php echo get_template_directory_uri();?>/images/arrow_grey.png" alt="" class="readmore"/></span></a>
          </div>
          <!-- Portfolio Detail Content End -->
          <?php endwhile;?>
          <?php endif;?>
          
          <div class="clear"></div>
          <div class="random-portfolio">
          <?php imediapixel_random_portfolio($num=4,$title="Random Portfolio");?>
          </div>
          
        </div>
        <!-- Main Content Wrapper End -->
    
  <?php get_footer();?>