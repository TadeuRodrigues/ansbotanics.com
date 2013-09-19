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
          	<li><a class="" href="http://ansbotanics.com/?portfolio_category=new-products">Top Products</a></li>
                <li><a class="" href="http://ansbotanics.com/?portfolio_category=botanical-extract">Botanical Extract</a></li>
                <li><a class="" href="http://ansbotanics.com/?portfolio_category=amino-acids">Amino Acids</a></li>
                <li><a class="" href="http://ansbotanics.com/?portfolio_category=biochemical">Biochemical</a></li>
                <li><a class="" href="http://ansbotanics.com/?portfolio_category=apis">APIs</a></li>
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
                <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
              </div>
            </li>            
          <?php endwhile;?>
          </ul>
        </div>
        <!-- Main Content Wrapper End -->
    
  <?php get_footer();?>
