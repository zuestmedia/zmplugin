<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class no_comments extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_text {

  protected function default() {

    parent::default();

    $this->label = __( 'No Comments Text:', 'zmplugin' );

  }

}
