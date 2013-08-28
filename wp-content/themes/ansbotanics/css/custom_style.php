<?php header("Content-type: text/css; charset: UTF-8"); ?>

<?php require_once( '../../../../wp-load.php' );?>

<?php
  
  $predefined_skins = get_option('ecobiz_predefined_skins');
  $custom_color = get_option('ecobiz_custom_color');
  $bgimage = get_option('ecobiz_bgimage') ? get_option('ecobiz_bgimage') : "nobg";  
  $body_text_color = get_option('ecobiz_body_text_color'); 
  $bgpattern = get_option('ecobiz_bg_pattern') ? get_option('ecobiz_bg_pattern') : "grid2.png";
  $custom_css = get_option('ecobiz_custom_css');
  $custom_body_text = get_option('ecobiz_custom_body_text');
  $permalinks_color = get_option('ecobiz_permalinks_color');
  $permalinks_hover_color = get_option('ecobiz_permalinks_hover_color');
  $sidebar_heading_color = get_option('ecobiz_sidebar_heading_color');
  
  if ($predefined_skins !="") {
    if ($predefined_skins == "#4681a2") {
      echo '@import url("'.get_template_directory_uri().'/css/styles/blue.css");';
    } else if ($predefined_skins == "#E82F1E") {
      echo '@import url("'.get_template_directory_uri().'/css/styles/red.css");';
    } else if ($predefined_skins == "#ff6c00") {
      echo '@import url("'.get_template_directory_uri().'/css/styles/orange.css");';
    } else if ($predefined_skins == "#3d3d3d") {
      echo '@import url("'.get_template_directory_uri().'/css/styles/dark.css");';
    } else if ($predefined_skins == "#b65529") {
      echo '@import url("'.get_template_directory_uri().'/css/styles/brown.css");';
    }
  } 
  
  if ($custom_color != "") {
    echo 'body { background-color: '.$custom_color.';}';
  } 
  
  if ($bgpattern != "") {
    echo 'body {background-image: url(../images/pattern/'.$bgpattern.'); } ';
  }  
  
  if ($bgimage !="") {
    if ($bgimage !="nobg") {
      echo '
      body {
        background-image: url(../images/bgimage/'.$bgimage.'.jpg);
        background-position: top center;
        background-attachment: fixed;
        background-repeat: no-repeat;
      }    
    '; 
    }
  }
  
  if ($custom_body_text !== "") {
    echo 'body { font-family: '.$custom_body_text['face'].';}'; 
    echo 'p { color:'.$custom_body_text['color'].';font-size:'.$custom_body_text['size'].'px;font-style:'.$custom_body_text['style'].'}';
    echo 'ol li { color:'.$custom_body_text['color'].'}';
    echo '.arrowlist li { color:'.$custom_body_text['color'].'}';
    echo '.checklist li { color:'.$custom_body_text['color'].'}';
    echo '.bulletlist li { color:'.$custom_body_text['color'].'}';
    echo '.itemlist li { color:'.$custom_body_text['color'].'}';
  }
  
  if ($permalinks_color != "") {
    echo 'a,a:link,a:visited { color:'.$permalinks_color.';}';
  }
  
  if ($permalinks_hover_color != "") {
    echo 'a:hover{ color:'.$permalinks_hover_color.';}';
  }
  
  if ($sidebar_heading_color != "") {
     echo '.sidebarcontent h4 { color: '.$sidebar_heading_color.';}';
  }  
  
  if ($custom_css !="") {
    echo $custom_css;
  }
?>