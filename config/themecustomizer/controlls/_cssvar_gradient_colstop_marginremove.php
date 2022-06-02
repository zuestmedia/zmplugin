<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _cssvar_gradient_colstop_marginremove extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-range-marginremove';
    $this->label = __( 'Linear Color Stop', 'zmplugin' );
    $this->description = 'hide';
    $this->section_group = 'settings';//should be here, not defined in controlls
    $this->validation = 'percent';
    $this->input_attrs = array(
      'min' => 0,
      'max' => 100,
      'unit' => '%',
    );

  }

}
