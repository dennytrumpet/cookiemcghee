<?php

/*
Plugin Name: CookieMcGhee
Plugin URI: http://the3rdplace.co
Description: Drops a cookie if you've seen a div
Version: 1.02
Author: Dennis McGhee
Author URI: http://the3rdplace.co

*/
/* changed to wp-options and transients */
function cookiemcghee_install() {
add_option('cookiemcghee_db_version', '1.02');
}

function cookiemcghee_func($atts) {
$html = '<div id="cookiebar"> We use <a href="/privacy-policy/">cookies</a> to offer you a better browsing experience.&nbsp;&nbsp;&nbsp;<a href="#" id="hidebar">X</a></div>';
    return $html;
}
// register jquery and style on initialization
add_action('init', 'register_script');
function register_script() {
    wp_register_script( 'cookie_library', plugins_url('/js/jquery.cookie.js', __FILE__), array('jquery'));
    wp_register_script( 'cookie_script', plugins_url('/js/cookiemcghee.js', __FILE__), array('jquery'));
    wp_register_style( 'cookie_style', plugins_url('/css/cookiemcghee.css', __FILE__));
}

// use the registered jquery and style above
add_action('wp_enqueue_scripts', 'enqueue_style');

function enqueue_style(){
   wp_enqueue_script('cookie_library');
   wp_enqueue_script('cookie_script');
   wp_enqueue_style( 'cookie_style' );
}

function cookiemcghee_uninstall() {
delete_option('cookiemcghee_db_version');
}

register_uninstall_hook(__FILE__, 'cookiemcghee_uninstall');

add_shortcode( 'cookiemcghee', 'cookiemcghee_func' );

register_activation_hook(__FILE__, 'cookiemcghee_install');
?>
