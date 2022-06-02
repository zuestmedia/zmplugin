<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _background_image_size extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\image_size {

  public function default() {

    parent::default();

    //Values
    $this->label = __( 'Background Image Size:', 'zmplugin' );

  }

}
