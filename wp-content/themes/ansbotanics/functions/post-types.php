<?php
/* Register Custom Post Type for Portfolio */
add_action('init', 'portfolio_post_type_init');
function portfolio_post_type_init() {
  $labels = array(
    'name' => __('Portfolio', 'post type general name','ecobiz'),
    'singular_name' => __('portfolio', 'post type singular name','ecobiz'),
    'add_new' => __('Add New', 'portfolio','ecobiz'),
    'add_new_item' => __('Add New portfolio','ecobiz'),
    'edit_item' => __('Edit portfolio','ecobiz'),
    'new_item' => __('New portfolio','ecobiz'),
    'view_item' => __('View portfolio','ecobiz'),
    'search_items' => __('Search portfolio','ecobiz'),
    'not_found' =>  __('No portfolio found','ecobiz'),
    'not_found_in_trash' => __('No portfolio found in Trash','ecobiz'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'rewrite' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'show_in_nav_menus' => false,
    'menu_position' => 1000,
    'rewrite' => array(
      'slug' => 'portfolio_item',
      'with_front' => FALSE,
    ),    
    'taxonomies' => array('portfolio_category', 'post_tag'),
    'supports' => array(
      'title',
      'editor',
      'author',
      'thumbnail',
      'excerpt',
      'comments',
      'thumbnail',
      'trackbacks',
      'custom-fields',
      'revisions',
      'page-attributes'
    )
  );

  register_post_type('portfolio',$args);
  flush_rewrite_rules();
}


register_taxonomy_for_object_type('post_tag', 'portfolio');

register_taxonomy("portfolio_category", 
			    	array("portfolio"), 
			    	array( "hierarchical" => true, 
			    			"label" => __("Portfolio Categories",'ecobiz'), 
			    			"singular_label" => __("Portfolio Categories",'ecobiz'), 
			    			"rewrite" => true,
			    			"query_var" => true,
                "rewrite" => array(
                  "slug" => "portfolio_category"
                )
			    		));  
			    		
/* Register Custom Post Type for Slideshow */
add_action('init', 'slideshow_post_type_init');

function slideshow_post_type_init() {
  $labels = array(
    'name' => __('Slideshow', 'post type general name','ecobiz'),
    'singular_name' => __('slideshow', 'post type singular name','ecobiz'),
    'add_new' => __('Add New', 'slideshow','ecobiz'),
    'add_new_item' => __('Add New slideshow','ecobiz'),
    'edit_item' => __('Edit slideshow','ecobiz'),
    'new_item' => __('New slideshow','ecobiz'),
    'view_item' => __('View slideshow','ecobiz'),
    'search_items' => __('Search slideshow','ecobiz'),
    'not_found' =>  __('No slideshow found','ecobiz'),
    'not_found_in_trash' => __('No slideshow found in Trash','ecobiz'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'rewrite' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'show_in_nav_menus' => false,
    'menu_position' => 1000,
    'rewrite' => array(
      'slug' => 'slideshow',
      'with_front' => FALSE,
    ),
    'supports' => array(
      'title',
      'editor',
      'author',
      'thumbnail',
      'excerpt',
      'comments',
      'thumbnail',
      'trackbacks',
      'custom-fields',
      'revisions'       
    )
  );
  register_post_type('slideshow',$args);
  flush_rewrite_rules();
}
                
/* Register Custom Post Type for Products */
add_action('init', 'products_post_type_init');
function products_post_type_init() {
  $labels = array(
    'name' => __('Product', 'post type general name','ecobiz'),
    'singular_name' => __('product', 'post type singular name','ecobiz'),
    'add_new' => __('Add New', 'product','ecobiz'),
    'add_new_item' => __('Add New product','ecobiz'),
    'edit_item' => __('Edit product','ecobiz'),
    'new_item' => __('New product','ecobiz'),
    'view_item' => __('View product','ecobiz'),
    'search_items' => __('Search product','ecobiz'),
    'not_found' =>  __('No product found','ecobiz'),
    'not_found_in_trash' => __('No product found in Trash','ecobiz'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'rewrite' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'show_in_nav_menus' => false,
    'menu_position' => 1000,
    'rewrite' => array(
      'slug' => 'product',
      'with_front' => FALSE,
    ),    
    'supports' => array(
      'title',
      'editor',
      'author',
      'thumbnail',
      'excerpt',
      'comments',
      'thumbnail',
      'trackbacks',
      'custom-fields',
      'revisions'       
    )
  );
  register_post_type('product',$args);
  flush_rewrite_rules();
}

  
	register_taxonomy_for_object_type('post_tag', 'product');

	register_taxonomy("product_category", 
				    	array("product"), 
				    	array( "hierarchical" => true, 
				    			"label" => __("Product Categories",'ecobiz'), 
				    			"singular_label" => __("Product Categories",'ecobiz'), 
				    			"rewrite" => true,
				    			"query_var" => true,
                  "rewrite" => array(
                    "slug" => "products"
                  )				 				    			
				    		));
                
  
?>