<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class more_than_one_comment extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_text {

  protected function default() {

    parent::default();

    $this->label = __( 'More than one Comments Text:', 'zmplugin' );

  }

}
