<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){
	
// VARIABLES
$themename = get_theme_data(STYLESHEETPATH . '/style.css');
$themename = $themename['Name'];
$shortname = "ecobiz";

// Populate OptionsFramework option in array for use in theme
global $of_options;
$of_options = get_option('of_options');

$GLOBALS['template_path'] = OF_DIRECTORY;

//Access the WordPress Categories via an Array
$of_categories = array();  
$of_categories_obj = get_categories('hide_empty=0');
foreach ($of_categories_obj as $of_cat) {
  $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;
}    
//$categories_tmp = array_unshift($of_categories, "Select a category:");    


$of_product_categories = array();
$product_categories = get_categories('taxonomy=product_category&orderby=ID&title_li=&hide_empty=0');
foreach ($product_categories as $product_category) { 
  $of_product_categories[$product_category->cat_ID] = $product_category->cat_name;
}


//Access the WordPress Pages via an Array
$of_pages = array();
$of_pages_obj = get_pages('parent=0');
foreach ($of_pages_obj as $of_page) {
  $of_pages[$of_page->ID] = $of_page->post_title; 
}
//$of_pages_tmp = array_unshift($of_pages, "Select a page:");       

// Image Alignment radio box
$options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 

// Image Links to Options
$options_image_link_to = array("image" => "The Image","post" => "The Post"); 

//Testing 
$options_select = array("one","two","three","four","five"); 
$options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five"); 

//Stylesheets Reader
$alt_stylesheet_path = OF_FILEPATH . '/styles/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

/* Get Cufon fonts into a drop-down list */
$cufonts = array();
if(is_dir(TEMPLATEPATH . "/js/fonts/")) {
	if($open_dirs = opendir(TEMPLATEPATH . "/js/fonts")) {
		while(($cufontfonts = readdir($open_dirs)) !== false) {
			if(stristr($cufontfonts, ".js") !== false) {
				$cufonts[] = $cufontfonts;
			}
		}
	}
}
$cufonts_dropdown = $cufonts;

//More Options
$uploads_arr = wp_upload_dir();
$all_uploads_path = $uploads_arr['path'];
$all_uploads = get_option('of_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
    
$slide_effects = array("sliceDown","sliceDownLeft","sliceUp","sliceUpLeft","sliceUpDown","sliceUpDownLeft","fold","fade","random","slideInRight","slideInLeft","boxRandom","boxRain","boxRainReverse","boxRainGrow","boxRainGrowReverse");

// Set the Options Array
$options = array();


$options[] = array( "name" => "General Settings",
                    "icon" => "general",
                    "type" => "heading");

$options[] = array( "type" => "info",
                    "std" => "General settings for your site that will be used in general pages");

$options[] = array( "name" => "Custom Main Logo",
					"desc" => "Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "upload");
                
$options[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
					"id" => $shortname."_custom_favicon",
					"std" => "",
					"type" => "upload"); 
					
$options[] = array( "name" => "Tracking Code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
					"id" => $shortname."_google_analytics",
					"std" => "",
					"type" => "textarea");                       
                                       
$options[] = array( "name" => "404 Text",
					"desc" => "Enter your 404 (Page Not Found) Text here.",
					"id" => $shortname."_404_text",
					"std" => "",
					"type" => "textarea");         

$options[] = array( "name" => "Pages &amp; Categories",
                    "icon" => "page_cat",
                    "type" => "heading");
                              
$options[] = array( "name" => "Your About page",
					"desc" => "Select your about page.",
					"id" => $shortname."_about_page",
					"std" => "",
					"type" => "select",
					"options" => $of_pages);
                                        
$options[] = array( "name" => "Your Services page",
					"desc" => "Select your services page.",
					"id" => $shortname."_services_page",
					"std" => "",
					"type" => "select",
					"options" => $of_pages);
          					
$options[] = array( "name" => "Your Testimonial Category",
					"desc" => "Select your Testimonial category.",
					"id" => $shortname."_testimonial_cat",
					"std" => "",
					"type" => "select",
					"options" => $of_categories);

$options[] = array( "name" => "Your Team Category",
					"desc" => "Select your Team category.",
					"id" => $shortname."_team_cat",
					"std" => "",
					"type" => "select",
					"options" => $of_categories);
					
$options[] = array( "name" => "Enable comment in pages?",
					"desc" => "Please uncheck this option if you want to include comment section in your pages.",
					"id" => $shortname."_enable_comment",
					"std" => "true",
					"type" => "checkbox");									

$options[] = array( "name" => "Slideshow for Pages",
					"desc" => "Select your slideshow type for your page when you using <strong>Page with Slidshow</strong> page template.",
					"id" => $shortname."_page_slideshow_type",
					"std" => "",
					"type" => "select",
					"options" => array("nivo slider","kwicks slider","static slide"));
          
          
$options[] = array( "name" => "Homepage Settings",
                    "icon" => "homepage",
                    "type" => "heading");
					       
$options[] = array( "type" => "info",
                    "std" => "4 columns Site features for homepage");
                    
$options[] = array( "name" => "Title for Homepage features box #1",
					"desc" => "Enter your title for homepage features box #1",
					"id" => $shortname."_featuresbox_title1",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Custom URL for Homepage features box #1",
					"desc" => "Enter your custom URL for homepage features box #1",
					"id" => $shortname."_featuresbox_desturl1",
					"std" => "",
					"type" => "text"); 
					
$options[] = array( "name" => "Icon for Homepage features box #1",
					"desc" => "Enter your icon url for homepage features box #1, recommended size 32x32px",
					"id" => $shortname."_featuresbox_image1",
					"std" => "",
					"type" => "upload");
              
$options[] = array( "name" => "Short Description for Homepage features box #1",
					"desc" => "Enter your brief short description for homepage features box #1",
					"id" => $shortname."_featuresbox_desc1",
					"std" => "",
					"type" => "textarea");  

$options[] = array( "name" => "Title for Homepage features box #2",
					"desc" => "Enter your title for homepage features box #2",
					"id" => $shortname."_featuresbox_title2",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Custom URL for Homepage features box #2",
					"desc" => "Enter your custom URL for homepage features box #2",
					"id" => $shortname."_featuresbox_desturl2",
					"std" => "",
					"type" => "text"); 
					
$options[] = array( "name" => "Icon for Homepage features box #2",
					"desc" => "Enter your icon url for homepage features box #2, recommended size 32x32px",
					"id" => $shortname."_featuresbox_image2",
					"std" => "",
					"type" => "upload");
              
$options[] = array( "name" => "Short Description for Homepage features box #2",
					"desc" => "Enter your brief short description for homepage features box #2",
					"id" => $shortname."_featuresbox_desc2",
					"std" => "",
					"type" => "textarea");  
                 
$options[] = array( "name" => "Title for Homepage features box #3",
					"desc" => "Enter your title for homepage features box #3",
					"id" => $shortname."_featuresbox_title3",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Custom URL for Homepage features box #3",
					"desc" => "Enter your custom URL for homepage features box #3",
					"id" => $shortname."_featuresbox_desturl3",
					"std" => "",
					"type" => "text"); 
					
$options[] = array( "name" => "Icon for Homepage features box #3",
					"desc" => "Enter your icon url for homepage features box #3, recommended size 32x32px",
					"id" => $shortname."_featuresbox_image3",
					"std" => "",
					"type" => "upload");
              
$options[] = array( "name" => "Short Description for Homepage features box #3",
					"desc" => "Enter your brief short description for homepage features box #3",
					"id" => $shortname."_featuresbox_desc3",
					"std" => "",
					"type" => "textarea");  

$options[] = array( "name" => "Title for Homepage features box #4",
					"desc" => "Enter your title for homepage features box #4",
					"id" => $shortname."_featuresbox_title4",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Custom URL for Homepage features box #4",
					"desc" => "Enter your custom URL for homepage features box #4",
					"id" => $shortname."_featuresbox_desturl4",
					"std" => "",
					"type" => "text"); 
					
$options[] = array( "name" => "Icon for Homepage features box #4",
					"desc" => "Enter your icon url for homepage features box #4, recommended size 32x32px",
					"id" => $shortname."_featuresbox_image4",
					"std" => "",
					"type" => "upload");
              
$options[] = array( "name" => "Short Description for Homepage features box #4",
					"desc" => "Enter your brief short description for homepage features box #4",
					"id" => $shortname."_featuresbox_desc4",
					"std" => "",
					"type" => "textarea");  
          
$options[] = array( "name" => "Disable Features box?",
					"desc" => "Please check this option if you want to hide 4 columns homepage features box.",
					"id" => $shortname."_disable_features_box",
					"std" => "false",
					"type" => "checkbox");	
          
$options[] = array( "type" => "info",
                    "std" => "Add your Welcome title and message");
										
$options[] = array( "name" => "Welcome Title",
					"desc" => "Enter welcome title for your site here",
					"id" => $shortname."_welcome_title",
					"std" => "",
					"type" => "text");					
					
$options[] = array( "name" => "Welcome Message",
					"desc" => "Enter your welcome message here",
					"id" => $shortname."_welcome_message",
					"std" => "",
					"type" => "textarea");
                                                
$options[] = array( "name" => "Site Overview",
                    "icon" => "services",
                    "type" => "heading");

$options[] = array( "type" => "info",
                    "std" => "Site overview for 4 columns homepage section");
					                    
$options[] = array( "name" => "Title for site overview column #1",
					"desc" => "Enter your title for site overview column #1",
					"id" => $shortname."_site_overview_title1",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Custom URL for site overview column box #1",
					"desc" => "Enter your custom URL for site overview column #1",
					"id" => $shortname."_site_overview_url1",
					"std" => "",
					"type" => "text"); 
					
$options[] = array( "name" => "Icon for services overview column #1",
					"desc" => "Enter your icon url for services overview column #1, recommended size 64x64px",
					"id" => $shortname."_site_overview_icon1",
					"std" => "",
					"type" => "upload");
              
$options[] = array( "name" => "Short Description for site overview column #1",
					"desc" => "Enter your brief short description for homepage site overview box #1",
					"id" => $shortname."_site_overview_desc1",
					"std" => "",
					"type" => "textarea");  
					
$options[] = array( "name" => "Title for site overview column #2",
					"desc" => "Enter your title for site overview column #2",
					"id" => $shortname."_site_overview_title2",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Custom URL for site overview column box #2",
					"desc" => "Enter your custom URL for site overview column #2",
					"id" => $shortname."_site_overview_url2",
					"std" => "",
					"type" => "text"); 
					
$options[] = array( "name" => "Icon for site overview column #2",
					"desc" => "Enter your icon url for services site column #2, recommended size 64x64px",
					"id" => $shortname."_site_overview_icon2",
					"std" => "",
					"type" => "upload");
              
$options[] = array( "name" => "Short Description for site overview column #2",
					"desc" => "Enter your brief short description for homepage site overview box #2",
					"id" => $shortname."_site_overview_desc2",
					"std" => "",
					"type" => "textarea");  
										
$options[] = array( "name" => "Title for services overview column #3",
					"desc" => "Enter your title for services overview column #3",
					"id" => $shortname."_site_overview_title3",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Custom URL for site overview column box #3",
					"desc" => "Enter your custom URL for site overview column #3",
					"id" => $shortname."_site_overview_url3",
					"std" => "",
					"type" => "text"); 
					
$options[] = array( "name" => "Icon for site overview column #3",
					"desc" => "Enter your icon url for site overview column #3, recommended size 64x64px",
					"id" => $shortname."_site_overview_icon3",
					"std" => "",
					"type" => "upload");
              
$options[] = array( "name" => "Short Description for site overview column #3",
					"desc" => "Enter your brief short description for homepage site overview box #3",
					"id" => $shortname."_site_overview_desc3",
					"std" => "",
					"type" => "textarea");  
															
$options[] = array( "name" => "Title for site overview column #4",
					"desc" => "Enter your title for site overview column #4",
					"id" => $shortname."_site_overview_title4",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Custom URL for site overview column box #4",
					"desc" => "Enter your custom URL for site overview column #4",
					"id" => $shortname."_site_overview_url4",
					"std" => "",
					"type" => "text"); 
					
$options[] = array( "name" => "Icon for site overview column #4",
					"desc" => "Enter your icon url for site overview column 4, recommended size 64x64px",
					"id" => $shortname."_site_overview_icon4",
					"std" => "",
					"type" => "upload");
              
$options[] = array( "name" => "Short Description for site overview column #4",
					"desc" => "Enter your brief short description for homepage site overview box #4",
					"id" => $shortname."_site_overview_desc4",
					"std" => "",
					"type" => "textarea");  
          															
$options[] = array( "name" => "Slideshow Setting",
                    "icon" => "slideshow",
                    "type" => "heading");
					
$options[] = array( "name" => "Slideshow Items Order",
					"desc" => "Select your order parameter for slideshow items.",
					"id" => $shortname."_slideshow_order",
					"std" => "",
					"type" => "select",
					"options" => array("author","date","title","modified","menu_order","parent","ID","rand"));				                                                    
          
$options[] = array( "type" => "info",
                    "std" => "Nivo Slider Settings");
                    
$options[]	= array(	"name" => "Transition Types",
    			"desc" => "Please select transition types for your slideshow translation effect.",
    			"id" => $shortname."_nivo_transition",
    			"type" => "select",
          "options" => $slide_effects);
          
$options[]	= array(	"name" => "Slide Slice Number",
    			"desc" => "Please enter number of slices for slideshow.",
    			"id" => $shortname."_nivo_slices",
    			"type" => "text");

$options[]	= array(	"name" => "Slide transition speed",
    			"desc" => "Please enter speed time for transation (in milliseconds).",
    			"id" => $shortname."_nivo_animspeed",
          "std" => "500",
    			"type" => "text");

$options[]	= array(	"name" => "Slide Paused Time",
    			"desc" => "The duration between each slide transition (in milliseconds).",
    			"id" => $shortname."_nivo_pausespeed",
          "std" => "3000",
    			"type" => "text");

$options[] = array( "name" => "Enable Direction Navigation?",
					"desc" => "if false, will hide 'next' and 'prev' control",
					"id" => $shortname."_nivo_directionNav",
					"std" => "true",
					"type" => "select",
					"options" => array("true","false"));

$options[] = array( "name" => "Hide Direction Navigation button on hover?",
					"desc" => "Only show direction navigation button on hover",
					"id" => $shortname."_nivo_directionNavHide",
					"std" => "true",
					"type" => "select",
					"options" => array("true","false"));

$options[] = array( "name" => "Enable control Navigation (dot navigation)?",
					"desc" => "if false, will hide dot navigation control",
					"id" => $shortname."_nivo_controlNav",
					"std" => "true",
					"type" => "select",
					"options" => array("true","false"));					

$options[] = array( "name" => "Enable Caption?",
					"desc" => "enable caption in slide image",
					"id" => $shortname."_nivo_caption",
					"std" => "true",
					"type" => "select",
					"options" => array("true","false"));	
					
$options[] = array( "type" => "info",
                    "std" => "Kwicks Slider Settings");
          
$options[]	= array(	"name" => "Slide speed",
    			"desc" => "Please enter transation speed (in milliseconds).",
    			"id" => $shortname."_kwicks_speed",
          "std" => "200",
    			"type" => "text");					
    			
$options[] = array( "type" => "info",
                    "std" => "Static Slideshow settings");

$options[] = array( "name" => "Image/Video url source for Static slideshow",
					"desc" => "Please enter your image/video url for static slideshow, eg. http://imediapixel.com/uploads/2010/01/slideshow.jpg or http://www.youtube.com/watch?v=VKP1t3gQ_o0 or http://vimeo.com/2074812",
					"id" => $shortname."_static_slideshow_source",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Static Slideshow Title",
					"desc" => "Enter the title for your static slideshow",
					"id" => $shortname."_static_slideshow_title",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "Static Slideshow Description",
					"desc" => "Enter your brief short description for static slideshow",
					"id" => $shortname."_static_slideshow_desc",
					"std" => "",
					"type" => "textarea");

$options[] = array( "name" => "Static Slideshow Button Text",
					"desc" => "Enter the text for your static slideshow button",
					"id" => $shortname."_static_slideshow_buttontext",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "Custom URL",
					"desc" => "Enter the URL for your static slideshow button",
					"id" => $shortname."_static_slideshow_url",
					"std" => "",
					"type" => "text");
                    
$options[] = array( "name" => "Portfolio Options",
          "icon" => "portfolio",
					"type" => "heading");

$options[] = array( "name" => "Your portfolio page",
					"desc" => "Select your portfolio page.",
					"id" => $shortname."_portfolio_page",
					"std" => "",
					"type" => "select",
					"options" => $of_pages);
          
$options[] = array( "name" => "Portfolio page description",
					"desc" => "Please enter your description about your portfolio here, will be displayed in portfolio page.",
					"id" => $shortname."_portfolio_desc",
					"std" => "",
					"type" => "textarea");  
					
$options[] = array( "name" => "Number items to display per page",
					"desc" => "Please enter your number to display your portfolio items per page.",
					"id" => $shortname."_portfolio_items_num",
					"std" => "",
					"type" => "text");  
					
$options[] = array( "name" => "Portfolio Items Order",
					"desc" => "Select your order parameter for portfolio items.",
					"id" => $shortname."_portfolio_order",
					"std" => "",
					"type" => "select",
					"options" => array("author","date","title","modified","menu_order","parent","ID","rand"));				                                                    

$options[] = array( "name" => "View Detail Text",
					"desc" => "Please enter your View Detail text for permalink button (eg. View Detail Project)",
					"id" => $shortname."_portfolio_readmore",
					"std" => "",
					"type" => "text");  

$options[] = array( "name" => "Visit Site Text",
					"desc" => "Please enter your Visit Site text for permalink button (eg. Continue Reading)",
					"id" => $shortname."_portfolio_visitsite",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Products Options",
          "icon" => "product",
					"type" => "heading"); 	   
					
$options[] = array( "name" => "Product page description",
					"desc" => "Please enter your description about your product here, will be displayed in product page.",
					"id" => $shortname."_product_desc",
					"std" => "",
					"type" => "textarea");

$options[] = array( "name" => "Currency Sign",
					"desc" => "Please enter your currency sign here, you can add your currency html special character, for detail please visit <a href='http://webdesign.about.com/od/localization/l/blhtmlcodes-cur.htm'>http://webdesign.about.com/od/localization/l/blhtmlcodes-cur.htm</a> in Numerical Code column",
					"id" => $shortname."_currency",
					"std" => "&#36;",
					"type" => "text");

$options[] = array( "name" => "Billing Cycle",
					"desc" => "Please enter your billig cycle",
					"id" => $shortname."_billing_cycle",
					"std" => "monthly",
					"type" => "select",
          "options" => array("monthly","yearly")
          );
          
$options[] = array( "name" => "Product Category for main product page",
					"desc" => "Please choose product category that you want to display in main product page",
					"id" => $shortname."_product_cat",
					"std" => "",
					"type" => "select",
					"options" => $of_product_categories);

$options[] = array( "name" => "Product Items Order",
					"desc" => "Select your order parameter for portfolio items.",
					"id" => $shortname."_product_order",
					"std" => "",
					"type" => "select",
					"options" => array("author","date","title","modified","menu_order","parent","ID","rand"));				                                                    

$options[] = array( "name" => "Buy Now text",
					"desc" => "Please enter your custom text for order button, eg. Order now / Buy Now",
					"id" => $shortname."_product_button_text",
					"std" => "",
					"type" => "text");  
                           
$options[] = array( "name" => "Blog Options",
          "icon" => "blog",
					"type" => "heading"); 	   

$options[] = array( "name" => "Your Blog page",
					"desc" => "Select your blog page.",
					"id" => $shortname."_blog_page",
					"std" => "",
					"type" => "select",
					"options" => $of_pages);

$options[] = array( "name" => "Blog Categories",
					"desc" => "Please check the categories that you want to include in Blog page.",
					"id" => $shortname."_blog_categories",
					"std" => "",
					"type" => "multicheck",
					"options" => $of_categories);				  
					
$options[] = array( "name" => "Excerpt number",
					"desc" => "Please enter your number for blog post excerpt.",
					"id" => $shortname."_blog_text_num",
					"std" => "",
					"type" => "text");  
					
$options[] = array( "name" => "Blog Items Order",
					"desc" => "Select your order parameter for blog items.",
					"id" => $shortname."_blog_order",
					"std" => "",
					"type" => "select",
					"options" => array("author","date","title","modified","menu_order","parent","ID","rand"));				                                                    
                                         
$options[] = array( "name" => "Number items to display per page",
					"desc" => "Please enter your number to display your Blog items per page.",
					"id" => $shortname."_blog_items_num",
					"std" => "",
					"type" => "text");  
										
$options[] = array( "name" => "Disable Authorbox?",
					"desc" => "Please check this option if you want to hide authorbox in actual post.",
					"id" => $shortname."_author_box",
					"std" => "false",
					"type" => "checkbox");						
                                     
$options[] = array( "name" => "Disable Posts Comment?",
					"desc" => "Please check this option if you want to hide posts comment section in actual post.",
					"id" => $shortname."_disable_comment",
					"std" => "false",
					"type" => "checkbox");	
                                                                                                      
$options[] = array( "name" => "Styling Options",
          "icon" => "styling",
					"type" => "heading");
					
$url_bgcolor =  get_stylesheet_directory_uri() . '/admin/images/bgcolor/';
$options[] = array( "name" => "Predefined Skins",
					"desc" => "Please select of one of predefined skins as your default skin.",
					"id" => $shortname."_predefined_skins",
					"std" => "",
					"type" => "images",
					"options" => array(
						'#82B500' => $url_bgcolor . 'green.png',
						'#4681a2' => $url_bgcolor . 'blue.png',
						'#E82F1E' => $url_bgcolor . 'red.png',
            '#ff6c00' => $url_bgcolor . 'orange.png',
            '#3d3d3d' => $url_bgcolor . 'dark.png',
            '#b65529' => $url_bgcolor . 'brown.png',
            ));
					
$options[] = array( "name" => "Custom Skin Color",
					"desc" => "please define your color skins with this option, if you dont want to use predefined skins color.",
					"id" => $shortname."_custom_color",
					"std" => "",
					"type" => "color"); 

$url_bgpattern =  get_stylesheet_directory_uri() . '/admin/images/bgpattern/';
$options[] = array( "name" => "Background Pattern",
					"desc" => "Please select of one of patterns as your default background pattern.",
					"id" => $shortname."_bg_pattern",
					"std" => "",
					"type" => "images",
					"options" => array(
            'grid1.png' => $url_bgpattern . 'grid1.png',
            'grid2.png' => $url_bgpattern . 'grid2.png',
            'grid3.png' => $url_bgpattern . 'grid3.png',
            'grid4.png' => $url_bgpattern . 'grid4.png',
            'horizontal-line1.png' => $url_bgpattern . 'horizontal-line1.png',
            'horizontal-line2.png' => $url_bgpattern . 'horizontal-line2.png',
            'diagonal-line1.png' => $url_bgpattern . 'diagonal-line1.png',
            'diagonal-line2.png' => $url_bgpattern . 'diagonal-line2.png',
            'vertical-line1.png' => $url_bgpattern . 'vertical-line1.png',
            'vertical-line2.png' => $url_bgpattern . 'vertical-line2.png',
            'vertical-line3.png' => $url_bgpattern . 'vertical-line3.png',
            'mozaic1.png' => $url_bgpattern . 'mozaic1.png',
            'mozaic2.png' => $url_bgpattern . 'mozaic2.png',
            'mozaic2.png' => $url_bgpattern . 'mozaic2.png',
            'pixelite.png' => $url_bgpattern . 'pixelite.png',  
            'dot.png' => $url_bgpattern . 'dot.png',
            'flower-swirl1.png' => $url_bgpattern . 'flower-swirl1.png',
            'flower-swirl2.png' => $url_bgpattern . 'flower-swirl2.png',
            'flower-swirl3.png' => $url_bgpattern . 'flower-swirl3.png',
            'flower-swirl4.png' => $url_bgpattern . 'flower-swirl4.png',
            'flower-swirl5.png' => $url_bgpattern . 'flower-swirl5.png',
            'flower-swirl6.png' => $url_bgpattern . 'flower-swirl6.png',
            'flower-swirl7.png' => $url_bgpattern . 'flower-swirl7.png',
            'flower-swirl8.png' => $url_bgpattern . 'flower-swirl8.png',
            'flower-swirl9.png' => $url_bgpattern . 'flower-swirl9.png',
            'flower-swirl10.png' => $url_bgpattern . 'flower-swirl10.png',
          ));

$url_bgimage =  get_stylesheet_directory_uri() . '/admin/images/bgimage/';
$options[] = array( "name" => "Background Image",
					"desc" => "Please select of one of available background image as your default background.",
					"id" => $shortname."_bgimage",
					"std" => "nobg",
					"type" => "images",
					"options" => array(
            'bg1' => $url_bgimage . 'bg1.jpg',
						'bg2' => $url_bgimage . 'bg2.jpg',
						'bg3' => $url_bgimage . 'bg3.jpg',
            'nobg' => $url_bgimage . 'nobg.jpg'
            ));

$options[] = array( "name" => "Cufon Font",
					"desc" => "Select your default cufon font.",
					"id" => $shortname."_cufon_font",
					"std" => "",
					"type" => "select",
					"options" => $cufonts);

										
$options[] = array( "name" => "Disable Cufon?",
					"desc" => "Please check this option if you want to disable cufon feature.",
					"id" => $shortname."_disable_cufon",
					"std" => "false",
					"type" => "checkbox");		
          
$options[] = array( "name" => "Body Text Typograpy",
					"desc" => "Please set this option if you want to use your custom styling for body text paragraph",
					"id" => $shortname."_custom_body_text",
					"std" => array('size' => '12','unit' => 'em','face' => 'Arial','color' => '#666666'),
					"type" => "typography");
					
$options[] = array( "name" => "Permalinks Color",
					"desc" => "please define your permalinks color here.",
					"id" => $shortname."_permalinks_color",
					"std" => "",
					"type" => "color"); 					
					
$options[] = array( "name" => "Permalinks Hover Color",
					"desc" => "please define your permalinks hover color here.",
					"id" => $shortname."_permalinks_hover_color",
					"std" => "",
					"type" => "color"); 					
					
$options[] = array( "name" => "Sidebar Heading Color",
					"desc" => "please define your sidebar heading color here.",
					"id" => $shortname."_sidebar_heading_color",
					"std" => "",
					"type" => "color"); 					
					
$options[] = array( "name" => "Custom CSS",
          "desc" => "Quickly add some CSS to your theme by adding it to this block.",
          "id" => $shortname."_custom_css",
          "std" => "",
          "type" => "textarea");
          
$options[] = array( "name" => "Contact Info",
          "icon" => "contact",
					"type" => "heading");      

$options[] = array( "name" => "Google Map API Key",
					"desc" => "Please add your google map API key here, if you dont have one, you can signup at http://code.google.com/intl/en-US/apis/maps/signup.html",
					"id" => $shortname."_google_map_key",
					"std" => "",
					"type" => "textarea");    

$options[] = 	array(	"name" => "Latitude",
			"desc" => "Enter your latitude here, for quick search your latitude, please visit <a href='http://universimmedia.pagesperso-orange.fr/geo/loc.htm'>http://universimmedia.pagesperso-orange.fr/geo/loc.htm</a>",
			"id" => $shortname."_info_latitude",
			"type" => "text");

$options[] = 	array(	"name" => "Longitude",
			"desc" => "Enter your longitude here, for quick search your longitude, <a href='http://universimmedia.pagesperso-orange.fr/geo/loc.htm'>http://universimmedia.pagesperso-orange.fr/geo/loc.htm</a>",
			"id" => $shortname."_info_longitude",
			"type" => "text");
      
					
$options[] = array( "name" => "Your main office addess",
					"desc" => "Please add your main office address here.",
					"id" => $shortname."_info_address",
					"std" => "",
					"type" => "textarea");    

$options[] = array( "name" => "Phone nubmer",
					"desc" => "Please add your phone number here.",
					"id" => $shortname."_info_phone",
					"std" => "",
					"type" => "text");    

$options[] = array( "name" => "FAX nubmer",
					"desc" => "Please add your FAX number here.",
					"id" => $shortname."_info_fax",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "E-mail Address",
					"desc" => "Please add your e-mail address here.",
					"id" => $shortname."_info_email",
					"std" => "",
					"type" => "text");
          
$options[] = array( "name" => "Website",
					"desc" => "Please add your website address here without <strong>http://<strong>.",
					"id" => $shortname."_info_website",
					"std" => "",
					"type" => "text");

$options[] = array( "type" => "info",
            "std" => "Social Links Profile");
           	  
$options[] = array( "name" => "Linkedin",
					"desc" => "Please add your linkedin profile URL here.",
					"id" => $shortname."_linkedin_url",
					"std" => "",
					"type" => "text");                                    

$options[] = array( "name" => "Twitter",
					"desc" => "Please add your Twitter ID here.",
					"id" => $shortname."_twitter_id",
					"std" => "",
					"type" => "text");             
                             		
$options[] = array( "name" => "Facebook",
					"desc" => "Please add your Facebook profile URL here.",
					"id" => $shortname."_facebook_url",
					"std" => "",
					"type" => "text"); 

$options[] = array( "name" => "Flickr",
					"desc" => "Please add your Flickr ID here, use <a href=\"http://www.idgettr.com\">IDGettr</a> to find it.",
					"id" => $shortname."_flickr_id",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Youtube",
					"desc" => "Please add your Youtube ID here.",
					"id" => $shortname."_youtube_id",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Footer Settings",
                    "icon" => "footer",
                    "type" => "heading");

$options[] = array( "type" => "info",
                    "std" => "General settings for your site footer");
          
$options[] = array( "name" => "Custom Footer Logo",
					"desc" => "Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)",
					"id" => $shortname."_footerlogo",
					"std" => "",
					"type" => "upload");          

$options[] = array( "name" => "Footer Text",
					"desc" => "Enter your site copyright here.",
					"id" => $shortname."_footer_text",
					"std" => "",
					"type" => "textarea");
          
$options[] = array( "name" => "Footer Columns",
					"desc" => "Select your footer columns.",
					"id" => $shortname."_footer_columns",
					"std" => "",
					"type" => "select",
					"options" => array("1 column","2 columns","3 columns","4 columns"));
          
update_option('of_template',$options); 					  
update_option('of_themename',$themename);   
update_option('of_shortname',$shortname);

}
}
?>
