<?php

namespace ZMP\Plugin\Config\ThemeSettings;

class defaults {

  public $general_title;
  public $general_description;
  public $info_box_title;
  public $version_text_wrap;
  public $info_box_links;
  public $info_box_second_title;
  public $info_box_customize;
  public $button_text;
  public $version_text;
  
  function __construct(){

    $this->general_title = __( 'General', 'zmplugin' );
    $this->general_description = __( 'If you need to, you can even edit all theme settings programmaticaly by creating and editing module or config files in your child theme :)', 'zmplugin' );

    $this->info_box_title = __( 'Need help?', 'zmplugin' );
    //$this->info_box_content = __( 'Please check out these links for more infos about ZMTheme or to get support building your website.', 'zmplugin' );
    $this->version_text_wrap = __( '<b>Version:</b> %s', 'zmplugin' );

    $this->info_box_links = array(
      //array('link' => __( 'Customize', 'zmplugin' ), 'url' => esc_url( admin_url( 'customize.php' ) ), 'rel' => '', 'target' => '_blank', 'class' => 'uk-button uk-button-primary'),
      array('link' => __( 'About ZMTheme', 'zmplugin' ), 'url' => 'https://zuestmedia.com/themes/', 'rel' => 'nofollow', 'target' => '_blank', 'class' => ''),
      array('link' => __( 'Documentation', 'zmplugin' ), 'url' => 'https://zuestmedia.com/help/', 'rel' => 'nofollow', 'target' => '_blank', 'class' => ''),
      array('link' => __( 'Pro', 'zmplugin' ), 'url' => 'https://zuestmedia.com/pro/', 'rel' => 'nofollow', 'target' => '_blank', 'class' => 'uk-text-danger'),
    );

    $this->info_box_second_title = __( 'Edit theme in customizer:', 'zmplugin' );
    $this->info_box_customize = __( 'Customize', 'zmplugin' );

    $this->button_text = __( 'Save Changes', 'zmplugin' );
    $this->version_text = __( 'Version', 'zmplugin' );

  }

}
