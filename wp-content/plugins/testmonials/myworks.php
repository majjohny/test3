<?php
/*
<<<<<<< HEAD
Plugin Name: Testimonials  is under nameing
=======
Plugin Name: Testimonials
>>>>>>> parent of ec6b2c0... changed plugin name
Plugin URI: http://annvision.com/
Description: Just another Myworks form plugin.
Author: Majo Johny
Author URI: http://annvision.com/
Text Domain: Myworks
Domain Path: /languages/
Version: 4.5.1
*/



add_action( 'admin_menu', 'register_my_custom_menu_page3' );
function register_my_custom_menu_page3() {
  // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
  add_menu_page( 'Custom Menu Page Title', 'Testimonial', 'manage_options', 'testimonial_setting_page', 'testimonial_single_page');
  add_submenu_page( 'testimonial_setting_page', 'sub menu testimonial_master' , 'Add New', 'manage_options', 'testimonial_sub_page', 'testimonial_sub_page');
  
function testimonial_single_page () { //echo "its a testiong";
include_once('portfolio_list.php');
}
  
function testimonial_sub_page () { include_once('portfolio_form.php');}
}

?>