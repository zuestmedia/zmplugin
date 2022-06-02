<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _cssvar_letter_spacing extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-range';
    $this->label = __( 'Letter spacing', 'zmplugin' );
    $this->description = 'hide';
    $this->section_group = 'settings';//should be here, not defined in controlls
    $this->validation = 'text';
    $this->input_attrs = array(
      'unit' => 'px',
      'max' => 10,
    );

  }

}
