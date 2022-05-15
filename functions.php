<?php
/*
* my theme function
*/
//Theme Title
add_theme_support('title-tag');
// embedding jquery and css file 
function rez_js_css_file_calling(){
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
add_action('wp_enqueue_scripts', 'rez_js_css_file_calling');


//Google Fonts Enqueue
function rez_add_google_fonts(){
   wp_enqueue_style('rez_google_fonts', 'https://fonts.googleapis.com/css2?family=Kaisei+Decol&family=Oswald&display=swap', false);
}
add_action('wp_enqueue_scripts', 'rez_add_google_fonts');


//Theme Function
function rez_customizer_register($wp_customize){
   //Header Area function
   $wp_customize -> add_section('rez_header_area', array(
      'title' => __('Header Area', 'maganta'),
      'description' => 'if you interested to update your header area, you can do it here'
   ));
   $wp_customize -> add_setting('rez_logo', array(
      'default' => get_bloginfo('template_directory') . '/images/logo.png',
   ));
   $wp_customize -> add_control(new WP_Customize_Image_Control($wp_customize, 'rez_logo', array(
      'label' => 'Logo Upload',
      'setting' => 'rez_logo',
      'description'=> 'Please,  Click Below to Change Your logo',
      'section' => 'rez_header_area',
   )));

   //Menu Position Option
   $wp_customize->add_section('rez_menu_position', array(
      'title' => __('Menu Position Option' , 'maganta'),
       'description' => 'if you interested to change your menu position you can do it, here.'
   ));
   $wp_customize ->add_setting('rez_menu_position', array(
      'default' => 'right_menu',
   ));
   $wp_customize ->add_control('rez_menu_position', array(
      'label' => 'Menu Position',
      'description' => 'Select Your Menu Position',
      'setting'=> 'rez_menu_position',
      'section'=> 'rez_menu_position',
      'type' => 'radio',
      'choices' => array(
         'left_menu' => 'Left Menu',
         'right_menu' => 'Right Menu',
         'center_menu' => 'Center Menu',
      ),
   ));
}

add_action('customize_register', 'rez_customizer_register');

//Menu register
register_nav_menu( 'main_menu', __('Main Menu', 'maganta'));