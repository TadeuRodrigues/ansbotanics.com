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
      </div>
      <!-- Page Heading End -->
      <div class="clear"></div>

      <div class="center">
        <!-- Full Width Wrapper -->
        <div class="maincontent-full">

          <!-- Contact Address -->
          <div id="conctactleft">

            <ul class="contactinfo">
              <li><strong>ANS Botanics Limited</strong></li>
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
          <div id="contactright">
            <ul class="contactinfo">
              <li><strong>World Speed Group</strong></li>
              <li><strong>Hongkong Office:</strong></li>
              <li>
              Unit 04, 7/F, Bright Way Tower, No.33 Mong Kok Road, Kowloon, HK.</li>
	      <li><strong>Shanghai Office:</strong></li>
	      <li>Room 605, Bldg 1, No.1062 East Daming Rd.,Hongkou Dist.,Shanghai, China
            </ul>
            <div class="clear"></div>
          </div>
          <!-- Contact Form End -->

        </div>
        <!-- Full Width Wrapper End -->

<?php get_footer();?>
