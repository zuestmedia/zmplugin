<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class comments_closed_message extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_text {

  protected function default() {

    parent::default();

    $this->label = __( '"Comments are closed"-Message:', 'zmplugin' );

  }

}
