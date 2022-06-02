<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class icon_ratio extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_range {

  protected function default() {

    parent::default();

    $this->label = __( 'Icon ratio:', 'zmplugin' );
    $this->input_attrs = array( 'step' => 0.1, 'min' => 0, 'max' => 10 );

  }

}
