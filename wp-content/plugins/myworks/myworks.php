<?php
/*
Plugin Name: Myworks
Plugin URI: http://annvision.com/
Description: Just another Myworks form plugin.
Author: Majo Johny
Author URI: http://annvision.com/
Text Domain: Myworks
Domain Path: /languages/
Version: 4.5.1
*/



add_action( 'admin_menu', 'register_my_custom_menu_page' );
function register_my_custom_menu_page() {
  // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
  add_menu_page( 'Custom Menu Page Title', 'Gallery', 'manage_options', 'footer_setting_page', 'portfolio_single_page');
  add_submenu_page( 'footer_setting_page', 'sub menu Portfolio_master' , 'Add New', 'manage_options', 'portfolio_sub_page', 'portfolio_sub_page');
  
function portfolio_single_page () { //echo "its a testiong";
include_once('portfolio_list.php');
}
  
function portfolio_sub_page () { include_once('portfolio_form.php');}
}

?>