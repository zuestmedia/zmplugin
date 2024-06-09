<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

#[\AllowDynamicProperties]

class com_the_content {

  function __construct(){

    //Values
    $this->label = __( 'Content', 'zmplugin' );

    //$this->excerpt = new \ZMP\Plugin\Config\ThemeCustomizer\Controlls\excerpt(10,3);

  }

}
