<?php


/*-----------------------------------------------------------------------------------*/
/* Show analytics code in footer */
/*-----------------------------------------------------------------------------------*/

function excerpt($excerpt_length) {
  global $post;
	$content = $post->post_content;
	$words = explode(' ', $content, $excerpt_length + 1);
	if(count($words) > $excerpt_length) :
		array_pop($words);
		array_push($words, '...');
		$content = implode(' ', $words);
	endif;
  
  $content = strip_tags(strip_shortcodes($content));
  
	return $content;

}

function imediapixel_truncate($string, $limit, $break=".", $pad="...") {
	if(strlen($string) <= $limit) return $string;
	
	 if(false !== ($breakpoint = strpos($string, $break, $limit))) {
		if($breakpoint < strlen($string) - 1) {
			$string = substr($string, 0, $breakpoint) . $pad;
		}
	  }
	return $string; 
}

// Custom Comments Display
function imediapixel_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div class="titlecomment">
			<?php echo get_avatar($comment,$size='40'); ?>
			<h4><?php echo get_comment_author_link(); ?></h4>
			<span class="datecomment"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)','ecobiz'),'  ','') ?></span>

		</div>
		<div class="clear"></div>
    <div class="clear"></div>
			<?php if ($comment->comment_approved == '0') : ?>
			<em><?php echo __('Your comment is awaiting moderation.','ecobiz');?></em>
			<div class="clear"></div>
			<?php endif; ?>
		  <?php comment_text() ?>
	</li>   
  
<?php
}

// Output the styling for the seperated Pings
function imediapixel_list_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment; ?>
<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
<?php }

/**
 * Disable Automatic Formatting on Posts
 * Thanks to TheBinaryPenguin (http://wordpress.org/support/topic/plugin-remove-wpautop-wptexturize-with-a-shortcode)
 */
function theme_formatter($content) {
	$new_content = '';
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
	
	foreach ($pieces as $piece) {
		if (preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1];
		} else {
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}
remove_filter('the_content',	'wpautop');
remove_filter('the_content',	'wptexturize');

add_filter('the_content', 'theme_formatter', 99);


/* Add Custom Javascript */
function imediapixel_add_javascripts() {
  
  wp_enqueue_scripts('jquery'); 
  wp_enqueue_script( 'jquery.prettyPhoto', get_template_directory_uri().'/js/jquery.prettyPhoto.js', array( 'jquery' ) );
  wp_enqueue_script( 'jquery.nivo.slider.pack.js', get_template_directory_uri().'/js/jquery.nivo.slider.pack.js', array( 'jquery' ) );
  wp_enqueue_script( 'jqueryslidemenu', get_template_directory_uri().'/js/jqueryslidemenu.js', array( 'jquery' ) );
  wp_enqueue_script( 'jquery.kwicks.min', get_template_directory_uri().'/js/jquery.kwicks.min.js', array( 'jquery' ) );
  wp_enqueue_script( 'jquery.tools.tabs.min', get_template_directory_uri().'/js/jquery.tools.tabs.min.js', array( 'jquery' ) );
  wp_enqueue_script( 'functions', get_template_directory_uri().'/js/functions.js', array( 'jquery' ) );
  
  wp_register_script( 'jquery.gmap-1.0.3-min', get_template_directory_uri().'/js/jquery.gmap-1.0.3-min.js', array('jquery'));
}

if (!is_admin()) {
  add_action( 'wp_print_scripts', 'imediapixel_add_javascripts' ); 
}

if(get_option('ecobiz_google_map_key')){
	function theme_add_gmap_script(){
		echo "\n<script type='text/javascript' src='http://maps.google.com/maps?file=api&amp;v=2&amp;key=".get_option('ecobiz_google_map_key')."'></script>\n";
		wp_print_scripts( 'jquery.gmap-1.0.3-min');
	}
	add_filter('wp_head','theme_add_gmap_script');
}


/* Add Custom Stylesheet */
function imediapixel_add_stylesheet() { 
  ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/prettyPhoto.css" type="text/css" media="screen" />
	 <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/nivo-slider.css" type="text/css" media="screen" />
   <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/kwicks.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/custom_style.php" type="text/css" media="screen" />
<?php 
}

add_action('wp_head', 'imediapixel_add_stylesheet');


/* Register Nav Menu Features For Wordpress 3.0 */
register_nav_menus( array(
	'topnav' => __( 'Main Navigation'),
  'footernav' => __( 'Footer Navigation')
) );

/* Remove Default Container for Nav Menu Features */
function imediapixel_nav_menu_args( $args = '' ) {
	$args['container'] = false;
	return $args;
} 
add_filter( 'wp_nav_menu_args', 'imediapixel_nav_menu_args' );

/* Native Nagivation Pages List for Main Menu */
function imediapixel_topmenu_pages() {
?>
	<ul class="navigation">
  	<li <?php if (is_home() || is_front_page()) echo 'class="selected"';?>><a href="<?php echo home_url();?>"><?php echo __('Home','ecobiz');?></a></li>
  	<?php wp_list_pages('title_li=&sort_column=menu_order&depth=4');?>
  </ul>

<?php
}

/* Native Nagivation Pages List for Main Menu */
function imediapixel_footermenu_pages() {
?>
	<ul class="navigation">
  	<li><a href="<?php home_url();?>"><?php echo __('Home','ecobiz');?></a></li>
  	<?php wp_list_pages('title_li=&sort_column=menu_order&depth=1');?>
  </ul>

<?php
}

function get_shortcode_name($name) {
  if (strstr(get_shortcode_regex(),$name)) {
    return true;
  }
}

/* Detect Video File Extension */
function detect_ext($file) {
  $ext = pathinfo($file, PATHINFO_EXTENSION);
  return $ext;
}

function is_quicktime($file) {
  $quicktime_file = array("mov","3gp","mp4");
  if (in_array(pathinfo($file, PATHINFO_EXTENSION),$quicktime_file)) {
    return true;
  } else {
    return false;
  }
}

function is_flash($file) {
  if (pathinfo($file, PATHINFO_EXTENSION) == "swf") {
    return true;
  } else {
    return false;
  }
}

function is_youtube($file) {
  if (preg_match('/youtube/i',$file)) {
    return true;
  } else {
    return false;
  }
}

function is_vimeo($file) {
  if (preg_match('/vimeo/i',$file)) {
    return true;
  } else {
    return false;
  }
}

/* Latest News */
function imediapixel_latestnews($blogcat,$num=4,$title="") { 
  global $post;
  
  echo $title;
  
  if(is_array($blogcat)) {
    $blog_includes = implode(",",$blogcat);
  } else {
    $blog_includes = $blogcat;
  }  
  
  query_posts('cat='.$blog_includes.'&showposts='.$num);
  ?>
    <ul class="latestnews">
      <?php
      while ( have_posts() ) : the_post();
      $image_thumbnail = get_post_meta($post->ID, '_image_thumbnail', true );
      ?>
        <li>
          <a href="<?php the_permalink();?>"><?php the_title();?></a>
          <p class="posteddate"><?php echo __('Posted on ','ecobiz');?><?php the_time( get_option('date_format') ); ?></p>
        </li>
      <?php endwhile;?>
 	  </ul>
    <div class="clear"></div>
    <?php 
    $blog_page = get_option('ecobiz_blog_page');
    $blog_pid = get_page_by_title($blog_page);
    ?>
    <a href="<?php echo get_permalink($blog_pid->ID);?>" class="button-more"><?php echo __('View All News','ecobiz');?></a>
  <?php
}

/* Latest Portfolio */
function imediapixel_latestworks($num=1,$title="") { 
  global $post;
  
  echo $title;
  
?>
      <?php
        global $post;
        
        query_posts(array( 'post_type' => 'portfolio', 'showposts' => $num,'orderby'=>'rand'));
        while ( have_posts() ) : the_post();
        $pf_link = get_post_meta($post->ID, '_portfolio_link', true );
        $pf_url = get_post_meta($post->ID, '_portfolio_url', true );
          $portfolio_type = get_post_meta($post->ID, '_portfolio_type', true );          
        ?> 
        <div class="boximg2">
          <div class="<?php if ($portfolio_type == "image") echo 'zoom'; else echo 'play';?>">
            <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
            <a href="<?php echo ($pf_link) ? $pf_link : thumb_url();?>" rel="prettyPhoto"><img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=78&amp;w=182&amp;zc=1" class="boximg-pad fade" alt="" /></a>
            <?php } ?>
          </div>
        </div>
        <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
        <p><?php echo excerpt(10);?></p>
        <a href="<?php the_permalink();?>" class="button"><span><?php echo __('VIEW DETAIL ','ecobiz');?><img src="<?php echo get_template_directory_uri();?>/images/arrow_grey.png" alt="" class="readmore"/></span></a>
        <div class="clear"></div>
      <?php endwhile;wp_reset_query();?>
  <?php     
}

/* Testimonial List */
function imediapixel_testimonial($cat,$num=1,$title="",$place="") {
  global $post;
  
  echo $title;
  ?>
  <?php
    if (!is_numeric($cat))
      $testicatid = get_cat_ID($cat); 
    else 
      $testicatid = $cat;
    
    query_posts('cat='.$testicatid.'&showposts='.$num.'&orderby=rand');
    ?>
    <?php    
    while ( have_posts() ) : the_post();
    ?>
    <blockquote><?php the_content();?></blockquote>
    <p class="testiname"><?php the_title();?></p>
    <div class="sidebarheading"></div>    
  <?php endwhile;?>
  <?php
}

/* Get Page by ID */
function imediapixel_get_page($page_id) { 
  global $post;
    
    $page_id = get_page_by_title($page_id);
    query_posts('page_id='.$page_id->ID);
  
    while ( have_posts() ) : the_post();
  ?>
        <h4><?php the_title();?></h4>
        <p><?php echo excerpt(40);?><a href="<?php the_permalink();?>"><?php echo __('Read more ','ecobiz');?>&raquo;</a></p>        
  <?php
  endwhile;
}

/* Get vimeo Video ID */
function vimeo_videoID($url) {
	if ( 'http://' == substr( $url, 0, 7 ) ) {
		preg_match( '#http://(www.vimeo|vimeo)\.com(/|/clip:)(\d+)(.*?)#i', $url, $matches );
		if ( empty($matches) || empty($matches[3]) ) return __('Unable to parse URL', 'ovum');

		$videoid = $matches[3];
		return $videoid;
	}
}

/* Get Youtube Video ID */
function youtube_videoID($url) {
	preg_match( '#http://(www.youtube|youtube|[A-Za-z]{2}.youtube)\.com/(watch\?v=|w/\?v=|\?v=)([\w-]+)(.*?)#i', $url, $matches );
	if ( empty($matches) || empty($matches[3]) ) return __('Unable to parse URL', 'ovum');
  
  $videoid = $matches[3];
	return $videoid;
}

// Use shortcodes in text widget.
add_filter('widget_text', 'do_shortcode');

// Make theme available for translation
// Translations can be filed in the /languages/ directory
load_theme_textdomain( 'ecobiz', TEMPLATEPATH . '/languages' );

$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable( $locale_file ) )
	require_once( $locale_file );

/* Enable Post Thumbnail Feature */
if (function_exists('add_theme_support')) {
	add_theme_support( 'post-thumbnails');
	set_post_thumbnail_size( 200, 200 );
	add_image_size('post_thumb', 800, 800, true);
}

function thumb_url(){  
  global $post;
  
  $thumb_src= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array( 2100,2100 ));
  return $thumb_src[0];
}

/* Breadcrumbs Navigation */
function imediapixel_breadcrumbs() {
 
  $delimiter = '&raquo;';
  $name = __('Home','ecobiz'); //text for the 'Home' link
  $currentBefore = '<span class="current">';
  $currentAfter = '</span>';
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
    
    echo '<div class="breadcrumbs">';
 
    global $post;
    $home = home_url();
    echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $currentBefore . single_cat_title() . $currentAfter;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('d') . $currentAfter;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('F') . $currentAfter;
 
    } elseif ( is_year() ) {
      echo $currentBefore . get_the_time('Y') . $currentAfter;
 
    } elseif ( is_single()) {
      $cat = get_the_category(); $cat = $cat[0];
      if ($cat) echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_search() ) {
      echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;
 
    } elseif ( is_tag() ) {
      echo $currentBefore . 'Posts tagged &#39;';
      single_tag_title();
      echo '&#39;' . $currentAfter;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;
 
    } elseif ( is_404() ) {
      echo $currentBefore . 'Error 404' . $currentAfter;
    } else {
      global $query_string;
      $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
      $termlink = get_term_link($term->slug,$term->taxonomy);
      echo $currentBefore . ' '.$term->name .'</a>'. $currentAfter;
    }
    
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
}


/* Posts List base on category*/
function imediapixel_postslist($category, $num, $orderby="date",$style="2col") {  
  global $post;
  
  $category_id = get_cat_ID($category);
  
  $cat_num = ($num) ? $num : 4;
  $counter = 0;
  $out = "";
  query_posts('cat='.$category_id.'&showposts='.$cat_num.'&orderby='.$orderby);
  
  while (have_posts()) : the_post();
    $counter++;
    
    if ($style == "2col") {
      if ($counter %2 ==0) {
        $out .= '<div class="mainbox box-last">'; 
      } else {
        $out .= '<div class="mainbox">';
      }
      $out .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
      $out .= '<div class="boximg">';
      if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {
        $out .= '<img src="'.get_template_directory_uri().'/timthumb.php?src='.thumb_url().'&amp;h=84&amp;w=84&amp;zc=1" alt="" class="boximg-pad" />'."\n";
      }
      $out .= '</div>';
      $out .= '<p>'.excerpt(25).'</p>';
      $out .= '<a href="'.get_permalink().'" class="button"><span>'.__('VIEW MORE DETAIL ','ecobiz').'<img src="'.get_template_directory_uri().'/images/arrow_grey.png" alt="" class="readmore"/></span></a>';
      $out .= '</div>';         
      if ($counter %2 ==0) {
        $out .= '<div class="spacer"></div>'; 
      }      
    } else if ($style == "3col"){
     if ($counter %3 ==0) {
        $out .= '<div class="mainbox2 box-last">'; 
      } else {
        $out .= '<div class="mainbox2">';
      }
      $out .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
      $out .= '<div class="boximg2">';
      if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {
        $out .= '<img src="'.get_template_directory_uri().'/timthumb.php?src='.thumb_url().'&amp;h=78&amp;w=182&amp;zc=1" alt="" class="boximg-pad" />'."\n";
      }
      $out .= '</div>';
      $out .= '<p>'.excerpt(8).'</p>';
      $out .= '<a href="'.get_permalink().'" class="button"><span>'.__('VIEW MORE DETAIL ','ecobiz').'<img src="'.get_template_directory_uri().'/images/arrow_grey.png" alt="" class="readmore"/></span></a>';
      $out .= '</div>';         
      if ($counter %3 ==0) {
        $out .= '<div class="spacer"></div>'; 
      } 
    }
    endwhile;
    wp_reset_query();
  return $out;
}

/* Page with child pages List */
function imediapixel_pagelist($page_name, $num, $orderby="menu_order",$style="2col") {  
  global $post;
  
  $page_id = get_page_by_title($page_name);
  
  $services_num = ($num) ? $num : 4;
  $counter = 0;
  $out = "";
  
   if ($style == "4col") $out .= '<div class="clear"></div><ul class="portfolio-4col">';
   
  query_posts('post_type=page&post_parent='.$page_id->ID.'&showposts='.$services_num.'&orderby='.$orderby);
    
  while (have_posts()) : the_post();
    $counter++;
    
    if ($style == "2col") {
      if ($counter %2 ==0) {
        $out .= '<div class="mainbox box-last">'; 
      } else {
        $out .= '<div class="mainbox">';
      }
      $out .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
      $out .= '<div class="boximg">';
      if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {
        $out .= '<img src="'.get_template_directory_uri().'/timthumb.php?src='.thumb_url().'&amp;h=84&amp;w=84&amp;zc=1" alt="" class="boximg-pad" />'."\n";
      }
      $out .= '</div>';
      $out .= '<p>'.excerpt(25).'</p>';
      $out .= '<a href="'.get_permalink().'" class="button"><span>'.__('VIEW MORE DETAIL ','ecobiz').'<img src="'.get_template_directory_uri().'/images/arrow_grey.png" alt="" class="readmore"/></span></a>';
      $out .= '</div>';         
      if ($counter %2 ==0) {
        $out .= '<div class="spacer"></div>'; 
      }      
    } else if ($style == "3col"){
     if ($counter %3 ==0) {
        $out .= '<div class="mainbox2 box-last">'; 
      } else {
        $out .= '<div class="mainbox2">';
      }
      $out .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
      $out .= '<div class="boximg2">';
      if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {
        $out .= '<img src="'.get_template_directory_uri().'/timthumb.php?src='.thumb_url().'&amp;h=78&amp;w=182&amp;zc=1" alt="" class="boximg-pad" />'."\n";
      }
      $out .= '</div>';
      $out .= '<p>'.excerpt(8).'</p>';
      $out .= '<a href="'.get_permalink().'" class="button"><span>'.__('VIEW MORE DETAIL ','ecobiz').'<img src="'.get_template_directory_uri().'/images/arrow_grey.png" alt="" class="readmore"/></span></a>';
      $out .= '</div>';         
      if ($counter %3 ==0) {
        $out .= '<div class="spacer"></div>'; 
      } 
    } else if ($style == "4col"){
      $out .= '<li'; 
      if ($counter %4 == 0) $out .= ' class="last"';
      $out .= '>';
      $out .= '<div class="portfolio-blockimg3">';
        $out .= '<div class="portfolio-imgbox3">';
        if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {
          $out .= '<img src="'.get_template_directory_uri().'/timthumb.php?src='.thumb_url().'&amp;h=86&amp;w=196&amp;zc=1" alt="" class="boximg-pad" />'."\n";
        }
        $out .= '</div>';
        $out .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
        $out .= '<p>'.excerpt(15).'</p>';
        $out .= '<a href="'.get_permalink().'" class="button"><span>'.__('VIEW DETAIL ','ecobiz').'<img src="'.get_template_directory_uri().'/images/arrow_grey.png" alt="" class="readmore"/></span></a>';     
        $out .= '</div>';
        $out .= '</li>';      
    }    
    endwhile;
    if ($style == "4col") $out .= '</ul>';
  wp_reset_query();
  return $out;
}

/* Services with child pages List */
function imediapixel_serviceslist($page_name, $num, $orderby="menu_order", $title="") {  
  global $post;
  
  $page_id = get_page_by_title($page_name);
  
  $services_num = ($num) ? $num : 6;
  $counter = 0;
  
  query_posts('post_type=page&post_parent='.$page_id->ID.'&showposts='.$services_num.'&orderby='.$orderby);
    
  while (have_posts()) : the_post();
    $counter++;
    if ($counter %3 ==0) {
      $out .= '<div class="mainbox2 box-last">'; 
    } else {
      $out .= '<div class="mainbox2">';
    }
    $out .= '<h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
    $out .= '<div class="boximg2">';
    if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {
      $out .= '<img src="'.get_template_directory_uri().'/timthumb.php?src='.thumb_url().'&amp;h=78&amp;w=182&amp;zc=1" alt="" class="boximg-pad" />'."\n";
    }
    $out .= '</div>';
    $out .= '<p>'.excerpt(8).'</p>';
    $out .= '<a href="'.get_permalink().'" class="button"><span>'.__('VIEW MORE DETAIL ','ecobiz').'<img src="'.get_template_directory_uri().'/images/arrow_grey.png" alt="" class="readmore"/></span></a>';
    $out .= '</div>';         
    if ($counter %3 ==0) {
      $out .= '<div class="spacer"></div>'; 
    }
    endwhile;
  wp_reset_query();
  return $out;
}

/* Posts List base on category*/
function imediapixel_bloglist($cat, $num=4, $orderby="date") {  
  global $post;
  
  ?>
  <ul id="listlatestnews">
  <?php
  $query = array(
		'posts_per_page' => (int)$num,
		'post_type'=>'post',
	);
	
  if($cat){
		$query['cat'] = $cat;
	}  
  
	$paged =(get_query_var('paged')) ? get_query_var('paged') : 1;
	$query['paged'] = $paged;
	$query['showposts'] = $num;

  $blog_text_num = (get_option('ecobiz_blog_text_num')) ? get_option('ecobiz_blog_text_num') : 75;
  
  query_posts($query);
  
  while (have_posts()) : the_post(); 
  ?>
    <li>
      <div class="boximg-blog">
      <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
        <div class="blogimage">
          <img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=84&amp;w=84&amp;zc=1" alt="" class="boximg-pad" />
        </div>
      <?php } ?>
      </div>
      <div class="postbox <?php post_class(); ?>">
      <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
      <p><?php echo excerpt($blog_text_num);?></p>
     </div>
     <div class="clear"></div>
      <div class="metapost">
        <span class="first"><?php echo __('Posted at ','ecobiz');?><?php the_time( get_option('date_format') ); ?></span> | 
        <span><?php echo __('By ','ecobiz');?>: <?php the_author_posts_link();?></span>  |                         
        <span><?php echo __('Categories ','ecobiz');?>: <?php the_category(',');?></span>  | 
        <span><?php comments_popup_link(__('0 Comment','ecobiz'),__('1 Comment','ecobiz'),__('% Comments','ecobiz'));?></span>
      </div>           
      <div class="clear"></div>
    </li>
    <?php endwhile; ?>
    </ul>
    <div class="clear"></div>
    <?php
    wpapi_pagination("",$num);
    wp_reset_query(); 
}

/* Thumbnail in Portfolio List */
if ( !function_exists('fb_AddThumbColumn') && function_exists('add_theme_support') ) {
 
function fb_AddThumbColumn($cols) {
 
$cols['thumbnail'] = __('Thumbnail','ecobiz');
 
return $cols;
}
 
function fb_AddThumbValue($column_name, $post_id) {
 
$width = (int) 100;
$height = (int) 100;
 
if ( 'thumbnail' == $column_name ) {
  // thumbnail of WP 2.9
  $thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
  // image from gallery
  $attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
  if ($thumbnail_id)
  $thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
  elseif ($attachments) {
    foreach ( $attachments as $attachment_id => $attachment ) {
      $thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
    }
  }
    if ( isset($thumb) && $thumb ) {
    echo $thumb;
    } else {
    echo __('None','ecobiz');
    }
  }
}
 
// for posts
add_filter( 'manage_posts_columns', 'fb_AddThumbColumn' );
add_action( 'manage_posts_custom_column', 'fb_AddThumbValue', 10, 2 );
 
// for pages
add_filter( 'manage_pages_columns', 'fb_AddThumbColumn' );
add_action( 'manage_pages_custom_column', 'fb_AddThumbValue', 10, 2 );

// for Portfolio
add_filter( 'manage_portfolio_columns', 'fb_AddThumbColumn' );
add_action( 'manage_portfolio_custom_column', 'fb_AddThumbValue', 10, 2 );

// for slideshow
add_filter( 'manage_slideshow_columns', 'fb_AddThumbColumn' );
add_action( 'manage_slideshow_custom_column', 'fb_AddThumbValue', 10, 2 );
}

add_filter('manage_edit-portfolio_columns', 'portfolio_columns');
function portfolio_columns($columns) {
    $columns['category'] = 'Portfolio Category';
    return $columns;
}

add_action('manage_posts_custom_column',  'portfolio_show_columns');
function portfolio_show_columns($name) {
    global $post;
    switch ($name) {
        case 'category':
            $cats = get_the_term_list( $post->ID, 'portfolio_category', '', ', ', '' );
            echo $cats;
    }
}

add_filter('manage_edit-product_columns', 'product_columns');
function product_columns($columns) {
    $columns['category'] = 'Product Category';
    return $columns;
}

add_action('manage_posts_custom_column',  'product_show_columns');
function product_show_columns($name) {
    global $post;
    switch ($name) {
        case 'category':
            $cats = get_the_term_list( $post->ID, 'product_category', '', ', ', '' );
            echo $cats;
    }
}
/* Remove Wordpress automatic formatting */
function remove_wpautop( $content ) { 
    $content = do_shortcode( shortcode_unautop( $content ) ); 
    $content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );
    return $content;
}

/* Random Portfolio */
function imediapixel_random_portfolio($num=4,$title="Random Portfolio") { 
  global $post;
  
  $counter = 0;
  query_posts(array( 'post_type' => 'portfolio', 'showposts' => $num, 'orderby'=>'rand'));
  ?>
  <h3 class="divider"><?php echo $title;?></h3>
  <ul class="portfolio-4col">    
  <?php  
  while ( have_posts() ) : the_post();
  $counter++;
  $pf_link = get_post_meta($post->ID, '_portfolio_link', true );
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
      <a href="<?php the_permalink();?>" class="button"><span><?php echo __('VIEW DETAIL ','ecobiz');?><img src="<?php echo get_template_directory_uri();?>/images/arrow_grey.png" alt="" class="readmore"/></span></a>     
    </div>
  </li>       
  <?php endwhile;?>
  </ul>
<?php 
} 


/* Pagination */
function wpapi_pagination($pages = '', $range = 4) {
  $showitems = ($range * 2)+1;
  
  global $paged;
  
  if(empty($paged)) $paged = 1;
    if($pages == '') {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if(!$pages) {
      $pages = 1;
    }
  }

 if(1 != $pages) {
  echo '<div class="wpapi_pagination"><span>Page '.$paged.' of '.$pages.'</span>';
  if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
  if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
   for ($i=1; $i <= $pages; $i++) {
    if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
      echo ($paged == $i)? '<span class="current">'.$i.'</span>':'<a href="'.get_pagenum_link($i).'" class="inactive">'.$i.'</a>';
    }
  }

   if ($paged < $pages && $showitems < $pages) echo '<a href="'.get_pagenum_link($paged + 1).'">Next &rsaquo;</a>';
   if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
   echo "</div>";
 }
}

function imediapixel_twitter_feed($title="Twitter Update!",$number=5) { ?>
  
  <?php $twitter_id = get_option('ecobiz_twitter_id');?>
  
  <!-- Twitter -->
    <h4 class="sidebarheading"><img src="<?php echo get_template_directory_uri();?>/images/twitter_24.png" alt="" class="twitter_icon" /><?php echo $title;?></h4>
    <div id="twitter"></div>
  <!-- Twitter End -->
  <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.twitter.js"></script>
  <script type="text/javascript">
  
  jQuery(document).ready(function($) {
		$("#twitter").getTwitter({
			userName: "<?php echo $twitter_id;?>",
			numTweets: <?php echo $number;?>,
			loaderText: "Loading tweets...",
			slideIn: true,
			showHeading: true,
			headingText: "",
			showProfileLink: true
		});
	});
  </script>     
  <?php
}

function imediapixel_flickr_gallery($title="Flickr Gallery",$flicker_id,$number=4) {
?>	  
      <!-- Flickr Gallery -->
        <?php echo $title;?>
        <div class="flickrgallery">
		      <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $number;?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $flicker_id;?>"></script>	
        </div>
        <div class="clear"></div>
      <!-- Flickr Gallery End --> 
<?php
}

function google_analytics(){
	$google_analytics =  get_option('ecobiz_google_analytics');
	if ( $google_analytics <> "" ) 
		echo stripslashes($google_analytics) . "\n";
}
add_action('wp_footer','google_analytics');

function switch_slideshow_src($url_source,$img_width="",$img_height="") {
    if(preg_match_all('!.+\.(?:jpe?g|png|gif)!Ui',$url_source,$matches)) { ?> 
      <img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo $url_source;?>&amp;h=<?php echo $img_height;?>&amp;w=<?php echo $img_width;?>&amp;zc=1" alt="" class="slideimage" />
    <?php
    } else if (preg_match_all('#http://(www.vimeo|vimeo)\.com(/|/clip:)(\d+)(.*?)#i',$url_source,$matches)) {
			$vimeo_vid = vimeo_videoID($url_source);
			echo do_shortcode("[vimeo_video id=$vimeo_vid width=$img_width height=$img_height]");      
    } else if  (preg_match( '#http://(www.youtube|youtube|[A-Za-z]{2}.youtube)\.com/(.*?)#i', $url_source, $matches )) {
			$youtube_vid = youtube_videoID($url_source);
			echo do_shortcode("[youtube_video id=$youtube_vid width=$img_width height=$img_height]");      
    }
}

add_filter( 'the_excerpt', 'shortcode_unautop');
add_filter( 'the_excerpt', 'do_shortcode');

add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

add_filter('widget_text', 'do_shortcode');

add_theme_support('automatic-feed-links');

function switch_footer_columns() {
  $footer_columns = get_option('ecobiz_footer_columns');
  
  switch($footer_columns) {
    case "1 column" :
      get_template_part('footer-1col','1 column footer');
      break;
    case "2 columns" :
      get_template_part('footer-2col','2 columns footer');
      break;
    case "3 columns" :
      get_template_part('footer-3col','3 columns footer');
      break;
    case "4 columns" :
      get_template_part('footer-4col','4 columns footer');
      break;  
    default :
      get_template_part('footer-4col','4 columns footer');
  }
}

function switch_slideshow_type() {
  $page_slideshow_type = get_option('ecobiz_page_slideshow_type');
  
  switch($page_slideshow_type) {
    case "nivo slider" :
      include (TEMPLATEPATH.'/slideshow/nivo-slider.php');
      break;
    case "kwicks slider" :
      include (TEMPLATEPATH.'/slideshow/kwicks-slider.php');
      break;
    case "static slide" :
      include (TEMPLATEPATH.'/slideshow/slideshow-static.php');
      break;
    default :
      include (TEMPLATEPATH.'/slideshow/nivo-slider.php');
  }
  
}
?>
