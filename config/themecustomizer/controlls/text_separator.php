<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class text_separator extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_text {

  protected function default() {

    parent::default();
    
    //Values
    $this->label = __( 'Text Separator:', 'zmplugin' );

  }

}
