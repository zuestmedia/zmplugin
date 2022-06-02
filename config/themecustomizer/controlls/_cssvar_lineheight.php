<?php

namespace ZMP\Plugin\Config\ThemeCustomizer\Controlls;

class _cssvar_lineheight extends \ZMP\Plugin\Config\ThemeCustomizer\Controlls\BuildSingleControll {

  protected function default() {

    //Values
    $this->type = 'zm-range';
    $this->label = __( 'Line height', 'zmplugin' );
    $this->description = 'hide';
    $this->section_group = 'settings';//should be here, not defined in controlls
    $this->validation = 'float';
    $this->input_attrs = array(
      'step' => 0.1,
      'max' => 2.5,
    );

  }

}
