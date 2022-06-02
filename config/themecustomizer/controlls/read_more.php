<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class read_more extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_text {

  protected function default() {

    parent::default();

    $this->label = __( 'Read More Text:', 'zmplugin' );

  }

}
