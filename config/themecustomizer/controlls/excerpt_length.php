<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class excerpt_length extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\_range {

  protected function default() {

    parent::default();

    $this->label = __( 'Excerpt Length:', 'zmplugin' );
    $this->input_attrs = array( 'step' => 1, 'min' => 1, 'max' => 99 );

  }

}
