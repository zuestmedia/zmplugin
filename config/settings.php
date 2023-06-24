<?php

namespace ZMP\Plugin\Config;

class settings {

  public $info_box_title;
  public $info_box_links;
  public $version_text_wrap;

  function __construct(){

    $this->info_box_title = __( 'Need Help?', 'zmplugin' );

    $this->info_box_links = array(
      //array('link' => __( 'Customize', 'zmplugin' ), 'url' => esc_url( admin_url( 'customize.php' ) ), 'rel' => '', 'target' => '_blank', 'class' => 'uk-button uk-button-primary'),
      array('link' => __( 'About ZMPlugin', 'zmplugin' ), 'url' => 'https://zuestmedia.com/plugins/', 'rel' => 'nofollow', 'target' => '_blank', 'class' => ''),
      array('link' => __( 'Documentation', 'zmplugin' ), 'url' => 'https://zuestmedia.com/docs/', 'rel' => 'nofollow', 'target' => '_blank', 'class' => ''),
      array('link' => __( 'Pro', 'zmplugin' ), 'url' => 'https://zuestmedia.com/pro/', 'rel' => 'nofollow', 'target' => '_blank', 'class' => 'uk-text-danger'),
    );

    $this->version_text_wrap = __( '<b>Version:</b> %s', 'zmplugin' );

  }

}
