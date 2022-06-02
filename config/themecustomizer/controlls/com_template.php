<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class com_template {

  function __construct(){

    //Values
    $this->label = __( 'Template', 'zmplugin' );
    $this->view_status_access_level = 99;//view settings 99=off!!!

    //$this->template_part = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\template_part();

  }

}
