<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class avatar_size extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_range {

  protected function default() {

    parent::default();

    $this->label = __( 'Avatar Size:', 'zmplugin' );
    $this->input_attrs = array( 'step' => 1, 'min' => 0, 'max' => 1000 );//missing --> eg. unit

  }

}
