<?php
/**
 * Plugin Name:     Wp Contact Me
 * Description:     Create a direct channel with your users (phone, whatsapp, email). Use this channel to support, get feedback and help your users.
 * Author:          fl.devopsart
 * Version:         1.0
 * @package         Wp_Contact_Me
 */

//Global Variable
$VERSION="0.1.0";

$ICON_CUSTOMIZE = "img/customize.png";
$ICON_PHONE = "img/phone.png";
$ICON_WHATSAPP = "img/whatsapp.svg";
$ICON_EMAIL = "img/email.png";

$DEFAULT_SETTINGS = array(
  'ui_position' => 'br',
  'ui_direction' => 'horiz',
  'ui_size' => 40,
  'ui_margin' => 5,
  'ui_alpha' => 100
);

//Required PHP
require('wp-contact-me-widget.php');
require('wp-contact-me-settings.php');

//Deactivation
function wpcm_deactivation_hook() {
  delete_option('wpcm_options');
}
register_deactivation_hook( __FILE__, 'wpcm_deactivation_hook' );

//Footer
function wpcm_wp_footer() {
  wpcm_widget(get_option('wpcm_options'));
}
add_action( 'wp_footer', 'wpcm_wp_footer' );

?>
