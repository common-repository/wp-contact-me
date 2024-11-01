<?php

  function wpcm_widget_style_position($args) {
    switch ($args['ui_position']) {
      case 'tl':
        echo 'top: 0px;';
        echo 'left: 0px;';
        break;
      case 'tc':
        echo 'top: 0px;';
        echo 'left: 50%;';
        break;
      case 'tr':
        echo 'top: 0px;';
        echo 'right: 0px;';
        break;
      case 'ml':
        echo 'top: 50%;';
        echo 'left: 0px;';
        break;
      case 'mc':
        echo 'top: 50%;';
        echo 'left: 50%;';
        break;
      case 'mr':
        echo 'top: 50%;';
        echo 'right: 0px;';
        break;
      case 'bl':
        echo 'bottom: 0px;';
        echo 'left: 0px;';
        break;
      case 'bc':
        echo 'bottom: 0px;';
        echo 'left: 50%;';
        break;
      default:
        echo 'bottom: 0px;';
        echo 'right: 0px;';
        break;
    }
  }

  function wpcm_widget_style_direction($args) {
    switch ($args['ui_direction']) {
      case 'vert':
        echo 'display: block;';
        break;
      default:
        echo 'display: inline-block;';
        break;
    }
  }

  function wpcm_widget_link($args) {
    echo "<a target='_blank' href='{$args['link_href']}'>";
    echo "<img height='{$args['img_size']}' width='{$args['img_size']}' src='{$args['img_src']}' >";
    echo "</a>";
  }

?>
<?php function wpcm_widget($args) {
  global $ICON_PHONE, $ICON_WHATSAPP, $ICON_EMAIL;
  ?>
  <style>
    .wpcm-wrapper {
      z-index: 2147483638;
      position: fixed;
      <?php wpcm_widget_style_position($args) ?>
    }
    .wpcm-item {
      <?php wpcm_widget_style_direction($args) ?>
      margin: <?php echo $args['ui_margin']?>px;
      opacity: <?php echo $args['ui_alpha'] / 100 ?>;
      filter: alpha(opacity=<?php echo $args['ui_alpha'] ?>);
    }
    .wpcm-item:hover {
      opacity: 1.0;
      filter: alpha(opacity=100);
    }
  </style>
  <div class="wpcm-wrapper">
    <?php if($args['phone_enable']) {?>
      <div class="wpcm-item wpcm-phone">
        <?php wpcm_widget_link(array(
          'link_href' => "tel:{$args['phone_value']}",
          'img_size' => $args['ui_size'],
          'img_src' => (!empty($args['phone_img']) ? wp_get_attachment_image_src($args['phone_img'])[0] : plugins_url($ICON_PHONE, __FILE__ ))
        )) ?>
      </div>
    <?php } ?>
    <?php if($args['whatsapp_enable']) {?>
      <div class="wpcm-item wpcm-whatsapp">
        <?php wpcm_widget_link(array(
          'link_href' => "https://wa.me/{$args['whatsapp_value']}?text=" . urlencode($args['whatsapp_text']) . "",
          'img_size' => $args['ui_size'],
          'img_src' => (!empty($args['whatsapp_img']) ? wp_get_attachment_image_src($args['whatsapp_img'])[0] : plugins_url($ICON_WHATSAPP, __FILE__ ))
        )) ?>
      </div>
    <?php } ?>
    <?php if($args['email_enable']) {?>
      <div class="wpcm-item wpcm-email">
        <?php wpcm_widget_link(array(
          'link_href' => "mailto:{$args['email_value']}?subject=" . urlencode($args['email_subject']) . "&body=" . urlencode($args['email_text']) . "",
          'img_size' => $args['ui_size'],
          'img_src' => (!empty($args['email_img']) ? wp_get_attachment_image_src($args['email_img'])[0] : plugins_url($ICON_EMAIL, __FILE__ ))
        )) ?>
      </div>
    <?php } ?>
  </div>
<?php } ?>
