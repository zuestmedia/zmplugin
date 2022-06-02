<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class placeholder extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_text {

  protected function default() {

    parent::default();

    $this->label = __( 'Placeholder Text:', 'zmplugin' );

  }

}
