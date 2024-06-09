<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

#[\AllowDynamicProperties]

class com_powered {

  function __construct(){

    //Values
    $this->label = __( 'Powered by', 'zmplugin' );
    $this->description = __( 'This is a Premium-Only Setting.', 'zmplugin' );
    $this->view_status_access_level = 99;

    //$this->link_text = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\link_text();
    //$this->link_url = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\link_url();
    //$this->link_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\link_class();
    //$this->powered_text = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\powered_text();


  }

}
