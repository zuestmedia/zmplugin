<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _cssvar_font_weight extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-range-marginremove';
    $this->label = __( 'Font weight', 'zmplugin' );
    $this->description = 'hide';
    $this->section_group = 'settings';//should be here, not defined in controlls
    $this->validation = 'int';
    $this->input_attrs = array(
      'step' => 100,
      'min' => 0,
      'max' => 1000,
    );

  }

}
