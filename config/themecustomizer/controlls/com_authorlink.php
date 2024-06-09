<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

#[\AllowDynamicProperties]

class com_authorlink {

  function __construct(){

    //Values
    $this->label = __( 'Author', 'zmplugin' );

    //$this->linked = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\linked();
    //$this->link_class = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\link_class();

  }

}
