<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class text extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_textarea {

  protected function default() {

    parent::default();

    $this->label = __( 'Text:', 'zmplugin' );

  }

}
