<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class after extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_text {

  protected function default() {

    parent::default();

    $this->label = __( 'After Text:', 'zmplugin' );

  }

}
