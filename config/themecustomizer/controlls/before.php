<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class before extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_text {

  protected function default() {

    parent::default();

    $this->label = __( 'Before Text:', 'zmplugin' );

  }

}
