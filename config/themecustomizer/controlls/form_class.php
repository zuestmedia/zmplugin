<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class form_class extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_class {

  protected function default() {

    parent::default();

    $this->label = __( 'Form Class:', 'zmplugin' );

  }

}
