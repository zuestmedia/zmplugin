<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class title extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_text {

  protected function default() {

    parent::default();

    $this->label = __( 'Title:', 'zmplugin' );

  }

}
