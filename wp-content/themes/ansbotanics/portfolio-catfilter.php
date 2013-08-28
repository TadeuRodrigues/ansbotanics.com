<?php
/*
Template Name: Portfolio 4 Cols Category Filter
*/
?>
<?php get_header();?>
    
      <?php
        global $post;
        
        $heading_image = get_post_meta($post->ID,"_heading_image",true);
        $bgtext_heading_position = get_post_meta($post->ID,"_bgtext_heading_position",true);
        $page_short_desc = get_post_meta($post->ID,"_page_short_desc",true);
      ?>      
      <!-- Page Heading --> 
      <div id="page-heading">
        <img src="<?php echo $heading_image ? $heading_image : get_template_directory_uri().'/images/page-heading3.jpg';?>" alt="" />
        <div class="heading-text<?php if ($bgtext_heading_position =="right") echo '-right';?>">
          <h3><?php the_title();?></h3>
          <p><?php echo $page_short_desc;?></p>
        </div>
      </div>
      <!-- Page Heading End -->
      <div class="clear"></div>
      
      <div class="center">
        <!-- Main Content Wrapper -->
        <div class="maincontent-full">
          <?php $portfolio_desc = get_option('ecobiz_portfolio_desc');?>
          <?php echo stripslashes($portfolio_desc);?>
          <div class="clear"></div>
          <br />
          
          <ul id="filter">
          <?php
    			 $portfolio_page = get_option('ecobiz_portfolio_page');
    			 $portfolio_pid = get_page_by_title($portfolio_page);
    			 ?>
 			      <li><a class="<?php if (!get_query_var('portfolio_category')) echo 'current'; ?>" href="<?php echo get_page_link($portfolio_pid->ID);?>"><?php echo __('All','ecobiz');?></a></li>
          	<?php  
            $categories = get_categories('taxonomy=portfolio_category&orderby=ID&title_li=&hide_empty=0');
            foreach ($categories as $category) { 
            $termlink = get_term_link($category->slug,$category->taxonomy);
            ?>
              <li><a  class="<?php if (get_query_var($category->taxonomy) == $category->slug) echo 'current'; ?>" href="<?php echo $termlink;?>"><?php echo $category->name;?></a></li>
              <?php
            }
            ?>
          </ul>
          
          <div class="clear"></div>
          <ul class="portfolio-4col">
          <?php 
          $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $portfolio_items_num  = (get_option('ecobiz_portfolio_items_num')) ? get_option('ecobiz_portfolio_items_num') : 8; 
          $portfolio_order = (get_option('ecobiz_portfolio_order')) ? get_option('ecobiz_portfolio_order') : "date";
          
          query_posts(array( 'post_type' => 'portfolio', 'showposts' => $portfolio_items_num,'paged'=>$page,"orderby" => $portfolio_order,'order'=> 'ASC'));
          
          $counter = 0;
          while ( have_posts() ) : the_post();
          $counter++;
            $pf_link = get_post_meta($post->ID, '_portfolio_link', true );
            $pf_url = get_post_meta($post->ID, '_portfolio_url', true );
            $portfolio_type = get_post_meta($post->ID, '_portfolio_type', true );
            ?>
            <li <?php if ($counter %4 == 0) echo 'class="last"';?>>
              <div class="portfolio-blockimg3">
                <div class="portfolio-imgbox3">
                <div class="<?php if ($portfolio_type == "image") echo 'zoom'; else echo 'play';?>">
                  <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
                  <a href="<?php echo ($pf_link) ? $pf_link : thumb_url();?>" rel="prettyPhoto"><img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=86&amp;w=196&amp;zc=1" class="boximg-pad fade" alt="" /></a>
                  <?php } ?>
                </div>
                </div>
                <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                <p><?php echo excerpt(12);?></p>
                <?php $portfolio_readmore = get_option('ecobiz_portfolio_readmore'); ?>
                <a href="<?php the_permalink();?>" class="button"><span><?php echo $portfolio_readmore ? $portfolio_readmore : __('VIEW DETAIL ','ecobiz');?><img src="<?php echo get_template_directory_uri();?>/images/arrow_grey.png" alt="" class="readmore"/></span></a>     
              </div>
            </li>            
          <?php endwhile;?>
          </ul>
        </div>
        <!-- Main Content Wrapper End -->
    
  <?php get_footer();?>