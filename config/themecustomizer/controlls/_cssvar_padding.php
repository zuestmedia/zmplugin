<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _cssvar_padding extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-range-marginremove';
    $this->label = __( 'Gap', 'zmplugin' );
    $this->description = 'hide';
    $this->section_group = 'settings';//should be here, not defined in controlls
    $this->validation = 'text';
    $this->input_attrs = array(
      'min' => 0,
      'max' => 100,
      'unit' => 'px',
    );

  }

}
