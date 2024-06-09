<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

#[\AllowDynamicProperties]

class com_errorpage {

  function __construct(){

    //Values
    $this->label = __( '404 Errorpage', 'zmplugin' );
    $this->view_status_access_level = 99;

    //$this->title = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\title();
    //$this->text = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\text();
    //$this->title_element = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\title_element();
    //$this->title_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\title_class();


  }

}
