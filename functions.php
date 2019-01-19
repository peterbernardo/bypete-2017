<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


function slug_icon($slug_name){
  switch($slug_name){
    
    case 'photos':
    echo "<i class=\"fas fa-camera-retro\"></i>";
    break;
    
    case 'articles':
    echo "<i class=\"fas fa-pencil\"></i>";
    break;
    
    case 'inspirations':
    echo "<i class=\"fas fa-bolt\"></i>";
    break;
  }
}
function format_icon($format_type){
  switch($format_type){
    
    case 'image':
    echo "<i class=\"arrow fas fa-camera-retro\"></i>";
    break;
    case 'aside':
    echo "<i class=\"fas fa-pencil\"></i>";
    break;
    case 'link':
    echo "<i class=\"arrow fas fa-external-link\"></i>";
    break;
    case 'quote':
    echo "<i class=\"arrow fas fa-quote-left\"></i>";
    break;
    case 'status':
    echo "<i class=\"arrow fab fa-twitter\"></i>";
    break;
    case 'video':
    echo "<i class=\"arrow fas fa-play-circle\"></i>";
    break;
    default:
    echo "<i class=\"arrow fas fa-bolt\"></i>";
    break;


  }
}
add_filter( 'body_class', 'twentyeleven_body_classes' );
add_shortcode('bp_image',  'bp_image' );
function bp_image($atts, $content = null) {
    extract(shortcode_atts(array( 'lat' => '',
                    'lng' => '',
                    'likes' => '',
                    'src' => '',
                    'alt' => '',
                    'url' => ''  ), $atts));
    $html = '';
    $html .= '<p><img class="instagram_photo"  ';
    $html .= 'alt="'.$alt.'" ';
    $html .= 'src="'.$src.'" ';

    $html .= 'data-lat="'.$lat.'" ';
    $html .= 'data-lng="'.$lng.'" ';
    $html .= 'data-url="'.$url.'" ';
    $html .= 'data-likes="'.$likes.'" ';
    $html .= '></p>';
  
    return $html;
  }