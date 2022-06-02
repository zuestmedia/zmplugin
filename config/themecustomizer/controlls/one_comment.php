<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class one_comment extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_text {

  protected function default() {

    parent::default();

    $this->label = __( 'One Comment Text:', 'zmplugin' );

  }

}
