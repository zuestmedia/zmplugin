<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class button_class extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class {

  protected function default() {

    parent::default();

    $this->label = __( 'Button Class:', 'zmplugin' );

  }

}
