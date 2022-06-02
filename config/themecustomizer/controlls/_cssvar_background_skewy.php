<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _cssvar_background_skewy extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-range-marginremove';
    $this->label = __( 'Skew-Y', 'zmplugin' );
    $this->description = 'hide';
    $this->section_group = 'settings';//should be here, not defined in controlls
    $this->validation = 'text';
    $this->input_attrs = array(
      'min' => -89,
      'max' => 89,
      'unit' => 'deg',
    );

  }

}
