<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class sticky_class extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class {

  protected function default() {

    parent::default();

    $this->label = __( 'Sticky Class:', 'zmplugin' );

  }

}
