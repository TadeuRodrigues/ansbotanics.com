      <!-- Features Content -->
      <div class="featuresbox features-3col">
      	<?php
      	 $homebox_title1 = get_option('ecobiz_featuresbox_title1');
      	 $homebox_desc1 = get_option('ecobiz_featuresbox_desc1');
      	 $homebox_image1 = get_option('ecobiz_featuresbox_image1');
      	 $homebox_desturl1 = get_option('ecobiz_featuresbox_desturl1');
      	 $homebox_title2 = get_option('ecobiz_featuresbox_title2');
      	 $homebox_desc2 = get_option('ecobiz_featuresbox_desc2');
      	 $homebox_image2 = get_option('ecobiz_featuresbox_image2');
      	 $homebox_desturl2 = get_option('ecobiz_featuresbox_desturl2');
      	 $homebox_title3 = get_option('ecobiz_featuresbox_title3');
      	 $homebox_desc3 = get_option('ecobiz_featuresbox_desc3');
      	 $homebox_image3 = get_option('ecobiz_featuresbox_image3');
      	 $homebox_desturl3 = get_option('ecobiz_featuresbox_desturl3');
      	?>           
        <ul>
           <!-- Features Box #1 -->
          <li class="first">
            <?php if ($display_icons !="on") { ?>
              <img src="<?php echo $homebox_image1;?>" class="alignleft" alt=""/>
            <?php } ?>
            <h4><a href="<?php echo $homebox_desturl1;?>"><?php echo stripslashes($homebox_title1);?></a></h4>
            <div class="clear"></div>
            <p><?php echo stripslashes($homebox_desc1);?></p>
          </li>
          
          <!-- Features Box #2 -->
          <li>
            <?php if ($display_icons !="on") { ?>
              <img src="<?php echo $homebox_image2;?>" class="alignleft" alt=""/>
            <?php } ?>
            <h4><a href="<?php echo $homebox_desturl2;?>"><?php echo stripslashes($homebox_title2);?></a></h4>
            <div class="clear"></div>
            <p><?php echo stripslashes($homebox_desc2);?></p>
          </li>
          
          <!-- Features Box #3 -->
          <li class="last">
            <?php if ($display_icons !="on") { ?>
              <img src="<?php echo $homebox_image3;?>" class="alignleft" alt=""/>
            <?php } ?>
            <h4><a href="<?php echo $homebox_desturl3;?>"><?php echo stripslashes($homebox_title3);?></a></h4>
            <div class="clear"></div>
            <p><?php echo stripslashes($homebox_desc3);?></p>
          </li>
                             
        </ul>
      </div>
      <!-- Features Content End -->