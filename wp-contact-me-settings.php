<?php



// Menu
function wpcm_admin_menu() {
 add_menu_page(
 'Contact Me',
 'Contact Me',
 'manage_options',
 'wpcm',
 'wpcm_settings_page'
 );
}
add_action( 'admin_menu', 'wpcm_admin_menu' );

// Media Selector
function wpcm_admin_enqueue_scripts( $page ) {
  global $VERSION;
  wp_enqueue_media();
  wp_enqueue_script( 'myprefix_script', plugins_url( '/js/wpcm_settings_scripts.js' , __FILE__ ), array('jquery'), $VERSION );
}
add_action( 'admin_enqueue_scripts', 'wpcm_admin_enqueue_scripts' );


// Setting Configuration
function wpcm_settings_init() {

  global $DEFAULT_SETTINGS, $ICON_PHONE, $ICON_WHATSAPP, $ICON_EMAIL;

  register_setting( 'wpcm', 'wpcm_options', array('default' => $DEFAULT_SETTINGS));

  // UI Section
  add_settings_section('wpcm_section_ui',null,'wpcm_section_ui','wpcm');
  // add_settings_field('wpcm_field_ui_enable', 'Show Custom UI', 'wpcm_field_checkbox', 'wpcm', 'wpcm_section_ui', array(
  //   'label_for' => 'ui_enable',
  //   'custom_class' => 'enable-section'
  // ));
  add_settings_field('wpcm_field_ui_position', 'Position', 'wpcm_field_select', 'wpcm', 'wpcm_section_ui', array(
    'label_for' => 'ui_position',
    'options' => array(
        'bl' => 'Bottom Left',
        'bc' => 'Bottom Center',
        'br' => 'Bottom Right',
        'ml' => 'Middle Left',
        'mc' => 'Middle Center',
        'mr' => 'Middle Right',
        'tl' => 'Top Left',
        'tc' => 'Top Center',
        'tr' => 'Top Right'
    )
  ));
  add_settings_field('wpcm_field_ui_direction', 'Direction', 'wpcm_field_select', 'wpcm', 'wpcm_section_ui', array(
    'label_for' => 'ui_direction',
    'options' => array(
        'vert' => 'Vertical',
        'horiz' => 'Horizontal'
    )
  ));
  add_settings_field('wpcm_field_ui_size', 'Icon Size', 'wpcm_field_input', 'wpcm', 'wpcm_section_ui', array(
    'label_for' => 'ui_size',
    'input_type' => 'number'
  ));
  add_settings_field('wpcm_field_ui_margin', 'Margin Size', 'wpcm_field_input', 'wpcm', 'wpcm_section_ui', array(
    'label_for' => 'ui_margin',
    'input_type' => 'number'
  ));
  add_settings_field('wpcm_field_ui_alpha', 'Opacity', 'wpcm_field_range', 'wpcm', 'wpcm_section_ui', array(
    'label_for' => 'ui_alpha',
    'range_min' => '0',
    'range_max' => '100'
  ));

  // Phone
  add_settings_section('wpcm_section_phone',null,'wpcm_section_phone','wpcm');
  add_settings_field('wpcm_field_phone_enable', 'Enable Phone Channel', 'wpcm_field_checkbox', 'wpcm', 'wpcm_section_phone', array(
    'label_for' => 'phone_enable',
    'custom_class' => 'enable-section1'
  ));
  add_settings_field('wpcm_field_phone_value', 'Phone Number', 'wpcm_field_input', 'wpcm', 'wpcm_section_phone', array(
    'label_for' => 'phone_value',
    'input_type' => 'text',
    'placeholder' => 'ex +00123456789'
  ));
  add_settings_field('wpcm_field_phone_img', 'Phone Image', 'wpcm_field_media', 'wpcm', 'wpcm_section_phone', array(
    'label_for' => 'phone_img',
    'default_img' => $ICON_PHONE
  ));

  // WhatsApp
  add_settings_section('wpcm_section_whatsapp',null,'wpcm_section_whatsapp','wpcm');
  add_settings_field('wpcm_field_whatsapp_enable', 'Enable WhatsApp Channel', 'wpcm_field_checkbox', 'wpcm', 'wpcm_section_whatsapp', array(
    'label_for' => 'whatsapp_enable',
    'custom_class' => 'enable-section1'
  ));
  add_settings_field('wpcm_field_whatsapp_value', 'WhatsApp Number', 'wpcm_field_input', 'wpcm', 'wpcm_section_whatsapp', array(
    'label_for' => 'whatsapp_value',
    'input_type' => 'text',
    'placeholder' => 'ex +00123456789'
  ));
  add_settings_field('wpcm_field_whatsapp_text', 'WhatsApp Message', 'wpcm_field_textarea', 'wpcm', 'wpcm_section_whatsapp', array(
    'label_for' => 'whatsapp_text',
    'placeholder' => 'Optional default message'
  ));
  add_settings_field('wpcm_field_whatsapp_img', 'WhatsApp Image', 'wpcm_field_media', 'wpcm', 'wpcm_section_whatsapp', array(
    'label_for' => 'whatsapp_img',
    'default_img' => $ICON_WHATSAPP
  ));

  // EMAIL
  add_settings_section('wpcm_section_email',null,'wpcm_section_email','wpcm');
  add_settings_field('wpcm_field_email_enable', 'Enable Email Channel', 'wpcm_field_checkbox', 'wpcm', 'wpcm_section_email', array(
    'label_for' => 'email_enable',
    'custom_class' => 'enable-section1'

  ));
  add_settings_field('wpcm_field_email_value', 'Email Address', 'wpcm_field_input', 'wpcm', 'wpcm_section_email', array(
    'label_for' => 'email_value',
    'input_type' => 'email',
    'placeholder' => 'ex test@test.com'
  ));
  add_settings_field('wpcm_field_email_subject', 'Email Subject', 'wpcm_field_input', 'wpcm', 'wpcm_section_email', array(
    'label_for' => 'email_subject',
    'input_type' => 'text',
    'placeholder' => 'Optional email subject'
  ));
  add_settings_field('wpcm_field_email_text', 'Email Message', 'wpcm_field_textarea', 'wpcm', 'wpcm_section_email', array(
    'label_for' => 'email_text',
    'placeholder' => 'Optional email text'
  ));

  add_settings_field('wpcm_field_email_img', 'Email Image', 'wpcm_field_media', 'wpcm', 'wpcm_section_email', array(
    'label_for' => 'email_img',
    'default_img' => $ICON_EMAIL
  ));

}
add_action( 'admin_init', 'wpcm_settings_init' );

// Validation

function wpcm_options_validate($input) {
  //Sanity
  $input['whatsapp_value'] =  wp_filter_nohtml_kses($input['whatsapp_value']);

  // Validation WhatsApp
  if( !preg_match( '/\+?\d+/', $input['whatsapp_value'] ) ) {
    add_settings_error( 'wpcm_messages', 'wpcm_message_whatsapp_error', __( 'WhatsApp number is not valid', 'wpcm' ), 'error' );
    $input['whatsapp_enable'] = false;
  }
  // Validation Email
  if( !preg_match( '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $input['email_value'] ) ) {
    add_settings_error( 'wpcm_messages', 'wpcm_message_email_error', __( 'EMail address is not valid', 'wpcm' ), 'error' );
    $input['email_enable'] = false;
  }

  return $input; // return validated input
}

// Section

function wpcm_section_ui() {
  global $ICON_CUSTOMIZE;
  wpcm_section(array(
    'icon' => $ICON_CUSTOMIZE,
    'title' => 'Customize User Interface',
    'description' => 'Create a customized UI for your channels'
  ));
}

function wpcm_section_phone() {
  global $ICON_PHONE;
  wpcm_section(array(
    'icon' => $ICON_PHONE,
    'title' => 'Channel: Phone',
    'description' => 'Create a phone channel with your users'
  ));
}

function wpcm_section_whatsapp() {
  global $ICON_WHATSAPP;
  wpcm_section(array(
    'icon' => $ICON_WHATSAPP,
    'title' => 'Channel: WhatsApp',
    'description' => 'Create a whatsapp channel with your users'
  ));
}

function wpcm_section_email() {
  global $ICON_EMAIL;
  wpcm_section(array(
    'icon' => $ICON_EMAIL,
    'title' => 'Channel: Email',
    'description' => 'Create an email channel with your users'
  ));
}

function wpcm_section($args) {
  echo "";
  echo "<h2 style='margin-bottom: 5px;'><span>{$args['title']}</span>&nbsp;<img height='20px' src='" . plugins_url($args['icon'], __FILE__ ) . "' /></h2>";
  echo "<span>{$args['description']}</span>";
  echo "<hr>";
}

// Field

function wpcm_field_checkbox($args) {
  $options = get_option('wpcm_options');
  echo "<input type='checkbox' class='{$args['custom_class']}' id='{$args['label_for']}' name='wpcm_options[{$args['label_for']}]' value='1' " . checked( 1, $options[$args['label_for']], false ) . " />";
}

function wpcm_field_input($args) {
  $options = get_option('wpcm_options');
  echo "<input type='{$args['input_type']}' placeholder='{$args['placeholder']}' id='{$args['label_for']}' name='wpcm_options[{$args['label_for']}]' size='40' value='{$options[$args['label_for']]}' />";
}

function wpcm_field_textarea($args) {
  $options = get_option('wpcm_options');
  echo "<textarea rows='3' cols='40' placeholder='{$args['placeholder']}' id='{$args['label_for']}' name='wpcm_options[{$args['label_for']}]'>{$options[$args['label_for']]}</textarea>";
}

function wpcm_field_range($args) {
  $options = get_option('wpcm_options');
  echo "<input type='range' id='{$args['label_for']}' name='wpcm_options[{$args['label_for']}]' min='{$args['range_min']}' max='{$args['range_max']}' value='{$options[$args['label_for']]}' onchange='wpcm_update_range(\"{$args['label_for']}\",\"{$args['label_for']}_preview\")' />";
  echo "<span id='{$args['label_for']}_preview'>{$options[$args['label_for']]}</span>";
}

function wpcm_field_select($args) {
  $options = get_option('wpcm_options');
  echo "<select name='wpcm_options[{$args['label_for']}]'>";
  foreach ($args['options'] as $key => $value) {
    echo "<option value='{$key}' " . selected($options[$args['label_for']], $key) . ">{$value}</option>";
  }
  echo "</select>";
}

function wpcm_field_media($args) {
  $options = get_option('wpcm_options');
  echo "<img id='{$args['label_for']}_preview' height='{$options['ui_size']}' width='{$options['ui_size']}' src='" . (!empty($options[$args['label_for']] ) ? wp_get_attachment_image_src($options[$args['label_for']])[0] : plugins_url($args['default_img'], __FILE__ )) . "' >";
  echo "<input type='hidden' name='wpcm_options[{$args['label_for']}]' id='{$args['label_for']}' value='{$options[$args['label_for']]}' class='regular-text' />";
  echo "<input type='button' class='button-primary' style='margin-left: 20px;' value='Select Image' onclick='wpcm_media_button_click(\"{$args['label_for']}\",\"{$args['label_for']}_preview\");'/>";
  echo "<input type='button' class='button-primary' style='margin-left: 20px;' value='Reset Image' onclick='wpcm_media_button_reset(\"{$args['label_for']}\",\"{$args['label_for']}_preview\", \"" . (plugins_url($args['default_img'], __FILE__ )) . "\");' />";
}

// HTML

function wpcm_settings_page() {

  if ( ! current_user_can( 'manage_options' ) ) { return; }

  wpcm_widget(get_option('wpcm_options'));

  if ( isset( $_GET['settings-updated'] ) ) {
    add_settings_error( 'wpcm_messages', 'wpcm_message_ok', __( 'Settings Saved', 'wpcm' ), 'updated' );
  }

  settings_errors( 'wpcm_messages' );
  ?>
  <div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <form action="options.php" method="post">
  <?php
    settings_fields( 'wpcm' );
    do_settings_sections( 'wpcm' );
    submit_button( 'Save' );
  ?>
    </form>
  </div>
  <?php
}

?>
