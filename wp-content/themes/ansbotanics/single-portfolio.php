<?php get_header();?>
    
      <?php
        global $post;
        
        $heading_image = get_post_meta($post->ID,"_heading_image",true);
        $bgtext_heading_position = get_post_meta($post->ID,"_bgtext_heading_position",true);
        $page_short_desc = get_post_meta($post->ID,"_page_short_desc",true);
      ?>      
      <!-- Page Heading --> 
      <div id="page-heading">
        <img src="http://ansbotanics.com/wp-content/uploads/2011/05/four.jpg" alt="" />
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
            <h3 class="divider">Top Products</h3>
            <ul class="portfolio-4col">
              <li >
                <div class="portfolio-blockimg3">
                  <div class="portfolio-imgbox3">
                    <div class="zoom">
                      <a href="http://ansbotanics.com/wp-content/uploads/2013/09/Gotu-Kola-Extract.jpg" rel="prettyPhoto">
                        <img src="http://ansbotanics.com/wp-content/themes/ansbotanics/timthumb.php?src=http://ansbotanics.com/wp-content/uploads/2013/09/Gotu-Kola-Extract.jpg&amp;h=86&amp;w=196&amp;zc=1" class="boximg-pad fade" alt="" /></a>
                    </div>
                  </div>
                  <h4><a href="http://ansbotanics.com/?portfolio=gotu-kola-extract-asiaticoside-10-95hplc">Gotu Kola Extract</a></h4>
                </div>
              </li>

              <li >
                <div class="portfolio-blockimg3">
                  <div class="portfolio-imgbox3">
                    <div class="zoom">
                      <a href="http://ansbotanics.com/wp-content/uploads/2013/09/Olive-Leaf-Extract-.jpg" rel="prettyPhoto">
                        <img src="http://ansbotanics.com/wp-content/themes/ansbotanics/timthumb.php?src=http://ansbotanics.com/wp-content/uploads/2013/09/Olive-Leaf-Extract-.jpg&amp;h=86&amp;w=196&amp;zc=1" class="boximg-pad fade" alt="" /></a>
                    </div>
                  </div>
                  <h4><a href="http://ansbotanics.com/?portfolio=olive-leaf-extract">Olive Leaf Extract</a></h4>
                </div>
              </li>

              <li >
                <div class="portfolio-blockimg3">
                  <div class="portfolio-imgbox3">
                    <div class="zoom">
                      <a href="http://ansbotanics.com/wp-content/uploads/2013/09/Garlic-Extract.jpg" rel="prettyPhoto">
                        <img src="http://ansbotanics.com/wp-content/themes/ansbotanics/timthumb.php?src=http://ansbotanics.com/wp-content/uploads/2013/09/Garlic-Extract.jpg&amp;h=86&amp;w=196&amp;zc=1" class="boximg-pad fade" alt="" /></a>
                    </div>
                  </div>
                  <h4><a href="http://ansbotanics.com/?portfolio=garlic-extract-allicin-0-5-hplc">Garlic Extract</a></h4>
                </div>
              </li>

              <li class="last">
                <div class="portfolio-blockimg3">
                  <div class="portfolio-imgbox3">
                    <div class="zoom">
                      <a href="http://ansbotanics.com/wp-content/uploads/2013/09/Pomegranate-Hull-Extract.jpg" rel="prettyPhoto">
                        <img src="http://ansbotanics.com/wp-content/themes/ansbotanics/timthumb.php?src=http://ansbotanics.com/wp-content/uploads/2013/09/Pomegranate-Hull-Extract.jpg&amp;h=86&amp;w=196&amp;zc=1" class="boximg-pad fade" alt="" /></a>
                    </div>
                  </div>
                  <h4><a href="http://ansbotanics.com/?portfolio=pomegranate-hull-extract">Pomegranate Hull Extract Ellagic</a></h4>
                </div>
              </li>
            </ul>
          </div>


        </div>
        <!-- Main Content Wrapper End -->
    
  <?php get_footer();?>
