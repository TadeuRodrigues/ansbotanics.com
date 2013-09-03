        <?php $aboutpage = get_page_by_title(get_option('ecobiz_about_page'));?>
        <?php $servicespage = get_page_by_title(get_option('ecobiz_services_page'));?>

        <!-- Sidebar -->
        <div id="sidebar">
        <?php
      		$children=wp_list_pages( 'echo=0&child_of=' . $post->ID . '&title_li=' );
      		if ($children) {
      			$parent = $post->ID;
      		}else{
      			$parent = $post->post_parent;
      			if(!$parent){
      				$parent = $post->ID;
      			}
      		}
          $children = wp_list_pages("title_li=&child_of=".$parent."&echo=0&depth=1&menu_order=sort_column");
          $parent_title = get_the_title($parent);
          ?>

          <?php
          if (!is_home() && !is_page($servicespage->ID) && !is_page_template('homepage-static.php') && !is_page_template('homepage-kwicksslider.php')) {
            if ($children) {
            ?>
          <div class="sidebar">
            <div class="sidebartop"></div>
            <div class="sidebarmain">
              <div class="sidebarcontent">
                <h4 class="sidebarheading"><?php echo $parent_title;?></h4>
                  <ul class="sidelist">
           	      <?php echo $children;?>
                </ul>
              </div>
            </div>
            <div class="sidebarbottom"></div>
          </div>
        <?php }
          }
        ?>
        </div>
        <!-- Sidebar End -->