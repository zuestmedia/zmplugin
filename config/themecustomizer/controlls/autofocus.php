<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class autofocus extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'text';
    $this->description = __( 'Autofocus', 'zmplugin' );
    //$this->input_attrs = array('disabled' => 'disabled');
    $this->validation = 'bool';

  }

}
