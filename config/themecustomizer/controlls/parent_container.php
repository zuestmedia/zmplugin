<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class parent_container extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'text';
    //$this->label = __( 'Container Parent', 'zmplugin' );
    $this->description = __( 'Parent Container', 'zmplugin' );
    $this->input_attrs = array('disabled' => 'disabled');
    $this->validation = 'class';

  }

}
