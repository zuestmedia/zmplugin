<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class item_position extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'text';
    //$this->label = __( 'Itemposition', 'zmplugin' );
    $this->description = __( 'Item Position', 'zmplugin' );
    $this->input_attrs = array('disabled' => 'disabled');
    $this->validation = 'int';

  }

}
