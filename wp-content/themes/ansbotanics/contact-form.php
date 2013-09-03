<?php
/*
Template Name: Contact Form
*/
?>
<?php get_header();?>

<?php
  $info_address = get_option('ecobiz_info_address');
  $info_phone = get_option('ecobiz_info_phone');
  $info_email= get_option('ecobiz_info_email');
  $info_website = get_option('ecobiz_info_website');
  $info_latitude = get_option('ecobiz_info_latitude') ? get_option('ecobiz_info_latitude') : "-6.229555086277892";
  $info_longitude = get_option('ecobiz_info_longitude') ? get_option('ecobiz_info_longitude') : "106.82551860809326";
?>

      <?php
        global $post;

        $heading_image = get_post_meta($post->ID,"_heading_image",true);
        $bgtext_heading_position = get_post_meta($post->ID,"_bgtext_heading_position",true);
        $page_short_desc = get_post_meta($post->ID,"_page_short_desc",true);
      ?>

      <!-- Page Heading -->
      <div id="page-heading">
        <img src="<?php echo $heading_image ? $heading_image : get_template_directory_uri().'/images/page-heading4.jpg';?>" alt="" />
        <div class="heading-text<?php if ($bgtext_heading_position =="right") echo '-right';?>">
          <h3><?php the_title();?></h3>
          <p><?php echo $page_short_desc;?></p>
        </div>
      </div>
      <!-- Page Heading End -->
      <div class="clear"></div>

      <div class="center">
        <!-- Full Width Wrapper -->
        <div class="maincontent-full">

          <!-- Contact Address -->
          <div id="contactleft">

            <ul class="contactinfo">
              <li><strong>Guilin Office:</strong></li>
              <li>
              <?php echo $info_address ? stripslashes($info_address) : "
              Room 605, Bldg 1, No.1062 East Daming Rd.,Hongkou Dist.,<br />
            Shanghai,<br />
            China";?></li>
              <li><strong><?php echo __('Phone','ecobiz');?></strong> : <?php echo $info_phone ? $info_phone : "+62 525625";?></li>
              <li><strong><?php echo __('Email','ecobiz');?></strong> : <a href="mailto:<?php echo $info_email ? $info_email : "#";?>"><?php echo $info_email ? $info_email : "info@ansbotanics.com";?></a><br />
              <strong><?php echo __('Website','ecobiz');?></strong> : <a href="<?php echo $info_website ? $info_website : "#";?>"><?php echo $info_website ? $info_website : "http://ansbotancis.com";?></a></li>
            </ul>
            <div class="clear"></div>
          </div>
          <!-- Contact Address End -->

          <!-- Contact Form -->
          <div id="conctactright">
            <ul class="contactinfo">
              <li><strong>Shanghai Office:</strong></li>
              <li>
              Room 605, Bldg 1, No.1062 East Daming Rd.,Hongkou Dist.,Shanghai, China</li>
              <li><strong>Phone</strong> : +86 21 35013960-808</li>
              <li><strong>Email</strong> : <a href="mailto: info@ansbotanics.com "> info@ansbotanics.com </a><br>
              <strong>Website</strong> : <a href="http://ansbotancis.com">http://ansbotancis.com</a></li>
            </ul>
            <div class="clear"></div>
          </div>
          <!-- Contact Form End -->

        </div>
        <!-- Full Width Wrapper End -->

<?php get_footer();?>
