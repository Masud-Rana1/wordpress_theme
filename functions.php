<?php
/*
* my theme function
*/
//Theme Title
add_theme_support('title-tag');
// embedding jquery and css file 
function rana_js_css_file_calling(){
   wp_enqueue_style('rez_style', get_stylesheet_uri());
   wp_register_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css', array(), '5.0.2', 'all');
   wp_register_style( 'custom', get_template_directory_uri().'/css/custom.css', array(), '1.0.0', 'all');
   wp_enqueue_style('bootstrap');
   wp_enqueue_style('custom');

   // jquery
   wp_enqueue_script('jquery');
   wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.js', array(), '5.0.2', 'true');
   wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', array(), '1.0.0', 'true');
}
add_action('wp_enqueue_scripts', 'rana_js_css_file_calling');


//Theme Function
